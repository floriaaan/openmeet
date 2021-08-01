import { AppLayout } from "@components/layouts/AppLayout";
import { useAuth } from "@hooks/useAuth";
import Link from "next/link";

export default function Index() {
  const { user, signout } = useAuth();
  return (
    <AppLayout>
      <section className="relative flex items-center w-full h-full min-h-full">
        <div
          className="absolute top-0 object-cover w-full h-full bg-gray-100 bg-no-repeat dark:bg-black bg-full"
          style={{
            backgroundImage: "url('/img/register_bg_2.png')",
          }}
        ></div>
        <main className="z-20 flex flex-col items-center justify-center w-full">
          <div className="w-full px-4 py-6 mx-6 my-12 bg-gray-100 bg-opacity-70 dark:bg-gray-800 dark:bg-opacity-30 max-w-7xl sm:px-6 lg:py-16 xl:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between rounded-xl">
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
              <div className="inline-flex col-span-2 shadow rounded-xl">
                <Link href="/group/create">
                  <a className="inline-flex items-center justify-center w-48 py-3 text-base font-medium text-white transition-colors duration-300 bg-green-600 rounded-md hover:bg-green-700">
                    Create a group
                  </a>
                </Link>
              </div>
              <div className="inline-flex shadow rounded-xl">
                <Link href="/group/all">
                  <a className="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-green-600 transition-colors duration-300 bg-white rounded-md dark:bg-black hover:bg-green-100 dark:hover:bg-green-900 dark:hover:text-green-300">
                    All
                  </a>
                </Link>
              </div>
              <div className="inline-flex col-span-2 shadow rounded-xl">
                <Link href="/event/create">
                  <a className="inline-flex items-center justify-center w-48 py-3 text-base font-medium text-white transition-colors duration-300 bg-purple-600 rounded-md hover:bg-purple-700">
                    Create an event
                  </a>
                </Link>
              </div>
              <div className="inline-flex shadow rounded-xl">
                <Link href="/event/all">
                  <a className="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-purple-600 transition-colors duration-300 bg-white rounded-md dark:bg-black hover:bg-purple-100 dark:hover:bg-purple-900 dark:hover:text-purple-300">
                    All
                  </a>
                </Link>
              </div>
            </div>
          </div>
        </main>
      </section>
    </AppLayout>
  );
}
