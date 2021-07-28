import React from "react";
import { createPopper } from "@popperjs/core";

export const NotificationDropdown = () => {
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
        <span className="flex items-center justify-center w-8 h-8 text-sm transition duration-150 ease-in-out bg-yellow-100 rounded-full dark:bg-yellow-800 focus:outline-none ">
          <i className="text-yellow-400 fas fa-bell"></i>
        </span>
      </a>
      <div
        ref={popoverDropdownRef}
        className={
          (dropdownPopoverShow ? "block " : "hidden ") +
          "bg-white dark:bg-black text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-96"
        }
      >
        <div className="flex flex-row items-center justify-between px-4 py-2 text-xs text-gray-400">
          Messages
          <a
            href="/message"
            className="flex flex-row items-center px-2 py-1 text-yellow-300 transition duration-300 rounded-xl hover:text-yellow-500 hover:bg-yellow-100 dark:hover:bg-yellow-900"
          >
            <svg
              className="w-4 h-4 mr-1"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="2"
                d="M14 5l7 7m0 0l-7 7m7-7H3"
              ></path>
            </svg>
            messages.more
          </a>
        </div>
        <div className="flex items-center justify-center w-full h-24 px-6">
          No messages
        </div>

        <div className="block px-4 py-2 text-xs text-gray-400">
          Notifications
        </div>
      </div>
    </>
  );
};
