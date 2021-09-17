import React from "react";
import Link from "next/link";

import { useAuth } from "@hooks/useAuth";
import { EventDropdown } from "@components/dropdowns/EventDropdown";
import { UserDropdown } from "@components/dropdowns/UserDropdown";
import { NotificationDropdown } from "@components/dropdowns/NotificationDropdown";
import { GroupDropdown } from "@components/dropdowns/GroupDropdown";

import algoliasearch from "algoliasearch/lite";
const searchClient = algoliasearch(
  process.env.NEXT_PUBLIC_ALGOLIA_APP_ID,
  process.env.NEXT_PUBLIC_ALGOLIA_SEARCH_API_KEY
);

import { MenuIcon } from "@heroicons/react/outline";
import useTranslation from "next-translate/useTranslation";
import { LocaleDropdown } from "@components/dropdowns/LocaleDropdown";

export const AppNavbar = ({ shadowOnNavbar }) => {
  const { user } = useAuth();
  const { t } = useTranslation("common");

  const navbarSearchRef = React.useRef(null);
  const [navbarOpen, setNavbarOpen] = React.useState(false);
  return (
    <>
      <nav
        className={
          "top-0 z-[48] sticky flex flex-wrap items-center justify-between w-full px-2 py-6 bg-white dark:bg-black dark:text-gray-300 navbar-expand-lg " +
          // "md:bg-opacity-75 md:dark:bg-opacity-50 md:backdrop-blur sticky" +
          (shadowOnNavbar ? " shadow-md" : " ")
        }
      >
        <div className="container inline-flex flex-wrap items-center justify-between px-4 mx-auto">
          <div className="relative flex items-center justify-between w-full h-12 lg:w-auto lg:static lg:block lg:justify-start">
            <Link href="/">
              <a className="inline-block mr-4 text-sm font-bold leading-relaxed text-gray-700 dark:text-gray-300 whitespace-nowrap">
                {/* eslint-disable-next-line @next/next/no-img-element */}
                <img
                  src="/logo.svg"
                  alt="OpenMeet"
                  className="w-12 h-12 select-none"
                ></img>
              </a>
            </Link>
            <button
              className="flex items-center justify-center w-12 h-12 text-xl leading-none transition duration-300 border-solid outline-none cursor-pointer rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 lg:hidden focus:outline-none dark:focus:bg-gray-700 focus:bg-gray-200"
              type="button"
              onClick={() => setNavbarOpen(!navbarOpen)}
            >
              <MenuIcon className="w-6 h-6" />
            </button>
          </div>
          <div
            className={
              "lg:flex flex-grow items-center  lg:bg-opacity-0 mt-3 lg:mt-0 lg:shadow-none" +
              (navbarOpen ? " block" : " hidden")
            }
            id="example-navbar-warning"
          >
            <ul className="flex flex-row mr-auto list-none ">
              <div className="relative flex flex-row items-center w-full text-gray-600">
                {/* <InstantSearch searchClient={searchClient} indexName="group"> */}
                <input
                  ref={navbarSearchRef}
                  type="search"
                  name="query"
                  autoComplete="off"
                  placeholder={t("search")}
                  className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition duration-300 ease-in-out border-gray-300 rounded-full appearance-none bg-gray-50 form-input dark:text-gray-300 dark:bg-gray-800 dark:border-gray-900 focus:outline-none focus:ring-blue-300 focus:border-blue-500 pr-28 dark:bg-opacity-50 backdrop-blur focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-500"
                />
                <div className="absolute right-0 flex flex-row items-center mr-4 space-x-5 hover:border-transparent">
                  <span
                    style={{ opacity: 1 }}
                    className="hidden sm:block text-gray-400 text-sm leading-5 py-0.5 px-1.5 border border-gray-100 dark:border-gray-800 rounded-md bg-white select-none dark:bg-gray-900"
                  >
                    <span className="sr-only">
                      {t("common:sr-only.press")}{" "}
                    </span>
                    <kbd className="font-sans">
                      <abbr className="no-underline">Ctrl</abbr>
                    </kbd>
                    <span className="sr-only"> {t("sr-only.and")} </span>
                    <kbd className="font-sans"> + K</kbd>
                    <span className="sr-only"> {t("sr-only.to-search")}</span>
                  </span>
                  <button type="submit" className="text-gray-500">
                    <svg
                      className="w-4 h-4 fill-current"
                      x="0px"
                      y="0px"
                      viewBox="0 0 56.966 56.966"
                      width="512px"
                      height="512px"
                    >
                      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path>
                    </svg>
                  </button>
                </div>
                {/* <Menu as="div" className="relative flex items-center h-full">
                    <Transition
                      show={
                        navbarSearchRef?.current?.value !== undefined &&
                        navbarSearchRef.current.value !== ""
                      }
                      enter="transform transition duration-100 ease-in"
                      enterFrom="opacity-0 scale-95"
                      enterTo="opacity-100 scale-100"
                      leave="transform transition duration-75 ease-out"
                      leaveFrom="opacity-100 scale-100"
                      leaveTo="opacity-0 scale-95"
                    >
                      <Menu.Items
                        static
                        className={
                          "bg-white border absolute left-0 -ml-72 mt-8 dark:bg-gray-900 text-base z-50 p-3 list-none text-left rounded-xl shadow-lg w-full md:w-96"
                        }
                      >
                        <CustomHits />
                      </Menu.Items>
                    </Transition>
                  </Menu>
                </InstantSearch> */}
              </div>
            </ul>
            <ul className="flex flex-row justify-center w-full mt-3 space-x-12 list-none lg:space-x-8 lg:justify-start lg:w-auto lg:mt-0 lg:ml-auto">
              <li className="flex items-center">
                <span className="inline-flex rounded-md">
                  <LocaleDropdown />
                </span>
              </li>
              {user && (
                <li className="flex items-center">
                  <span className="inline-flex rounded-md">
                    <NotificationDropdown />
                  </span>
                </li>
              )}
              <li className="flex items-center">
                <span className="inline-flex rounded-md">
                  <GroupDropdown />
                </span>
              </li>
              <li className="flex items-center">
                <span className="inline-flex rounded-md">
                  <EventDropdown />
                </span>
              </li>

              <li className="flex items-center">
                <span className="inline-flex rounded-md">
                  <UserDropdown />
                </span>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </>
  );
};
