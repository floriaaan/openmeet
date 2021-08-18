import React, { useEffect, useState } from "react";
import { createPopper } from "@popperjs/core";
import { useAuth } from "@hooks/useAuth";
import Link from "next/link";
import { firestore } from "@libs/firebase";

export const EventDropdown = () => {
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

  const { user } = useAuth();

  const [events, setEvents] = useState([]);

  const getEvents = async () => {
    firestore
      .collection("events")
      .get()
      .then((querySnapshot) => {
        const list = [];

        querySnapshot.forEach((doc) => {
          list.push({ slug: doc.id, ...doc.data() });
        });
        const events = [];
        for (let i = 0; i < 3; i++) {
          const randomIndex = Math.floor(Math.random() * list.length);
          const randomEvent = list[randomIndex];
          if (
            events.findIndex((group) => group.slug === randomEvent.slug) === -1
          ) {
            events.push(randomEvent);
          }
        }

        setEvents(events);
      });
  };

  useEffect(() => {
    getEvents();
  }, []);

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
          <span className="flex items-center justify-center w-8 h-8 text-sm transition duration-150 ease-in-out bg-purple-200 rounded-full dark:bg-purple-800">
            <i className="text-purple-500 dark:text-purple-400 fas fa-calendar-alt"></i>
          </span>
        </div>
      </a>
      <div
        ref={popoverDropdownRef}
        className={
          (dropdownPopoverShow ? "block " : "hidden ") +
          "bg-white dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-96"
        }
      >
        <div className="block px-4 py-2 text-xs text-gray-400">Events</div>
        <div className="space-y-2"></div>
        <div className="border-t border-gray-100 dark:border-gray-800"></div>

        <Link href="/event/create">
          <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 focus:outline-none hover:text-purple-400 hover:bg-purple-50 dark:hover:bg-purple-800">
            <i className="mr-2 fas fa-plus"></i>
            Create an event
          </a>
        </Link>
        <Link href="/event/all">
          <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 focus:outline-none hover:text-purple-400 hover:bg-purple-50 dark:hover:bg-purple-800">
            <i className="mr-2 fas fa-calendar-alt"></i>
            All events
          </a>
        </Link>
      </div>
    </>
  );
};
