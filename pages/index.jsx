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
          <div className="w-full px-4 py-16 mx-6 bg-gray-100 bg-opacity-70 dark:bg-gray-800 dark:bg-opacity-30 max-w-7xl sm:px-6 lg:py-32 xl:py-48 lg:px-8 lg:flex lg:items-center lg:justify-between rounded-xl">
            <h2 className="font-extrabold tracking-tight text-gray-900 dark:text-gray-100 ">
              <span className="block text-xl sm:text-3xl">
                OpenMeet, the app for your needs
              </span>
              <span
                className="block text-blue-600 dark:text-blue-300"
                style={{ fontFamily: "system-ui" }}
              >
                Meet the people interested in the subject you're into
              </span>
            </h2>
            <div className="flex mt-8 lg:mt-0 lg:flex-shrink-0">
              <div className="inline-flex rounded-md shadow">
                <Link href="/group/create">
                  <a className="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-white transition-colors duration-300 bg-green-600 rounded-md hover:bg-green-700">
                    Create a group
                  </a>
                </Link>
              </div>
              <div className="inline-flex ml-3 rounded-md shadow">
                <Link href="/group/all">
                  <a className="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-green-600 transition-colors duration-300 bg-white rounded-md hover:bg-green-100">
                    All groups
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
