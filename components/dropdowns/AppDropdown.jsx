import React from "react";
import Link from "next/link";
import { createPopper } from "@popperjs/core";

export const AppDropdown = () => {
  // dropdown props
  const [dropdownPopoverShow, setDropdownPopoverShow] = React.useState(false);
  const btnDropdownRef = React.createRef();
  const popoverDropdownRef = React.createRef();
  const openDropdownPopover = () => {
    createPopper(btnDropdownRef.current, popoverDropdownRef.current, {
      placement: "bottom-start",
    });
    setDropdownPopoverShow(true);
  };
  const closeDropdownPopover = () => {
    setDropdownPopoverShow(false);
  };
  return (
    <>
      <a
        className="flex items-center px-3 py-4 text-xs font-bold uppercase hover:text-gray-500 text-gray-700 dark:text-gray-300 lg:py-2"
        href="#"
        ref={btnDropdownRef}
        onClick={(e) => {
          e.preventDefault();
          dropdownPopoverShow ? closeDropdownPopover() : openDropdownPopover();
        }}
      >
        Demo Pages
      </a>
      <div
        ref={popoverDropdownRef}
        className={
          (dropdownPopoverShow ? "block " : "hidden ") +
          "bg-white dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg min-w-48"
        }
      >
        <span
          className={
            "text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-gray-400"
          }
        >
          Admin Layout
        </span>
        <Link href="/admin/dashboard">
          <a
            href="#"
            className={
              "text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-300"
            }
          >
            Dashboard
          </a>
        </Link>
        <Link href="/admin/settings">
          <a
            href="#"
            className={
              "text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-300"
            }
          >
            Settings
          </a>
        </Link>
        <Link href="/admin/tables">
          <a
            href="#"
            className={
              "text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-300"
            }
          >
            Tables
          </a>
        </Link>
        <Link href="/admin/maps">
          <a
            href="#"
            className={
              "text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-300"
            }
          >
            Maps
          </a>
        </Link>
        <div className="h-0 mx-4 my-2 border border-solid border-gray-100 dark:border-gray-800" />
        <span
          className={
            "text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-gray-400"
          }
        >
          Auth Layout
        </span>
        <Link href="/auth/login">
          <a
            href="#"
            className={
              "text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-300"
            }
          >
            Login
          </a>
        </Link>
        <Link href="/auth/register">
          <a
            href="#"
            className={
              "text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-300"
            }
          >
            Register
          </a>
        </Link>
        <div className="h-0 mx-4 my-2 border border-solid border-gray-100 dark:border-gray-800" />
        <span
          className={
            "text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-gray-400"
          }
        >
          No Layout
        </span>
        <Link href="/landing">
          <a
            href="#"
            className={
              "text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-300"
            }
          >
            Landing
          </a>
        </Link>
        <Link href="/profile">
          <a
            href="#"
            className={
              "text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 dark:text-gray-300"
            }
          >
            Profile
          </a>
        </Link>
      </div>
    </>
  );
};

