import React, { createRef, useEffect, useState } from "react";
import { createPopper } from "@popperjs/core";
import { firestore } from "@libs/firebase";

export const AddDropdown = ({ members, chatId }) => {
  // dropdown props
  const [dropdownPopoverShow, setDropdownPopoverShow] = useState(false);
  const btnDropdownRef = createRef();
  const popoverDropdownRef = createRef();
  const openDropdownPopover = () => {
    createPopper(btnDropdownRef.current, popoverDropdownRef.current, {
      placement: "bottom-start",
    });
    setDropdownPopoverShow(true);
  };
  const closeDropdownPopover = () => {
    setDropdownPopoverShow(false);
  };

  const handleAdd = async (e) => {
    await firestore
      .collection("chats")
      .doc(chatId)
      .set({ members: selectedUsers }, { merge: true });
  };

  const getUsers = async () => {
    const users = await firestore.collection("users").get();
    let _tmp =
      users.docs.map((user) => {
        let tmp = user.data();
        return { photoUrl: tmp.photoUrl, fullName: tmp.fullName, uid: user.id };
      }) || [];

    setUsers(_tmp);
  };

  const [users, setUsers] = useState([]);
  const [selectedUsers, setSelectedUsers] = useState([]);

  useEffect(() => {
    setSelectedUsers(members);
    getUsers();
  }, []);

  return (
    <>
      <div
        className="px-4 py-3 transition duration-500 bg-gray-200 cursor-pointer rounded-xl dark:bg-gray-800 dark:text-white hover:bg-yellow-500 dark:hover:text-yellow-500"
        ref={btnDropdownRef}
        onClick={(e) => {
          e.preventDefault();
          dropdownPopoverShow ? closeDropdownPopover() : openDropdownPopover();
        }}
      >
        <i className="fas fa-plus" />
      </div>
      <div
        ref={popoverDropdownRef}
        className={
          (dropdownPopoverShow ? "block " : "hidden ") +
          "bg-white dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-96"
        }
      >
        <div className="inline-flex items-center justify-between w-full px-4 py-2 mb-2 text-xs text-gray-400 border-b border-gray-200 dark:border-gray-800">
          <span>Add to the Conversation</span>
          <span
            className="inline-flex items-center px-2 py-1 text-yellow-600 transition duration-300 cursor-pointer dark:text-yellow-300 rounded-xl hover:text-yellow-500 hover:bg-yellow-100 dark:hover:bg-yellow-900"
            onClick={handleAdd}
          >
            <i className="mr-1 fas fa-plus"></i>
            Add
          </span>
        </div>
        <div className="flex flex-col px-2 space-y-1">
          {users?.map((user) => (
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
                  if (selectedUsers.indexOf(user) === -1) {
                    setSelectedUsers([...selectedUsers, user]);
                  } else {
                    setSelectedUsers(
                      selectedUsers.filter((_user) => _user.uid !== user.uid)
                    );
                  }
                }
              }}
            />
          ))}
        </div>
      </div>
    </>
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
        <img src={photoUrl} alt={fullName} className="w-8 rounded-full" />
        <div className="ml-3 text-sm text-gray-700 dark:text-gray-300">
          {fullName}
        </div>
      </div>
      {selected && !isAlreadyMember && <div>&#10003;</div>}
      {isAlreadyMember && <div className="text-xs">Already in the Chat</div>}
    </div>
  );
};
