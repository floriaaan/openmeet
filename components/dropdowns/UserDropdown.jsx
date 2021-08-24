/* eslint-disable @next/next/no-img-element */
import React from "react";
import { useAuth } from "@hooks/useAuth";
import { useTheme } from "next-themes";

import { Menu, Transition } from "@headlessui/react";

import Link from "next/link";
import { imgErrorFallback } from "@libs/imgOnError";

export const UserDropdown = () => {
  const { user, signout } = useAuth();
  const { theme, setTheme } = useTheme();

  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button>
            <div className="flex items-center">
              {user ? (
                <span className="inline-flex items-center justify-center w-8 h-8 text-sm rounded-full">
                  <img
                    alt={user?.fullName}
                    onError={(e) => imgErrorFallback(e, user.fullName)}
                    className="w-full h-full align-middle border-none rounded-full select-none "
                    src={
                      user?.photoUrl
                        ? user.photoUrl
                        : "https://ui-avatars.com/api/?name=" +
                          user?.fullName +
                          "&color=007bff&background=054880"
                    }
                  />
                </span>
              ) : (
                <span className="flex items-center justify-center w-8 h-8 text-sm transition duration-150 ease-in-out bg-red-200 rounded-full dark:bg-red-800 focus:outline-none focus:border-gray-300 dark:border-gray-800">
                  <i className="text-red-500 fas fa-user"></i>
                </span>
              )}
            </div>
          </Menu.Button>
          <Transition show={open}
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
                "bg-white origin-top-right absolute right-0 mt-6 dark:bg-gray-900 text-base z-50  py-2 list-none text-left rounded-xl shadow-lg w-48"
              }
            >
              <div className="block px-4 py-2 text-xs text-gray-400">
                Dark Mode
              </div>
              <a
                onClick={() => setTheme(theme === "dark" ? "light" : "dark")}
                className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out cursor-pointer dark:text-gray-300 focus:outline-none hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800"
              >
                {theme === "light" ? (
                  <i className="mr-2 fas fa-moon"></i>
                ) : (
                  <i className="mr-2 fas fa-sun"></i>
                )}
                Toggle Dark Mode
              </a>

              {user ? (
                <>
                  <div className="block px-4 py-2 text-xs text-gray-400">
                    Manage Account
                  </div>

                  <Link href={"/profile/" + user.uid}>
                    <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 focus:outline-none hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800">
                      <i className="mr-2 fas fa-user"></i>
                      Profile
                    </a>
                  </Link>

                  <a
                    className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out cursor-pointer dark:text-gray-300 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800"
                    onClick={signout}
                  >
                    <i className="mr-2 fas fa-lock"></i>
                    Logout
                  </a>

                  <div className="block px-4 py-2 text-xs text-gray-400">
                    OpenMeet Settings
                  </div>
                  <Link href="/admin">
                    <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800">
                      <i className="mr-2 fas fa-cog"></i>
                      Settings
                    </a>
                  </Link>
                </>
              ) : (
                <>
                  <div className="block px-4 py-2 text-xs text-gray-400">
                    Connect
                  </div>
                  <Link href="/auth">
                    <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:bg-red-50 dark:hover:bg-red-800">
                      Login
                    </a>
                  </Link>
                  {/* <Link href="/auth">
              <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:bg-red-50 dark:hover:bg-red-800">
                Register
              </a>
            </Link> */}
                </>
              )}
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};
