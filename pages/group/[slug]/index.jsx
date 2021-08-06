import { AppLayout } from "@components/layouts/AppLayout";
import { firestore } from "@libs/firebase";
import Link from "next/link";
import { formatDistance } from "date-fns";
import { useAuth } from "@hooks/useAuth";
import { useEffect, useState } from "react";
import { AvatarGroup } from "@components/ui/AvatarGroup";
import { EventOverview } from "@components/cards/CardEventOverview";
import { ChipList } from "@components/ui/ChipList";

export default function GroupPage({
  name,
  tags,
  description,
  createdAt,
  admin,
  slug,
  location,
  events = [],
}) {
  const [subs, setSubs] = useState([]);
  const [eventsState, setEventsState] = useState([]);
  const { user } = useAuth();

  const toggleSubscription = async () => {
    if (subs.find((subscriber) => subscriber.id === user.uid)) {
      await firestore
        .collection("groups")
        .doc(slug)
        .collection("subscribers")
        .doc(user.uid)
        .delete();
    } else {
      await firestore
        .collection("groups")
        .doc(slug)
        .collection("subscribers")
        .doc(user.uid)
        .set({
          fullName: user.fullName,
          photoUrl: user.photoUrl,
          uid: user.uid,
        });
    }
  };

  useEffect(() => {
    firestore
      .collection("groups")
      .doc(slug)
      .collection("subscribers")
      .onSnapshot((querySnapshot) => {
        let subs = [];
        querySnapshot.forEach((doc) => {
          subs.push({ id: doc.id, ...doc.data() });
        });
        setSubs(subs);
      });

    events.forEach(async (el) => {
      const doc = await firestore.collection("events").doc(el.slug).get();
      setEventsState([...eventsState, { slug: doc.id, ...doc.data() }]);
    });
  }, []);

  return (
    <AppLayout>
      <section className="flex flex-col w-full h-full bg-gray-100 dark:bg-gray-900 dark:bg-opacity-10">
        <div className="xl:sticky xl:top-0 z-[47] flex flex-col w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
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
                <span className="block">
                  <Link href={"/group/" + slug + "/edit"}>
                    <a className="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition duration-300 bg-white border border-gray-300 rounded-xl dark:border-none dark:bg-gray-900 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none ">
                      <i className="mr-2 fas fa-pencil-alt"></i>
                      Edit
                    </a>
                  </Link>
                </span>
              )}
              <span className="block">
                <button
                  type="button"
                  className="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition duration-300 bg-white border border-gray-300 rounded-xl dark:border-none dark:bg-gray-900 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none"
                >
                  <i className="mr-2 fas fa-share-alt"></i>
                  Share
                </button>
              </span>
              <span className="">
                {subs?.find((sub) => sub.id === user?.uid) ? (
                  <a
                    className="inline-flex items-center justify-center w-32 px-4 py-2 text-sm font-medium text-white transition duration-500 bg-green-600 shadow-sm cursor-pointer rounded-xl hover:bg-red-700 focus:outline-none group"
                    onClick={toggleSubscription}
                  >
                    <i className="hidden mr-2 fas fa-times group-hover:block"></i>
                    <span className="hidden group-hover:block">
                      Unsubscribe
                    </span>
                    <i className="block mr-2 fas fa-check group-hover:hidden"></i>
                    <span className="block group-hover:hidden">Subscribed</span>
                  </a>
                ) : (
                  <a
                    className="inline-flex items-center justify-center w-32 px-4 py-2 text-sm font-medium text-white transition duration-300 bg-gray-600 shadow-sm cursor-pointer rounded-xl hover:bg-gray-700 focus:outline-none"
                    onClick={toggleSubscription}
                  >
                    <i className="mr-2 fas fa-plus"></i>
                    <span className="">Subscribe</span>
                  </a>
                )}
              </span>
            </div>
          </div>
          <p className="w-full pt-4 pb-2 text-justify text-gray-500 dark:text-gray-400">
            {description}
          </p>
          <div className="w-full pb-2">
            <ChipList list={tags} />
          </div>
          
        </div>
        <div className="flex-grow h-full grid-cols-3 gap-4 px-6 py-6 pb-16 space-y-2 lg:px-32 xl:px-48 md:grid md:space-y-0 lg:pb-24">
          {eventsState.map((el, index) => (
            <EventOverview {...el} key={index} />
          ))}
        </div>
      </section>
    </AppLayout>
  );
}

export async function getServerSideProps(ctx) {
  const group = await firestore.collection("groups").doc(ctx.query.slug).get();

  // const group = {
  //   data: () => {
  //     return {
  //       slug: "test-de-location",
  //       location: {
  //         position: {
  //           lat: 49.27071680843916,
  //           lng: 1.2134313583374023,
  //         },
  //         location: "Val-de-Reuil, France",
  //       },
  //       tags: ["location", "opéla"],
  //       admin: {
  //         uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
  //         fullName: "Florian Leroux",
  //       },
  //       createdAt: "2021-08-03T09:54:40.695Z",
  //       name: "Test de location",
  //       description:
  //         "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at leo in turpis posuere efficitur at non nulla. Fusce condimentum ultrices lectus eu venenatis. Suspendisse semper accumsan nisi at gravida. Nulla at tellus lobortis, sollicitudin ante nec, dapibus metus. Nunc finibus mauris tellus, id tristique lectus consequat quis. Nullam imperdiet mi non commodo sollicitudin. Phasellus aliquam finibus mauris ac tristique. Ut turpis nisl, volutpat id nibh eget, pellentesque efficitur enim. Sed pellentesque aliquet turpis a tincidunt. Etiam ornare ornare neque, sit amet accumsan justo egestas ut. Maecenas blandit magna eu massa posuere tempus.  In maximus orci nec commodo congue. Praesent malesuada, lectus ac elementum euismod, turpis orci congue ex, sed porttitor augue magna eget leo. Maecenas vitae facilisis justo. Praesent sed dui dui. Maecenas at purus odio. Sed tempor mauris a felis rutrum posuere. Nulla feugiat dolor metus. Sed feugiat dolor vel placerat facilisis. Praesent suscipit justo id ante consequat finibus. Suspendisse vehicula dapibus dolor sed varius. Quisque vestibulum, erat et sodales malesuada, ex mauris pretium lacus, in porttitor tellus elit rutrum est.",
  //     };
  //   },
  // };

  return {
    props: {
      ...group.data(),

      slug: ctx.query.slug,
    },
  };
}
