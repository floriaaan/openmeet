import { AppLayout } from "@components/layouts/AppLayout";
import { useAuth } from "@hooks/useAuth";
import { FieldValue, firestore, uploadInFirebaseStorage } from "@libs/firebase";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";
import dynamic from "next/dynamic";
import { makeRequest } from "@libs/asyncXHR";
import { MeetupImportDropdown } from "@components/dropdowns/MeetupImportDropdown";
import { createUID } from "@libs/createUID";

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

  const [picture, setPicture] = useState(null);
  const [pictureUrl, setPictureUrl] = useState(null);

  const [attachment, setAttachment] = useState(null);
  const [attachmentError, setAttachmentError] = useState(null);

  const [externalLink, setExternalLink] = useState(null);

  const [privateEvent, setPrivateEvent] = useState(null);

  const [group, setGroup] = useState(null);
  const [groupsWhereAdmin, setGroupsWhereAdmin] = useState([]);

  const [scrapResult, setScrapResult] = useState(null);
  useEffect(() => {
    if (scrapResult) {
    }
  }, [scrapResult]);

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
      // console.log(json?.features?.[0].properties);
      setLocationDetails({
        ...json?.features?.[0].properties,
        country: "France",
      });
    } else setLocation(null);
  };

  useEffect(() => {
    if (position !== null) fetchLocation();
    else setLocation(null);
    // eslint-disable-next-line react-hooks/exhaustive-deps
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
          console.warn("Error getting documents: ", error);
        });
  }, [user]);

  const createEvent = async () => {
    const slug = privateEvent
      ? createUID()
      : name
          .toLowerCase()
          .replace(/[^\w ]+/g, "")
          .replace(/ +/g, "-");
    const eventRef = firestore.collection("events").doc(slug).get();

    if (user && group && startDate && !eventRef.exists) {
      let pictureInStorage = null;
      if (picture) {
        pictureInStorage = await uploadInFirebaseStorage(
          picture,
          `events/${slug}/picture`
        );
      }

      let attachmentInStorage = null;
      if (attachment) {
        attachmentInStorage = await uploadInFirebaseStorage(
          attachment,
          `events/${slug}/attachment_${slug}_${attachment.name}`
        );
      }

      firestore
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
          externalLink: externalLink || null,
          picture: pictureInStorage,
          attachment: attachment
            ? { url: attachmentInStorage, name: attachment.name }
            : null,
          private: privateEvent,
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
                private: privateEvent,
              }),
            });

          router.push("/event/" + slug);
        });
    }
  };

  return (
    <AppLayout>
      <section className="relative w-full h-full pb-6 text-gray-600 bg-gray-100 dark:bg-gray-900 dark:bg-opacity-10 body-font">
        <div className="flex flex-wrap h-full px-5 py-5 mx-auto sm:flex-nowrap">
          <div className="relative items-end justify-start hidden overflow-hidden rounded-xl lg:w-1/3 md:w-1/2 sm:mr-10 md:flex">
            <Map
              setMap={setMap}
              mapEventHandler={{ click: (e) => setPosition(e.latlng) }}
            />
          </div>
          <div className="flex flex-col flex-grow w-full h-full lg:w-2/3 md:w-1/2">
            <h3 className="mt-4 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
              Create an{" "}
              <span className="text-purple-500 dark:text-purple-600">
                event
              </span>
            </h3>
            <p className="mb-5 leading-relaxed text-gray-400">
              Share a moment with all the people that match your interests.
            </p>
            <div className="flex flex-col w-full h-full xl:flex-row">
              <div className="flex flex-col w-full mt-8 md:ml-auto lg:py-2 xl:py-8 xl:mt-0 xl:pr-3">
                <div className="relative flex flex-col mb-4">
                  {pictureUrl && (
                    <div className="relative w-full">
                      {/* eslint-disable-next-line @next/next/no-img-element */}
                      <img
                        src={pictureUrl}
                        className="object-cover object-center w-full rounded-lg max-h-52"
                        alt="Event picture"
                      ></img>
                      <div
                        className="absolute top-0 right-0 flex items-center justify-center w-6 h-6 -mt-1 -mr-1 transition duration-300 bg-red-600 rounded-full cursor-pointer hover:bg-red-800"
                        onClick={() => {
                          setPictureUrl(null);
                          setPicture(null);
                        }}
                      >
                        <i className="text-xs text-white fas fa-times"></i>
                      </div>
                    </div>
                  )}
                  {!pictureUrl && (
                    <div className="w-full">
                      <input
                        id="filePicture"
                        type="file"
                        accept="image/*"
                        onChange={(e) => {
                          let file = e.target.files[0];
                          setPictureUrl(URL.createObjectURL(e.target.files[0]));
                          setPicture(file);
                        }}
                        className="hidden"
                      ></input>
                      <label
                        htmlFor="filePicture"
                        className="inline-flex items-center w-full text-2xl font-extrabold"
                      >
                        <div className="flex items-center justify-center w-full h-48 p-3 leading-tight text-gray-700 bg-gray-200 dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white rounded-xl">
                          <i className="w-4 h-4 mr-3 fas fa-plus"></i>
                          Ajouter une photo
                        </div>
                      </label>
                    </div>
                  )}
                </div>
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
                    htmlFor="group"
                    className="text-sm leading-7 text-gray-600 dark:text-gray-400"
                  >
                    Group
                  </label>
                  <div className="inline-flex items-center space-x-2">
                    <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-green-200 rounded-lg dark:bg-green-900">
                      <i className="text-green-700 dark:text-green-400 fas fa-users" />
                    </span>
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
                      className="w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 "
                    >
                      {groupsWhereAdmin.map((el, index) => (
                        <option value={el.slug} key={index}>
                          {el.name} -{" "}
                          {el.description.length > 20
                            ? el.description.slice(0, 20) + " ..."
                            : el.description}
                        </option>
                      ))}
                    </select>
                  </div>
                </div>

                <div className="relative flex flex-col mb-4">
                  <label
                    htmlFor="location"
                    className="text-sm leading-7 text-gray-600 dark:text-gray-400"
                  >
                    Location
                  </label>
                  <div className="inline-flex items-center space-x-2">
                    <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-purple-200 rounded-lg dark:bg-purple-900">
                      <i className="text-purple-700 dark:text-purple-400 fas fa-map-marker-alt" />
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
              </div>

              <div className="flex flex-col w-full md:ml-auto lg:py-2 xl:py-8 md:mt-0 xl:pl-3">
                <div className="relative flex flex-col mb-4">
                  <label
                    htmlFor="file"
                    className="inline-flex items-center text-sm leading-7 text-gray-600 dark:text-gray-400"
                  >
                    Attachment
                    <span className="ml-2 text-xs">(optional)</span>
                  </label>
                  <div className="inline-flex items-center space-x-2">
                    <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-purple-200 rounded-lg dark:bg-purple-900">
                      <i className="text-purple-700 dark:text-purple-400 fas fa-paperclip" />
                    </span>
                    <input
                      type="file"
                      id="file"
                      name="file"
                      placeholder="Add an attachment"
                      onChange={(e) => {
                        if (e.target.files[0].size > 2097152) {
                          setAttachmentError("File too big (max 2MB)");
                          setAttachment(null);
                        } else if (e.target.files[0] === undefined) {
                          setAttachmentError("No file selected");
                          setAttachment(null);
                        } else {
                          setAttachment(e.target.files[0]);
                          setAttachmentError(null);
                        }
                      }}
                      // disabled
                      className="w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                    />
                  </div>
                  {attachmentError ? (
                    <p className="flex mt-1 text-xs font-bold text-red-600">
                      {attachmentError}
                    </p>
                  ) : (
                    <>
                      {attachmentError === null && attachment !== null ? (
                        <p className="flex mt-1 text-xs font-bold text-green-600">
                          {"All's good!"}
                        </p>
                      ) : (
                        <p className="flex mt-1 text-xs font-bold">
                          Max size is 2MB.
                        </p>
                      )}
                    </>
                  )}
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
                    rows={5}
                    className="w-full px-2 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border appearance-none rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                    defaultValue={""}
                    onChange={(e) => setDescription(e.target.value)}
                  />
                </div>
                <div className="relative flex flex-col mb-4">
                  <p className="text-sm leading-7 text-gray-600 dark:text-gray-400">
                    Dates and times
                  </p>
                  {/* <p className="flex md:hidden">
                Location disabled on mobile devices.
              </p> */}
                  <div className="flex flex-col items-center lg:flex-row">
                    <span className="items-center flex-shrink-0 justify-center hidden w-10 h-10 mt-[25px] mr-2 bg-purple-200 dark:bg-purple-900 rounded-lg lg:flex">
                      <i className="text-purple-700 dark:text-purple-400 fas fa-calendar-alt" />
                    </span>
                    <div className="w-full mb-2 lg:w-1/2 lg:mb-0 lg:pr-2">
                      <label
                        htmlFor="startDate"
                        className="text-xs leading-7 text-gray-600 dark:text-gray-400"
                      >
                        Starts at
                      </label>
                      <input
                        id="startDate"
                        type="datetime-local"
                        value={startDate}
                        onChange={(e) => setStartDate(e.target.value)}
                        // disabled
                        className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border appearance-none rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                      />
                    </div>
                    <div className="w-full mb-2 lg:w-1/2 lg:mb-0 lg:pl-2">
                      <label
                        htmlFor="endDate"
                        className="text-xs leading-7 text-gray-600 dark:text-gray-400"
                      >
                        End at
                      </label>

                      <input
                        id="endDate"
                        type="datetime-local"
                        value={endDate}
                        onChange={(e) => setEndDate(e.target.value)}
                        // disabled
                        className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border appearance-none rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                      />
                    </div>
                  </div>
                </div>
                <div className="relative flex flex-col mb-4">
                  <label
                    htmlFor="externalLink"
                    className="text-sm leading-7 text-gray-600 dark:text-gray-400"
                  >
                    External link
                  </label>
                  <div className="inline-flex items-center space-x-2">
                    <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-purple-200 rounded-lg dark:bg-purple-900">
                      <i className="text-purple-700 dark:text-purple-400 fas fa-external-link-alt" />
                    </span>
                    <input
                      type="text"
                      id="externalLink"
                      name="externalLink"
                      placeholder="eg. Google Meet conference link"
                      value={externalLink}
                      onChange={(e) => setExternalLink(e.target.value)}
                      // disabled
                      className="w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                    />
                  </div>
                </div>
                <div className="relative flex flex-col mb-4">
                  <p className="text-sm leading-7 text-gray-600 dark:text-gray-400">
                    Preferences
                  </p>
                  <div className="inline-flex items-center space-x-2">
                    <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-purple-200 rounded-lg dark:bg-purple-900">
                      <i className="text-purple-700 dark:text-purple-400 fas fa-lock" />
                    </span>
                    <label className="flex items-center space-x-3">
                      <input
                        type="checkbox"
                        name="privateEvent"
                        value={privateEvent}
                        onChange={(e) => setPrivateEvent(e.target.checked)}
                        className="w-4 h-4 duration-200 bg-purple-200 border-0 rounded-md appearance-none form-checkbox hover:bg-purple-400 dark:bg-purple-800 dark:hover:bg-purple-700 checked:bg-purple-600 checked:border-transparent focus:outline-none focus:bg-purple-400 dark:focus:bg-purple-900 ring-purple-500"
                      />
                      <span className="text-sm text-gray-700 dark:text-gray-300">
                        Make the event private
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div className="flex flex-col">
              <div className="flex flex-row mb-3 space-x-2">
                <button
                  type="submit"
                  className="flex-grow px-6 py-2 text-lg text-white bg-purple-500 border-0 rounded-xl focus:outline-none hover:bg-purple-600"
                  onClick={createEvent}
                >
                  Create
                </button>
                <MeetupImportDropdown />
              </div>
              <p className="text-xs text-gray-500">Cheers! 🍻</p>
            </div>
          </div>
        </div>
      </section>
    </AppLayout>
  );
}
