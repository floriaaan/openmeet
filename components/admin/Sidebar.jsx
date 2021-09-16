import React from "react";
import Link from "next/link";
import Image from "next/image";
import { useRouter } from "next/router";

import { UserDropdown } from "components/dropdowns/UserDropdown";
import { MenuIcon, XIcon } from "@heroicons/react/outline";

export const Sidebar = () => {
  const [collapseShow, setCollapseShow] = React.useState("hidden");
  const router = useRouter();
  return (
    <>
      <nav className="relative z-10 flex flex-wrap items-center justify-between px-6 py-4 bg-white shadow-xl dark:bg-gray-900 md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden md:w-64">
        <div className="flex flex-wrap items-center justify-between w-full px-0 mx-auto md:flex-col md:items-stretch md:min-h-full md:flex-nowrap">
          {/* Toggler */}
          <button
            className="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid opacity-50 cursor-pointer rounded-xl md:hidden"
            type="button"
            onClick={() =>
              setCollapseShow("bg-white dark:bg-gray-900 m-2 py-3 px-6")
            }
          >
            <MenuIcon className="w-5 h-5"/>
          </button>
          {/* Brand */}
          <Link href="/">
            <a className="inline-flex items-center p-4 px-0 mr-0 text-sm font-bold text-left text-gray-600 uppercase dark:text-gray-400 md:pb-2 whitespace-nowrap">
              <Image
                src="/logo.svg"
                alt="OpenMeet"
                width={48}
                height={48}
              ></Image>{" "}
              <span className="ml-3">Admin</span>
            </a>
          </Link>
          {/* User */}
          <ul className="flex flex-wrap items-center list-none md:hidden">
            {/* <li className="relative inline-block">
              <NotificationDropdown />
            </li> */}
            <li className="relative inline-block">
              <UserDropdown />
            </li>
          </ul>
          {/* Collapse */}
          <div
            className={
              "md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded-xl " +
              collapseShow
            }
          >
            {/* Collapse header */}
            <div className="block pb-4 mb-4 border-b border-gray-200 border-solid dark:border-gray-800 md:min-w-full md:hidden">
              <div className="flex flex-wrap">
                <div className="w-6/12">
                  <Link href="/">
                    <a className="inline-block p-4 px-0 mr-0 text-sm font-bold text-left text-gray-600 uppercase dark:text-gray-400 md:block md:pb-2 whitespace-nowrap">
                      OpenMeet
                    </a>
                  </Link>
                </div>
                <div className="flex justify-end w-6/12">
                  <button
                    type="button"
                    className="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid opacity-50 cursor-pointer rounded-xl md:hidden"
                    onClick={() => setCollapseShow("hidden")}
                  >
                    <XIcon className="w-4 h-4"/>
                  </button>
                </div>
              </div>
            </div>
            {/* Form */}
            <form className="mt-6 mb-4 md:hidden">
              <div className="pt-0 mb-3">
                <input
                  type="text"
                  placeholder="Search"
                  className="w-full h-12 px-3 py-2 text-base font-normal leading-snug text-gray-600 placeholder-gray-300 bg-white border-0 border-gray-500 border-solid shadow-none outline-none dark:text-gray-400 dark:bg-gray-900 rounded-xl focus:outline-none"
                />
              </div>
            </form>

            {/* Divider */}
            <hr className="my-4 md:min-w-full dark:border-gray-600" />
            {/* Heading */}
            <h6 className="block pt-1 pb-4 text-xs font-bold text-gray-500 no-underline uppercase md:min-w-full">
              Administration
            </h6>
            {/* Navigation */}

            <ul className="flex flex-col space-y-1 list-none md:flex-col md:min-w-full">
              <li className="items-center">
                <Link href="/admin/">
                  <a
                    className={
                      "text-xs uppercase py-3 font-bold block rounded-xl px-5 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-200 " +
                      (router.pathname === "/admin"
                        ? "bg-gray-300 dark:bg-gray-700"
                        : "")
                    }
                  >
                    <i
                      className={
                        "fas fa-tv mr-2 text-sm " +
                        (router.pathname === "/admin"
                          ? "opacity-75"
                          : "text-gray-500")
                      }
                    ></i>{" "}
                    Dashboard
                  </a>
                </Link>
              </li>

              <li className="items-center">
                <Link href="/admin/settings">
                  <a
                    className={
                      "text-xs uppercase py-3 font-bold block rounded-xl px-5 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-200 " +
                      (router.pathname.indexOf("/admin/settings") !== -1
                        ? "bg-gray-300 dark:bg-gray-700"
                        : "")
                    }
                  >
                    <i
                      className={
                        "fas fa-tools mr-2 text-sm " +
                        (router.pathname.indexOf("/admin/settings") !== -1
                          ? "opacity-75"
                          : "text-gray-500")
                      }
                    ></i>{" "}
                    Settings
                  </a>
                </Link>
              </li>

              <li className="items-center">
                <Link href="/admin/themes">
                  <a
                    className={
                      "text-xs uppercase py-3 font-bold block rounded-xl px-5 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-200 " +
                      (router.pathname.indexOf("/admin/themes") !== -1
                        ? "bg-gray-300 dark:bg-gray-700"
                        : "")
                    }
                  >
                    <i
                      className={
                        "fas fa-palette mr-2 text-sm " +
                        (router.pathname.indexOf("/admin/themes") !== -1
                          ? "opacity-75"
                          : "text-gray-500")
                      }
                    ></i>{" "}
                    Themes
                  </a>
                </Link>
              </li>

              <li className="items-center">
                <Link href="/admin/security">
                  <a
                    className={
                      "text-xs uppercase py-3 font-bold block rounded-xl px-5 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-200 " +
                      (router.pathname.indexOf("/admin/security") !== -1
                        ? "bg-gray-300 dark:bg-gray-700"
                        : "")
                    }
                  >
                    <i
                      className={
                        "fas fa-shield-alt mr-2 text-sm " +
                        (router.pathname.indexOf("/admin/security") !== -1
                          ? "opacity-75"
                          : "text-gray-500")
                      }
                    ></i>{" "}
                    Security and privacy
                  </a>
                </Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </>
  );
};
