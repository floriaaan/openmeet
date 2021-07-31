import React from "react";
import openmeet from "resources/openmeet"

export default function OpenMeetOverview() {
  return (
    <>
      <div
        className={
          "relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-lg dark:bg-gray-900 rounded-xl xl:mb-0"
        }
      >
        <div className="flex-auto p-4">
          <div className="flex flex-wrap">
            <div className="relative flex-1 flex-grow w-full max-w-full pr-4">
              <h5 className="inline-flex items-center justify-start w-full text-xs font-bold text-gray-400 uppercase">
                OpenMeet
              </h5>
              <span className="text-xl font-semibold text-gray-700 dark:text-gray-300">
                {openmeet.version}
              </span>
            </div>
            <div className="relative flex-initial w-auto pl-4">
              <img src="/logo.svg" className="w-12 h-12"></img>
            </div>
          </div>
          <p className="mt-4 text-sm text-gray-400">
            Developped by Floriaaan
            <span className="whitespace-nowrap"></span>
          </p>
        </div>
      </div>
    </>
  );
}
