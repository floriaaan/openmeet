import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { formatDistance } from "date-fns";
import { useEffect, useState } from "react";

import Link from "next/link";
import { AvatarGroup } from "@components/ui/AvatarGroup";

export const GroupOverview = (props) => {
  const { user } = useAuth();
  const [subs, setSubs] = useState([]);
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

      <div className="inline-flex flex-col pb-3 mb-3 pt-1.5 space-y-2 border-b border-gray-200 sm:flex-row sm:flex-wrap sm:space-x-6 sm:space-y-0 dark:border-gray-700 ">
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
      <p className="text-sm font-normal overflow-ellipsis">{props.description.length < 100 ? props.description : props.description.slice(0, 100) + ' ...'}</p>
    </div>
  );
};
