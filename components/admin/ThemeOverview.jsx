import React from "react";
import Link from "next/link";
import { ExternalLinkIcon } from "@heroicons/react/outline";

export default function ThemeOverview() {
  return (
    <div className="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white shadow-lg dark:bg-gray-900 rounded-xl">
      <div className="px-4 py-3 mb-0 border-0 rounded-t-xl">
        <div className="flex flex-wrap items-center">
          <div className="relative flex-1 flex-grow w-full max-w-full px-4">
            <Link href="/admin/themes">
              <a>
                <h3 className="flex items-center justify-start pt-2 text-xs font-bold text-gray-400 uppercase dark:text-gray-300">
                  Themes
                  <ExternalLinkIcon className="w-3 h-3 ml-2 " />
                </h3>
              </a>
            </Link>
          </div>
        </div>
      </div>
      <div className="grid w-full grid-cols-2 gap-6 p-6 lg:grid-cols-3 xl:grid-cols-4">
        {new Array(7).fill(1, 1, 7).map((el) => (
          <Theme key={Math.random()} title={"Theme " + el} />
        ))}
      </div>
    </div>
  );
}

const Theme = (props) => {
  return (
    <div className="z-10 flex items-center justify-center w-full h-24 mb-0 transition duration-500 bg-gray-300 cursor-pointer dark:bg-black rounded-xl hover:bg-opacity-50">
      {props.title}
    </div>
  );
};
