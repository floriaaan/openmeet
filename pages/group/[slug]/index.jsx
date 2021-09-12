/* eslint-disable @next/next/no-img-element */
import { AppLayout } from "@components/layouts/AppLayout";
import { firestore } from "@libs/firebase";
import Link from "next/link";
import { formatDistance } from "date-fns";
import { useAuth } from "@hooks/useAuth";
import { Fragment, useEffect, useRef, useState } from "react";
import { AvatarGroup } from "@components/ui/AvatarGroup";
import { EventOverview } from "@components/cards/CardEventOverview";
import { ChipList } from "@components/ui/ChipList";

import ReactMarkdown from "react-markdown";
import Lottie from "react-lottie";
import noEvents from "resources/lotties/nothing_search.json";
import notExisting from "resources/lotties/404.json";
import {
  collection,
  doc,
  getDoc,
  onSnapshot,
  setDoc,
} from "firebase/firestore";
import { Dialog, Tab, Transition } from "@headlessui/react";
import { userImgFallback } from "@libs/imgOnError";
import useFirestoreToggle from "@hooks/useFirestoreToggle";

function classNames(...classes) {
  return classes.filter(Boolean).join(" ");
}

export default function GroupPage({
  name,
  tags,
  description,
  createdAt,
  admin,
  slug,
  location,
  events_raw = [],
  exists,
}) {
  const [subs, setSubs] = useState([]);

  const [events, setEvents] = useState([]);

  const [displayables, setDisplayables] = useState([]);
  const [eventsFilters, setEventsFilters] = useState([]);
  const { user } = useAuth();

  const [isReportModalOpen, setReportModalOpen] = useState(false);
  const [reportUser, setReportUser] = useState(null);
  const [reportReason, setReportReason] = useState({
    object: "",
    description: "",
  });

  const [isSubscribed, toggleSubscription] = useFirestoreToggle(
    `groups/${slug}/subscribers/${user?.uid}`,
    {
      fullName: user?.fullName,
      photoUrl: user?.photoUrl,
      uid: user?.uid,
      createdAt: new Date().toISOString(),
    }
  );

  const prepareDisplayable = async () => {
    if (eventsFilters.length > 0) {
      let displayables = [];
    } else {
      setDisplayables(events);
    }
  };

  useEffect(() => {
    const unsub = onSnapshot(
      collection(firestore, `groups/${slug}/subscribers`),
      (querySnapshot) => {
        let subs = [];
        querySnapshot.forEach((doc) => {
          subs.push({ id: doc.id, ...doc.data() });
        });
        setSubs(subs);
      }
    );

    let events = [];
    events_raw.forEach(async (e) => {
      const eventSnap = await getDoc(doc(firestore, `events/${e.slug}`));
      if (!eventSnap.data().private)
        events.push({
          ...eventSnap.data(),
          ...e,
        });
    });
    setEvents(events);
    setDisplayables(events);

    return () => {
      unsub();
    };
  }, [events_raw, slug]);

  // eslint-disable-next-line react-hooks/exhaustive-deps
  useEffect(() => prepareDisplayable(), [eventsFilters]);

  return (
    <AppLayout>
      {exists ? (
        <section className="flex flex-col w-full h-full bg-gray-100 dark:bg-gray-900">
          {/* 2xl:sticky 2xl:top-0 z-[47] */}
          <div className="flex flex-col w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
            <div className="flex flex-col lg:h-10 lg:items-center lg:flex-row lg:space-x-6">
              <div className="flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
                <i className="hidden lg:flex items-center fas fa-map flex-shrink-0 mr-1.5 h-5 w-5 "></i>
                {location?.location || "Remote"}
              </div>

              <div className="items-center hidden text-sm text-gray-500 transition duration-200 lg:inline-flex hover:text-gray-700 dark:text-gray-400">
                <i className="flex items-center flex-shrink-0 w-5 h-5 mr-1 fas fa-calendar "></i>
                {formatDistance(new Date(createdAt), new Date(), {
                  addSuffix: true,
                })}
              </div>
              {subs.length ? (
                <div className="items-center hidden text-sm text-gray-500 transition duration-200 lg:inline-flex hover:text-gray-700 dark:text-gray-400">
                  <AvatarGroup users={subs} limit={4} />
                  <i className="hidden lg:flex items-center fas fa-users flex-shrink-0 mx-1.5 h-5 w-5 "></i>
                  {subs?.length || 0} {subs?.length > 1 ? "members" : "member"}
                </div>
              ) : null}
            </div>
            {subs.length ? (
              <div className="inline-flex items-center mb-2 text-sm text-gray-500 transition duration-200 lg:hidden hover:text-gray-700 dark:text-gray-400">
                <i className="hidden lg:flex items-center fas fa-users flex-shrink-0 mx-1.5 h-5 w-5 "></i>
                {subs?.length || 0} {subs?.length > 1 ? "members" : "member"}
              </div>
            ) : null}
            <div className="lg:flex lg:items-center lg:justify-between">
              <h2 className="mb-2 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
                {name}
              </h2>
              <div className="flex mt-2 space-x-3 lg:mt-0 lg:ml-4">
                {admin.uid === user?.uid && (
                  <Link href={"/group/settings/?slug=" + slug}>
                    <a className="inline-flex items-center px-1 py-1 space-x-3 transition duration-300 bg-gray-100 rounded-full cursor-pointer hover:bg-gray-200 lg:pr-6 focus:outline-none group max-w-max dark:bg-gray-900 dark:hover:bg-gray-800 dark:hover:bg-opacity-30 dark:bg-opacity-30 ">
                      <span className="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full dark:bg-gray-800 dark:bg-opacity-30">
                        <i className="text-gray-700 select-none fas fa-pencil-alt dark:text-gray-300 "></i>
                      </span>
                      <p className="hidden text-sm font-extrabold text-gray-700 select-none lg:flex dark:text-gray-300">
                        Edit
                      </p>
                    </a>
                  </Link>
                )}
                <button
                  onClick={() => {
                    if (navigator.share) {
                      navigator
                        .share({
                          title: `${name} - OpenMeet`,
                          text: "Check out this group on OpenMeet.",
                          url: document.location.href,
                        })
                        .then(() => console.log("Successful share"))
                        .catch((error) => console.log("Error sharing", error));
                    }
                  }}
                  className="inline-flex items-center px-1 py-1 space-x-3 transition duration-300 bg-gray-100 rounded-full cursor-pointer hover:bg-gray-200 lg:pr-6 focus:outline-none group max-w-max dark:bg-gray-900 dark:hover:bg-gray-800 dark:hover:bg-opacity-30 dark:bg-opacity-30 "
                >
                  <span className="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full dark:bg-gray-800 dark:bg-opacity-30">
                    <i className="text-gray-700 select-none fas fa-share-alt dark:text-gray-300 "></i>
                  </span>
                  <p className="hidden text-sm font-extrabold text-gray-700 select-none lg:flex dark:text-gray-300">
                    Share
                  </p>
                </button>

                <button
                  onClick={toggleSubscription}
                  className={
                    "inline-flex items-center px-1 py-1 lg:pr-6 space-x-3 transition bg-green-100 rounded-full cursor-pointer group  max-w-max dark:bg-green-900  dark:bg-opacity-30 " +
                    (isSubscribed
                      ? "hover:bg-red-200 dark:hover:bg-red-900 duration-500"
                      : "hover:bg-green-200 dark:hover:bg-opacity-60 duration-300")
                  }
                >
                  {isSubscribed ? (
                    <div className="inline-flex items-center space-x-3">
                      <span className="flex items-center justify-center w-8 h-8 transition duration-500 bg-green-300 rounded-full group-hover:bg-red-300 dark:group-hover:bg-red-800 dark:bg-green-800 dark:bg-opacity-30">
                        <i className="text-green-700 select-none fas fa-check dark:text-green-300 group-hover:hidden"></i>
                        <i className="hidden text-red-700 select-none fas fa-times dark:text-red-300 group-hover:block"></i>
                      </span>
                      <p className="hidden text-sm font-extrabold text-green-700 select-none lg:flex dark:text-green-300 lg:group-hover:hidden">
                        Subscribed
                      </p>
                      <p className="hidden text-sm font-extrabold text-red-700 select-none dark:text-red-300 lg:group-hover:block">
                        Wanna leave ? 😢
                      </p>
                    </div>
                  ) : (
                    <>
                      <span className="flex items-center justify-center w-8 h-8 bg-green-300 rounded-full dark:bg-green-800 dark:bg-opacity-30">
                        <i className="text-green-700 select-none fas fa-plus dark:text-green-300 "></i>
                      </span>
                      <p className="hidden text-sm font-extrabold text-green-700 select-none lg:flex dark:text-green-300">
                        Subscribe
                      </p>
                    </>
                  )}
                </button>
              </div>
            </div>
            <div className="w-full pt-4 pb-2 text-sm text-justify text-gray-500 dark:text-gray-400">
              <ReactMarkdown>{description}</ReactMarkdown>
            </div>
            <div className="inline-flex pt-3 overflow-x-hidden md:pt-0">
              <ChipList list={tags} />
            </div>
          </div>
          <div className="flex flex-col w-full px-6 pt-3 pb-16 space-y-6 lg:px-32 xl:px-48 lg:pb-24">
            {/* <div className="flex justify-center w-full h-12">
            <ChipList
              list={["Upcoming", "In progress", "Finished"]}
              selected={eventsFilters}
              setSelected={setEventsFilters}
              color="gray"
            />
          </div> */}

            <Tab.Group>
              <Tab.List className="flex lg:flex-row p-3 space-y-1.5 flex-col lg:space-y-0 lg:space-x-3 bg-white dark:bg-black rounded-xl">
                <Tab
                  className={({ selected }) =>
                    classNames(
                      "w-full py-2.5 text-sm leading-5 font-medium select-none",
                      "focus:outline-none duration-300 rounded-md hover:bg-green-500 hover:text-white",
                      selected
                        ? "bg-green-300 text-green-700 dark:bg-green-700 dark:text-green-300"
                        : "text-gray-500"
                    )
                  }
                >
                  Events
                </Tab>
                <Tab
                  className={({ selected }) =>
                    classNames(
                      "w-full py-2.5 text-sm leading-5 font-medium select-none",
                      "focus:outline-none duration-300 rounded-md hover:bg-green-500 hover:text-white",
                      selected
                        ? "bg-green-300 text-green-700 dark:bg-green-700 dark:text-green-300"
                        : "text-gray-500"
                    )
                  }
                >
                  Subscribers
                </Tab>
                <Tab
                  className={({ selected }) =>
                    classNames(
                      "w-full py-2.5 text-sm leading-5 font-medium select-none",
                      "focus:outline-none duration-300 rounded-md hover:bg-green-500 hover:text-white",
                      selected
                        ? "bg-green-300 text-green-700 dark:bg-green-700 dark:text-green-300"
                        : "text-gray-500"
                    )
                  }
                >
                  Discussions
                </Tab>
              </Tab.List>
              <Tab.Panels className="p-3 mt-2 bg-white dark:bg-black rounded-xl focus:outline-none">
                <Tab.Panel>
                  <div className="grid flex-grow h-full grid-cols-1 gap-4 md:grid-cols-3 ">
                    {events.length > 0 ? (
                      <>
                        {events.map((el, index) => (
                          <EventOverview {...el} key={index} />
                        ))}
                      </>
                    ) : (
                      <div className="flex flex-col items-center justify-center w-full px-6 pb-6 h-96 md:col-span-3">
                        <div className="w-72 h-72">
                          <Lottie
                            isClickToPauseDisabled
                            options={{
                              loop: true,
                              autoplay: true,
                              animationData: noEvents,

                              rendererSettings: {
                                preserveAspectRatio: "xMidYMid slice",
                              },
                            }}
                          />
                        </div>
                        <span className="text-xl font-extrabold text-gray-400 md:text-2xl lg:text-4xl dark:text-gray-500">
                          {"No events yet... 📅"}
                        </span>
                      </div>
                    )}
                  </div>
                </Tab.Panel>
                <Tab.Panel className="min-h-[300px]">
                  <div className="grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-8">
                    {subs.map(
                      (e, key) =>
                        key < 8 && (
                          <UserOverview
                            {...e}
                            key={key}
                            setReportUser={setReportUser}
                            setReportModalOpen={setReportModalOpen}
                          />
                        )
                    )}
                  </div>
                </Tab.Panel>
                <Tab.Panel className="min-h-[300px] md:p-3">
                  <div className="flow-root">
                    <ul role="list" className="-mb-8">
                      <li>
                        <div className="relative pb-8">
                          <span
                            className="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                            aria-hidden="true"
                          />
                          <div className="relative flex items-start space-x-3">
                            <div className="relative">
                              <img
                                className="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full ring-8 ring-white"
                                src="https://images.unsplash.com/photo-1520785643438-5bf77931f493?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                                alt=""
                              />
                              <span className="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
                                {/* Heroicon name: solid/chat-alt */}
                                <svg
                                  className="w-5 h-5 text-gray-400"
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 20 20"
                                  fill="currentColor"
                                  aria-hidden="true"
                                >
                                  <path
                                    fillRule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clipRule="evenodd"
                                  />
                                </svg>
                              </span>
                            </div>
                            <div className="flex-1 min-w-0">
                              <div>
                                <div className="text-sm">
                                  <a
                                    href="#"
                                    className="font-medium text-gray-900"
                                  >
                                    Eduardo Benz
                                  </a>
                                </div>
                                <p className="mt-0.5 text-sm text-gray-500">
                                  Commented 6d ago
                                </p>
                              </div>
                              <div className="mt-2 text-sm text-gray-700">
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur
                                  adipiscing elit. Tincidunt nunc ipsum tempor
                                  purus vitae id. Morbi in vestibulum nec
                                  varius. Et diam cursus quis sed purus nam.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div className="relative pb-8">
                          <span
                            className="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                            aria-hidden="true"
                          />
                          <div className="relative flex items-start space-x-3">
                            <div>
                              <div className="relative px-1">
                                <div className="flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full ring-8 ring-white">
                                  {/* Heroicon name: solid/user-circle */}
                                  <svg
                                    className="w-5 h-5 text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                  >
                                    <path
                                      fillRule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                      clipRule="evenodd"
                                    />
                                  </svg>
                                </div>
                              </div>
                            </div>
                            <div className="min-w-0 flex-1 py-1.5">
                              <div className="text-sm text-gray-500">
                                <a
                                  href="#"
                                  className="font-medium text-gray-900"
                                >
                                  Hilary Mahy
                                </a>
                                assigned
                                <a
                                  href="#"
                                  className="font-medium text-gray-900"
                                >
                                  Kristin Watson
                                </a>
                                <span className="whitespace-nowrap">
                                  2d ago
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div className="relative pb-8">
                          <span
                            className="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                            aria-hidden="true"
                          />
                          <div className="relative flex items-start space-x-3">
                            <div>
                              <div className="relative px-1">
                                <div className="flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full ring-8 ring-white">
                                  {/* Heroicon name: solid/tag */}
                                  <svg
                                    className="w-5 h-5 text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                  >
                                    <path
                                      fillRule="evenodd"
                                      d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                      clipRule="evenodd"
                                    />
                                  </svg>
                                </div>
                              </div>
                            </div>
                            <div className="flex-1 min-w-0 py-0">
                              <div className="text-sm leading-8 text-gray-500">
                                <span className="mr-0.5">
                                  <a
                                    href="#"
                                    className="font-medium text-gray-900"
                                  >
                                    Hilary Mahy
                                  </a>
                                  added tags
                                </span>
                                <span className="mr-0.5">
                                  <a
                                    href="#"
                                    className="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5 text-sm"
                                  >
                                    <span className="absolute flex items-center justify-center flex-shrink-0">
                                      <span
                                        className="h-1.5 w-1.5 rounded-full bg-rose-500"
                                        aria-hidden="true"
                                      />
                                    </span>
                                    <span className="ml-3.5 font-medium text-gray-900">
                                      Bug
                                    </span>
                                  </a>
                                  <a
                                    href="#"
                                    className="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5 text-sm"
                                  >
                                    <span className="absolute flex items-center justify-center flex-shrink-0">
                                      <span
                                        className="h-1.5 w-1.5 rounded-full bg-indigo-500"
                                        aria-hidden="true"
                                      />
                                    </span>
                                    <span className="ml-3.5 font-medium text-gray-900">
                                      Accessibility
                                    </span>
                                  </a>
                                </span>
                                <span className="whitespace-nowrap">
                                  6h ago
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div className="relative pb-8">
                          <div className="relative flex items-start space-x-3">
                            <div className="relative">
                              <img
                                className="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full ring-8 ring-white"
                                src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                                alt=""
                              />
                              <span className="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
                                {/* Heroicon name: solid/chat-alt */}
                                <svg
                                  className="w-5 h-5 text-gray-400"
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 20 20"
                                  fill="currentColor"
                                  aria-hidden="true"
                                >
                                  <path
                                    fillRule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clipRule="evenodd"
                                  />
                                </svg>
                              </span>
                            </div>
                            <div className="flex-1 min-w-0">
                              <div>
                                <div className="text-sm">
                                  <a
                                    href="#"
                                    className="font-medium text-gray-900"
                                  >
                                    Jason Meyers
                                  </a>
                                </div>
                                <p className="mt-0.5 text-sm text-gray-500">
                                  Commented 2h ago
                                </p>
                              </div>
                              <div className="mt-2 text-sm text-gray-700">
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur
                                  adipiscing elit. Tincidunt nunc ipsum tempor
                                  purus vitae id. Morbi in vestibulum nec
                                  varius. Et diam cursus quis sed purus nam.
                                  Scelerisque amet elit non sit ut tincidunt
                                  condimentum. Nisl ultrices eu venenatis diam.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </Tab.Panel>
              </Tab.Panels>
            </Tab.Group>
          </div>
          <ReportModal
            isOpen={isReportModalOpen}
            setOpen={setReportModalOpen}
            user={reportUser}
            reportReason={reportReason}
            setReportReason={setReportReason}
            slug={slug}
          />
        </section>
      ) : (
        <main className="flex flex-col items-center justify-center w-full h-full">
          <div className="w-64 h-64">
            <Lottie
              isClickToPauseDisabled
              options={{
                loop: true,
                autoplay: true,
                animationData: notExisting,

                rendererSettings: {
                  preserveAspectRatio: "xMidYMid slice",
                },
              }}
              // height={"8rem"}
              // width={"8rem"}
            />
          </div>
          <h3 className="mb-2 text-3xl font-extrabold text-center text-gray-800 dark:text-gray-200">
            {"There's no group at this"}
            <span className="mx-2 text-green-600 dark:text-green-500">
              address
            </span>
            ...
          </h3>
        </main>
      )}
    </AppLayout>
  );
}

const UserOverview = ({
  uid,
  fullName,
  photoUrl,
  setReportUser,
  setReportModalOpen,
}) => {
  return (
    <span
      className="flex flex-col items-center justify-center w-full min-h-[6rem] p-2 duration-300 rounded-xl hover:bg-red-50 dark:hover:bg-red-900 cursor-pointer"
      onClick={() => {
        setReportUser({ uid, fullName, photoUrl });
        setReportModalOpen(true);
      }}
    >
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
    </span>
  );
};

const ReportModal = ({
  isOpen,
  setOpen,
  user,
  reportReason,
  setReportReason,
  slug,
}) => {
  function closeModal() {
    setOpen(false);
  }
  const cancelButtonRef = useRef();

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (user?.uid && reportReason.object && reportReason.description) {
      const reportUserRef = doc(
        firestore,
        `groups/${slug}/subscribers/${user.uid}`
      );
      await setDoc(reportUserRef, { user, ...reportReason }).catch(
        console.error
      );
      setReportReason({ object: "", description: "" });
      closeModal();
    }
  };

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
                <div className="inline-flex items-center w-full px-5 pb-3 mb-3 space-x-5 border-b dark:border-gray-800">
                  {/* eslint-disable-next-line @next/next/no-img-element */}
                  <img
                    className="w-20 h-20 rounded-full"
                    src={user?.photoUrl}
                    alt={user?.fullName || "Name not provided"}
                    onError={(e) => userImgFallback(e, user?.fullName)}
                  ></img>
                  <h3 className="text-3xl font-extrabold text-gray-800 dark:text-gray-200">
                    Report{" "}
                    <span className="text-red-600 dark:text-red-500">
                      {user?.fullName}
                    </span>
                  </h3>
                </div>
                <div className="relative flex flex-col mb-4">
                  <label
                    htmlFor="object"
                    className="text-sm leading-7 text-gray-600 dark:text-gray-400"
                  >
                    Why do you report this user?
                  </label>
                  <input
                    type="text"
                    id="object"
                    name="object"
                    value={reportReason.object}
                    onChange={(e) =>
                      setReportReason({
                        ...reportReason,
                        object: e.target.value,
                      })
                    }
                    className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border appearance-none rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 "
                  />
                </div>
                <div className="relative flex flex-col mb-4">
                  <label
                    htmlFor="description"
                    className="text-sm leading-7 text-gray-600 dark:text-gray-400"
                  >
                    Tell us more about the reason
                  </label>
                  <textarea
                    id="description"
                    name="description"
                    rows={7}
                    className="w-full px-2 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border appearance-none rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                    value={reportReason.description}
                    onChange={(e) =>
                      setReportReason({
                        ...reportReason,
                        description: e.target.value,
                      })
                    }
                  />
                </div>
                <div className="flex justify-end w-full pt-4 mt-4 border-t dark:border-gray-800">
                  <button
                    type="button"
                    className="inline-flex items-center justify-center px-4 py-2 mr-2 text-sm font-medium text-red-900 duration-300 bg-red-100 rounded-md dark:bg-red-800 dark:hover:bg-red-700 dark:text-red-300 hover:bg-red-200 focus:outline-none"
                    onClick={handleSubmit}
                  >
                    <i className="mr-2 fas fa-exclamation-triangle"></i>
                    Report
                  </button>
                  <button
                    ref={cancelButtonRef}
                    type="button"
                    className="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-900 duration-300 bg-gray-100 rounded-md dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 hover:bg-gray-200 focus:outline-none"
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

export async function getServerSideProps(ctx) {
  const group = await getDoc(doc(firestore, "groups", ctx.query.slug));

  let data = group.data();
  data.events_raw = data.events || [];

  delete data.events;

  return {
    props: {
      ...data,

      slug: ctx.query.slug,
      exists: group.exists(),
    },
  };
}
