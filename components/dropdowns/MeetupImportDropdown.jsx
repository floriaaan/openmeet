import React from "react";

import { Menu, Transition } from "@headlessui/react";

const cheerio = require("cheerio");

export const MeetupImportDropdown = ({ setScrap }) => {
  const [url, setUrl] = React.useState("");

  React.useEffect(() => {
    console.log(url);
  }, [url]);

  const scrap = async () => {
    const response = await fetch(url);
    const text = await response.text();
    const dom = cheerio.load(response.body);

    console.log(dom);
  };

  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button
            id="meetup-display-btn"
            className="flex-shrink px-6 py-2 text-sm text-white bg-red-600 border-0 rounded-xl focus:outline-none hover:bg-red-700"
          >
            <i className="mr-2 fab fa-meetup" />
            Import from meetup.com
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
                "bg-white origin-top-left right-0 -top-24 absolute dark:bg-gray-900 text-base z-50 float-left px-4 list-none text-left rounded-xl shadow-lg min-w-[400px]"
              }
            >
              <div className="relative flex flex-col pt-2 pb-3">
                <label
                  htmlFor="url"
                  style={{ fontSize: "0.6rem" }}
                  className="font-bold leading-7 text-gray-600 uppercase dark:text-gray-400"
                >
                  Meetup Url
                </label>
                <div className="inline-flex items-center space-x-2">
                  <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-red-200 rounded-lg dark:bg-red-900">
                    <i className="text-red-700 dark:text-red-400 fab fa-meetup" />
                  </span>
                  <input
                    type="text"
                    id="url"
                    name="url"
                    value={url}
                    onChange={(e) => setUrl(e.target.value)}
                    className="flex-grow w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-200 border rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
                  />
                  <button
                    onClick={scrap}
                    className="flex items-center justify-center flex-shrink-0 w-10 h-10 duration-300 bg-green-200 rounded-lg dark:bg-green-900 hover:bg-green-300 dark:hover:bg-green-800"
                  >
                    <i className="text-green-700 dark:text-green-400 fas fa-check" />
                  </button>
                </div>
              </div>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};
