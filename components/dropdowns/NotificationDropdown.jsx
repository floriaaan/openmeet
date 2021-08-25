import React from "react";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";

import Link from "next/link";
import { formatDistance } from "date-fns";
import Router from "next/router";

import { Menu, Transition } from "@headlessui/react";

export const NotificationDropdown = () => {
  const { user } = useAuth();

  const [chats, setChats] = React.useState([]);
  const [notifications, setNotifications] = React.useState([]);

  const getChats = async () => {
    firestore
      .collection("chats")
      .get()
      .then((querySnapshot) => {
        const list = [];

        querySnapshot.forEach((doc) => {
          let data = doc.data();
          if (data.members.find((member) => member.uid === user.uid)) {
            list.push({ id: doc.id, ...doc.data() });
          }
        });

        setChats(list);
      });
  };

  React.useEffect(() => {
    getChats();
    if (user?.uid)
      firestore
        .collection("notifications")
        .where("uid", "==", user.uid)
        .onSnapshot((querySnapshot) => {
          const list = [];

          querySnapshot.forEach((doc) => {
            list.push({ id: doc.id, ...doc.data() });
          });
          setNotifications(list);
        });
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [user?.uid]);

  const readAllNotifications = async () => {
    if (user?.uid)
      firestore
        .collection("notifications")
        .where("uid", "==", user.uid)
        .get()
        .then(function (querySnapshot) {
          querySnapshot.forEach(function (doc) {
            doc.ref.delete();
          });
        });
  };

  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button>
            <span className="flex items-center justify-center w-8 h-8 text-sm transition duration-150 ease-in-out bg-yellow-100 rounded-full dark:bg-yellow-800 focus:outline-none ">
              <i className="text-yellow-400 fas fa-bell"></i>
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
                "bg-white origin-top-right absolute right-0 mt-6 dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-96"
              }
            >
              <div className="flex flex-row items-center justify-between px-4 py-2 text-xs text-gray-400">
                Messages
                <Link href="/chat">
                  <a className="flex flex-row items-center px-2 py-1 text-yellow-600 transition duration-300 dark:text-yellow-300 rounded-xl hover:text-yellow-700 dark:hover:text-yellow-200 hover:bg-yellow-100 dark:hover:bg-yellow-900">
                    See more
                    <i className="mt-0.5 ml-2 fas fa-arrow-right" />
                  </a>
                </Link>
              </div>
              <div className="flex flex-col items-center justify-center w-full min-h-[6rem] space-y-3">
                {chats.length > 0
                  ? chats.map(
                      (chat, index) =>
                        index < 2 && <ChatOverview {...chat} key={index} />
                    )
                  : "No messages yet"}
              </div>

              <div className="flex flex-row items-center justify-between px-4 py-2 text-xs text-gray-400">
                Notifications
                <button
                  onClick={readAllNotifications}
                  className="flex flex-row items-center px-2 py-1 text-yellow-600 transition duration-300 dark:text-yellow-300 rounded-xl hover:text-yellow-700 dark:hover:text-yellow-200 hover:bg-yellow-100 dark:hover:bg-yellow-900"
                >
                  Read all
                  <i className="mt-0.5 ml-2 fas fa-check" />
                </button>
              </div>
              <div className="flex flex-col items-center justify-center w-full min-h-[6rem] space-y-3">
                {notifications.length > 0
                  ? notifications.map((notification, index) => (
                      <NotificationOverview {...notification} key={index} />
                    ))
                  : "No notifications yet"}
              </div>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const ChatOverview = (props) => {
  return (
    <Link href={"/chat/" + props.id}>
      <a className="flex flex-row w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-200 hover:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900 focus:outline-none ">
        <span className="flex items-center justify-center w-16 h-16 p-5 text-yellow-500 bg-yellow-200 rounded-xl dark:bg-yellow-700">
          <i className="text-2xl fas fa-users" />
        </span>
        <div className="flex flex-col ml-2">
          <span className="font-bold text-yellow-600 dark:text-yellow-400">
            {props.messages?.[props.messages.length - 1]?.content.slice(0, 30) +
              (props.messages?.[props.messages.length - 1]?.content.length > 29
                ? " ..."
                : "")}
          </span>
          <span className="text-xs text-gray-400 dark:text-gray-300">
            from{" "}
            {
              props.members.find(
                (member) =>
                  member.uid ===
                  props.messages?.[props.messages.length - 1]?.sender
              )?.fullName
            }
          </span>
          <span className="text-xs text-gray-400 dark:text-gray-300">
            sent{" "}
            {formatDistance(
              new Date(props.messages?.[props.messages.length - 1]?.createdAt),
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

const NotificationOverview = (props) => {
  const url = "/" + props?.type + "/" + props?.data?.id;

  return (
    <div
      onClick={() => {
        //todo: remove notification
        Router.push(url);
      }}
      className="flex flex-row w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out cursor-pointer dark:text-gray-200 hover:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900 focus:outline-none "
    >
      <span className="flex items-center justify-center w-8 h-8 p-5 text-yellow-500 bg-yellow-200 rounded-xl dark:bg-yellow-700">
        {props?.data?.action === "new_message" ? (
          <i className="text-lg fas fa-envelope" />
        ) : (
          <i className="text-lg fas fa-bell" />
        )}
      </span>
      <div className="flex flex-col ml-2">
        <span className="font-bold text-yellow-600 dark:text-yellow-400">
          {props?.data?.action === "new_message"
            ? "New message"
            : props?.data?.action === "new_participant"
            ? props.data.message
            : "New notification"}
        </span>

        <span className="text-xs text-gray-400 dark:text-gray-300">
          sent{" "}
          {formatDistance(new Date(props?.createdAt), new Date(), {
            addSuffix: true,
          })}
        </span>
      </div>
    </div>
  );
};
