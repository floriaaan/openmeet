import React from "react";
import { createPopper } from "@popperjs/core";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";

import Link from "next/link";
import { formatDistance } from "date-fns";

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
  const { user } = useAuth();

  const [chats, setChats] = React.useState([]);

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
          <Link href="/chat">
            <a className="flex flex-row items-center px-2 py-1 text-yellow-600 transition duration-300 dark:text-yellow-300 rounded-xl hover:text-yellow-500 hover:bg-yellow-100 dark:hover:bg-yellow-900">
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
              See more
            </a>
          </Link>
        </div>
        <div className="flex flex-col items-center justify-center w-full min-h-[6rem] space-y-3">
          {chats.length > 0
            ? chats.map((chat, index) => <ChatOverview {...chat} key={index} />)
            : "No messages yet"}
        </div>

        <div className="block px-4 py-2 text-xs text-gray-400">
          Notifications
        </div>
      </div>
    </>
  );
};

const ChatOverview = (props) => {
  return (
    <Link href={"/chat/" + props.id}>
      <a className="flex flex-row w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-200 hover:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900 focus:outline-none ">
        <span className="flex items-center justify-center w-16 h-16 p-5 text-yellow-500 bg-yellow-200 rounded dark:bg-yellow-700">
          <i className="text-2xl fas fa-users" />
        </span>
        <div className="flex flex-col ml-2">
          <span className="font-bold text-yellow-700 dark:text-yellow-400">
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
