/* eslint-disable @next/next/no-img-element */
import { format, formatRelative } from "date-fns";
import Link from "next/link";

export const Message = ({ list = [], sender }) => {
  return (
    <div className="inline-flex w-full items-start px-2 py-1.5 md:px-4 md:py-3 min-h-[6rem] overflow-hidden transition duration-500 rounded-md ">
      {sender?.photoUrl ? (
        <Link href={"/profile/" + sender.uid}>
          <a>
            <img
              src={sender.photoUrl}
              alt="Avatar"
              className="w-8 h-8 mr-4 rounded-full cursor-pointer md:w-16 md:h-16"
            />
          </a>
        </Link>
      ) : null}
      <div className="w-full">
        <div className="flex items-center justify-between mt-1">
          {sender?.fullName && (
            <Link href={"/profile/" + sender.uid}>
              <a className="mr-2 font-bold text-yellow-500 cursor-pointer">
                {sender.fullName}
              </a>
            </Link>
          )}
          {list[0]?.createdAt ? (
            <span className="text-xs text-gray-500">
              {formatRelative(new Date(list[0]?.createdAt), new Date())}
            </span>
          ) : null}
        </div>
        <div className="flex flex-col w-full space-y-0 md:space-y-1">
          {list.map((msg, index) => (
            <div
              className="inline-flex items-center justify-between w-full mt-3 -mx-10 rounded md:-mx-0 md:mt-0 md:px-3 group hover:bg-gray-50 dark:hover:bg-gray-800"
              key={index}
            >
              <p className="text-sm text-gray-800 dark:text-gray-300 md:text-base">
                {msg.content}
              </p>
              <span
                className={
                  "text-xs transition duration-300 cursor-default dark:group-hover:text-gray-300 group-hover:text-gray-700 hidden md:block " +
                  (index === list.length - 1
                    ? "text-gray-600"
                    : "text-gray-100 dark:text-gray-900")
                }
              >
                {format(new Date(msg?.createdAt), "PPPp")}
              </span>
              <span
                className={
                  "text-xs transition duration-300 cursor-default dark:group-hover:text-gray-300 group-hover:text-gray-700 pl-10 md:hidden " +
                  (index === list.length - 1
                    ? "text-gray-600"
                    : "text-gray-100 dark:text-gray-900")
                }
              >
                {format(new Date(msg?.createdAt), "p")}
              </span>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export const MessageSkeleton = ({ multiple = false }) => (
  <div className="inline-flex w-full items-start px-2 py-1.5 md:px-4 md:py-3 min-h-[6rem] overflow-hidden transition duration-500 rounded-md ">
    <span className="w-[2.25rem] h-8 bg-gray-500 rounded-full animate-pulse md:w-[4.5rem] md:h-16" />
    <div className="w-full ml-4">
      <div className="flex items-center justify-between mt-1">
        <span className="w-32 h-4 mb-2 bg-yellow-700 rounded-md animate-pulse"></span>
      </div>
      <div className="flex flex-col w-full space-y-0 md:space-y-1">
        {multiple ? (
          <>
            <div className="inline-flex items-center justify-between w-full pt-1 mt-3 -mx-10 rounded md:pt-0 md:-mx-0 md:mt-0 md:px-3 ">
              <span className="w-1/5 h-4 bg-gray-500 rounded-md animate-pulse"></span>
            </div>
            <div className="inline-flex items-center justify-between w-full pt-1 mt-3 -mx-10 rounded md:pt-0 md:-mx-0 md:px-3">
              <span className="w-1/2 h-4 bg-gray-500 rounded-md animate-pulse"></span>
            </div>
            <div className="inline-flex items-center justify-between w-full pt-1 mt-3 -mx-10 rounded md:pt-0 md:-mx-0 md:px-3">
              <span className="h-4 bg-gray-500 rounded-md w-96 animate-pulse"></span>

              <span className="hidden sm:flex">
                <span className="w-32 h-4 bg-gray-500 rounded-md animate-pulse"></span>
              </span>
            </div>
          </>
        ) : (
          <div className="inline-flex items-center justify-between w-full mt-3 -mx-10 rounded md:-mx-0 md:mt-0 md:px-3">
            <span className="w-1/3 h-4 bg-gray-500 rounded-md animate-pulse"></span>

            <span className="hidden sm:flex">
              <span className="w-32 h-4 bg-gray-500 rounded-md animate-pulse"></span>
            </span>
          </div>
        )}
      </div>
    </div>
  </div>
);
