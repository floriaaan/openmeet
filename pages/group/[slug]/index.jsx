import { AppLayout } from "@components/layouts/AppLayout";
import { firestore } from "@libs/firebase";
import Link from "next/link";
import { formatDistance } from "date-fns";
import { useAuth } from "@hooks/useAuth";
import { useEffect, useState } from "react";
import { AvatarGroup } from "@components/ui/AvatarGroup";
import { EventOverview } from "@components/cards/CardEventOverview";
import { ChipList } from "@components/ui/ChipList";

import Lottie from "react-lottie";
import noEvents from "resources/lotties/nothing_search.json";
import notExisting from "resources/lotties/404.json";
import {
  collection,
  deleteDoc,
  doc,
  getDoc,
  onSnapshot,
  setDoc,
} from "firebase/firestore";

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

  const toggleSubscription = async () => {
    const groupSubscriberRef = doc(
      firestore,
      `groups/${slug}/subscribers/${user.uid}`
    );
    if (subs.find((subscriber) => subscriber.id === user.uid)) {
      await deleteDoc(groupSubscriberRef);
    } else {
      await setDoc(groupSubscriberRef, {
        fullName: user.fullName,
        photoUrl: user.photoUrl,
        uid: user.uid,
        createdAt: new Date().toISOString(),
      });
    }
  };

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
        <section className="flex flex-col w-full h-full bg-gray-100 dark:bg-gray-900 dark:bg-opacity-10">
          {/* 2xl:sticky 2xl:top-0 z-[47] */}
          <div className="flex flex-col w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
            <div className="inline-flex items-center h-10 space-x-6">
              <div className="flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
                <i className="flex items-center fas fa-map flex-shrink-0 mr-1.5 h-5 w-5 "></i>
                {location?.location || "Remote"}
              </div>

              <div className="inline-flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
                <i className="flex items-center flex-shrink-0 w-5 h-5 mr-1 fas fa-calendar "></i>
                {formatDistance(new Date(createdAt), new Date(), {
                  addSuffix: true,
                })}
              </div>
              <div className="items-center hidden text-sm text-gray-500 transition duration-200 lg:inline-flex hover:text-gray-700 dark:text-gray-400">
                <AvatarGroup users={subs} limit={4} />
                <i className="flex items-center fas fa-users flex-shrink-0 mx-1.5 h-5 w-5 "></i>
                {subs?.length || 0} {subs?.length > 1 ? "members" : "member"}
              </div>
            </div>
            <div className="inline-flex items-center mb-2 text-sm text-gray-500 transition duration-200 lg:hidden hover:text-gray-700 dark:text-gray-400">
              <AvatarGroup users={subs} limit={4} />
              <i className="flex items-center fas fa-users flex-shrink-0 mx-1.5 h-5 w-5 "></i>
              {subs?.length || 0} {subs?.length > 1 ? "members" : "member"}
            </div>
            <div className="lg:flex lg:items-center lg:justify-between">
              <h2 className="mb-2 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
                {name}
              </h2>
              <div className="flex mt-5 space-x-3 lg:mt-0 lg:ml-4">
                {admin.uid === user?.uid && (
                  <Link href={"/group/settings/?slug=" + slug}>
                    <a className="inline-flex items-center px-1 py-1 pr-6 space-x-3 transition bg-gray-100 rounded-full cursor-pointer group max-w-max dark:bg-gray-900 dark:bg-opacity-30 ">
                      <span className="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full dark:bg-gray-800 dark:bg-opacity-30">
                        <i className="text-gray-700 select-none fas fa-pencil-alt dark:text-gray-300 "></i>
                      </span>
                      <p className="text-sm font-extrabold text-gray-700 select-none dark:text-gray-300">
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
                  className="inline-flex items-center px-1 py-1 pr-6 space-x-3 transition bg-gray-100 rounded-full cursor-pointer focus:outline-none group max-w-max dark:bg-gray-900 dark:bg-opacity-30 "
                >
                  <span className="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full dark:bg-gray-800 dark:bg-opacity-30">
                    <i className="text-gray-700 select-none fas fa-share-alt dark:text-gray-300 "></i>
                  </span>
                  <p className="text-sm font-extrabold text-gray-700 select-none dark:text-gray-300">
                    Share
                  </p>
                </button>

                <button
                  onClick={toggleSubscription}
                  className={
                    "inline-flex items-center px-1 py-1 pr-6 space-x-3 transition bg-green-100 rounded-full cursor-pointer group  max-w-max dark:bg-green-900  dark:bg-opacity-30 " +
                    (subs?.find((sub) => sub.id === user?.uid)
                      ? "hover:bg-red-200 dark:hover:bg-red-900 duration-500"
                      : "hover:bg-green-200 dark:hover:bg-opacity-60 duration-300")
                  }
                >
                  {subs?.find((sub) => sub.id === user?.uid) ? (
                    <div className="inline-flex items-center space-x-3">
                      <span className="flex items-center justify-center w-8 h-8 transition duration-500 bg-green-300 rounded-full group-hover:bg-red-300 dark:group-hover:bg-red-800 dark:bg-green-800 dark:bg-opacity-30">
                        <i className="text-green-700 select-none fas fa-check dark:text-green-300 group-hover:hidden"></i>
                        <i className="hidden text-red-700 select-none fas fa-times dark:text-red-300 group-hover:block"></i>
                      </span>
                      <p className="text-sm font-extrabold text-green-700 select-none dark:text-green-300 group-hover:hidden">
                        Subscribed
                      </p>
                      <p className="hidden text-sm font-extrabold text-red-700 select-none dark:text-red-300 group-hover:block">
                        Wanna leave ? 😢
                      </p>
                    </div>
                  ) : (
                    <>
                      <span className="flex items-center justify-center w-8 h-8 bg-green-300 rounded-full dark:bg-green-800 dark:bg-opacity-30">
                        <i className="text-green-700 select-none fas fa-plus dark:text-green-300 "></i>
                      </span>
                      <p className="text-sm font-extrabold text-green-700 select-none dark:text-green-300">
                        Subscribe
                      </p>
                    </>
                  )}
                </button>
              </div>
            </div>
            <p className="w-full pt-4 pb-2 text-justify text-gray-500 dark:text-gray-400">
              {description}
            </p>
            <div className="w-full ">
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

            <div className="grid flex-grow h-full grid-cols-1 gap-4 md:grid-cols-3 ">
              {displayables.length > 0 ? (
                <>
                  {displayables.map((el, index) => (
                    <EventOverview {...el} key={index} />
                  ))}
                </>
              ) : (
                <div className="flex flex-col items-center justify-center w-full px-6 pb-6 text-4xl font-bold text-gray-400 uppercase dark:text-gray-600 h-96 md:col-span-3">
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
                  {"No events yet... 📅"}
                </div>
              )}
            </div>
          </div>
        </section>
      ) : (
        <main className="flex flex-col items-center justify-center w-full h-full">
          <div className="w-72 h-72">
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
