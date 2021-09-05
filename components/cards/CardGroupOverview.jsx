import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { formatDistanceToNow } from "date-fns";
import { useEffect, useState } from "react";

import Link from "next/link";
import { AvatarGroup } from "@components/ui/AvatarGroup";
import { collection, doc, getDoc, onSnapshot } from "firebase/firestore";
import { ChipList } from "@components/ui/ChipList";

export const GroupOverview = (props) => {
  const { user } = useAuth();
  const [subs, setSubs] = useState([]);
  const [lastEvent, setLastEvent] = useState(null);

  useEffect(() => {
    const unsub = onSnapshot(
      collection(firestore, `groups/${props.slug}/subscribers`),
      (querySnapshot) => {
        let subs = [];
        querySnapshot.forEach((doc) => {
          subs.push({ id: doc.id, ...doc.data() });
        });
        setSubs(subs);
      }
    );

    if (props?.events?.length >= 1) {
      let sortedEvents = props.events;
      sortedEvents.sort((a, b) => {
        return new Date(b.startDate) > new Date(a.startDate);
      });
      // console.log(sortedEvents);
      sortedEvents.some((event) => {
        if (!event.private) {
          getDoc(doc(firestore, `events/${sortedEvents[0].slug}`)).then(
            (snapshot) => {
              setLastEvent({ slug: snapshot.id, ...snapshot.data() });
            }
          );
        }
        return event.private;
      });
    }

    return () => {
      unsub();
    };
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [props.slug]);

  return (
    <div className="flex flex-col w-full p-2 duration-300 bg-white shadow rounded-xl dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900">
      <Link href={"/group/" + props.slug}>
        <a>
          {!lastEvent ? (
            <span className="flex items-center justify-center w-full h-32 bg-green-200 rounded-lg dark:bg-green-900">
              <i className="text-green-700 dark:text-green-400 fas fa-calendar" />
            </span>
          ) : (
            <span className="flex items-center justify-center w-full h-32 p-3 bg-purple-200 rounded-lg dark:bg-purple-900">
              <TinyEvent {...lastEvent} />
            </span>
          )}
          <div className="flex flex-col p-3">
            <div className="flex items-center justify-between mb-2">
              <div className="flex flex-col">
                <h3 className="font-extrabold">{props.name}</h3>
                <p className="text-xs">{props.location.location}</p>
              </div>
              {subs.length ? (
                <AvatarGroup users={subs} limit={4} />
              ) : (
                <p className="text-xs text-gray-500">No subscribers</p>
              )}
            </div>
            <hr className="mx-6 mt-4 border-gray-200 dark:border-gray-700" />
          </div>
        </a>
      </Link>
      <div className="inline-flex p-3">
        <div className="inline-flex flex-grow overflow-x-hidden">
          <ChipList list={[props.tags?.[0], props.tags?.[1]]} />
        </div>
        <button
          onClick={() => {
            if (navigator.share) {
              navigator
                .share({
                  title: `${props.name} - OpenMeet`,
                  text: "Check out this group on OpenMeet.",
                  url:
                    document.location.protocol +
                    "//" +
                    document.location.host +
                    "/group/" +
                    props.slug,
                })
                .then(() => console.log("Successful share"))
                .catch((error) => console.log("Error sharing", error));
            }
          }}
          className="inline-flex items-center px-1 py-1 transition duration-300 bg-gray-100 rounded-full cursor-pointer hover:bg-green-200 dark:hover:bg-green-800 focus:outline-none group max-w-max dark:bg-gray-900 dark:bg-opacity-30 "
        >
          <span className="flex items-center justify-center w-8 h-8 duration-300 bg-gray-300 rounded-full dark:bg-gray-800 hover:bg-green-300 dark:hover:bg-green-700 dark:bg-opacity-30">
            <i className="text-gray-700 duration-300 select-none fas fa-share-alt dark:text-gray-300 group-hover:text-green-600 dark:group-hover:text-green-400"></i>
          </span>
        </button>
      </div>
    </div>
  );
};

const TinyEvent = (props) => {
  return (
    <div className="flex flex-col w-full px-6 py-3">
      <h3 className="pb-1 mb-1 text-lg font-extrabold text-gray-800 border-b border-gray-300 dark:text-gray-200 dark:border-gray-800">
        Next
        <span className="ml-2 text-green-600 dark:text-green-400 ">event</span>
      </h3>
      <div className="flex flex-row justify-between w-full text-gray-600 dark:text-gray-400">
        <div className="flex flex-col flex-grow w-full space-y-1">
          <h3 className="text-xs">
            <i className="w-6 text-center fas fa-calendar "></i>

            <span className="ml-2 text-sm font-bold text-green-500">
              {props.name}
            </span>
          </h3>
          <div className="inline-flex items-center text-xs">
            {props?.location?.location === "Remote" ? (
              <>
                <i className="w-6 text-center fas fa-video"></i>
                <span className="ml-2 truncate">Online Event</span>
              </>
            ) : (
              <>
                <i className="w-6 text-center fas fa-map-marker"></i>
                <span className="ml-2 truncate">
                  {props?.location?.details
                    ? props.location.details.city +
                      ", " +
                      props.location.details.country
                    : props?.location?.location}
                </span>
              </>
            )}
          </div>
          <div className="inline-flex items-center text-xs">
            <i className="w-6 mr-2 text-center fas fa-clock"></i>
            starts{" "}
            {/* {formatDistanceToNow(new Date(props.startDate), {
              addSuffix: true,
            })} */}
            {props.startDate}
          </div>
        </div>
        <Link href={"/event/" + props.slug}>
          <a className="rounded-xl max-w-max text-xs px-3 py-1.5 hover:bg-green-200 text-green-700 dark:text-green-400 dark:hover:bg-green-800 duration-300 transition inline-flex items-center">
            <span className="w-full ">See more</span>{" "}
            <i className="ml-2 fas fa-arrow-right"></i>
          </a>
        </Link>
      </div>
    </div>
  );
};

export const GroupSkeleton = () => (
  <div className="flex flex-col w-full p-2 duration-300 bg-white shadow rounded-xl dark:bg-gray-800">
    <span className="flex items-center justify-center w-full h-32 bg-green-200 rounded-lg dark:bg-green-900 animate-pulse"></span>
    <div className="flex flex-col p-3">
      <div className="flex items-center justify-between mb-2">
        <div className="flex flex-col">
          <span className="w-16 h-4 bg-gray-500 rounded-md animate-pulse">
            {" "}
          </span>
          <span className="w-32 h-4 mt-1 bg-gray-500 rounded-md animate-pulse">
            {" "}
          </span>
        </div>
        <span className="w-6 h-6 bg-gray-500 rounded-full animate-pulse"></span>
      </div>
      <hr className="mx-6 mt-4 border-gray-200 dark:border-gray-700" />
    </div>
    <div className="inline-flex p-3">
      <div className="inline-flex flex-grow overflow-x-hidden">
        <div className="inline-flex items-center max-w-max space-x-3 overflow-x-auto p-1.5">
          <span className="w-12 h-3 px-4 py-2 bg-green-300 rounded-full dark:bg-green-700 animate-pulse"></span>
          <span className="w-32 h-3 px-4 py-2 bg-green-300 rounded-full dark:bg-green-700 animate-pulse"></span>
        </div>
      </div>
      <span className="inline-flex items-center px-1 py-1 transition duration-300 bg-gray-500 rounded-full animate-pulse focus:outline-none group max-w-max dark:bg-opacity-30 ">
        <span className="flex items-center justify-center w-8 h-8 duration-300 bg-gray-600 rounded-full dark:bg-gray-400 dark:bg-opacity-30 animate-pulse"></span>
      </span>
    </div>
  </div>
);
