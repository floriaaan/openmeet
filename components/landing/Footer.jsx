import { ChevronDownIcon } from "@heroicons/react/solid";
import { useAuth } from "@hooks/useAuth";
import useFirestoreToggle from "@hooks/useFirestoreToggle";
import useTranslation from "next-translate/useTranslation";

import Link from "next/link";

export const Footer = () => {
  const { t } = useTranslation("landing");

  const { user } = useAuth();
  const [alreadySubscribed, toggleSubscription] = useFirestoreToggle(
    `newsletter_subscriptions/${user?.uid}`,
    {
      uid: user?.uid,
      fullName: user?.fullName,
      email: user?.email,
      verified: true,
    }
  );

  const navigation = {
    solutions: [
      { name: t("footer.solutions.marketing"), href: "#" },
      { name: t("footer.solutions.analytics"), href: "#" },
      { name: t("footer.solutions.commerce"), href: "#" },
      { name: t("footer.solutions.insights"), href: "#" },
    ],
    support: [
      { name: t("footer.support.pricing"), href: "#" },
      { name: t("footer.support.documentation"), href: "#" },
      { name: t("footer.support.guides"), href: "#" },
      { name: t("footer.support.api-status"), href: "#" },
    ],
    company: [
      { name: t("footer.company.about"), href: "#" },
      { name: t("footer.company.blog"), href: "#" },
      { name: t("footer.company.jobs"), href: "#" },
      { name: t("footer.company.press"), href: "#" },
      { name: t("footer.company.partners"), href: "#" },
    ],
    legal: [
      { name: t("footer.legal.claim"), href: "#" },
      { name: t("footer.legal.privacy"), href: "/legal/privacy-policy" },
      { name: t("footer.legal.terms"), href: "#" },
    ],
    social: [
      {
        name: "GitHub",
        href: "https://github.com/floriaaan",
        icon: (props) => (
          <svg fill="currentColor" viewBox="0 0 24 24" {...props}>
            <path
              fillRule="evenodd"
              d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
              clipRule="evenodd"
            />
          </svg>
        ),
      },
    ],
  };

  return (
    <footer
      className="bg-white border-t-2 dark:bg-black dark:border-gray-800"
      aria-labelledby="footer-heading"
    >
      <h2 id="footer-heading" className="sr-only">
        {t("footer.heading")}
      </h2>
      <div className="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:py-16 lg:px-8">
        <div className="pb-8 xl:grid xl:grid-cols-5 xl:gap-8">
          <div className="grid grid-cols-2 gap-8 xl:col-span-4">
            <div className="md:grid md:grid-cols-2 md:gap-8">
              <div>
                <h3 className="text-sm font-semibold tracking-wider text-gray-400 uppercase dark:text-gray-200">
                  {t("footer.solutions.heading")}
                </h3>
                <ul role="list" className="mt-4 space-y-4">
                  {navigation.solutions.map((item) => (
                    <li key={item.name}>
                      <Link href={item.href}>
                        <a className="text-base text-gray-500 duration-300 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300">
                          {item.name}
                        </a>
                      </Link>
                    </li>
                  ))}
                </ul>
              </div>
              <div className="mt-12 md:mt-0">
                <h3 className="text-sm font-semibold tracking-wider text-gray-400 uppercase dark:text-gray-200">
                  {t("footer.support.heading")}
                </h3>
                <ul role="list" className="mt-4 space-y-4">
                  {navigation.support.map((item) => (
                    <li key={item.name}>
                      <Link href={item.href}>
                        <a className="text-base text-gray-500 duration-300 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300">
                          {item.name}
                        </a>
                      </Link>
                    </li>
                  ))}
                </ul>
              </div>
            </div>
            <div className="md:grid md:grid-cols-2 md:gap-8">
              <div>
                <h3 className="text-sm font-semibold tracking-wider text-gray-400 uppercase dark:text-gray-200">
                  {t("footer.company.heading")}
                </h3>
                <ul role="list" className="mt-4 space-y-4">
                  {navigation.company.map((item) => (
                    <li key={item.name}>
                      <Link href={item.href}>
                        <a className="text-base text-gray-500 duration-300 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300">
                          {item.name}
                        </a>
                      </Link>
                    </li>
                  ))}
                </ul>
              </div>
              <div className="mt-12 md:mt-0">
                <h3 className="text-sm font-semibold tracking-wider text-gray-400 uppercase dark:text-gray-200">
                  {t("footer.legal.heading")}
                </h3>
                <ul role="list" className="mt-4 space-y-4">
                  {navigation.legal.map((item) => (
                    <li key={item.name}>
                      <Link href={item.href}>
                        <a className="text-base text-gray-500 duration-300 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300">
                          {item.name}
                        </a>
                      </Link>
                    </li>
                  ))}
                </ul>
              </div>
            </div>
          </div>
        </div>
        {user && (
          <div className="pt-8 border-t border-gray-200 dark:border-gray-800 lg:flex lg:items-center lg:justify-between xl:mt-0">
            <div>
              <h3 className="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                {t("footer.newsletter.title")}
              </h3>
              <p className="mt-2 text-base text-gray-500">
                {t("footer.newsletter.subtitle")}
              </p>
            </div>
            <div className="mt-4 sm:flex sm:max-w-md lg:mt-0">
              <button
                onClick={toggleSubscription}
                className={
                  "inline-flex justify-end px-6 py-2 ml-4 text-xs text-white transition duration-300 ease-in-out border-0 rounded-xl lg:mt-2 xl:mt-0 focus:outline-none focus:ring-2 focus:ring-offset-2 " +
                  (alreadySubscribed
                    ? "bg-green-500 focus:ring-green-500 hover:bg-green-600"
                    : "bg-blue-500 focus:ring-blue-500 hover:bg-blue-600")
                }
              >
                {alreadySubscribed
                  ? t("footer.newsletter.already")
                  : t("footer.newsletter.button")}
              </button>
            </div>
          </div>
        )}
        <div className="pt-8 mt-8 border-t border-gray-200 dark:border-gray-800 md:flex md:items-center md:justify-between">
          <div className="flex space-x-6 md:order-2">
            {navigation.social.map((item) => (
              <a
                key={item.name}
                href={item.href}
                className="text-base text-gray-500 duration-300 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300"
              >
                <span className="sr-only">{item.name}</span>
                <item.icon className="w-6 h-6" aria-hidden="true" />
              </a>
            ))}
          </div>
          <p className="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
            &copy; {new Date().getFullYear() + " " + t("footer.copyright")}
          </p>
        </div>
      </div>
    </footer>
  );
};
