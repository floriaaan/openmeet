/* eslint-disable @next/next/no-img-element */
import React from "react";
import { useAuth } from "@hooks/useAuth";
import { useTheme } from "next-themes";

import { Menu, Transition } from "@headlessui/react";

import Link from "next/link";
import { userImgFallback } from "@libs/imgOnError";
import {
  CogIcon,
  LoginIcon,
  LogoutIcon,
  MoonIcon,
  SunIcon,
  UserAddIcon,
  UserIcon,
} from "@heroicons/react/outline";
import useTranslation from "next-translate/useTranslation";
import { classes } from "@libs/classes";

export const UserDropdown = () => {
  const { t } = useTranslation("common");

  const { user, signout } = useAuth();
  const { theme, setTheme } = useTheme();

  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button>
            <div className="flex items-center">
              {user ? (
                <span
                  className={classes(
                    "btn-red rounded-full p-px",
                    open &&
                      "text-red-800 bg-red-300 dark:bg-red-700 dark:text-red-300"
                  )}
                >
                  <img
                    alt={user?.fullName}
                    onError={(e) => userImgFallback(e, user.fullName)}
                    className="align-middle border-none rounded-full select-none w-7 h-7 "
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
                  <UserIcon className="w-5 h-5 text-red-500" />
                </span>
              )}
            </div>
          </Menu.Button>
          <Transition
            show={open}
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
                "bg-white md:origin-top-right fixed md:absolute left-0 md:left-auto md:right-0 mt-6 dark:bg-gray-900 text-base z-50 float-left pb-2 list-none text-left rounded-xl shadow-lg w-full md:w-96"
              }
            >
              {user ? (
                <>
                  <Link href={"/profile/" + user?.uid}>
                    <a className="flex flex-col items-center justify-center w-full min-h-[6rem] px-2 py-4 duration-300 rounded-t-xl hover:bg-red-50 dark:hover:bg-red-900">
                      <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white bg-white rounded-full">
                        {/* eslint-disable-next-line @next/next/no-img-element */}
                        <img
                          className="object-cover h-full rounded-full"
                          alt={user.fullName}
                          src={user.photoUrl}
                          onError={(e) => userImgFallback(e, user?.fullName)}
                        />
                      </div>
                      <div className="flex flex-col items-center justify-center w-full px-1">
                        <span className="text-[0.7rem] overflow-ellipsis text-center tracking-tight leading-[1.12rem] text-gray-800 dark:text-gray-200">
                          {user?.fullName || t("name-not-provided")}
                        </span>
                      </div>
                    </a>
                  </Link>

                  <a
                    className="inline-flex items-center w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out cursor-pointer dark:text-gray-300 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800"
                    onClick={signout}
                  >
                    <LogoutIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                    {t("dropdowns.user.logout")}
                  </a>

                  {user.superuser && (
                    <>
                      <div className="block px-4 py-2 text-xs text-gray-400">
                        {t("dropdowns.user.superuser.settings")}
                      </div>
                      <Link href="/admin">
                        <a className="inline-flex items-center w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800">
                          <CogIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800 " />
                          Settings
                        </a>
                      </Link>
                    </>
                  )}
                </>
              ) : (
                <>
                  <div className="block px-4 py-2 pt-4 text-xs text-gray-400">
                    {t("dropdowns.user.connect")}
                  </div>
                  <Link href="/auth">
                    <a className="inline-flex items-center w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800">
                      <LoginIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800 " />
                      {t("dropdowns.user.login")}
                    </a>
                  </Link>
                  <Link href="/auth/register">
                    <a className="inline-flex items-center w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800">
                      <UserAddIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                      {t("dropdowns.user.register")}
                    </a>
                  </Link>
                  {/* <Link href="/auth">
              <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:bg-red-50 dark:hover:bg-red-800">
                Register
              </a>
            </Link> */}
                </>
              )}
              <div className="block px-4 py-2 text-xs text-gray-400">
                {t("dropdowns.user.dark-mode.title")}
              </div>
              <button
                onClick={() => setTheme(theme === "dark" ? "light" : "dark")}
                className="flex items-center justify-between w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out cursor-pointer dark:text-gray-300 focus:outline-none hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800"
              >
                <span className="inline-flex items-center">
                  {theme === "light" ? (
                    <MoonIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                  ) : (
                    <SunIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                  )}
                  {t("dropdowns.user.dark-mode.toggle")}
                </span>
                <span
                  style={{ opacity: 1 }}
                  className="hidden sm:block text-gray-400 text-sm leading-5 py-0.5 px-1.5 border border-gray-100 dark:border-gray-800 rounded-md bg-white select-none dark:bg-gray-900"
                >
                  <span className="sr-only">{t("sr-only.press")} </span>
                  <kbd className="font-sans">
                    <abbr className="no-underline">Ctrl</abbr>
                  </kbd>
                  <span className="sr-only"> {t("sr-only.and")} </span>
                  <kbd className="font-sans"> + D</kbd>
                  <span className="sr-only"> {t("sr-only.dark-mode")}</span>
                </span>
              </button>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};
