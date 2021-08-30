import { AppLayout } from "@components/layouts/AppLayout";
// import { useEffect, useState } from "react";
// import { getLocalStream, servers } from "resources/webrtc";

export default function EventRemoteMeetPage() {
  //   const [participants, setParticipants] = useState([, ,]);

  //   const pc = new RTCPeerConnection(servers);
  //   let localStream = null;
  //     let remoteStreams = []

  //   useEffect(() => {
  //     localStream = getLocalStream();
  //     // Push tracks from local stream to peer connection
  //     localStream.getTracks().forEach((track) => {
  //       pc.addTrack(track, localStream);
  //     });
  //   }, []);

  //   useEffect(() => {
  //     let tmp = [];
  //     participants.forEach((participant) => {
  //       tmp.push(new MediaStream());
  //     });
  //     remoteStreams = tmp;

  //     // // Pull tracks from remote stream, add to video stream
  //     // pc.ontrack = (event) => {
  //     //   event.streams[0].getTracks().forEach((track) => {
  //     //     remoteStream.addTrack(track);
  //     //   });
  //     // };
  //   }, [participants]);

  return (
    <AppLayout>
      <div className="flex flex-col h-full">
        <div
          className={
            "grid flex-grow w-full p-6 gap-3 lg:px-32 bg-gray-100 dark:bg-gray-900 " +
            // ("grid-cols-" + participants.length)
            "grid-cols-2"
          }
        >
          <div className="flex items-center justify-center w-full h-full bg-gray-50 dark:bg-gray-800 rounded-xl">
            <span className="flex items-center justify-center w-16 h-16 text-3xl font-bold text-gray-800 uppercase bg-red-400 rounded-full">
              F
            </span>
          </div>
          <div className="flex items-center justify-center w-full h-full bg-gray-50 dark:bg-gray-800 rounded-xl">
            <span className="flex items-center justify-center w-16 h-16 text-3xl font-bold text-gray-800 uppercase bg-blue-400 rounded-full">
              L
            </span>
          </div>
          <div className="flex items-center justify-center w-full h-full bg-gray-50 dark:bg-gray-800 rounded-xl">
            <span className="flex items-center justify-center w-16 h-16 text-3xl font-bold text-gray-800 uppercase rounded-full bg-emerald-400">
              O
            </span>
          </div>
        </div>
      </div>
    </AppLayout>
  );
}
