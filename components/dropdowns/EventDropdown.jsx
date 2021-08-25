import React, { useEffect, useState } from "react";
import { useAuth } from "@hooks/useAuth";
import Link from "next/link";
import { firestore } from "@libs/firebase";

import { Menu, Transition } from "@headlessui/react";

export const EventDropdown = () => {
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
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button>
            <div className="flex items-center">
              <span className="flex items-center justify-center w-8 h-8 text-sm transition duration-150 ease-in-out bg-purple-200 rounded-full dark:bg-purple-800">
                <i className="text-purple-500 dark:text-purple-400 fas fa-calendar-alt"></i>
              </span>
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
                "bg-white origin-top-right absolute right-0 mt-6 dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-96"
              }
            >
              <div className="block px-4 py-2 text-xs text-gray-400">
                Events
              </div>
              <div className="space-y-2">
                {events?.map((el, key) => (
                  <EventOverview {...el} key={key} />
                ))}
              </div>
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
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const EventOverview = (props) => (
  <Link href={"/event/" + props.slug}>
    <a className="flex flex-row px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-200 hover:text-purple-400 hover:bg-purple-50 dark:hover:bg-purple-900 focus:outline-none ">
      <span className="flex items-center justify-center w-16 h-16 p-5 text-purple-500 bg-purple-200 rounded-xl dark:bg-purple-700">
        <i className="text-2xl fas fa-calendar" />
      </span>
      <div className="flex flex-col ml-2">
        <span className="font-bold text-purple-700 dark:text-purple-400">
          {props.name}
        </span>
        <span className="text-xs text-gray-400 dark:text-gray-300">
          {props.description.length < 100
            ? props.description
            : props.description.slice(0, 100) + " ..."}
        </span>
      </div>
    </a>
  </Link>
);
