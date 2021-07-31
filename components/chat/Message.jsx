import { format, formatRelative } from "date-fns";
import Link from "next/link";

export const Message = ({ list = [], sender }) => {
  return (
    <div className="inline-flex w-full items-start px-4 py-3 min-h-[6rem] overflow-hidden transition duration-500 rounded-md ">
      {sender?.photoUrl ? (
        <Link href={"/profile/" + sender.uid}>
          <img
            src={sender.photoUrl}
            alt="Avatar"
            className="w-8 h-8 mr-4 rounded-full cursor-pointer md:w-16 md:h-16"
          />
        </Link>
      ) : null}
      <div className="w-full">
        <div className="flex items-center justify-between mt-1">
          {sender?.fullName && (
            <Link href={"/profile/" + sender.uid}>
              <p className="mr-2 font-bold text-yellow-500 cursor-pointer">
                {sender.fullName}
              </p>
            </Link>
          )}
          {list[0]?.createdAt ? (
            <span className="text-xs text-gray-500">
              {formatRelative(new Date(list[0]?.createdAt), new Date())}
            </span>
          ) : null}
        </div>
        <div className="flex flex-col w-full space-y-1">
          {list.map((msg, index) => (
            <div className="inline-flex items-center justify-between w-full mt-3 -mx-10 rounded md:-mx-0 md:mt-0 md:px-3 group hover:bg-gray-50 dark:hover:bg-gray-800" key={index}>
              <p className="text-gray-800 dark:text-gray-300">{msg.content}</p>
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
