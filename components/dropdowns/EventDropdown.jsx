import React, { useEffect, useState } from "react";
import { useAuth } from "@hooks/useAuth";
import Link from "next/link";
import { firestore } from "@libs/firebase";

import { Menu, Transition } from "@headlessui/react";
import { collection, getDocs } from "firebase/firestore";
import { eventImgFallback } from "@libs/imgOnError";
import { CalendarIcon, PlusIcon } from "@heroicons/react/outline";
import useTranslation from "next-translate/useTranslation";
import { classes } from "@libs/classes";

export const EventDropdown = () => {
  const { t } = useTranslation("common");
  const { user } = useAuth();

  const [events, setEvents] = useState([]);

  const getEvents = async () => {
    getDocs(collection(firestore, "events")).then((querySnapshot) => {
      const list = [];

      querySnapshot.forEach((doc) => {
        list.push({ slug: doc.id, ...doc.data() });
      });
      const events = [];
      let i = 0;
      while (events.length < 3 && i < list.length) {
        const randomIndex = Math.floor(Math.random() * list.length);
        const randomEvent = list[randomIndex];
        if (
          list.length > 0 &&
          events.findIndex((group) => group.slug === randomEvent.slug) === -1 &&
          !randomEvent.private
        ) {
          events.push(randomEvent);
        }
        i++;
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
              <span
                className={classes(
                  "btn-purple rounded-full p-2",
                  open &&
                    "text-purple-800 bg-purple-300 dark:bg-purple-700 dark:text-purple-300"
                )}
              >
                <CalendarIcon className="w-4 h-4 " />
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
                "bg-white md:origin-top-right fixed md:absolute left-0 md:left-auto md:right-0 mt-6 dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-full md:w-96"
              }
            >
              <div className="block px-4 py-2 text-xs text-gray-400">
                {t("dropdowns.event.title")}
              </div>
              <div className="grid grid-cols-3 gap-3 px-4 mb-3 w-full mx-auto min-h-[6rem]">
                {events?.map((el, key) => (
                  <EventOverview {...el} key={key} />
                ))}
              </div>
              <div className="border-t border-gray-100 dark:border-gray-800"></div>

              <div className="flex flex-col">
                <Link href="/event/create">
                  <a className="inline-flex items-center px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 focus:outline-none hover:text-purple-400 hover:bg-purple-50 dark:hover:bg-purple-800">
                    <PlusIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                    {t("dropdowns.event.create")}
                  </a>
                </Link>
                <Link href="/event/all">
                  <a className="inline-flex items-center px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 focus:outline-none hover:text-purple-400 hover:bg-purple-50 dark:hover:bg-purple-800">
                    <CalendarIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                    {t("dropdowns.event.all")}
                  </a>
                </Link>
              </div>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const EventOverview = ({
  name,
  description,
  startDate,
  endDate,
  slug,
  picture,
}) => (
  <Link href={"/event/" + slug}>
    <a className="flex flex-col items-center justify-start w-full min-h-[6rem] h-full p-2 duration-300 rounded-xl hover:bg-purple-50 dark:hover:bg-purple-900">
      <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white rounded-full">
        {picture ? (
          <>
            {/* eslint-disable-next-line @next/next/no-img-element */}
            <img
              className="object-cover h-full rounded-full"
              alt={name}
              src={picture}
              onError={(e) => eventImgFallback(e, name)}
            />
          </>
        ) : (
          <span className="flex items-center justify-center w-16 h-16 p-5 text-purple-500 bg-purple-200 rounded-full dark:bg-purple-700">
            <CalendarIcon className="w-8 h-8" />
          </span>
        )}
      </div>
      <div className="flex flex-col items-center justify-center w-full px-1">
        <span className="text-[0.7rem] overflow-ellipsis text-center tracking-tight leading-[1.12rem] text-gray-800 dark:text-gray-200">
          {name || t("name-not-provided")}
        </span>
        {/* <span className="text-[0.6rem] leading-4">
            from {format(new Date(props.startDate), "Pp")} to{" "}
            {format(new Date(props.endDate), "Pp")}
          </span> */}
      </div>
    </a>
  </Link>
);
