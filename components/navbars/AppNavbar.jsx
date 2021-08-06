import React from "react";
import Link from "next/link";
// components

import { useAuth } from "@hooks/useAuth";
import { EventDropdown } from "@components/dropdowns/EventDropdown";
import { UserDropdown } from "@components/dropdowns/UserDropdown";
import { NotificationDropdown } from "@components/dropdowns/NotificationDropdown";
import { GroupDropdown } from "@components/dropdowns/GroupDropdown";

export const AppNavbar = ({ shadowOnNavbar }) => {
  const { user } = useAuth();

  const [navbarOpen, setNavbarOpen] = React.useState(false);
  return (
    <>
      <nav
        className={
          "top-0 z-[48] flex flex-wrap items-center justify-between w-full px-2 py-6 bg-white dark:bg-gray-900 dark:text-gray-300 navbar-expand-lg " +
          // "md:bg-opacity-75 md:dark:bg-opacity-50 md:backdrop-blur sticky" +

          (shadowOnNavbar ? " shadow-md" : " ")
        }
      >
        <div className="container inline-flex flex-wrap items-center justify-between px-4 mx-auto">
          <div className="relative flex items-center justify-between w-full h-12 lg:w-auto lg:static lg:block lg:justify-start">
            <Link href="/">
              <a className="inline-block mr-4 text-sm font-bold leading-relaxed text-gray-700 dark:text-gray-300 whitespace-nowrap">
                <img src="/logo.svg" className="w-12 h-12 select-none"></img>
              </a>
            </Link>
            <button
              className="flex items-center justify-center w-12 h-12 text-xl leading-none transition duration-300 border-solid outline-none cursor-pointer rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 lg:hidden focus:outline-none dark:focus:bg-gray-700 focus:bg-gray-200"
              type="button"
              onClick={() => setNavbarOpen(!navbarOpen)}
            >
              <i className="fas fa-bars"></i>
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
                <input
                  type="search"
                  name="query"
                  placeholder="Search"
                  className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-opacity-75 rounded-full appearance-none dark:text-gray-300 bg-gray-50 dark:bg-gray-800 dark:border-gray-900 focus:outline-none focus:bg-white pr-28 dark:bg-opacity-50 backdrop-blur"
                />
                <div className="absolute right-0 flex flex-row items-center mr-4 space-x-5 hover:border-transparent">
                  <span
                    style={{ opacity: 1 }}
                    className="hidden sm:block text-gray-400 text-sm leading-5 py-0.5 px-1.5 border border-gray-100 dark:border-gray-800 rounded-md bg-white select-none dark:bg-gray-900"
                  >
                    <span className="sr-only">Press </span>
                    <kbd className="font-sans">
                      <abbr className="no-underline">Ctrl</abbr>
                    </kbd>
                    <span className="sr-only"> and </span>
                    <kbd className="font-sans"> + K</kbd>
                    <span className="sr-only"> to search</span>
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
              </div>
            </ul>
            <ul className="flex flex-row justify-center w-full mt-3 space-x-12 list-none lg:space-x-8 lg:justify-start lg:w-auto lg:mt-0 lg:ml-auto">
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
