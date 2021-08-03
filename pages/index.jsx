import { EventOverview } from "@components/cards/CardEventOverview";
import { GroupOverview } from "@components/cards/CardGroupOverview";
import { AppLayout } from "@components/layouts/AppLayout";
import { AvatarGroup } from "@components/ui/AvatarGroup";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { formatDistance } from "date-fns";
import Link from "next/link";
import { useEffect, useState } from "react";

export default function Index() {
  const { user, signout } = useAuth();
  return (
    <AppLayout>
      <div className="">
        <section className=" flex flex-col items-center w-full h-[60vh]">
          <main
            style={{
              backgroundImage: "url('/img/register_bg_2.png')",
            }}
            className="z-20 flex flex-col items-center justify-center object-cover w-full h-full bg-gray-100 bg-no-repeat dark:bg-black bg-full"
          >
            <div className="w-full px-4 py-6 mx-6 my-12 bg-gray-100 bg-opacity-80 dark:bg-black dark:bg-opacity-80 max-w-7xl sm:px-6 lg:py-16 xl:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between rounded-xl">
              <h2 className="font-extrabold tracking-tight text-gray-700 dark:text-gray-100 ">
                <span className="block text-xl sm:text-3xl">
                  OpenMeet, the app for your needs
                </span>
                <span
                  className="block text-gray-500 dark:text-gray-400"
                  style={{ fontFamily: "system-ui" }}
                >
                  Meet the people interested in the subject you're into
                </span>
              </h2>
              <div className="grid grid-cols-3 gap-3 mt-8 lg:mt-0 lg:flex-shrink-0">
                <div className="col-span-2">
                  <Link href="/group/create">
                    <a className="inline-flex items-center justify-center w-full p-3 px-5 text-base font-medium text-white transition-colors duration-300 bg-green-600 shadow rounded-xl hover:bg-green-700">
                      Create a group
                    </a>
                  </Link>
                </div>
                <Link href="/group/all">
                  <a className="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-green-600 transition-colors duration-300 bg-white shadow rounded-xl dark:bg-black hover:bg-green-100 dark:hover:bg-green-900 dark:hover:text-green-300">
                    All
                  </a>
                </Link>
                <div className="col-span-2">
                  <Link href="/event/create">
                    <a className="inline-flex items-center justify-center w-full p-3 px-5 text-base font-medium text-white transition-colors duration-300 bg-purple-600 shadow rounded-xl hover:bg-purple-700">
                      Create an event
                    </a>
                  </Link>
                </div>
                <Link href="/event/all">
                  <a className="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-purple-600 transition-colors duration-300 bg-white shadow rounded-xl dark:bg-black hover:bg-purple-100 dark:hover:bg-purple-900 dark:hover:text-purple-300">
                    All
                  </a>
                </Link>
              </div>
            </div>
          </main>
        </section>
        <section className="flex flex-col h-full px-6 pt-6 pb-24 mt-6 space-y-6 bg-gray-100 border-t border-gray-300 dark:bg-gray-900 lg:px-24 dark:border-gray-800">
          <EventSection />
          <GroupsSection />
        </section>
      </div>
    </AppLayout>
  );
}

const GroupsSection = () => {
  const [groups, setGroups] = useState([]);
  useEffect(() => {
    firestore
      .collection("groups")
      .get()
      .then((querySnapshot) => {
        let _tmp = [];
        querySnapshot.forEach((doc) => {
          _tmp.push({ slug: doc.id, ...doc.data() });
        });
        setGroups(_tmp);
      })
      .catch((error) => {
        console.log(error);
      });
  }, []);

  return (
    <div className="flex flex-col w-full">
      <div className="inline-flex items-end justify-between p-3">
        <span className="text-xl font-medium text-gray-600 dark:text-gray-300 md:font-bold md:text-3xl lg:text-4xl">
          Popular groups
        </span>
        <Link href="/group/all">
          <a className="flex text-sm font-medium transition duration-300 cursor-pointer hover:text-green-500">
            Explore more groups
          </a>
        </Link>
      </div>
      <div className="grid gap-3 lg:grid-cols-3 md:grid-cols-2 lg:px-12 lg:py-6">
        {groups.map(
          (el, index) => index < 3 && <GroupOverview {...el} key={index} />
        )}
      </div>
    </div>
  );
};

const EventSection = () => {
  // const [groups, setGroups] = useState([]);
  // useEffect(() => {
  //   firestore
  //     .collection("groups")
  //     .get()
  //     .then((querySnapshot) => {
  //       let _tmp = [];
  //       querySnapshot.forEach((doc) => {
  //         _tmp.push({ slug: doc.id, ...doc.data() });
  //       });
  //       setGroups(_tmp);
  //     })
  //     .catch((error) => {
  //       console.log(error);
  //     });
  // }, []);

  return (
    <div className="flex flex-col w-full ">
      <div className="inline-flex items-end justify-between p-3">
        <span className="text-xl font-medium text-gray-600 dark:text-gray-300 md:font-bold md:text-3xl lg:text-4xl">
          Upcoming events
        </span>
        <Link href="/event/all">
          <a className="flex text-sm font-medium transition duration-300 cursor-pointer hover:text-green-500">
            Explore more events
          </a>
        </Link>
      </div>
      <div className="grid gap-3 lg:grid-cols-4 sm:grid-cols-2 lg:px-12 lg:py-6">
        {new Array(4)
          .fill(0)
          .map(
            (el, index) => index < 4 && <EventOverview {...el} key={index} />
          )}
      </div>
    </div>
  );
};
