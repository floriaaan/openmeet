import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { formatDistance, formatDistanceToNow } from "date-fns";
import { useEffect, useState } from "react";

import Link from "next/link";
import { AvatarGroup } from "@components/ui/AvatarGroup";

export const GroupOverview = (props) => {
  const { user } = useAuth();
  const [subs, setSubs] = useState([]);
  const [lastEvent, setLastEvent] = useState(null);

  useEffect(() => {
    firestore
      .collection("groups")
      .doc(props.slug)
      .collection("subscribers")
      .onSnapshot((querySnapshot) => {
        let subs = [];
        querySnapshot.forEach((doc) => {
          subs.push({ id: doc.id, ...doc.data() });
        });
        setSubs(subs);
      });

    if (props?.events?.length >= 1) {
      let sortedEvents = props.events;
      sortedEvents.sort((a, b) => {
        return new Date(b.startDate) > new Date(a.startDate);
      });
      console.log(sortedEvents);
      firestore
        .collection("events")
        .doc(sortedEvents[0].slug)
        .get()
        .then((snapshot) => {
          setLastEvent({ slug: snapshot.id, ...snapshot.data() });
        });
    }
  }, []);

  const toggleSubscription = async () => {
    if (subs.find((subscriber) => subscriber.id === user.uid)) {
      await firestore
        .collection("groups")
        .doc(props.slug)
        .collection("subscribers")
        .doc(user.uid)
        .delete();
    } else {
      await firestore
        .collection("groups")
        .doc(props.slug)
        .collection("subscribers")
        .doc(user.uid)
        .set({
          fullName: user.fullName,
          photoUrl: user.photoUrl,
          uid: user.uid,
        });
    }
  };

  return (
    <div className="flex flex-col p-6 transition duration-300 bg-white shadow rounded-xl dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900">
      <div className="inline-flex items-center">
        <Link href={"/group/" + props.slug}>
          <h3 className="flex-grow w-full mr-12 text-2xl font-bold leading-7 text-green-400 cursor-pointer sm:text-3xl sm:truncate">
            {props.name}
          </h3>
        </Link>
        {subs.findIndex((sub) => sub.id === user.uid) === -1 ? (
          <button
            onClick={toggleSubscription}
            className="flex items-center justify-center w-8 h-[1.75rem] transition duration-300 text-white bg-gray-500 rounded-md shadow hover:bg-gray-700"
          >
            <i className="text-xs fas fa-plus"></i>
          </button>
        ) : (
          <button
            onClick={toggleSubscription}
            className="flex items-center justify-center w-8 h-[1.75rem] transition duration-500 text-white bg-green-500 hover:bg-red-700 rounded-md shadow group "
          >
            <i className="hidden text-xs fas fa-times group-hover:block"></i>
            <i className="block text-xs fas fa-check group-hover:hidden"></i>
          </button>
        )}
      </div>

      <div className="inline-flex flex-col pb-2 mb-2 pt-1.5 space-y-2 border-b border-gray-200 sm:flex-row sm:flex-wrap sm:space-x-6 sm:space-y-0 dark:border-gray-700 ">
        <Link href={"/group/" + props.slug}>
          <div className="flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
            <i className="flex items-center fas fa-map flex-shrink-0 mr-1.5 h-5 w-5 "></i>
            {props?.location?.location || "Remote"}
          </div>
        </Link>
        <div className="inline-flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
          <AvatarGroup users={subs} limit={4} />
          <i className="flex items-center fas fa-users flex-shrink-0 mx-1.5 h-5 w-5 "></i>
          {subs?.length || 0} {subs?.length > 1 ? "members" : "member"}
        </div>
        <Link href={"/group/" + props.slug}>
          <div className="inline-flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
            <i className="flex items-center fas fa-calendar flex-shrink-0 mr-1.5 h-5 w-5 "></i>
            {formatDistance(new Date(props.createdAt), new Date(), {
              addSuffix: true,
            })}
          </div>
        </Link>
      </div>
      <p className="text-sm font-normal overflow-ellipsis">
        {props.description.length < 100
          ? props.description
          : props.description.slice(0, 100) + " ..."}
      </p>
      <div className="w-full mt-4 transition duration-300 bg-gray-100 rounded-xl dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800">
        {lastEvent ? (
          <div className="inline-flex w-full">
            <TinyEvent {...lastEvent} />
          </div>
        ) : (
          <div className="flex items-center justify-center py-4 text-sm text-gray-500 dark:text-gray-300">
            No event planned ❌
          </div>
        )}
      </div>
    </div>
  );
};

const TinyEvent = (props) => {
  return (
    <div className="flex flex-row justify-between w-full px-6 py-2 text-gray-600 dark:text-gray-400">
      <div className="flex flex-col flex-grow w-full">
        <h3 className="text-xs">
          <i className="w-6 fas fa-calendar "></i>
          Next event:
          <span className="ml-1 text-sm font-bold text-purple-500">
            {props.name}
          </span>
        </h3>
        <div className="inline-flex items-center text-xs">
          {props?.location?.location === "Remote" ? (
            <>
              <i className="w-6 fas fa-video"></i>
              <span className="truncate">Online Event</span>
            </>
          ) : (
            <>
              <i className="w-6 fas fa-map-marker"></i>
              <span className="truncate">
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
          <i className="w-6 fas fa-clock"></i>
          starts{" "}
          {formatDistanceToNow(new Date(props.startDate), { addSuffix: true })}
        </div>
      </div>
      <Link href={"/event/" + props.slug}>
        <a className="rounded-xl text-xs px-3 py-1.5 hover:bg-purple-200 text-purple-700 dark:text-purple-400 dark:hover:bg-purple-800 duration-300 transition inline-flex items-center">
          See more <i className="ml-1 fas fa-arrow-right"></i>
        </a>
      </Link>
    </div>
  );
};
