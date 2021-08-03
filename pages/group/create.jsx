import { AppLayout } from "@components/layouts/AppLayout";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
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
  const [name, setName] = useState("");
  const [tags, setTags] = useState("");
  const [description, setDescription] = useState("");

  const [position, setPosition] = useState(null);
  const [location, setLocation] = useState(null);
  const [map, setMap] = useState(null);

  const fetchLocation = async () => {
    setLocation(null);
    const response = await makeRequest(
      "GET",
      `https://api-adresse.data.gouv.fr/reverse/?lat=${position.lat}&lon=${position.lng}`
    );
    let json = JSON.parse(response);
    if (json?.features[0] != null)
      setLocation(json?.features?.[0].properties.city + ", France");
    else setLocation(null);
  };

  useEffect(() => {
    if (position !== null) fetchLocation();
    else setLocation(null);
  }, [position]);

  const Router = useRouter();

  const { user } = useAuth();

  const createGroup = async () => {
    const slug = name
      .toLowerCase()
      .replace(/[^\w ]+/g, "")
      .replace(/ +/g, "-");
    const groupRef = firestore.collection("groups").doc(slug).get();

    if (user && !groupRef.exists) {
      console.log({
        name,
        tags: tags.split(";"),
        description,
        createdAt: new Date().toISOString(),
        admin: { uid: user.uid, fullName: user.fullName },
        location: {
          location: location || "Remote",
          position: {...position} || { lat: null, lng: null },
        },
      });

      const slug = name
        .toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
      const response = await firestore
        .collection("groups")
        .doc(slug)
        .set({
          name,
          tags: tags.split(";"),
          description,
          createdAt: new Date().toISOString(),
          admin: { uid: user.uid, fullName: user.fullName },
          location: {
            location: location || "Remote",
            position: {...position} || { lat: null, lng: null },
          },
        });
      await firestore
        .collection("groups")
        .doc(slug)
        .collection("subscribers")
        .doc(user.uid)
        .set({
          fullName: user.fullName,
          photoUrl: user.photoUrl,
          uid: user.uid,
        });
      // if (response.ok) {
      Router.push("/group/" + slug);
      // }
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
            <h2 className="mb-1 text-2xl font-bold text-green-500 title-font">
              Create a group
            </h2>
            <p className="mb-5 leading-relaxed text-gray-400">
              Group together people who have the same interests as you
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
                className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 pr-28"
              />
            </div>
            <div className="relative mb-4">
              <label htmlFor="tags" className="text-sm leading-7 text-gray-600">
                Tags
              </label>
              <input
                type="text"
                id="tags"
                name="tags"
                value={tags}
                onChange={(e) => setTags(e.target.value)}
                className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 pr-28"
              />
            </div>
            <div className="relative mb-4">
              <label
                htmlFor="location"
                className="text-sm leading-7 text-gray-600"
              >
                Location
              </label>
              <p className="flex md:hidden">
                Location disabled on mobile devices.
              </p>
              <input
                type="text"
                id="location"
                name="location"
                value={location}
                disabled
                className="hidden w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none md:block rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 pr-28"
              />
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
                className="w-full px-2 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 pr-28"
                defaultValue={""}
                onChange={(e) => setDescription(e.target.value)}
              />
            </div>
            <div className="flex flex-row mb-3 space-x-2">
              <button
                type="submit"
                className="flex-grow px-6 py-2 text-lg text-white bg-green-500 border-0 rounded-xl focus:outline-none hover:bg-green-600"
                onClick={createGroup}
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
            <p className="text-xs text-gray-500">
              What an adventure that begins
            </p>
          </div>
        </div>
      </section>
    </AppLayout>
  );
}
