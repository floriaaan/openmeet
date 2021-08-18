import React from "react";
import Link from "next/link";
import { createPopper } from "@popperjs/core";

export const MeetupImportDropdown = () => {
  // dropdown props
  const [dropdownPopoverShow, setDropdownPopoverShow] = React.useState(false);
  const btnDropdownRef = React.createRef();
  const popoverDropdownRef = React.createRef();
  const openDropdownPopover = () => {
    createPopper(btnDropdownRef.current, popoverDropdownRef.current, {
      placement: "top-end",
    });
    setDropdownPopoverShow(true);
  };
  const closeDropdownPopover = () => {
    setDropdownPopoverShow(false);
  };

  const [url, setUrl] = React.useState("");

  return (
    <>
      <button
        id="meetup-display-btn"
        type="button"
        ref={btnDropdownRef}
        onClick={(e) => {
          e.preventDefault();
          dropdownPopoverShow ? closeDropdownPopover() : openDropdownPopover();
        }}
        className="flex-shrink px-6 py-2 text-sm text-white bg-red-600 border-0 rounded-xl focus:outline-none hover:bg-red-700"
      >
        <i className="mr-2 fab fa-meetup" />
        Import from meetup.com
      </button>

      <div
        ref={popoverDropdownRef}
        className={
          (dropdownPopoverShow ? "block " : "hidden ") +
          "bg-white dark:bg-gray-900 text-base z-50 float-left p-3 list-none text-left rounded-xl shadow-lg min-w-96"
        }
      >
        <label
                    htmlFor="url"
                    className="text-sm leading-7 text-gray-600 dark:text-gray-400"
                  >
                    Meetup Url
                  </label>
        <input
          type="text"
          id="url"
          name="url"
          value={url}
          onChange={(e) => setUrl(e.target.value)}
          className="w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 "
        />
      </div>
    </>
  );
};
