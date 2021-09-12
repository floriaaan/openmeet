import { useAuth } from "@hooks/useAuth";
import useFirestoreToggle from "@hooks/useFirestoreToggle";

export const AppFooter = () => {
  const { user } = useAuth();
  const [alreadySubscribed, toggleSubscription] = useFirestoreToggle(
    `newsletter_subscriptions/${user?.uid}`,
    {
      uid: user?.uid,
      fullName: user?.fullName,
      email: user?.email,
      verified: true
    }
  );


  return (
    <footer className="z-[48] w-full px-10 text-gray-600 border-t-2 border-gray-200 shadow-md dark:text-gray-400 dark:border-gray-800 bg-gray-50 dark:bg-gray-900 body-font">
      <div className="container flex flex-row items-center justify-between px-5 py-3 mx-auto md:py-8 md:items-start ">
        <div className="flex flex-row">
          <a className="flex items-center justify-center font-medium text-gray-900 dark:text-gray-200 title-font md:justify-start">
            <span className="ml-3 text-sm lg:text-xl">OpenMeet</span>
          </a>
          <p className="hidden mt-4 text-sm text-gray-500 lg:block sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 dark:border-gray-800 sm:py-2 sm:mt-0">
            © 2021 Floriaaan —
            <a
              href="https://github.com/floriaaan"
              className="ml-1 text-gray-600 transition duration-300 dark:text-gray-400 hover:text-blue-600"
              rel="noopener noreferrer"
              target="_blank"
            >
              @floriaaan
            </a>
          </p>
        </div>
        {user && (
          <div className="flex-col hidden md:flex">
            <h2 className="mb-1 text-sm font-medium tracking-widest text-gray-900 dark:text-gray-200 title-font">
              Subscribe to the newsletter
            </h2>
            <div className="flex flex-col flex-wrap justify-center xl:flex-nowrap md:flex-nowrap lg:flex-wrap md:justify-start">
              <div className="relative w-40 mr-2 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4">
                <label className="text-sm leading-7 text-gray-600 dark:text-gray-400">
                  You will be informed of the latest information
                </label>

                <button
                  onClick={toggleSubscription}
                  className={
                    "inline-flex justify-end px-6 py-2 ml-4 text-xs text-white transition duration-300 ease-in-out border-0 rounded-xl lg:mt-2 xl:mt-0 focus:outline-none focus:ring-2 focus:ring-offset-2 " +
                    (alreadySubscribed
                      ? "bg-green-500 focus:ring-green-500 hover:bg-green-600"
                      : "bg-blue-500 focus:ring-blue-500 hover:bg-blue-600")
                  }
                >
                  {alreadySubscribed ? "Subscribed" : "Subscribe"}
                </button>
              </div>
            </div>
          </div>
        )}
        <span className="inline-flex justify-center space-x-5 sm:mt-0 sm:justify-start">
          <a
            href="https://twitter.com/t3tra_"
            className="text-gray-600 transition duration-300 dark:text-gray-400 hover:text-blue-600"
          >
            <i className="fab fa-twitter" />
          </a>
          <a
            href="https://github.com/floriaaan"
            className="text-gray-600 transition duration-300 dark:text-gray-400 hover:text-blue-600"
          >
            <i className="fab fa-github" />
          </a>
        </span>
      </div>
    </footer>
  );
};
