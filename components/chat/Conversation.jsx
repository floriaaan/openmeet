import { firestore } from "@libs/firebase";
import React, { useEffect, useRef, useState } from "react";
import { Message } from "@components/chat/Message";
import { useAuth } from "@hooks/useAuth";
import Link from "next/link";
import { AddDropdown } from "./AddDropdown";
import { useRouter } from "next/router";

export const Conversation = ({ id }, props) => {
  const { user } = useAuth();

  const [chat, setChat] = useState();
  const [displayableMsg, setDisplayableMsg] = useState([]);

  const [newMessage, setNewMessage] = useState("");

  const prepareDisplayableMsg = (messages = []) => {
    let displayable = [];
    let _tmp = [];
    messages.forEach((message, index) => {
      if (
        _tmp[_tmp.length - 1]?.sender === message?.sender ||
        _tmp.length === 0
      ) {
        _tmp.push(message);
        if (index === messages.length - 1) {
          displayable.push(_tmp);
        }
      } else {
        displayable.push(_tmp);
        _tmp = [message];
      }
    });
    setDisplayableMsg(displayable);
  };

  useEffect(() => {
    // prepareDisplayableMsg(props.messages);

    firestore
      .collection("chats")
      .doc(id)
      .onSnapshot(async (snapshot) => {
        const data = snapshot.data();
        if (data) {
          setChat(data);
          prepareDisplayableMsg(data?.messages);
        }
      });
  }, [id]);

  const handleOnSubmit = async (e) => {
    e.preventDefault();

    const trimmedMessage = newMessage.trim();
    if (trimmedMessage) {
      // Add new message in Firestore
      const doc = await firestore.collection("chats").doc(id).get();
      const data = doc.data();
      data.messages.push({
        content: trimmedMessage,
        createdAt: new Date().toISOString(),
        sender: user.uid,
      });

      await firestore.collection("chats").doc(id).update(data);
      await firestore
        .collection("chats")
        .doc(id)
        .set({ lastMessageAt: new Date().toISOString() }, { merge: true });

      // Clear input field
      setNewMessage("");
      // Scroll down to the bottom of the list
      bottomListRef.current.scrollIntoView({ behavior: "smooth" });
    }
  };

  const inputRef = useRef();
  const bottomListRef = useRef();
  useEffect(() => {
    if (inputRef.current) {
      inputRef.current.focus();
    }
  }, [inputRef]);

  return (
    <div className="h-full m-6 space-y-6">
      <div className="inline-flex items-center justify-between w-full px-6 ">
        <Link href="/chat">
          <div className="flex items-center justify-center w-12 h-12 transition duration-500 bg-gray-200 cursor-pointer rounded-xl dark:bg-gray-800 dark:text-white hover:bg-yellow-500 dark:hover:text-yellow-500">
            <i className="fas fa-arrow-left" />
          </div>
        </Link>
        {chat?.members ? (
          <>
            <h3 className="hidden text-sm font-bold text-yellow-600 dark:text-yellow-500 lg:block">
              {chat?.members?.length < 4
                ? chat?.members?.map(
                    (member, index) =>
                      member.fullName +
                      (index === chat.members.length - 1 ? "" : ", ")
                  )
                : chat?.members?.length + " members"}
            </h3>
            <h3 className="block text-sm font-bold text-yellow-600 dark:text-yellow-500 lg:hidden">
              {chat?.members?.length + " members"}
            </h3>
          </>
        ) : (
          <div>Loading...</div>
        )}
        <AddDropdown members={chat?.members} chatId={id} />
      </div>
      <div className="px-3 py-1 bg-gray-100 lg:p-6 dark:bg-gray-900 rounded-xl">
        {displayableMsg?.map((messageGroup, key) => {
          return (
            <React.Fragment key={key}>
              <Message
                list={messageGroup}
                sender={chat?.members?.find(
                  (member) => member.uid === messageGroup[0].sender
                )}
              />
              {key < displayableMsg.length - 1 && (
                <hr className="m-2 border-gray-300 dark:border-gray-700" />
              )}
            </React.Fragment>
          );
        })}
        <div ref={bottomListRef} />
      </div>
      <form
        onSubmit={handleOnSubmit}
        className="inline-flex justify-between w-full px-4 py-3 bg-gray-200 rounded-xl dark:bg-gray-800 dark:text-white"
      >
        <input
          ref={inputRef}
          type="text"
          value={newMessage}
          onChange={(e) => setNewMessage(e.target.value)}
          placeholder="Type your message here..."
          className="w-full bg-gray-200 outline-none dark:bg-gray-800"
        />
        <button
          type="submit"
          disabled={!newMessage}
          className="text-sm font-semibold tracking-wider text-gray-400 uppercase transition-colors disabled:text-gray-500 hover:text-gray-900 dark:hover:text-white"
        >
          Send
        </button>
      </form>
    </div>
  );
};

export const NewConversation = (props) => {
  const { user } = useAuth();
  const [selectedMembers, setSelectedMembers] = useState([]);
  const [newMessage, setNewMessage] = useState("");

  const router = useRouter();

  const inputRef = useRef();
  useEffect(() => {
    if (inputRef.current) {
      inputRef.current.focus();
    }
  }, [inputRef]);

  const handleOnSubmit = async (e) => {
    e.preventDefault();

    const trimmedMessage = newMessage.trim();
    if (trimmedMessage && selectedMembers.length > 1) {
      // Add new message in Firestore
      firestore
        .collection("chats")
        .add({
          members: selectedMembers,
          messages: [
            {
              content: trimmedMessage,
              createdAt: new Date().toISOString(),
              sender: user.uid,
            },
          ],
          lastMessageAt: new Date().toISOString(),
        })
        .then(function (docRef) {
          router.push("/chat/" + docRef.id);
        })
        .catch(function (error) {
          console.error("Error adding document: ", error);
        });
      
    }
  };

  return (
    <div className="h-full m-6 space-y-6">
      <div className="inline-flex items-center justify-between w-full px-6 ">
        <Link href="/chat">
          <div className="flex items-center justify-center w-12 h-12 transition duration-500 bg-gray-200 cursor-pointer rounded-xl dark:bg-gray-800 dark:text-white hover:bg-yellow-500 dark:hover:text-yellow-500">
            <i className="fas fa-arrow-left" />
          </div>
        </Link>

        <h3 className="text-sm font-bold text-yellow-600 dark:text-yellow-500">
          New chat
        </h3>

        <AddDropdown
          members={[
            { uid: user.uid, fullName: user.fullName, photoUrl: user.photoUrl },
          ]}
          setList={setSelectedMembers}
        />
      </div>
      <form
        onSubmit={handleOnSubmit}
        className="inline-flex justify-between w-full px-4 py-3 bg-gray-200 rounded-xl dark:bg-gray-800 dark:text-white"
      >
        <input
          ref={inputRef}
          type="text"
          value={newMessage}
          onChange={(e) => setNewMessage(e.target.value)}
          placeholder="Type your message here..."
          className="w-full bg-gray-200 outline-none dark:bg-gray-800"
        />
        <button
          type="submit"
          disabled={!newMessage}
          className="text-sm font-semibold tracking-wider text-gray-400 uppercase transition-colors disabled:text-gray-500 hover:text-gray-900 dark:hover:text-white"
        >
          Send
        </button>
      </form>
    </div>
  );
};
