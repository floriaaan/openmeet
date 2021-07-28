import React from "react";
import { createPopper } from "@popperjs/core";
import { useAuth } from "@hooks/useAuth";
import { useTheme } from "next-themes";

import Link from "next/link";

export const UserDropdown = () => {
  // dropdown props
  const [dropdownPopoverShow, setDropdownPopoverShow] = React.useState(false);
  const btnDropdownRef = React.createRef();
  const popoverDropdownRef = React.createRef();
  const openDropdownPopover = () => {
    createPopper(btnDropdownRef.current, popoverDropdownRef.current, {
      placement: "bottom-end",
    });
    setDropdownPopoverShow(true);
  };
  const closeDropdownPopover = () => {
    setDropdownPopoverShow(false);
  };

  const { user, signout } = useAuth();

  const { theme, setTheme } = useTheme();

  return (
    <>
      <a
        className="cursor-pointer"
        ref={btnDropdownRef}
        onClick={(e) => {
          e.preventDefault();
          dropdownPopoverShow ? closeDropdownPopover() : openDropdownPopover();
        }}
      >
        <div className="flex items-center">
          {user ? (
            <span className="inline-flex items-center justify-center w-8 h-8 text-sm rounded-full">
              <img
                alt={user?.fullName}
                className="w-full h-full align-middle border-none rounded-full "
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
      </a>
      <div
        ref={popoverDropdownRef}
        className={
          (dropdownPopoverShow ? "block " : "hidden ") +
          "bg-white dark:bg-black text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-48"
        }
      >
        <div className="block px-4 py-2 text-xs text-gray-400">Dark Mode</div>
        <a
          onClick={() => setTheme(theme === "dark" ? "light" : "dark")}
          className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out cursor-pointer dark:text-gray-300 focus:outline-none focus:bg-gray-100 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800"
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

            <Link href={"/profile/" + user.uid} >
              <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 focus:outline-none focus:bg-gray-100 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-800">
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
            <div className="block px-4 py-2 text-xs text-gray-400">Connect</div>
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
      </div>
    </>
  );
};
