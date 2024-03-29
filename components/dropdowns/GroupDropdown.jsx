import React, { useEffect, useState } from "react";

import { useAuth } from "@hooks/useAuth";
import Link from "next/link";
import { firestore } from "@libs/firebase";

import { Menu, Transition } from "@headlessui/react";
import { collection, getDocs, query, where } from "firebase/firestore";
import { CogIcon, PlusIcon, UserGroupIcon } from "@heroicons/react/outline";
import useTranslation from "next-translate/useTranslation";
import { classes } from "@libs/classes";

export const GroupDropdown = () => {
  const { t } = useTranslation("common");
  const { user } = useAuth();
  const [groups, setGroups] = useState([]);

  const [isGroupAdmin, setIsGroupAdmin] = useState(false);

  const getGroups = async () => {
    getDocs(collection(firestore, "groups")).then((querySnapshot) => {
      const list = [];

      querySnapshot.forEach((doc) => {
        if (!doc.data().private) list.push({ slug: doc.id, ...doc.data() });
      });
      const groups = [];
      for (let i = 0; i < 3; i++) {
        const randomIndex = Math.floor(Math.random() * list.length);
        const randomGroup = list[randomIndex];
        if (
          list.length > 0 &&
          groups.findIndex((group) => group.slug === randomGroup.slug) === -1 &&
          !randomGroup.private
        ) {
          groups.push(randomGroup);
        }
      }

      setGroups(groups);
    });
  };

  const getIsGroupAdmin = async () => {
    if (user) {
      getDocs(
        query(
          collection(firestore, "groups"),
          where("admin.uid", "==", user.uid)
        )
      ).then((querySnapshot) => {
        const groups = [];
        querySnapshot.forEach((doc) => {
          groups.push({ slug: doc.id, ...doc.data() });
        });
        setIsGroupAdmin(groups.length > 0);
      });
    }
  };

  useEffect(() => {
    getGroups();
    getIsGroupAdmin();
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [user]);

  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button>
            <div className="flex items-center">
            <span
                className={classes(
                  "btn-green rounded-full p-2",
                  open &&
                    "text-green-800 bg-green-300 dark:bg-green-700 dark:text-green-300"
                )}
              >
                <UserGroupIcon className="w-4 h-4 " />
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
                {t("dropdowns.group.title")}
              </div>

              <div className="grid grid-cols-3 gap-3 px-4 mb-3 w-full mx-auto min-h-[6rem]">
                {groups?.map((el, key) => (
                  <GroupOverview {...el} key={key} />
                ))}
              </div>
              <div className="border-t border-gray-100 dark:border-gray-800"></div>
              <div className="flex flex-col">
                <Link href="/group/create">
                  <a className="inline-flex items-center px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-800">
                    <PlusIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                    {t("dropdowns.group.create")}
                  </a>
                </Link>
                <Link href="/group/all">
                  <a className="inline-flex items-center px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-800">
                    <UserGroupIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                    {t("dropdowns.group.all")}
                  </a>
                </Link>
                {isGroupAdmin && (
                  <Link href="/group/settings">
                    <a className="inline-flex items-center px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-800">
                      <CogIcon className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800" />
                      {t("dropdowns.group.manage")}
                    </a>
                  </Link>
                )}
              </div>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const GroupOverview = ({ slug, name }) => (
  <Link href={"/group/" + slug}>
    <a className="flex flex-col items-center justify-start w-full min-h-[6rem] p-2 duration-300 rounded-xl hover:bg-green-50 dark:hover:bg-green-900">
      <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white bg-white rounded-full">
        <span className="flex items-center justify-center w-16 h-16 p-5 text-green-500 bg-green-200 rounded-full dark:bg-green-700">
          <UserGroupIcon className="w-8 h-8" />
        </span>
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
