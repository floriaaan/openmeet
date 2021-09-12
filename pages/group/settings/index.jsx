import { AppLayout } from "@components/layouts/AppLayout";
import { Dialog, Disclosure, Transition } from "@headlessui/react";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { eventImgFallback, userImgFallback } from "@libs/imgOnError";
import { differenceInDays } from "date-fns";
import {
  collection,
  getDoc,
  getDocs,
  query,
  where,
  doc,
} from "firebase/firestore";
import Link from "next/link";
import { useRouter } from "next/router";
import { Fragment, useEffect, useRef, useState } from "react";

import { Line } from "react-chartjs-2";
import { options } from "resources/chart.config";

export default function GroupSettingsPage() {
  const [groups, setGroups] = useState([]);
  const { user } = useAuth();

  const [modalOpen, setModalOpen] = useState(false);
  const [seeMoreModal, setSeeMoreModal] = useState(<></>);
  const [seeMoreModalOpen, setSeeMoreModalOpen] = useState(false);

  const [selected, setSelected] = useState(null);
  const [selectedSubscribers, setSelectedSubscribers] = useState([]);
  const [name, setName] = useState("");
  const [tags, setTags] = useState("");
  const [description, setDescription] = useState("");
  const [privateGroup, setPrivateGroup] = useState(false);
  const [location, setLocation] = useState(null);

  const router = useRouter();

  useEffect(() => {
    if (user) {
      getDocs(
        query(
          collection(firestore, "groups"),
          where("admin.uid", "==", user.uid)
        )
      ).then((querySnapshot) => {
        const groups = [];
        querySnapshot.forEach(async (groupSnap) => {
          const events = [];
          const groupData = groupSnap.data();

          groupData.events?.forEach(async (e) => {
            const docSnap = await getDoc(doc(firestore, `events/${e.slug}`));
            events.push({ slug: e.slug, ...docSnap.data() });
          });
          groups.push({ slug: groupSnap.id, ...groupData, events });
        });
        setGroups(groups);
        if (router.query.slug) {
          let selectedGroup = groups.find((g) => g.slug === router.query.slug);
          selectedGroup ? setSelected(selectedGroup) : setSelected(groups[0]);
        } else setSelected(groups[0]);
      });
    }
  }, [router.query.slug, user]);

  useEffect(() => {
    if (selected) {
      console.log(selected);
      setName(selected.name);
      setTags(selected.tags);
      setDescription(selected.description);
      setPrivateGroup(selected.privateGroup);
      setLocation(selected.location.location);

      getDocs(
        collection(firestore, "groups/" + selected.slug + "/subscribers")
      ).then((querySnapshot) => {
        const subscribers = [];
        querySnapshot.forEach((doc) => {
          subscribers.push({ slug: doc.id, ...doc.data() });
        });
        setSelectedSubscribers(subscribers);
      });
    }
  }, [selected]);

  const Modal = ({ isOpen, setIsOpen }) => {
    function closeModal() {
      setIsOpen(false);
    }

    function openModal() {
      setIsOpen(true);
    }
    const cancelButtonRef = useRef();

    return (
      <>
        <Transition appear show={isOpen} as={Fragment}>
          <Dialog
            initialFocus={cancelButtonRef}
            as="div"
            className="fixed inset-0 z-[49] overflow-y-auto"
            onClose={closeModal}
          >
            <div className="min-h-screen px-4 text-center">
              <Transition.Child
                as={Fragment}
                enter="ease-out duration-300"
                enterFrom="opacity-0"
                enterTo="opacity-100"
                leave="ease-in duration-200"
                leaveFrom="opacity-100"
                leaveTo="opacity-0"
              >
                <Dialog.Overlay className="fixed inset-0 bg-black opacity-90" />
              </Transition.Child>

              {/* This element is to trick the browser into centering the modal contents. */}
              <span
                className="inline-block h-screen align-middle"
                aria-hidden="true"
              >
                &#8203;
              </span>
              <Transition.Child
                as={Fragment}
                enter="ease-out duration-300"
                enterFrom="opacity-0 scale-95"
                enterTo="opacity-100 scale-100"
                leave="ease-in duration-200"
                leaveFrom="opacity-100 scale-100"
                leaveTo="opacity-0 scale-95"
              >
                <div className="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl xl:max-w-3xl dark:bg-gray-900 rounded-2xl">
                  <Dialog.Title
                    as="h3"
                    className="text-lg font-extrabold leading-6 text-gray-900 dark:text-gray-200 "
                  >
                    Select a group
                  </Dialog.Title>
                  <div className="grid grid-cols-3 xl:grid-cols-5 gap-3 px-4 mt-3 w-full mx-auto min-h-[6rem]">
                    {groups?.map((el, key) => (
                      <div
                        onClick={() => setSelected(el)}
                        key={key}
                        className="flex flex-col cursor-pointer items-center justify-center w-full min-h-[6rem] p-2 duration-300 rounded-xl hover:bg-green-50 dark:hover:bg-green-900"
                      >
                        <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white rounded-full">
                          {selected?.slug === el.slug ? (
                            <span className="flex items-center justify-center w-16 h-16 p-5 text-green-700 bg-green-400 rounded-full dark:bg-green-900">
                              <i className="text-2xl fas fa-check" />
                            </span>
                          ) : (
                            <span className="flex items-center justify-center w-16 h-16 p-5 text-green-500 bg-green-200 rounded-full dark:bg-green-700">
                              <i className="text-2xl fas fa-users" />
                            </span>
                          )}
                        </div>
                        <div className="flex flex-col items-center justify-center w-full px-1">
                          <span className="text-[0.7rem] overflow-ellipsis text-center tracking-tight leading-[1.12rem] text-gray-800 dark:text-gray-200">
                            {el.name || "Name not provided"}
                          </span>
                          {/* <span className="text-[0.6rem] leading-4">
                        from {format(new Date(props.startDate), "Pp")} to{" "}
                        {format(new Date(props.endDate), "Pp")}
                      </span> */}
                        </div>
                      </div>
                    ))}
                  </div>

                  <div className="mt-4">
                    <button
                      ref={cancelButtonRef}
                      type="button"
                      className="inline-flex justify-center px-4 py-2 text-sm font-medium text-green-900 duration-300 bg-green-100 rounded-md dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 hover:bg-green-200 focus:outline-none"
                      onClick={closeModal}
                    >
                      Close
                    </button>
                  </div>
                </div>
              </Transition.Child>
            </div>
          </Dialog>
        </Transition>
      </>
    );
  };

  return (
    <AppLayout>
      <div className="flex flex-col w-full h-full space-y-3 bg-gray-100 dark:bg-gray-900">
        <div className="flex flex-col lg:flex-row lg:justify-between xl:sticky xl:top-0 z-[47] w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
          <h3 className="mb-2 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
            Manage
            <span className="ml-2 text-green-600 dark:text-green-400">
              {selected?.name}
            </span>
          </h3>
          {groups.length > 1 && (
            <span className="inline-flex space-x-2">
              <button
                onClick={() => setModalOpen(true)}
                className="inline-flex items-center px-1 py-1 pr-6 space-x-3 transition duration-300 bg-gray-100 rounded-full cursor-pointer focus:outline-none group max-w-max dark:bg-gray-900 hover:bg-green-100 dark:hover:bg-green-800 dark:bg-opacity-30 "
              >
                <span className="flex items-center justify-center w-8 h-8 duration-300 bg-gray-300 rounded-full dark:bg-gray-800 dark:group-hover:bg-green-700 group-hover:bg-green-200 dark:bg-opacity-30">
                  <i className="text-gray-700 duration-300 select-none fas fa-cog dark:text-gray-300 dark:group-hover:text-green-400 group-hover:text-green-600"></i>
                </span>
                <p className="text-sm font-extrabold text-gray-700 duration-300 select-none dark:text-gray-300 dark:group-hover:text-green-200 group-hover:text-green-600">
                  Another group
                </p>
              </button>
            </span>
          )}
        </div>

        {selected ? (
          <div className="flex flex-col px-6 pt-3 lg:px-32 lg:flex-row">
            <div className="flex flex-col w-full p-4 space-y-4 lg:pr-2 lg:w-2/3">
              <Disclosure defaultOpen={false}>
                {({ open }) => (
                  <>
                    <Disclosure.Button className="flex items-center justify-between w-full px-4 py-2 text-lg text-left text-gray-800 duration-300 bg-white dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-green-800 rounded-xl hover:bg-green-200 focus:outline-none ">
                      <span className="font-extrabold">
                        Edit {selected?.name}
                      </span>
                      <i
                        className={`fas fa-chevron-down ${
                          open ? "transform rotate-180" : ""
                        } text-gray-800 dark:text-gray-200`}
                      />
                    </Disclosure.Button>
                    <Transition
                      enter="transition duration-100 ease-out"
                      enterFrom="transform scale-95 opacity-0"
                      enterTo="transform scale-100 opacity-100"
                      leave="transition duration-75 ease-out"
                      leaveFrom="transform scale-100 opacity-100"
                      leaveTo="transform scale-95 opacity-0"
                    >
                      <Disclosure.Panel className="">
                        <div className="flex flex-col p-6 bg-white dark:bg-gray-800 rounded-xl">
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
                            <p className="flex mt-1 text-xs dark:text-gray-400">
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
                                placeholder="Location"
                                value={location}
                                onChange={(e) => setLocation(e.target.value)}
                                // disabled
                                className="w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                              />
                            </div>
                            <p className="flex mt-1 text-xs dark:text-gray-400">
                              If no location is provided, the event will be set
                              in Remote.
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
                              defaultValue={description}
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
                                  onChange={(e) =>
                                    setPrivateGroup(e.target.checked)
                                  }
                                  className="w-4 h-4 duration-200 bg-green-200 border-0 rounded-md appearance-none form-checkbox hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 checked:bg-green-600 checked:border-transparent focus:outline-none focus:bg-green-400 dark:focus:bg-green-900 ring-green-500"
                                />
                                <span className="text-sm text-gray-700 dark:text-gray-300">
                                  Make the group private
                                </span>
                              </label>
                            </div>
                          </div>

                          <div className="relative flex flex-col items-end mb-4">
                            <button
                              onClick={() => {}}
                              className="inline-flex items-center px-1 py-1 space-x-3 transition duration-300 bg-gray-100 rounded-full cursor-pointer hover:bg-gray-200 lg:pr-6 focus:outline-none group max-w-max dark:bg-gray-900 dark:hover:bg-gray-800 dark:hover:bg-opacity-30 dark:bg-opacity-30 "
                            >
                              <span className="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full dark:bg-gray-800 dark:bg-opacity-30">
                                <i className="text-gray-700 select-none fas fa-pencil-alt dark:text-gray-300 "></i>
                              </span>
                              <p className="hidden text-sm font-extrabold text-gray-700 select-none lg:flex dark:text-gray-300">
                                Update
                              </p>
                            </button>
                          </div>
                        </div>
                      </Disclosure.Panel>
                    </Transition>
                  </>
                )}
              </Disclosure>
              <Disclosure defaultOpen={true}>
                {({ open }) => (
                  <>
                    <Disclosure.Button className="flex items-center justify-between w-full px-4 py-2 text-lg text-left text-gray-800 duration-300 bg-white dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-green-800 rounded-xl hover:bg-green-200 focus:outline-none ">
                      <span className="font-extrabold">Statistics 📊</span>
                      <i
                        className={`fas fa-chevron-down ${
                          open ? "transform rotate-180" : ""
                        } text-gray-800 dark:text-gray-200`}
                      />
                    </Disclosure.Button>
                    <Transition
                      enter="transition duration-100 ease-out"
                      enterFrom="transform scale-95 opacity-0"
                      enterTo="transform scale-100 opacity-100"
                      leave="transition duration-75 ease-out"
                      leaveFrom="transform scale-100 opacity-100"
                      leaveTo="transform scale-95 opacity-0"
                    >
                      <Disclosure.Panel className="pb-2 text-sm text-gray-500 ">
                        <div className="rounded-xl">
                          <div className="relative overflow-hidden transition duration-500 bg-white h-72 dark:bg-gray-800 rounded-xl">
                            <div className="relative z-10 px-3 pt-8 pb-10 ">
                              <h4 className="text-sm leading-tight text-gray-500 dark:text-gray-400">
                                Engagement rate
                              </h4>
                              <h3 className="mb-1 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
                                {selectedSubscribers.length +
                                  (selectedSubscribers.length > 1
                                    ? " subscribers"
                                    : " subscriber")}
                              </h3>
                              {/* <p className="text-xs leading-tight text-gray-500">
                              
                            </p> */}
                            </div>
                            <div className="absolute inset-x-0 bottom-0">
                              <Line
                                data={{
                                  labels: getChartData(
                                    selected,
                                    selectedSubscribers
                                  ),
                                  datasets: [
                                    {
                                      backgroundColor: "rgba(34, 197, 94, 0.1)",
                                      borderColor: "rgba(34, 197, 94, 0.8)",
                                      borderWidth: 3,
                                      data: getChartData(
                                        selected,
                                        selectedSubscribers
                                      ),
                                      fill: true,
                                    },
                                  ],
                                }}
                                options={options}
                              />
                            </div>
                          </div>
                        </div>
                      </Disclosure.Panel>
                    </Transition>
                  </>
                )}
              </Disclosure>
            </div>
            <div className="flex flex-col w-full lg:w-1/3">
              <div className="flex flex-col p-4 pt-0 space-y-4 lg:pt-4 lg:pl-2">
                {selected && (
                  <Link href={"/group/" + selected.slug}>
                    <a className="inline-flex items-center p-3 space-x-4 transition duration-500 bg-white dark:bg-gray-800 rounded-xl hover:bg-green-100 dark:hover:bg-green-900">
                      <span className="flex items-center justify-center w-16 h-16 p-5 text-green-500 bg-green-200 rounded-xl dark:bg-green-700">
                        <i className="text-2xl fas fa-users" />
                      </span>
                      <div className="flex flex-col dark:text-gray-200">
                        <h4 className="text-base font-extrabold">
                          {selected.name}
                        </h4>
                        <p className="text-xs dark:text-gray-400">
                          {selected.private ? "Private group" : "Public group"}
                        </p>
                      </div>
                    </a>
                  </Link>
                )}
                <div className="flex flex-col p-4 bg-white dark:bg-gray-800 rounded-xl">
                  <h3 className="inline-flex items-center justify-between px-3 mb-2 text-lg font-extrabold text-center text-gray-800 dark:text-gray-200">
                    Subscribers
                    {selectedSubscribers.length <= 8 ? (
                      <span className="inline-flex items-center px-1 py-1 text-xs transition duration-300 bg-gray-100 rounded-full hover:bg-red-200 dark:hover:bg-red-800 focus:outline-none group max-w-max dark:bg-gray-900 dark:bg-opacity-30 ">
                        <span className="flex items-center justify-center w-4 h-4 duration-300 bg-gray-300 rounded-full dark:bg-gray-800 hover:bg-red-300 dark:hover:bg-red-700 dark:bg-opacity-30">
                          <p className="text-gray-700 duration-300 select-none dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400">
                            {selectedSubscribers.length}
                          </p>
                        </span>
                      </span>
                    ) : (
                      <button
                        onClick={() => {
                          setSeeMoreModal(
                            <>
                              <Dialog.Title
                                as="h3"
                                className="text-lg font-extrabold leading-6 text-gray-900 dark:text-gray-200 "
                              >
                                Subscribers
                              </Dialog.Title>
                              <div className="grid grid-cols-3 xl:grid-cols-5 gap-3 px-4 mt-3 w-full mx-auto min-h-[6rem]">
                                {selectedSubscribers.map((e, key) => (
                                  <UserOverview {...e} key={key} />
                                ))}
                              </div>
                            </>
                          );
                          setSeeMoreModalOpen(true);
                        }}
                        className="inline-flex items-center px-1 py-1 text-xs transition duration-300 bg-gray-100 rounded-full hover:bg-red-200 dark:hover:bg-red-800 focus:outline-none group max-w-max dark:bg-gray-900 dark:bg-opacity-30 "
                      >
                        <span className="flex items-center justify-center w-4 h-4 duration-300 bg-gray-300 rounded-full dark:bg-gray-800 hover:bg-red-300 dark:hover:bg-red-700 dark:bg-opacity-30">
                          <i className="text-gray-700 duration-300 select-none far fa-eye dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400"></i>
                        </span>
                      </button>
                    )}
                  </h3>
                  <div className="grid grid-cols-2 gap-3 xl:grid-cols-3 2xl:grid-cols-4">
                    {selectedSubscribers.map(
                      (e, key) => key < 8 && <UserOverview {...e} key={key} />
                    )}
                  </div>
                </div>
                <div className="flex flex-col p-4 bg-white dark:bg-gray-800 rounded-xl">
                  <h3 className="inline-flex items-center justify-between px-3 mb-2 text-lg font-extrabold text-center text-gray-800 dark:text-gray-200">
                    Events
                    {selectedSubscribers.length <= 8 ? (
                      <span className="inline-flex items-center px-1 py-1 text-xs transition duration-300 bg-gray-100 rounded-full hover:bg-purple-200 dark:hover:bg-purple-800 focus:outline-none group max-w-max dark:bg-gray-900 dark:bg-opacity-30 ">
                        <span className="flex items-center justify-center w-4 h-4 duration-300 bg-gray-300 rounded-full dark:bg-gray-800 hover:bg-purple-300 dark:hover:bg-purple-700 dark:bg-opacity-30">
                          <p className="text-gray-700 duration-300 select-none dark:text-gray-300 group-hover:text-purple-600 dark:group-hover:text-purple-400">
                            {selected?.events?.length}
                          </p>
                        </span>
                      </span>
                    ) : (
                      <button
                        onClick={() => {
                          setSeeMoreModal(
                            <>
                              <Dialog.Title
                                as="h3"
                                className="text-lg font-extrabold leading-6 text-gray-900 dark:text-gray-200 "
                              >
                                Events
                              </Dialog.Title>
                              <div className="grid grid-cols-3 xl:grid-cols-5 gap-3 px-4 mt-3 w-full mx-auto min-h-[6rem]">
                                {selected?.events?.map((e, key) => (
                                  <EventOverview {...e} key={key} />
                                ))}
                              </div>
                            </>
                          );
                          setSeeMoreModalOpen(true);
                        }}
                        className="inline-flex items-center px-1 py-1 text-xs transition duration-300 bg-gray-100 rounded-full hover:bg-green-200 dark:hover:bg-green-800 focus:outline-none group max-w-max dark:bg-gray-900 dark:bg-opacity-30 "
                      >
                        <span className="flex items-center justify-center w-4 h-4 duration-300 bg-gray-300 rounded-full dark:bg-gray-800 hover:bg-green-300 dark:hover:bg-green-700 dark:bg-opacity-30">
                          <i className="text-gray-700 duration-300 select-none far fa-eye dark:text-gray-300 group-hover:text-green-600 dark:group-hover:text-green-400"></i>
                        </span>
                      </button>
                    )}
                  </h3>
                  <div className="grid grid-cols-2 gap-3 xl:grid-cols-3 2xl:grid-cols-4">
                    {selected?.events?.map(
                      (e, key) => key < 8 && <EventOverview {...e} key={key} />
                    )}
                  </div>
                </div>
              </div>
            </div>
          </div>
        ) : (
          <>Loading...</>
        )}
      </div>
      <Modal isOpen={modalOpen} setIsOpen={setModalOpen} />
      {selected?.events?.length > 8 && selectedSubscribers.length > 8 && (
        <SeeMoreModal
          isOpen={seeMoreModalOpen}
          setIsOpen={setSeeMoreModalOpen}
          content={seeMoreModal}
        />
      )}
    </AppLayout>
  );
}

const UserOverview = ({ uid, fullName, photoUrl }) => {
  return (
    <Link href={"/profile/" + uid}>
      <a className="flex flex-col items-center justify-center w-full min-h-[6rem] p-2 duration-300 rounded-xl hover:bg-red-50 dark:hover:bg-red-900">
        <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white rounded-full">
          {/* eslint-disable-next-line @next/next/no-img-element */}
          <img
            className="rounded-full"
            alt={fullName || "?"}
            src={photoUrl}
            onError={(e) => userImgFallback(e, fullName)}
          />
        </div>
        <div className="flex flex-col items-center justify-center w-full px-1">
          <span className="text-xs text-center tracking-tight leading-[1.12rem] text-gray-800 dark:text-gray-200">
            {fullName || "Name not provided"}
          </span>
        </div>
      </a>
    </Link>
  );
};

const EventOverview = ({
  name,
  description,
  startDate,
  endDate,
  slug,
  picture,
}) => (
  <Link href={"/event/" + slug}>
    <a className="flex flex-col items-center justify-center w-full min-h-[6rem] p-2 duration-300 rounded-xl hover:bg-purple-50 dark:hover:bg-purple-900">
      <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white rounded-full">
        {picture ? (
          <>
            {/* eslint-disable-next-line @next/next/no-img-element */}
            <img
              className="object-cover h-full rounded-full"
              alt={name}
              src={picture}
              onError={(e) => eventImgFallback(e, name)}
            />
          </>
        ) : (
          <span className="flex items-center justify-center w-16 h-16 p-5 text-purple-500 bg-purple-200 rounded-full dark:bg-purple-700">
            <i className="text-2xl fas fa-calendar-alt" />
          </span>
        )}
      </div>
      <div className="flex flex-col items-center justify-center w-full px-1">
        <span className="text-[0.7rem] overflow-ellipsis text-center tracking-tight leading-[1.12rem] text-gray-800 dark:text-gray-200">
          {name || "Name not provided"}
        </span>
        {/* <span className="text-[0.6rem] leading-4">
            from {format(new Date(props.startDate), "Pp")} to{" "}
            {format(new Date(props.endDate), "Pp")}
          </span> */}
      </div>
    </a>
  </Link>
);

const SeeMoreModal = ({ isOpen, setIsOpen, content }) => {
  function closeModal() {
    setIsOpen(false);
  }

  function openModal() {
    setIsOpen(true);
  }
  const cancelButtonRef = useRef();

  return (
    <>
      <Transition appear show={isOpen} as={Fragment}>
        <Dialog
          initialFocus={cancelButtonRef}
          as="div"
          className="fixed inset-0 z-[49] overflow-y-auto"
          onClose={closeModal}
        >
          <div className="min-h-screen px-4 text-center">
            <Transition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0"
              enterTo="opacity-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100"
              leaveTo="opacity-0"
            >
              <Dialog.Overlay className="fixed inset-0 bg-black opacity-90" />
            </Transition.Child>

            {/* This element is to trick the browser into centering the modal contents. */}
            <span
              className="inline-block h-screen align-middle"
              aria-hidden="true"
            >
              &#8203;
            </span>
            <Transition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0 scale-95"
              enterTo="opacity-100 scale-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100 scale-100"
              leaveTo="opacity-0 scale-95"
            >
              <div className="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl xl:max-w-3xl dark:bg-gray-900 rounded-2xl">
                {content}
                <div className="mt-4">
                  <button
                    ref={cancelButtonRef}
                    type="button"
                    className="inline-flex justify-center px-4 py-2 text-sm font-medium text-green-900 duration-300 bg-green-100 rounded-md dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 hover:bg-green-200 focus:outline-none"
                    onClick={closeModal}
                  >
                    Close
                  </button>
                </div>
              </div>
            </Transition.Child>
          </div>
        </Dialog>
      </Transition>
    </>
  );
};

const getChartData = (selected, selectedSubscribers) => {
  // if (selected?.createdAt && selectedSubscribers.length > 0) {
  //   selectedSubscribers.sort(
  //     (a, b) => new Date(a.createdAt) - new Date(b.createdAt)
  //   );

  //   let data = [];

  //   if (
  //     differenceInDays(
  //       new Date(
  //         selectedSubscribers[selectedSubscribers.length - 1]?.createdAt
  //       ),
  //       new Date(selected.createdAt)
  //     ) !== NaN
  //   ) {
  //     data = Array(
  //       differenceInDays(
  //         new Date(
  //           selectedSubscribers[selectedSubscribers.length - 1]?.createdAt
  //         ),
  //         new Date(selected.createdAt)
  //       )
  //     ).fill(0);

  //     data[0] = 1;

  //     selectedSubscribers.forEach((subscriber) => {
  //       const index = differenceInDays(
  //         new Date(subscriber.createdAt),
  //         new Date(selected.createdAt)
  //       );
  //       data[index] = data[index] + 1;
  //     });
  //   }

  //   return data;
  // } else {
  //   return [];
  // }

  return [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610];
};
