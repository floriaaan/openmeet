/* eslint-disable @next/next/no-img-element */
import React, { Fragment, useEffect, useState } from "react";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";

import Link from "next/link";
import { formatDistance } from "date-fns";
import Router from "next/router";

import { Menu, Transition } from "@headlessui/react";
import { userImgFallback } from "@libs/imgOnError";
import {
  collection,
  deleteDoc,
  getDocs,
  onSnapshot,
  query,
  where,
} from "firebase/firestore";
import {
  BellIcon,
  ChatAlt2Icon,
  CheckIcon,
  ChevronRightIcon,
  MailIcon,
} from "@heroicons/react/outline";
import useTranslation from "next-translate/useTranslation";

export const NotificationDropdown = () => {
  const { t } = useTranslation("common");
  const { user } = useAuth();

  const [chats, setChats] = React.useState([]);
  const [notifications, setNotifications] = React.useState([]);

  const getChats = async () => {
    getDocs(
      query(
        collection(firestore, "chats"),
        where("members", "array-contains", {
          fullName: user.fullName,
          uid: user.uid,
          photoUrl: user.photoUrl,
        })
      )
    ).then((querySnapshot) => {
      const list = [];

      querySnapshot.forEach((doc) => {
        list.push({ id: doc.id, ...doc.data() });
      });

      setChats(list);
    });
  };

  React.useEffect(() => {
    getChats();
    if (user?.uid) {
      const unsub = onSnapshot(
        query(
          collection(firestore, "notifications"),
          where("uid", "==", user.uid)
        ),
        (querySnapshot) => {
          const list = [];

          querySnapshot.forEach((doc) => {
            list.push({ id: doc.id, ...doc.data() });
          });
          setNotifications(list);
        }
      );
      return () => unsub();
    }
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [user?.uid]);

  const readAllNotifications = async () => {
    if (user?.uid)
      getDocs(
        query(
          collection(firestore, "notifications"),
          where("uid", "==", user.uid)
        )
      ).then(function (querySnapshot) {
        querySnapshot.forEach(function (doc) {
          deleteDoc(doc.ref);
        });
      });
  };

  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button>
            <span className="flex items-center justify-center w-8 h-8 text-sm transition duration-150 ease-in-out bg-yellow-100 rounded-full dark:bg-yellow-800 focus:outline-none ">
              <BellIcon className="w-4 h-4 text-yellow-400" />
              {notifications?.length > 0 && (
                <span
                  style={{ marginTop: "-22px", marginRight: "-22px" }}
                  className="absolute flex items-center justify-center"
                >
                  <span className="w-3 h-3 bg-red-400 rounded-full opacity-75 animate-ping" />
                  <span className="absolute w-2 h-2 bg-red-600 rounded-full" />
                </span>
              )}
            </span>
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
              <div className="flex flex-row items-center justify-between px-4 py-2 text-xs text-gray-400">
                {t("dropdowns.notification.message.title")}
                <Link href="/chat">
                  <a className="flex flex-row items-center px-2 py-1 text-yellow-600 transition duration-300 dark:text-yellow-300 rounded-xl hover:text-yellow-700 dark:hover:text-yellow-200 hover:bg-yellow-100 dark:hover:bg-yellow-900">
                    {t("dropdowns.notification.message.more")}
                    <ChevronRightIcon className="mt-0.5 ml-2 w-4 h-4" />
                  </a>
                </Link>
              </div>
              <div className="grid grid-cols-3 gap-3 px-4 w-full mx-auto min-h-[6rem]">
                {chats.length > 0 ? (
                  chats.map(
                    (chat, index) =>
                      index < 3 && (
                        <ChatOverview
                          {...chat}
                          key={index}
                          isUnread={
                            notifications.findIndex(
                              (e) => e.data.id === chat.id
                            ) !== -1
                          }
                        />
                      )
                  )
                ) : (
                  <div className="flex items-center justify-center w-full h-full col-span-3">
                    {t("dropdowns.notification.message.no-message")}
                  </div>
                )}
              </div>

              <div className="flex flex-row items-center justify-between px-4 py-2 text-xs text-gray-400">
                {t("dropdowns.notification.notification.title")}
                <button
                  onClick={readAllNotifications}
                  className="flex flex-row items-center px-2 py-1 text-yellow-600 transition duration-300 dark:text-yellow-300 rounded-xl hover:text-yellow-700 dark:hover:text-yellow-200 hover:bg-yellow-100 dark:hover:bg-yellow-900"
                >
                  {t("dropdowns.notification.notification.read-all")}
                  <CheckIcon className="mt-0.5 ml-2 w-4 h-4" />
                </button>
              </div>
              <div className="flex flex-col items-center justify-center w-full min-h-[6rem] space-y-3">
                {notifications.length > 0
                  ? notifications.map((notification, index) => (
                      <NotificationOverview {...notification} key={index} />
                    ))
                  : t("dropdowns.notification.notification.no-notification")}
              </div>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const ChatOverview = ({ members, id, isUnread, messages }) => {
  const { t } = useTranslation("common");

  const [displayableUser, setDisplayableUser] = useState(null);
  const { user } = useAuth();

  useEffect(() => {
    if (members) {
      const displayable = members.find((member) => member.uid !== user?.uid);
      setDisplayableUser(displayable);
    }
  }, [members, user?.uid]);

  return (
    <Link href={"/chat/" + id}>
      <a className="flex flex-col items-center justify-center w-full min-h-[6rem] p-2 duration-300 rounded-xl hover:bg-yellow-50 dark:hover:bg-yellow-900">
        <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white rounded-full">
          {displayableUser ? (
            <img
              className="rounded-full"
              alt={displayableUser?.displayName?.[0] || "?"}
              src={displayableUser?.photoUrl}
              onError={(e) => userImgFallback(e, displayableUser?.fullName)}
            />
          ) : (
            <span className="flex items-center justify-center w-16 h-16 p-5 text-yellow-500 bg-yellow-200 rounded-full dark:bg-yellow-700">
              <ChatAlt2Icon className="w-8 h-8" />
            </span>
          )}
          {isUnread && (
            <span className="absolute bottom-0 right-0 flex items-center justify-center">
              <span className="w-4 h-4 bg-red-400 rounded-full opacity-75 animate-ping" />
              <span className="absolute w-3 h-3 bg-red-600 rounded-full" />
            </span>
          )}
        </div>
        <div className="flex flex-col items-center justify-center w-full px-1">
          {members?.map((e, key) => (
            <Fragment key={key}>
              {/* {e.uid !== user?.uid && ( */}
              <span className="text-xs text-center tracking-tight leading-[1.12rem] text-gray-800 dark:text-gray-200">
                {e.fullName || t("name-not-provided")}
              </span>
              {/* )} */}
            </Fragment>
          )) || t("dropdowns.notification.message.no-member")}
          <span className="text-[0.55rem] leading-4">
            {formatDistance(
              new Date(messages?.[messages.length - 1]?.createdAt),
              new Date(),
              {
                addSuffix: true,
              }
            )}
          </span>
        </div>
      </a>
    </Link>
  );
};

const NotificationOverview = ({ type, data, createdAt }) => {
  const { t } = useTranslation("common");

  const url = "/" + type + "/" + data?.id;

  return (
    <div
      onClick={() => {
        //todo: remove notification
        Router.push(url);
      }}
      className="flex flex-row w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out cursor-pointer dark:text-gray-200 hover:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900 focus:outline-none "
    >
      <span className="flex items-center justify-center w-8 h-8 p-5 text-yellow-500 bg-yellow-200 rounded-xl dark:bg-yellow-700">
        {data?.action === "new_message" ? (
          <MailIcon className="w-4 h-4" />
        ) : (
          <BellIcon className="w-4 h-4" />
        )}
      </span>
      <div className="flex flex-col ml-2">
        <span className="font-bold text-yellow-600 dark:text-yellow-400">
          {data?.action === "new_message"
            ? t("dropdowns.notification.notification.new-message")
            : data?.action === "new_participant"
            ? data.message
            : t("dropdowns.notification.notification.new-notification")}
        </span>

        <span className="text-xs text-gray-400 dark:text-gray-300">
          {t("sent") + " "}
          {formatDistance(new Date(createdAt), new Date(), {
            addSuffix: true,
          })}
        </span>
      </div>
    </div>
  );
};
