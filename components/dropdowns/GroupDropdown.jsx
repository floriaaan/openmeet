import React, { useEffect, useState } from "react";

import { useAuth } from "@hooks/useAuth";
import Link from "next/link";
import { firestore } from "@libs/firebase";

import { Menu, Transition } from "@headlessui/react";

export const GroupDropdown = () => {
  const { user } = useAuth();
  const [groups, setGroups] = useState([]);

  const getGroups = async () => {
    firestore
      .collection("groups")
      .get()
      .then((querySnapshot) => {
        const list = [];

        querySnapshot.forEach((doc) => {
          if (!doc.data().private) list.push({ slug: doc.id, ...doc.data() });
        });
        const groups = [];
        for (let i = 0; i < 3; i++) {
          const randomIndex = Math.floor(Math.random() * list.length);
          const randomGroup = list[randomIndex];
          if (
            groups.findIndex((group) => group.slug === randomGroup.slug) === -1
          ) {
            groups.push(randomGroup);
          }
        }

        setGroups(groups);
      });
  };

  useEffect(() => {
    getGroups();
  }, []);

  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button>
            <div className="flex items-center">
              <span className="flex items-center justify-center w-8 h-8 text-sm transition duration-150 ease-in-out bg-green-200 rounded-full dark:bg-green-800">
                <i className="text-green-500 fas fa-users"></i>
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
              <div className="block px-4 py-2 text-xs text-gray-400">Group</div>

              <div className="space-y-2">
                {groups?.map((el, key) => (
                  <GroupOverview {...el} key={key} />
                ))}
              </div>
              <div className="border-t border-gray-100 dark:border-gray-800"></div>

              <Link href="/group/create">
                <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-800">
                  <i className="mr-2 fas fa-plus"></i>
                  Create a group
                </a>
              </Link>
              <Link href="/group/all">
                <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-800">
                  <i className="mr-2 fas fa-users"></i>
                  All groups
                </a>
              </Link>
              <Link href="/group/settings">
                <a className="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-800">
                  <i className="mr-2 fas fa-cog"></i>
                  Manage your groups
                </a>
              </Link>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const GroupOverview = (props) => (
  <Link href={"/group/" + props.slug}>
    <a className="flex flex-row px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-200 hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900 focus:outline-none ">
      <span className="flex items-center justify-center w-16 h-16 p-5 text-green-500 bg-green-200 rounded-xl dark:bg-green-700">
        <i className="text-2xl fas fa-users" />
      </span>
      <div className="flex flex-col ml-2">
        <span className="font-bold text-green-700 dark:text-green-400">
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
