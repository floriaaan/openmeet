import { AppLayout } from "@components/layouts/AppLayout";
import { useAuth } from "@hooks/useAuth";
import { FieldValue, firestore } from "@libs/firebase";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";
import dynamic from "next/dynamic";
import { makeRequest } from "@libs/asyncXHR";

const Map = dynamic(import("@components/map/Map"), {
  ssr: false,
  loading: () => (
    <div className="flex items-center justify-center w-full h-full mx-auto text-2xl font-bold tracking-wide uppercase">
      Chargement de la carte…
    </div>
  ),
});

export default function GroupCreatePage() {
  const router = useRouter();
  const { user } = useAuth();

  const [name, setName] = useState("");
  const [description, setDescription] = useState("");

  const [position, setPosition] = useState(null);
  const [location, setLocation] = useState(null);
  const [locationDetails, setLocationDetails] = useState(null);
  const [map, setMap] = useState(null);

  const [startDate, setStartDate] = useState(null);
  const [endDate, setEndDate] = useState(null);

  const [group, setGroup] = useState(null);
  const [groupsWhereAdmin, setGroupsWhereAdmin] = useState([]);

  const fetchLocation = async () => {
    setLocation(null);
    const response = await makeRequest(
      "GET",
      `https://api-adresse.data.gouv.fr/reverse/?lat=${position.lat}&lon=${position.lng}`
    );
    let json = JSON.parse(response);
    // console.log(json);
    if (json?.features[0] != null) {
      setLocation(
        json?.features?.[0].properties.name +
          ", " +
          json?.features?.[0].properties.city +
          " " +
          json?.features?.[0].properties.postcode +
          ", France"
      );
      console.log(json?.features?.[0].properties);
      setLocationDetails({
        ...json?.features?.[0].properties,
        country: "France",
      });
    } else setLocation(null);
  };

  useEffect(() => {
    if (position !== null) fetchLocation();
    else setLocation(null);
  }, [position]);

  useEffect(() => {
    if (user)
      firestore
        .collection("groups")
        .where("admin.uid", "==", user.uid)
        .get()
        .then((querySnapshot) => {
          let tmp = [];
          querySnapshot.forEach((doc) => {
            tmp.push({ slug: doc.id, ...doc.data() });
          });
          setGroupsWhereAdmin(tmp);
          setGroup(tmp[0]);
        })
        .catch((error) => {
          console.log("Error getting documents: ", error);
        });
  }, [user]);

  const createEvent = async () => {
    const slug = name
      .toLowerCase()
      .replace(/[^\w ]+/g, "")
      .replace(/ +/g, "-");
    const eventRef = firestore.collection("events").doc(slug).get();

    if (user && group && startDate && !eventRef.exists) {
      await firestore
        .collection("events")
        .doc(slug)
        .set({
          slug,
          name,
          description,
          createdAt: new Date().toISOString(),
          group: { slug: group.slug, name: group.name },
          host: {
            uid: user.uid,
            photoUrl: user.photoUrl,
            fullName: user.fullName,
          },
          startDate,
          endDate: endDate || null,
          location: {
            location: location || "Remote",
            position: { ...position } || { lat: null, lng: null },
            details: locationDetails || null,
          },
        })
        .then(async function (docRef) {
          await firestore
            .collection("groups")
            .doc(group.slug)
            .update({
              events: FieldValue.arrayUnion({
                slug,
                finished: new Date() > new Date(endDate),
                inProgress:
                  new Date() > new Date(startDate) &&
                  new Date() < new Date(endDate),
                startDate,
                endDate,
              }),
            });

          router.push("/event/" + slug);
        });
    }
  };

  return (
    <AppLayout>
      <section className="relative h-full text-gray-600 bg-gray-100 dark:bg-black body-font">
        <div className="container flex flex-wrap h-full px-5 py-5 mx-auto sm:flex-nowrap">
          <div className="relative items-end justify-start hidden overflow-hidden rounded-xl lg:w-1/3 md:w-1/2 sm:mr-10 md:flex">
            <Map
              setMap={setMap}
              mapEventHandler={{ click: (e) => setPosition(e.latlng) }}
            />
          </div>
          <div className="flex flex-col justify-center w-full mt-8 lg:w-2/3 md:w-1/2 md:ml-auto md:py-8 md:mt-0">
            <h2 className="mb-1 text-2xl font-bold text-purple-500 title-font">
              Create an event
            </h2>
            <p className="mb-5 leading-relaxed text-gray-400">
              Share a moment with all the people that match your interests.
            </p>
            <div className="relative mb-4">
              <label htmlFor="name" className="text-sm leading-7 text-gray-600">
                Name
              </label>
              <input
                type="text"
                id="name"
                name="name"
                value={name}
                onChange={(e) => setName(e.target.value)}
                className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 "
              />
            </div>
            <div className="relative mb-4">
              <label
                htmlFor="group"
                className="text-sm leading-7 text-gray-600"
              >
                Group
              </label>
              <select
                type="text"
                id="group"
                name="group"
                onChange={(e) => {
                  let changeGroup = groupsWhereAdmin.find(
                    (group) => group.slug === e.target.value
                  );
                  //   console.log(changeGroup);
                  setGroup(changeGroup);
                }}
                className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 "
              >
                {groupsWhereAdmin.map((el, index) => (
                  <option value={el.slug} key={index}>
                    {el.name}
                  </option>
                ))}
              </select>
            </div>

            <div className="relative mb-4">
              <label
                htmlFor="location"
                className="text-sm leading-7 text-gray-600"
              >
                Location
              </label>
              {/* <p className="flex md:hidden">
                Location disabled on mobile devices.
              </p> */}
              <input
                type="text"
                id="location"
                name="location"
                value={location}
                onChange={(e) => setLocation(e.target.value)}
                // disabled
                className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
              />
            </div>
            <div className="relative mb-4">
              <p className="text-sm leading-7 text-gray-600">Dates and times</p>
              {/* <p className="flex md:hidden">
                Location disabled on mobile devices.
              </p> */}
              <div className="flex flex-col items-center lg:flex-row">
                <div className="w-full mb-2 lg:w-1/2 lg:mb-0 lg:pr-2">
                  <label
                    htmlFor="startDate"
                    className="text-xs leading-7 text-gray-600"
                  >
                    Starts at
                  </label>
                  <input
                    id="startDate"
                    type="datetime-local"
                    value={startDate}
                    onChange={(e) => setStartDate(e.target.value)}
                    // disabled
                    className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                  />
                </div>
                <div className="w-full mb-2 lg:w-1/2 lg:mb-0 lg:pl-2">
                  <label
                    htmlFor="endDate"
                    className="text-xs leading-7 text-gray-600"
                  >
                    End at
                  </label>
                  <input
                    id="endDate"
                    type="datetime-local"
                    value={endDate}
                    onChange={(e) => setEndDate(e.target.value)}
                    // disabled
                    className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                  />
                </div>
              </div>
            </div>
            <div className="relative mb-4">
              <label
                htmlFor="description"
                className="text-sm leading-7 text-gray-600"
              >
                Description
              </label>
              <textarea
                id="description"
                name="description"
                rows={7}
                className="w-full px-2 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                defaultValue={""}
                onChange={(e) => setDescription(e.target.value)}
              />
            </div>
            <div className="flex flex-row mb-3 space-x-2">
              <button
                type="submit"
                className="flex-grow px-6 py-2 text-lg text-white bg-purple-500 border-0 rounded-xl focus:outline-none hover:bg-purple-600"
                onClick={createEvent}
              >
                Create
              </button>
              <button
                id="meetup-display-btn"
                type="button"
                className="flex-shrink px-6 py-2 text-lg text-white bg-red-600 border-0 rounded-xl focus:outline-none hover:bg-red-700"
              >
                <i className="mr-2 fab fa-meetup" />
                Import from meetup.com
              </button>
            </div>
            <p className="text-xs text-gray-500">Cheers! 🍻</p>
          </div>
        </div>
      </section>
    </AppLayout>
  );
}
