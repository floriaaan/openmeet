import { EventSkeleton } from "@components/cards/CardEventOverview";
import { EventOverview } from "@components/cards/CardEventOverview";
import { GroupSkeleton } from "@components/cards/CardGroupOverview";
import { GroupOverview } from "@components/cards/CardGroupOverview";
import { AppLayout } from "@components/layouts/AppLayout";
import { RainbowHighlight } from "@components/ui/RainbowHighlight";
// import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import {
  collection,
  getDocs,
  onSnapshot,
  orderBy,
  query,
  where,
} from "firebase/firestore";
import Link from "next/link";
import { useEffect, useState } from "react";
import { RoughNotationGroup } from "react-rough-notation";

export default function Index() {
  // const { user, signout } = useAuth();
  const colors = ["#bbf7d0", "#e9d5ff", "#fef9c3", "#BFDBFE"];

  return (
    <AppLayout>
      <div className="">
        <section className="flex w-full h-[500px] bg-gray-50 dark:bg-gray-900">
          <div className="flex items-center w-full px-8 lg:text-left md:px-12 lg:w-1/2">
            <div className="w-full">
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
            className="hidden lg:block lg:w-1/2 z-[20]"
            style={{ clipPath: "polygon(10% 0, 100% 0%, 100% 100%, 0 100%)" }}
          >
            <div
              className="object-cover h-full"
              style={{
                backgroundImage:
                  "url(https://images.unsplash.com/photo-1532635241-17e820acc59f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=703&q=80)",
              }}
            >
              <div className="h-full bg-black opacity-25" />
            </div>
          </div>
        </section>
        <section className="flex flex-col h-full px-6 pt-6 pb-6 space-y-6 bg-gray-100 dark:bg-gray-900 lg:px-24 2xl:px-32">
          <EventSection />
          <section className="lg:px-12">
            <div className="px-6 py-6 rounded-lg bg-gradient-to-bl from-purple-600 to-indigo-500 md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
              <div className="xl:w-0 xl:flex-1">
                <h2 className="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                  Want product news and updates?
                </h2>
                <p className="max-w-3xl mt-3 text-lg leading-6 text-indigo-200">
                  Sign up for our newsletter to stay up to date.
                </p>
              </div>
              <div className="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
                <form className="sm:flex">
                  <label htmlFor="email-address" className="sr-only">
                    Email address
                  </label>
                  <input
                    id="email-address"
                    name="email-address"
                    type="email"
                    autoComplete="email"
                    required
                    className="w-full px-5 py-3 placeholder-gray-500 border-white rounded-md form-input focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white"
                    placeholder="Enter your email"
                  />
                  <button
                    type="submit"
                    className="flex items-center justify-center w-full px-5 py-3 mt-3 text-base font-medium text-white bg-indigo-500 border border-transparent rounded-md shadow hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0"
                  >
                    Notify me
                  </button>
                </form>
                <p className="mt-3 text-sm text-indigo-200">
                  We care about the protection of your data. Read our{" "}
                  <Link href="/privacy-policy">
                    <a className="font-medium text-white underline">
                      Privacy Policy.
                    </a>
                  </Link>
                </p>
              </div>
            </div>
          </section>

          <GroupsSection />
        </section>
        <section className="flex flex-col h-full px-6 py-12 bg-white dark:bg-black lg:px-24 2xl:px-32">
          <div className="flex flex-col overflow-hidden shadow-xl lg:flex-row bg-gradient-to-tr from-blue-600 to-green-500 lg:mx-12 rounded-xl ">
            <div className="px-6 pt-10 pb-12 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
              <div className="flex-col justify-center h-full lg:flex">
                <h2 className="text-3xl font-extrabold text-white sm:text-4xl">
                  <span className="block">Ready to dive in?</span>
                  <span className="block">Install OpenMeet on your phone.</span>
                </h2>
                <p className="mt-4 text-lg leading-6 text-indigo-200">
                  Ac euismod vel sit maecenas id pellentesque eu sed
                  consectetur. Malesuada adipiscing sagittis vel nulla nec.
                </p>
                <a
                  href="#"
                  className="inline-flex items-center px-5 py-3 mt-8 text-base font-medium text-blue-600 bg-white border border-transparent rounded-md shadow max-w-max hover:bg-indigo-50"
                >
                  Install for free
                </a>
              </div>
            </div>
            <div className="inline-flex justify-end w-full -mt-6 md:hidden lg:inline-flex">
              {/* eslint-disable-next-line @next/next/no-img-element */}
              <img
                className="object-cover object-right-top w-[32rem] transform translate-x-6 translate-y-6 rounded-xl sm:translate-x-16 lg:translate-y-20"
                src="/img/install2.png"
                alt="App screenshot"
              />
            </div>
          </div>
        </section>
      </div>
    </AppLayout>
  );
}

const GroupsSection = () => {
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
          <a className="flex flex-row items-center text-sm font-medium transition duration-300 cursor-pointer hover:text-green-500">
            Explore more groups
            <i className="ml-2 fas fa-arrow-right"></i>
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
          <a className="flex flex-row items-center text-sm font-medium transition duration-300 cursor-pointer hover:text-purple-500">
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
