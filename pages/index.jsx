import { EventOverview } from "@components/cards/CardEventOverview";
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
        <span class="text-sm font-semibold">Explore more groups</span>
      </div>
      <div className="grid gap-3 lg:grid-cols-3 md:grid-cols-2 lg:px-12 lg:py-6">
        {groups.map(
          (el, index) => index < 3 && <GroupOverview {...el} key={index} />
        )}
      </div>
    </div>
  );
};

const GroupOverview = (props) => {
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

  console.log(subs);
  return (
    <div className="flex flex-col p-6 transition duration-300 bg-white shadow rounded-xl dark:bg-gray-800 group hover:bg-gray-100 dark:hover:bg-gray-900">
      <div className="inline-flex items-center">
        <Link href={"/group/" + props.slug}>
          <h3 className="flex-grow w-full mr-12 text-2xl font-bold leading-7 text-green-400 cursor-pointer sm:text-3xl sm:truncate">
            {props.name}
          </h3>
        </Link>
        {subs.findIndex((sub) => sub.id === user.uid) === -1 ? (
          <button className="flex items-center justify-center w-8 h-[1.75rem] transition duration-300 bg-gray-500 rounded-md shadow hover:bg-gray-700">
            <i className="text-xs fas fa-plus"></i>
          </button>
        ) : (
          <button className="flex items-center justify-center w-8 h-[1.75rem] transition duration-300 bg-green-500 rounded-md shadow hover:bg-green-700">
            <i className="text-xs fas fa-check"></i>
          </button>
        )}
      </div>

      <div className="inline-flex flex-col pt-3 mt-3 space-y-2 border-t border-gray-200 sm:flex-row sm:flex-wrap sm:space-x-6 sm:space-y-0 dark:border-gray-700 ">
        <Link href={"/group/" + props.slug}>
          <div className="flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
            <i className="flex items-center fas fa-map flex-shrink-0 mr-1.5 h-5 w-5 "></i>
            Remote
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
        <span class="text-sm font-semibold">Explore more events</span>
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
