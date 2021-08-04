import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { useEffect, useState } from "react";

export const AppFooter = () => {
  const { user } = useAuth();
  const [alreadySubscribed, setAlreadySubscribed] = useState(false);

  useEffect(() => {
    const checkSubscription = async () => {
      if (user) {
        const userDocRef = firestore
          .collection("newsletter_subscriptions")
          .doc(user.uid);
        const doc = await userDocRef.get();

        setAlreadySubscribed(doc.exists && doc.data().email === user.email);
      }
    };

    checkSubscription();
  }, [user]);

  const sendSubscription = async () => {
    // console.log(user);
    if (user) {
      const response = await firestore
        .collection("newsletter_subscriptions")
        .doc(user.uid)
        .set({
          uid: user.uid,
          fullName: user.fullName,
          email: user.email,
        });
      // console.log(response);
    }
  };

  return (
    <footer className="z-50 w-full px-10 text-gray-600 border-t-2 border-gray-200 shadow-md dark:text-gray-400 dark:border-gray-800 bg-gray-50 dark:bg-gray-900 body-font">
      {/* <div className="container hidden px-5 pt-10 mx-auto md:block lg:block xl:block">
        <div className="flex flex-wrap order-first text-center md:text-left">
          <div className="w-full px-4 lg:w-1/4 md:w-1/2">
            <h2 className="mb-3 text-sm font-medium tracking-widest text-gray-900 dark:text-gray-200 title-font">
              More informations
            </h2>
            <nav className="mb-10 list-none">
              <li>
                <a className="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800">
                  API Documentation
                </a>
              </li>
              <li>
                <a className="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800">
                  Terms &amp; Legals
                </a>
              </li>
              <li>
                <a className="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800">
                  Found a bug ?
                </a>
              </li>
            </nav>
          </div>
          <div className="w-full px-4 lg:w-1/4 md:w-1/2">
            <h2 className="mb-3 text-sm font-medium tracking-widest text-gray-900 dark:text-gray-200 title-font">
              About
            </h2>
            <nav className="mb-10 list-none">
              <li>
                <a className="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800">
                  Github Repository
                </a>
              </li>
              <li>
                <a className="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800">
                  Floriaaan
                </a>
              </li>
            </nav>
          </div>
          
        </div>
      </div> */}
      <div className="container flex flex-col items-center justify-between px-5 py-8 mx-auto sm:items-start sm:flex-row ">
        <div className="flex flex-col sm:flex-row">
          <a className="flex items-center justify-center font-medium text-gray-900 dark:text-gray-200 title-font md:justify-start">
            <span className="ml-3 text-xl">OpenMeet</span>
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
                <label
                  // htmlFor="footer-field"
                  className="text-sm leading-7 text-gray-600 dark:text-gray-400"
                >
                  You will be informed of the latest information
                </label>
                {/* <input
                  type="text"
                  id="footer-field"
                  name="footer-field"
                  className="w-full px-4 py-2 leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border-2 border-gray-200 appearance-none dark:text-gray-400 rounded-xl dark:bg-gray-800 dark:border-gray-800 focus:outline-none focus:bg-white focus:border-blue-100"
                /> */}
                <button
                  onClick={sendSubscription}
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
        <span className="inline-flex justify-center mt-4 space-x-5 sm:mt-0 sm:justify-start">
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
