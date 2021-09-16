import { GroupOverview } from "@components/cards/CardGroupOverview";
import { GroupSkeleton } from "@components/cards/CardGroupOverview";
import { ChevronRightIcon, PlusIcon } from "@heroicons/react/outline";
import { firestore } from "@libs/firebase";
import { collection, getDocs, orderBy, query, where } from "firebase/firestore";
import Link from "next/link";
import { useEffect, useState } from "react";

export const GroupsSection = () => {
  const [groups, setGroups] = useState([]);
  const [loading, setLoading] = useState(true);
  useEffect(() => {
    getDocs(
      query(
        collection(firestore, "groups"),
        orderBy("createdAt", "desc"),
        where("private", "==", false)
      )
    )
      .then((querySnapshot) => {
        let _tmp = [];
        querySnapshot.forEach((doc) =>
          _tmp.push({ slug: doc.id, ...doc.data() })
        );

        setGroups(_tmp);
        setLoading(false);
      })
      .catch((error) => {
        console.log(error);
      });
  }, []);

  return (
    <div className="flex flex-col w-full">
      <div className="inline-flex items-end justify-between p-3">
        <h3 className="text-xl font-extrabold text-gray-800 md:text-2xl lg:text-3xl xl:text-4xl dark:text-gray-200">
          Latest{" "}
          <span className="text-green-600 dark:text-green-400">groups</span>
        </h3>
        <Link href="/group/all">
          <a className="flex flex-row items-center text-sm font-medium transition duration-300 cursor-pointer dark:text-gray-300 dark:hover:text-green-500 hover:text-green-500">
            Explore more groups
            <ChevronRightIcon className="w-4 h-4 ml-2"/>
          </a>
        </Link>
      </div>
      <div className="grid gap-3 lg:grid-cols-3 md:grid-cols-2 lg:px-12 lg:py-6">
        {!loading ? (
          <>
            {groups.map(
              (el, index) => index < 3 && <GroupOverview {...el} key={index} />
            )}
          </>
        ) : (
          <>
            {Array(2)
              .fill(0)
              .map((_, key) => (
                <GroupSkeleton key={key} />
              ))}
          </>
        )}
        {groups.length < 3 && (
          <div className="flex items-center justify-center w-full py-6 min-h-[5rem] lg:min-h-[20rem] bg-gray-200 dark:bg-gray-800 dark:bg-opacity-20 rounded-xl ">
            <Link href="/group/create">
              <a className="flex items-center justify-center w-24 h-24 text-green-700 transition duration-300 bg-green-200 border border-green-500 rounded-full cursor-pointer dark:border-green-500 dark:bg-opacity-50 dark:bg-green-700 dark:text-green-200 hover:bg-green-300 dark:hover:bg-green-800">
              <PlusIcon className="w-12 h-12"/>
              </a>
            </Link>
          </div>
        )}
      </div>
    </div>
  );
};
