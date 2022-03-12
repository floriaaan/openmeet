/* eslint-disable @next/next/no-img-element */
import { AppLayout } from "components/layouts/AppLayout";
import { AvatarGroup } from "components/ui/AvatarGroup";
import { useAuth } from "hooks/useAuth";
import { firestore } from "libs/firebase";
import { format } from "date-fns";
import {
  addDoc,
  collection,
  deleteDoc,
  doc,
  getDoc,
  getDocs,
  onSnapshot,
  query,
  setDoc,
  where,
} from "firebase/firestore";

import ReactMarkdown from "react-markdown";
import Link from "next/link";
import { useEffect, useState } from "react";
import { CalendarIcon, CheckIcon, ClockIcon, LocationMarkerIcon, PaperClipIcon, PlusIcon, UserGroupIcon, VideoCameraIcon, XIcon } from "@heroicons/react/outline";

export default function EventPage(props) {
  const [participants, setParticipants] = useState([]);
  const { user } = useAuth();

  const toggleParticipation = async () => {
    const eventParticipantRef = doc(
      firestore,
      `events/${props.slug}/participants/${user.uid}`
    );

    if (participants.find((participant) => participant.uid === user.uid)) {
      await deleteDoc(eventParticipantRef);
      getDocs(
        query(
          collection(firestore, "notifications"),
          where("uid", "==", props.host.uid),
          where("data.id", "==", props.slug),
          where("data.participant.uid", "==", user.uid)
        )
      ).then((snapshot) => snapshot.forEach((doc) => deleteDoc(doc.ref)));
    } else {
      await setDoc(eventParticipantRef, {
        fullName: user.fullName,
        photoUrl: user.photoUrl,
        uid: user.uid,
        createdAt: new Date().toISOString(),
      });

      await addDoc(collection(firestore, "notifications"), {
        createdAt: new Date().toISOString(),
        type: "event",
        uid: props.host.uid,
        data: {
          action: "new_participant",
          id: props.slug,
          message: `${user.fullName} will participate on ${props.name}`,
          type: "event",
          participant: {
            uid: user.uid,
            photoUrl: user.photoUrl,
            fullName: user.fullName,
          },
        },
      });
    }
  };

  useEffect(() => {
    const unsub = onSnapshot(
      collection(firestore, `events/${props.slug}/participants`),
      (querySnapshot) => {
        let participants = [];
        querySnapshot.forEach((doc) => {
          participants.push({ id: doc.id, ...doc.data() });
        });
        setParticipants(participants);
      }
    );

    return () => {
      unsub();
    };
  }, [props.slug]);

  return (
    <AppLayout>
      <div className="flex flex-col w-full h-full bg-gray-100 dark:bg-black">
        <div className="md:sticky  md:top-24 z-[47] flex flex-col w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
          <p className="mb-2 text-sm text-gray-600 dark:text-gray-400">
            {format(new Date(props.startDate), "PPPPp")}
          </p>
          <h2 className="mb-2 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
            {props.name}
          </h2>
          <div className="flex flex-col space-y-2 md:items-center md:flex-row md:space-y-0 md:space-x-3">
            <Link href={"/profile/" + props.host.uid}>
              <a className="inline-flex items-center px-1 py-1 pr-6 space-x-3 transition duration-300 bg-red-100 rounded-full cursor-pointer hover:bg-red-200 max-w-max dark:bg-red-900 dark:hover:bg-opacity-60 dark:bg-opacity-30">
                {props.host.photoUrl && (
                  <img
                    src={props.host.photoUrl}
                    alt={props.host.fullName}
                    className="w-12 h-12 rounded-full select-none"
                  ></img>
                )}
                <div className="flex flex-col">
                  <p className="text-xs text-gray-600 select-none dark:text-gray-500">
                    Hosted by
                  </p>
                  <p className="text-sm font-extrabold text-red-700 select-none dark:text-red-300">
                    {props.host.fullName}
                  </p>
                </div>
              </a>
            </Link>
            <button
              onClick={toggleParticipation}
              className={
                "inline-flex items-center px-1 py-1 pr-6 space-x-3 transition bg-purple-100 rounded-full cursor-pointer group  max-w-max dark:bg-purple-900  dark:bg-opacity-30 " +
                (participants.find(
                  (participant) => participant.uid === user?.uid
                )
                  ? "hover:bg-red-200 dark:hover:bg-red-900 duration-500"
                  : "hover:bg-purple-200 dark:hover:bg-opacity-60 duration-300")
              }
            >
              {participants.find(
                (participant) => participant.uid === user?.uid
              ) ? (
                <div className="inline-flex items-center space-x-3">
                  <span className="flex items-center justify-center w-8 h-8 transition duration-500 bg-purple-300 rounded-full group-hover:bg-red-300 dark:group-hover:bg-red-800 md:w-12 md:h-12 dark:bg-purple-800 dark:bg-opacity-30">
                    <CheckIcon className="w-4 h-4 text-purple-700 select-none md:w-6 md:h-6 dark:text-purple-300 group-hover:hidden"/>
                    <XIcon className="hidden w-4 h-4 text-red-700 select-none md:w-6 md:h-6 dark:text-red-300 group-hover:block"/>
                  </span>
                  <p className="text-sm font-extrabold text-purple-700 select-none dark:text-purple-300 group-hover:hidden">
                    {"You're in !"}
                  </p>
                  <p className="hidden text-sm font-extrabold text-red-700 select-none dark:text-red-300 group-hover:block">
                    Wanna leave ? 😢
                  </p>
                </div>
              ) : (
                <>
                  <span className="flex items-center justify-center w-8 h-8 bg-purple-300 rounded-full md:w-12 md:h-12 dark:bg-purple-800 dark:bg-opacity-30">
                    <PlusIcon className="w-4 h-4 text-purple-700 select-none md:w-6 md:h-6 dark:text-purple-300 "/>
                  </span>
                  <p className="text-sm font-extrabold text-purple-700 select-none dark:text-purple-300">
                    Participate
                  </p>
                </>
              )}
            </button>
            <AvatarGroup users={participants} xl />
          </div>
        </div>
        <div className="flex flex-col-reverse flex-grow h-full px-6 py-6 pb-16 lg:pb-24 lg:px-32 xl:px-48 md:flex-row ">
          <div className="flex flex-col w-full mt-6 md:w-2/3 md:pr-5 md:mt-0">
            <div className="relative w-full pb-6 mb-6 border-b border-gray-300 dark:border-gray-700 ">
              {props.picture ? (
                <img
                  src={props.picture}
                  alt={props.name}
                  className="object-cover w-full transition duration-500 rounded-lg max-h-32 lg:max-h-80 grayscale-[0.85] hover:grayscale-0"
                />
              ) : (
                <span className="flex items-center justify-center w-full h-24 bg-purple-200 rounded-lg lg:h-64 dark:bg-purple-900">
                  <CalendarIcon className="w-12 h-12 text-purple-700 dark:text-purple-400 md:w-24 md:h-24" />
                </span>
              )}
              <div className="absolute p-4 top-2 left-2">
                <div className="z-10 flex flex-row items-center px-2 py-1 text-xs font-medium text-gray-200 truncate bg-gray-800 shadow-xl rounded-xl">
                  {props?.location?.location === "Remote" ? (
                    <>
                      <VideoCameraIcon className="w-3 h-3 mr-1"/>
                      <span className="truncate">Online Event</span>
                    </>
                  ) : (
                    <>
                      <LocationMarkerIcon className="w-3 h-3 mr-1"/>
                      <span className="truncate">
                        {props?.location?.details
                          ? props.location.details.city +
                            ", " +
                            props.location.details.country
                          : props?.location?.location}
                      </span>
                    </>
                  )}
                </div>
              </div>
            </div>

            <h4 className="text-lg font-bold text-gray-600 dark:text-gray-400">
              Details
            </h4>
            <div className="text-sm text-justify text-gray-800 dark:text-gray-200 ">
              <ReactMarkdown>{props.description}</ReactMarkdown>
            </div>
          </div>

          <div className="w-full md:w-1/3 md:pl-5">
            <div className="sticky flex flex-col space-y-6 md:top-72 dark:text-gray-200">
              <Link href={"/group/" + props.group.slug}>
                <a className="inline-flex items-center p-3 space-x-4 transition duration-500 bg-white dark:bg-gray-900 rounded-xl hover:bg-green-100 dark:hover:bg-green-900">
                  <span className="flex items-center justify-center w-16 h-16 p-5 text-green-500 bg-green-200 rounded-xl dark:bg-green-700">
                    <UserGroupIcon className="w-8 h-8 " />
                  </span>
                  <div className="flex flex-col">
                    <h4 className="text-base font-bold">{props.group.name}</h4>
                    <p className="text-xs">
                      {props.group.private ? "Private group" : "Public group"}
                    </p>
                  </div>
                </a>
              </Link>

              <div className="flex flex-col p-3 bg-white dark:bg-gray-900 rounded-xl">
                <div className="flex flex-col">
                  <div className="inline-flex items-center justify-between w-full pt-2 pb-4 space-x-4 ">
                    <span className="inline-flex items-center flex-grow space-x-4">
                      {props.endDate ? (
                        <div className="flex flex-col items-center w-6 ml-4 ">
                          <ClockIcon className="w-4 h-4 text-center " />
                          <span className="text-[0.6rem] font-bold uppercase">
                            from
                          </span>
                        </div>
                      ) : (
                        <ClockIcon className="w-6 h-6 ml-4 text-center" />
                      )}

                      <div className="flex flex-col">
                        <p className="text-xs">
                          {format(new Date(props.startDate), "PPPP")}
                        </p>
                        <p className="text-sm font-bold">
                          {format(new Date(props.startDate), "p")}
                        </p>
                      </div>
                    </span>
                    <a
                      rel="noreferrer"
                      href={
                        "https://calendar.google.com/calendar/render?action=TEMPLATE&" +
                        `dates=${format(
                          new Date(props.startDate),
                          "yyyyMMdd'T'HHmmss'Z'"
                        )}${
                          props.endDate
                            ? "%2F" +
                              format(
                                new Date(props.endDate),
                                "yyyyMMdd'T'HHmmss'Z'"
                              )
                            : ""
                        }&details=${
                          props.description
                        }%0A%0AEvent%20created%20by%20OpenMeet.&location=${
                          props.location.location
                        }&text=${props.name}`
                      }
                      target="_blank"
                    >
                      <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Google_Calendar_icon_%282020%29.svg/768px-Google_Calendar_icon_%282020%29.svg.png"
                        className="h-6 px-3 text-center"
                        alt="GCalendar"
                      ></img>
                    </a>
                  </div>

                  {props.endDate && (
                    <div className="inline-flex items-center justify-between w-full pt-2 pb-4 space-x-4 ">
                      <span className="inline-flex items-center flex-grow space-x-4">
                        <div className="flex flex-col items-center w-6 ml-4 ">
                          <ClockIcon className="w-4 h-4 text-center" />
                          <span className="text-[0.6rem] text-center font-bold uppercase">
                            to
                          </span>
                        </div>

                        <div className="flex flex-col">
                          <p className="text-xs">
                            {format(new Date(props.endDate), "PPPP")}
                          </p>
                          <p className="text-sm font-bold">
                            {format(new Date(props.endDate), "p")}
                          </p>
                        </div>
                      </span>
                    </div>
                  )}
                </div>

                <div
                  className={
                    props.location.location === "Remote"
                      ? "inline-flex items-center space-x-4 py-4"
                      : "inline-flex items-center space-x-4 w-full justify-between pb-2 pt-4 border-t border-gray-200 dark:border-gray-600"
                  }
                >
                  <span className="inline-flex items-center flex-grow space-x-4">
                    {props.location.location === "Remote" ? (
                      <VideoCameraIcon className="w-6 h-6 ml-4 text-center" />
                    ) : (
                      <LocationMarkerIcon className="w-6 h-6 ml-4 text-center" />
                    )}
                    {props.location.location === "Remote" ||
                    !props.location.location ? (
                      <div className="flex flex-col">
                        <p className="text-sm font-bold">Remote</p>
                      </div>
                    ) : (
                      <div className="flex flex-col">
                        <p className="text-xs">
                          {props.location?.details?.name ||
                            props.location.location}
                        </p>
                        {props.location?.details?.city && (
                          <p className="text-sm font-bold">
                            {props.location.details.city}, France
                          </p>
                        )}
                      </div>
                    )}
                  </span>
                  {props.location.location !== "Remote" ? (
                    <a
                      rel="noreferrer"
                      href={
                        "https://www.google.com/maps/place/" +
                        encodeURIComponent(
                          props.location?.details
                            ? props.location.details.name +
                                " " +
                                props.location.details.city +
                                ", France"
                            : props.location.location
                        )
                      }
                      target="_blank"
                    >
                      <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Google_Maps_icon_%282020%29.svg/418px-Google_Maps_icon_%282020%29.svg.png"
                        className="h-6 px-3 text-center"
                        alt="GMaps"
                      ></img>
                    </a>
                  ) : props.externalLink ? (
                    <a
                      rel="noreferrer"
                      href={props.externalLink}
                      target="_blank"
                    >
                      <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Google_Meet_icon_%282020%29.svg/2491px-Google_Meet_icon_%282020%29.svg.png"
                        className="h-5 px-3 text-center"
                        alt="GMeet"
                      ></img>
                    </a>
                  ) : null}
                </div>
                {props.attachment && (
                  <a
                    href={props.attachment.url}
                    target="_blank"
                    rel="noreferrer"
                  >
                    <div className="inline-flex items-center justify-between w-full pt-4 pb-2 space-x-4 ">
                      <span className="inline-flex items-center flex-grow space-x-4">
                        <PaperClipIcon className="w-6 h-6 ml-4 text-center" />

                        <div className="flex flex-col">
                          <p className="text-xs">Attachment</p>
                          <p className="text-sm font-bold">
                            {props.attachment.name}
                          </p>
                        </div>
                      </span>
                    </div>
                  </a>
                )}
              </div>
            </div>
          </div>
        </div>
      </div>
    </AppLayout>
  );
}

export async function getServerSideProps(ctx) {
  const event = await getDoc(doc(firestore, "events", ctx.query.slug));

  return {
    props: {
      ...event.data(),

      slug: ctx.query.slug,
    },
  };
}
