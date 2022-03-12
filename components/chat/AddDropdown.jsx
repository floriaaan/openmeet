/* eslint-disable @next/next/no-img-element */
import React, { useEffect, useState } from "react";
import { firestore } from "libs/firebase";
import { userImgFallback } from "libs/imgOnError";
import { Menu, Transition } from "@headlessui/react";
import { collection, doc, getDocs, updateDoc } from "firebase/firestore";
import { PlusIcon } from "@heroicons/react/solid";

export const AddDropdown = ({ members, chatId, list, setList }) => {
  const handleAdd = async (e) => {
    await updateDoc(
      doc(firestore, `chats/${chatId}`),
      { ...data },
      { merge: true }
    );
  };

  const getUsers = async () => {
    const snap = await getDocs(collection(firestore, "users"));
    let _tmp = [];
    snap.forEach((user) => {
      let tmp = user.data();
      _tmp.push({
        photoUrl: tmp.photoUrl,
        fullName: tmp.fullName,
        uid: user.id,
      });
    });

    setUsers(_tmp);
  };

  const [users, setUsers] = useState([]);
  const [selectedUsers, setSelectedUsers] = useState([]);

  useEffect(() => {
    setSelectedUsers(members);
    getUsers();
  }, [members]);

  // useEffect(() => {
  //   if (setList) {
  //     setList(selectedUsers);
  //   }
  // }, [selectedUsers, setList]);

  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button className="flex items-center justify-center w-12 h-12 transition duration-500 bg-gray-200 cursor-pointer rounded-xl dark:bg-gray-800 dark:text-white hover:bg-yellow-500 dark:hover:text-yellow-500">
            <PlusIcon className="w-6 h-6" />
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
                "bg-white dark:bg-gray-900 origin-top-right absolute right-0  mt-6 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-96"
              }
            >
              <div className="inline-flex items-center justify-between w-full px-4 py-2 mb-2 text-xs text-gray-400 border-b border-gray-200 dark:border-gray-800">
                <span>Add to the Conversation</span>
                {!setList && (
                  <span
                    className="inline-flex items-center px-2 py-1 text-yellow-600 transition duration-300 cursor-pointer dark:text-yellow-300 rounded-xl hover:text-yellow-500 hover:bg-yellow-100 dark:hover:bg-yellow-900"
                    onClick={handleAdd}
                  >
                    <PlusIcon className="w-3 h-3 mr-1" />
                    Add
                  </span>
                )}
              </div>
              <div className="flex flex-col px-2 space-y-1">
                {users?.map((user, index) => (
                  <UserOverview
                    {...user}
                    selected={
                      selectedUsers?.findIndex(
                        (selected) => selected.uid === user.uid
                      ) !== -1 &&
                      members?.findIndex(
                        (chatMember) => chatMember.uid === user.uid
                      ) === -1
                    }
                    isAlreadyMember={
                      members?.findIndex(
                        (chatMember) => chatMember.uid === user.uid
                      ) !== -1
                    }
                    onClick={() => {
                      if (
                        members?.findIndex(
                          (chatMember) => chatMember.uid === user.uid
                        ) === -1
                      ) {
                        if (selectedUsers?.indexOf(user) === -1) {
                          setSelectedUsers([...selectedUsers, user]);
                        } else {
                          setSelectedUsers(
                            selectedUsers?.filter(
                              (_user) => _user.uid !== user.uid
                            )
                          );
                        }
                      }
                    }}
                    key={index}
                  />
                ))}
              </div>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const UserOverview = ({
  photoUrl,
  fullName,
  onClick,
  selected,
  isAlreadyMember,
}) => {
  return (
    <div
      onClick={onClick}
      className={
        "inline-flex items-center justify-between px-2 py-1 text-gray-400 transition duration-300 rounded-lg cursor-pointer hover:scale-95 dark:hover:bg-gray-700 hover:bg-gray-200 " +
        (isAlreadyMember ? " scale-95 bg-gray-100 dark:bg-gray-800" : "") +
        (selected ? " scale-95" : "")
      }
    >
      <div className="inline-flex items-center">
        <img
          src={photoUrl}
          alt={fullName}
          className="w-8 rounded-full"
          onError={(e) => userImgFallback(e, fullName)}
        />
        <div className="ml-3 text-sm text-gray-700 dark:text-gray-300">
          {fullName || "Name not provided"}
        </div>
      </div>
      {selected && !isAlreadyMember && <div>&#10003;</div>}
      {isAlreadyMember && <div className="text-xs">Already in the Chat</div>}
    </div>
  );
};
