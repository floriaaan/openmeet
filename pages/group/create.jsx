import { AppLayout } from "@components/layouts/AppLayout";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";
import dynamic from "next/dynamic";
import { makeRequest } from "@libs/asyncXHR";
import { MeetupImportDropdown } from "@components/dropdowns/MeetupImportDropdown";

const LoadingDynamic = () => (
  <div className="flex items-center justify-center w-full h-full mx-auto text-2xl font-bold tracking-wide uppercase">
    Chargement de la carte…
  </div>
);

const Map = dynamic(import("@components/map/Map"), {
  ssr: false,
  loading: LoadingDynamic,
});

export default function GroupCreatePage() {
  const [name, setName] = useState("");
  const [tags, setTags] = useState("");
  const [description, setDescription] = useState("");

  const [privateGroup, setPrivateGroup] = useState(false);

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
    // eslint-disable-next-line react-hooks/exhaustive-deps
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
      if (!privateGroup) {
        const slug = name
          .toLowerCase()
          .replace(/[^\w ]+/g, "")
          .replace(/ +/g, "-");

        const response = await firestore
          .collection("groups")
          .doc(slug)
          .set({
            name,
            tags: tags
              .split(";")
              .map((tag) => (tag.trim().length > 0 ? tag.trim() : null))
              .filter((e) => e != null),
            description,
            createdAt: new Date().toISOString(),
            admin: { uid: user.uid, fullName: user.fullName },
            location: {
              location: location || "Remote",
              position: { ...position } || { lat: null, lng: null },
            },
            events: [],
            private: false,
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
        Router.push("/group/" + slug);
      } else {
        firestore
          .collection("groups")
          .add({
            name,
            tags: tags
              .split(";")
              .map((tag) => (tag.trim().length > 0 ? tag.trim() : null))
              .filter((e) => e != null),
            description,
            createdAt: new Date().toISOString(),
            admin: { uid: user.uid, fullName: user.fullName },
            location: {
              location: location || "Remote",
              position: { ...position } || { lat: null, lng: null },
            },
            events: [],
            private: true,
          })
          .then(async (docRef) => {
            await firestore
              .collection("groups")
              .doc(docRef.id)
              .collection("subscribers")
              .doc(user.uid)
              .set({
                fullName: user.fullName,
                photoUrl: user.photoUrl,
                uid: user.uid,
              });
            Router.push("/group/" + docRef.id);
          });
      }
    }
  };

  return (
    <AppLayout>
      <section className="relative h-full text-gray-600 bg-gray-100 dark:bg-black body-font">
        <div className="flex flex-wrap h-full px-5 py-5 mx-auto sm:flex-nowrap">
          <div className="relative items-end justify-start hidden overflow-hidden rounded-xl lg:w-1/3 md:w-1/2 sm:mr-10 md:flex">
            <Map
              setMap={setMap}
              mapEventHandler={{ click: (e) => setPosition(e.latlng) }}
            />
          </div>
          <div className="flex flex-col justify-center w-full mt-8 lg:w-2/3 md:w-1/2 md:ml-auto md:py-8 md:mt-0">
            <h3 className="mt-4 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
              Create a{" "}
              <span className="text-green-500 dark:text-green-600">group</span>
            </h3>
            <p className="mb-5 leading-relaxed text-gray-400">
              Group together people who have the same interests as you
            </p>
            <div className="relative flex flex-col mb-4">
              <label
                htmlFor="name"
                className="text-sm leading-7 text-gray-600 dark:text-gray-400"
              >
                Name
              </label>
              <input
                type="text"
                id="name"
                name="name"
                value={name}
                onChange={(e) => setName(e.target.value)}
                className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border appearance-none rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 "
              />
            </div>
            <div className="relative flex flex-col mb-4">
              <label
                htmlFor="location"
                className="text-sm leading-7 text-gray-600 dark:text-gray-400"
              >
                Tags
              </label>
              <div className="inline-flex items-center space-x-2">
                <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-green-200 rounded-lg dark:bg-green-900">
                  <i className="text-green-700 dark:text-green-400 fas fa-tags" />
                </span>
                <input
                  type="text"
                  id="tags"
                  name="tags"
                  placeholder="javascript; css; java; nosql; bigdata; .net; azure; agile; uxdesign;"
                  value={tags}
                  onChange={(e) => setTags(e.target.value)}
                  // disabled
                  className="w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                />
              </div>
              <p className="flex mt-1 text-xs">
                Please separate tags with semi-colons.
              </p>
            </div>
            <div className="relative flex flex-col mb-4">
              <label
                htmlFor="location"
                className="text-sm leading-7 text-gray-600 dark:text-gray-400"
              >
                Location
              </label>
              <div className="inline-flex items-center space-x-2">
                <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-green-200 rounded-lg dark:bg-green-900">
                  <i className="text-green-700 dark:text-green-400 fas fa-map-marker-alt" />
                </span>
                <input
                  type="text"
                  id="location"
                  name="location"
                  placeholder="Click on the map (disabled on mobile devices)"
                  value={location}
                  onChange={(e) => setLocation(e.target.value)}
                  // disabled
                  className="w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                />
              </div>
              <p className="flex mt-1 text-xs">
                If no location is provided, the event will be set in Remote.
              </p>
              <p className="flex mt-1 text-xs md:hidden">
                Map autocompletion unavailable on mobile devices.
              </p>
            </div>
            <div className="relative flex flex-col mb-4">
              <label
                htmlFor="description"
                className="text-sm leading-7 text-gray-600 dark:text-gray-400"
              >
                Description
              </label>
              <textarea
                id="description"
                name="description"
                rows={7}
                className="w-full px-2 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border appearance-none rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                defaultValue={""}
                onChange={(e) => setDescription(e.target.value)}
              />
            </div>
            <div className="relative flex flex-col mb-4">
              <p className="text-sm leading-7 text-gray-600 dark:text-gray-400">
                Preferences
              </p>
              <div className="inline-flex items-center space-x-2">
                <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-green-200 rounded-lg dark:bg-green-900">
                  <i className="text-green-700 dark:text-green-400 fas fa-lock" />
                </span>
                <label className="flex items-center space-x-3">
                  <input
                    type="checkbox"
                    name="privateGroup"
                    value={privateGroup}
                    onChange={(e) => setPrivateGroup(e.target.checked)}
                    className="w-4 h-4 duration-200 bg-green-200 border-0 rounded-md appearance-none form-checkbox hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 checked:bg-green-600 checked:border-transparent focus:outline-none focus:bg-green-400 dark:focus:bg-green-900 ring-green-500"
                  />
                  <span className="text-sm text-gray-700 dark:text-gray-300">
                    Make the group private
                  </span>
                </label>
              </div>
            </div>
            <div className="flex flex-row mb-3 space-x-2">
              <button
                type="submit"
                className="flex-grow px-6 py-2 text-lg text-white bg-green-500 border-0 rounded-xl focus:outline-none hover:bg-green-600"
                onClick={createGroup}
              >
                Create
              </button>
              <MeetupImportDropdown />
            </div>
            <p className="text-xs text-gray-500">
              What an adventure that begins! 🎉
            </p>
          </div>
        </div>
      </section>
    </AppLayout>
  );
}
