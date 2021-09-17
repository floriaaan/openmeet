/* eslint-disable @next/next/no-img-element */
import Link from "next/link";

import { useAuth } from "@hooks/useAuth";
import { GuestLayout } from "@components/layouts/GuestLayout";
import useTranslation from "next-translate/useTranslation";

export default function Login() {
  const {
    signinWithGoogle,
    signinWithGitHub,
    signinWithMicrosoft,
    signinWithFacebook,
    signinWithTwitter,
  } = useAuth();

  const { t } = useTranslation("auth");
  return (
    <GuestLayout>
      <div className="w-full max-w-sm mx-auto lg:w-96">
        <div>
          <Link href="/">
            <a>
              <img className="w-auto h-12" src="/logo.svg" alt="OpenMeet" />
            </a>
          </Link>
          <h2 className="mt-6 text-3xl font-extrabold text-gray-900 dark:text-gray-100">
            {t("login")}
          </h2>
        </div>

        <div className="mt-8">
          <div>
            <div>
              <p className="text-sm font-medium text-gray-700 dark:text-gray-300">
                {t("social.title")}
              </p>

              <div className="grid grid-cols-3 gap-3 mt-1">
                <button
                  onClick={signinWithGoogle}
                  className="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-500 duration-300 bg-white border border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 group"
                >
                  <span className="sr-only">{t("social.google")}</span>

                  <img
                    className="w-5 h-5"
                    src="/img/brand/google.svg"
                    alt="Google"
                  ></img>
                </button>
                <button
                  onClick={signinWithFacebook}
                  className="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-500 duration-300 bg-white border border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 group"
                >
                  <span className="sr-only">{t("social.facebook")}</span>
                  <img
                    className="w-5 h-5"
                    src="/img/brand/facebook.svg"
                    alt="Facebook"
                  ></img>
                </button>
                <button
                  onClick={signinWithTwitter}
                  className="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-500 duration-300 bg-white border border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 group"
                >
                  <span className="sr-only">{t("social.twitter")}</span>
                  <img
                    className="w-5 h-5 "
                    src="/img/brand/twitter.svg"
                    alt="Twitter"
                  ></img>
                </button>

                <button
                  onClick={signinWithGitHub}
                  className="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-500 duration-300 bg-white border border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 group"
                >
                  <span className="sr-only">{t("social.github")}</span>
                  <svg
                    className="w-5 h-5 text-black dark:text-white"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fillRule="evenodd"
                      d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                      clipRule="evenodd"
                    />
                  </svg>
                </button>
                <button
                  onClick={signinWithMicrosoft}
                  className="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-500 duration-300 bg-white border border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 group"
                >
                  <span className="sr-only">{t("social.microsoft")}</span>
                  <img
                    className="w-4 h-4 my-0.5 "
                    src="/img/brand/microsoft.png"
                    alt="Microsoft"
                  ></img>
                </button>
              </div>
            </div>

            <div className="relative mt-6">
              <div
                className="absolute inset-0 flex items-center"
                aria-hidden="true"
              >
                <div className="w-full border-t border-gray-300 dark:border-gray-700" />
              </div>
              <div className="relative flex justify-center text-sm">
                <span className="px-2 text-gray-500 bg-white dark:bg-gray-900">
                  {t("form.or")}
                </span>
              </div>
            </div>
          </div>

          <div className="mt-6">
            <form action="#" method="POST" className="space-y-6">
              <div>
                <label
                  htmlFor="email"
                  className="block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                  {t("form.email")}
                </label>
                <div className="mt-1">
                  <input
                    id="email"
                    name="email"
                    type="email"
                    autoComplete="email"
                    required
                    disabled
                    className="block w-full px-3 py-2 placeholder-gray-400 duration-300 border border-gray-300 rounded-md shadow-sm appearance-none dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:focus:outline-none dark:focus:ring-blue-500 dark:focus:border-blue-500 sm:text-sm disabled:opacity-75"
                  />
                </div>
              </div>

              <div className="space-y-1">
                <label
                  htmlFor="password"
                  className="block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                  {t("form.password")}
                </label>
                <div className="mt-1">
                  <input
                    id="password"
                    name="password"
                    type="password"
                    autoComplete="current-password"
                    required
                    disabled
                    className="block w-full px-3 py-2 placeholder-gray-400 duration-300 border border-gray-300 rounded-md shadow-sm appearance-none dark:border-gray-700 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:focus:outline-none dark:focus:ring-blue-500 dark:focus:border-blue-500 sm:text-sm disabled:opacity-75"
                  />
                </div>
              </div>

              <div className="flex items-center justify-between">
                <div className="flex items-center">
                  <input
                    id="remember-me"
                    name="remember-me"
                    type="checkbox"
                    disabled
                    className="w-4 h-4 text-blue-600 border-gray-300 rounded form-checkbox focus:ring-blue-500 disabled:opacity-75"
                  />
                  <label
                    htmlFor="remember-me"
                    className="block ml-2 text-sm text-gray-900 dark:text-gray-300"
                  >
                    {t("form.remember-me")}
                  </label>
                </div>

                <div className="text-sm">
                  <a
                    href="#"
                    className="font-medium text-blue-600 duration-150 hover:text-blue-500"
                  >
                    {t("form.forgot")}
                  </a>
                </div>
              </div>

              <div>
                <button
                  disabled
                  type="submit"
                  className="flex justify-center w-full px-4 py-2 text-sm font-medium text-white duration-300 bg-blue-600 rounded-md shadow-sm cursor-not-allowed hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-70"
                >
                  Currently disabled
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
