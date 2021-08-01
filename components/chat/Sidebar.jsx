import { firestore } from "@libs/firebase";
import { useAuth } from "@hooks/useAuth";
import { useEffect, useState } from "react";

import Link from "next/link";
import { formatDistance } from "date-fns";
import { user } from "firebase-functions/lib/providers/auth";

export const Sidebar = (props) => {
  const { user } = useAuth();

  const [chats, setChats] = useState([]);
  useEffect(() => {
    if (user)
      firestore
        .collection("chats")
        .where("members", "array-contains", {
          fullName: user.fullName,
          uid: user.uid,
          photoUrl: user.photoUrl,
        })
        .onSnapshot((snapshot) => {
          setChats(
            snapshot.docs.map((doc) => {
              return { ...doc.data(), id: doc.id };
            })
          );
        });
  }, [user]);

  return (
    <div
      className={
        "flex-col  bg-gray-100 shadow-lg dark:bg-gray-900  " +
        (props.display ? " w-full lg:w-96 " : " hidden lg:flex w-96")
      }
    >
      <div className="inline-flex items-center justify-between w-full px-3 py-6 mb-3 text-xl text-gray-600 border-b border-gray-300 dark:text-gray-400 dark:border-gray-700">
        <span className="w-12"></span>
        <span>
          <i className="mr-3 fas fa-comments "></i>
          <span className="antialiased font-bold tracking-widest uppercase">
            Chat
          </span>
        </span>
        <span>
          <Link href="/chat/new">
            <div className="flex items-center justify-center w-12 h-12 transition duration-500 bg-gray-200 cursor-pointer rounded-xl dark:bg-gray-800 dark:text-white hover:bg-yellow-500 dark:hover:text-yellow-500">
              <i className="fas fa-plus" />
            </div>
          </Link>
        </span>
      </div>
      <div className="p-3 m-3 bg-gray-300 shadow-inner rounded-xl dark:bg-gray-800">
        {chats.map((el, key) => (
          <ChatOverview
            {...el}
            key={key}
            isFirst={key === 0}
            isLast={key === chats.length - 1}
            auth={user}
          />
        ))}
      </div>
    </div>
  );
};

const ChatOverview = (props) => {
  let rounded = " ";
  if (props.isFirst) rounded += "rounded-t-xl rounded-b";
  if (props.isLast) rounded += "rounded-b-xl rounded-t";
  if (!props.isFirst && !props.isLast) rounded += "rounded";
  return (
    <Link href={"/chat/" + props.id}>
      <a
        className={
          "flex flex-row w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-200 hover:text-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900 focus:outline-none" +
          rounded
        }
      >
        <span className="flex items-center justify-center w-16 h-16 p-5 text-yellow-500 bg-yellow-200 rounded-full dark:bg-yellow-700">
          <i className="text-2xl fas fa-users" />
        </span>
        <div className="flex flex-col ml-2">
          <span className="text-sm font-bold text-yellow-700 dark:text-yellow-400">
            {props?.members?.length < 4
              ? props?.members?.map((member, index) => {
                  return member.uid !== props.auth.uid
                    ? member.fullName +
                        (index === props.members.length - 1 ? "" : ", ")
                    : null;
                })
              : props?.members?.length + " members"}
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
