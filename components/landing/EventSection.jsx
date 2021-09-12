import { EventSkeleton } from "@components/cards/CardEventOverview";
import { EventOverview } from "@components/cards/CardEventOverview";
import { firestore } from "@libs/firebase";
import { collection, onSnapshot, query, where } from "firebase/firestore";
import Link from "next/link";
import { useEffect, useState } from "react";

export const EventSection = () => {
  const [events, setEvents] = useState([]);
  const [loading, setLoading] = useState(true);
  useEffect(() => {
    const unsub = onSnapshot(
      query(collection(firestore, "events"), where("private", "==", false)),
      (querySnapshot) => {
        let _tmp = [];
        querySnapshot.forEach((doc) => {
          if (_tmp.length < 4 && new Date(doc.data().startDate) > new Date())
            _tmp.push({ slug: doc.id, ...doc.data() });
        });
        setEvents(_tmp);
        setLoading(false);
      }
    );

    return () => {
      unsub();
    };
  }, []);

  return (
    <div className="flex flex-col w-full ">
      <div className="inline-flex items-end justify-between p-3">
        <h3 className="text-xl font-extrabold text-gray-800 md:text-2xl lg:text-3xl xl:text-4xl dark:text-gray-200">
          Upcoming{" "}
          <span className="text-purple-600 dark:text-purple-400">events</span>
        </h3>
        <Link href="/event/all">
          <a className="flex flex-row items-center text-sm font-medium transition duration-300 cursor-pointer dark:text-gray-300 dark:hover:text-purple-500 hover:text-purple-500">
            Explore more events
            <i className="ml-2 fas fa-arrow-right"></i>
          </a>
        </Link>
      </div>
      {!loading ? (
        <div className="grid gap-3 lg:grid-cols-4 sm:grid-cols-2 lg:px-12 lg:py-6">
          {events.length !== 0 ? (
            <>
              {events.map(
                (el, index) =>
                  index < 4 && <EventOverview {...el} key={index} />
              )}
              {events.length < 4 && (
                <div className="flex items-center justify-center w-full h-full py-6 min-h-[5rem] lg:min-h-[20rem]  bg-gray-200 dark:bg-gray-800 dark:bg-opacity-20 rounded-xl ">
                  <Link href="/event/create">
                    <a className="flex items-center justify-center w-24 h-24 text-purple-700 transition duration-300 bg-purple-200 border border-purple-500 rounded-full cursor-pointer dark:border-purple-500 dark:bg-opacity-50 dark:bg-purple-700 dark:text-purple-200 hover:bg-purple-300 dark:hover:bg-purple-800">
                      <i className="text-xl fas fa-plus"></i>
                    </a>
                  </Link>
                </div>
              )}
            </>
          ) : (
            <div className="inline-flex items-center justify-center w-full h-48">
              No upcoming events yet... 😢
            </div>
          )}
        </div>
      ) : (
        <div className="grid gap-3 lg:grid-cols-4 sm:grid-cols-2 lg:px-12 lg:py-6">
          {Array(4)
            .fill(0)
            .map((_, key) => (
              <EventSkeleton key={key} />
            ))}
        </div>
      )}
    </div>
  );
};
