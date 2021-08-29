import { EventOverview } from "@components/cards/CardEventOverview";
import { GroupOverview } from "@components/cards/CardGroupOverview";
import { AppLayout } from "@components/layouts/AppLayout";
import { RainbowHighlight } from "@components/ui/RainbowHighlight";
// import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import Link from "next/link";
import { useEffect, useState } from "react";
import { RoughNotationGroup } from "react-rough-notation";

export default function Index() {
  // const { user, signout } = useAuth();
  const colors = ["#bbf7d0", "#e9d5ff", "#fef9c3", "#BFDBFE"];

  return (
    <AppLayout>
      <div className="">
        <div className="flex w-full h-[500px] bg-gray-50 dark:bg-gray-900">
          <div className="flex items-center px-8 text-center lg:text-left md:px-12 lg:w-1/2">
            <div className="w-[32rem]">
              <RoughNotationGroup show={true}>
                <RainbowHighlight color={colors[0]}>
                  <h1 className="my-2 text-4xl font-bold text-green-700 ">
                    Your groups
                  </h1>
                </RainbowHighlight>
                <RainbowHighlight color={colors[1]}>
                  <h1 className="my-2 text-4xl font-bold text-purple-700 ">
                    Your events
                  </h1>
                </RainbowHighlight>
                <RainbowHighlight color={colors[2]}>
                  <h1 className="my-2 text-4xl font-bold text-yellow-600 ">
                    at the same place.
                  </h1>
                </RainbowHighlight>
                <RainbowHighlight color={colors[3]}>
                  <h1 className="my-2 text-4xl font-bold text-blue-700 ">
                    OpenMeet.
                  </h1>
                </RainbowHighlight>
              </RoughNotationGroup>
            </div>
          </div>
          <div
            className="hidden lg:block lg:w-1/2"
            style={{ clipPath: "polygon(10% 0, 100% 0%, 100% 100%, 0 100%)" }}
          >
            <div
              className="object-cover h-full"
              style={{
                backgroundImage:
                  "url(https://images.unsplash.com/photo-1576085898323-218337e3e43c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=33)",
              }}
            >
              <div className="h-full bg-black opacity-25" />
            </div>
          </div>
        </div>
        <section className="flex flex-col h-full px-6 pt-6 pb-24 mt-6 space-y-6 bg-gray-100 dark:bg-gray-900 dark:bg-opacity-5 lg:px-24 ">
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
      // .where("private", "==", false)
      .orderBy("createdAt", "desc")
      .get()
      .then((querySnapshot) => {
        let _tmp = [];
        querySnapshot.forEach((doc) => {
          _tmp.push({ slug: doc.id, ...doc.data() });
        });
        // console.log(JSON.stringify(_tmp))
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
          Latest groups
        </span>
        <Link href="/group/all">
          <a className="flex flex-row items-center text-sm font-medium transition duration-300 cursor-pointer hover:text-green-500">
            Explore more groups
            <i className="ml-2 fas fa-arrow-right"></i>
          </a>
        </Link>
      </div>
      <div className="grid gap-3 lg:grid-cols-3 md:grid-cols-2 lg:px-12 lg:py-6">
        {groups.map(
          (el, index) => index < 3 && <GroupOverview {...el} key={index} />
        )}
        {groups.length < 3 && (
          <div className="flex items-center justify-center w-full h-full bg-gray-200 dark:bg-gray-800 dark:bg-opacity-20 rounded-xl ">
            <Link href="/group/create">
              <a className="flex items-center justify-center w-24 h-24 text-green-700 transition duration-300 bg-green-200 border border-green-500 rounded-full cursor-pointer dark:border-green-500 dark:bg-opacity-50 dark:bg-green-700 dark:text-green-200 hover:bg-green-300 dark:hover:bg-green-800">
                <i className="text-xl fas fa-plus"></i>
              </a>
            </Link>
          </div>
        )}
      </div>
    </div>
  );
};

const EventSection = () => {
  const [events, setEvents] = useState([]);
  useEffect(() => {
    firestore
      .collection("events")
      // .where("startDate", ">", new Date().toISOString())
      .onSnapshot((querySnapshot) => {
        let _tmp = [];
        querySnapshot.forEach((doc) => {
          if (_tmp.length < 4 && new Date(doc.data().startDate) > new Date())
            _tmp.push({ slug: doc.id, ...doc.data() });
        });
        setEvents(_tmp);
      });
  }, []);

  return (
    <div className="flex flex-col w-full ">
      <div className="inline-flex items-end justify-between p-3">
        <span className="text-xl font-medium text-gray-600 dark:text-gray-300 md:font-bold md:text-3xl lg:text-4xl">
          Upcoming events
        </span>
        <Link href="/event/all">
          <a className="flex flex-row items-center text-sm font-medium transition duration-300 cursor-pointer hover:text-purple-500">
            Explore more events
            <i className="ml-2 fas fa-arrow-right"></i>
          </a>
        </Link>
      </div>
      {events.length !== 0 ? (
        <div className="grid gap-3 lg:grid-cols-4 sm:grid-cols-2 lg:px-12 lg:py-6">
          {events.map(
            (el, index) => index < 4 && <EventOverview {...el} key={index} />
          )}
          {events.length < 4 && (
            <div className="flex items-center justify-center w-full h-full bg-gray-200 dark:bg-gray-800 dark:bg-opacity-20 rounded-xl ">
              <Link href="/event/create">
                <a className="flex items-center justify-center w-24 h-24 text-purple-700 transition duration-300 bg-purple-200 border border-purple-500 rounded-full cursor-pointer dark:border-purple-500 dark:bg-opacity-50 dark:bg-purple-700 dark:text-purple-200 hover:bg-purple-300 dark:hover:bg-purple-800">
                  <i className="text-xl fas fa-plus"></i>
                </a>
              </Link>
            </div>
          )}
        </div>
      ) : (
        <div className="inline-flex items-center justify-center w-full h-48">
          No upcoming events yet... 😢
        </div>
      )}
    </div>
  );
};
