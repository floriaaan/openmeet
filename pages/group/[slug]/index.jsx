import { AppLayout } from "@components/layouts/AppLayout";
import { firestore } from "@libs/firebase";
import Link from "next/link";
import { formatDistance, subDays } from "date-fns";
import { useAuth } from "@hooks/useAuth";

export default function GroupPage({
  name,
  tags,
  description,
  createdAt,
  admin,
  slug,
  subscribers,
}) {
  const { user } = useAuth();
  console.log(user)

  const toggleSubscription = async () => {
    if (subscribers.find((subscriber) => subscriber.id === user.uid)) {
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
        .set({ fullname: user.fullname, photoURL: user.photoURL });
    }
  };

  return (
    <AppLayout>
      <section
        style={{ minHeight: "70vh" }}
        className="flex-col p-6 space-y-4 lg:flex sm:pt-24 md:pt-8 md:px-24"
      >
        <div className="lg:flex lg:items-center lg:justify-between">
          <div className="flex-1 min-w-0">
            <h2 className="text-2xl font-bold leading-7 text-green-400 sm:text-3xl sm:truncate">
              {name}
            </h2>
            <div className="inline-flex flex-col mt-1 sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6 ">
              <div className="flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
                <i className="flex items-center fas fa-map flex-shrink-0 mr-1.5 h-5 w-5 "></i>
                Remote
              </div>
              <div className="inline-flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
                <i className="flex items-center fas fa-users flex-shrink-0 mr-1.5 h-5 w-5 "></i>
                1 members
              </div>
              <div className="inline-flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
                <i className="flex items-center fas fa-calendar flex-shrink-0 mr-1.5 h-5 w-5 "></i>
                {formatDistance(new Date(createdAt), new Date(), {
                  addSuffix: true,
                })}
              </div>
            </div>
          </div>
          <div className="flex mt-5 lg:mt-0 lg:ml-4">
            <span className="block">
              <Link href={"/group/" + slug + "/edit"}>
                <a className="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition duration-300 bg-white border border-gray-300 rounded-md dark:border-gray-900 dark:bg-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none ">
                  Edit
                </a>
              </Link>
            </span>
            <span className="block ml-3">
              <button
                type="button"
                className="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition duration-300 bg-white border border-gray-300 rounded-md dark:border-gray-900 dark:bg-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none"
              >
                Share
              </button>
            </span>
            <span className="ml-3">
              <a
                className="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition duration-300 bg-green-600 rounded-md shadow-sm cursor-pointer hover:bg-green-700 focus:outline-none"
                onClick={toggleSubscription}
              >
                {subscribers.find((sub) => sub.id === user.uid)
                  ? "Unsubscribe"
                  : "Subscribe"}
              </a>
            </span>
          </div>
        </div>
        <div className="pb-5 border-b border-gray-300 dark:border-gray-800 ">
          <p className="font-light text-gray-500 dark:text-gray-400">
            {description}
          </p>
        </div>
        <div className="grid-cols-3 gap-4 space-y-2 md:grid md:space-y-0"></div>
      </section>
      <pre>{JSON.stringify(subscribers, undefined, 2)}</pre>
    </AppLayout>
  );
}

export async function getServerSideProps(ctx) {
  const group = await firestore.collection("groups").doc(ctx.query.slug).get();
  const subscribers = await firestore
    .collection("groups")
    .doc(ctx.query.slug)
    .collection("subscribers")
    .get();

  return {
    props: {
      ...group.data(),
      subscribers: subscribers.docs.map((doc) => {
        return { id: doc.id, ...doc.data() };
      }),
      slug: ctx.query.slug,
    },
  };
}
