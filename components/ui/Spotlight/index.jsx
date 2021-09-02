import { Dialog, Transition } from "@headlessui/react";
import { useEventListener } from "@hooks/useEventListener";
import { Fragment, useEffect, useState } from "react";

import algoliasearch from "algoliasearch/lite";
const searchClient = algoliasearch(
  process.env.NEXT_PUBLIC_ALGOLIA_APP_ID,
  process.env.NEXT_PUBLIC_ALGOLIA_SEARCH_API_KEY
);

import { InstantSearch } from "react-instantsearch-dom";
import CustomSearchBox from "./CustomSearchBox";
import CustomHits from "./CustomHits";

export const Spotlight = () => {
  let [isOpen, setIsOpen] = useState(false);

  function closeModal() {
    setIsOpen(false);
  }

  function openModal() {
    setIsOpen(true);
  }

  useEventListener("keydown", (e) => {
    if (e.key === "k" && e.ctrlKey === true) {
      e.preventDefault();
      setIsOpen(!isOpen);
    }

    if (isOpen) {
      switch (e.code) {
        case "ArrowUp":
          console.log(e.code);
          break;
        case "ArrowDown":
          console.log(e.code);

          break;
        case "Escape":
          closeModal();
          break;
        default:
          break;
      }
    }
  });

  useEffect(() => {}, []);

  return (
    <>
      <Transition appear show={isOpen} as={Fragment}>
        <Dialog
          as="div"
          className="fixed inset-0 z-50 overflow-y-auto"
          onClose={closeModal}
        >
          <div className="min-h-screen px-4 text-center">
            <Transition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0"
              enterTo="opacity-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100"
              leaveTo="opacity-0"
            >
              <Dialog.Overlay className="fixed inset-0 bg-black opacity-90 " />
              {/* motion-safe:backdrop-filter motion-safe:backdrop-blur */}
            </Transition.Child>
            {/* This element is to trick the browser into centering the modal contents. */}
            <span
              className="inline-block h-screen align-middle"
              aria-hidden="true"
            >
              &#8203;
            </span>
            <Transition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0 scale-95"
              enterTo="opacity-100 scale-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100 scale-100"
              leaveTo="opacity-0 scale-95"
            >
              <div className="z-[51] inline-block w-full max-w-md p-4 my-8 overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-gray-900 shadow-xl rounded-2xl max-h-[60vh]">
                <InstantSearch searchClient={searchClient} indexName="group">
                  <CustomSearchBox />
                  <CustomHits />
                </InstantSearch>

                <div className="inline-flex justify-end w-full mt-4">
                  <button
                    type="button"
                    className="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-900 duration-300 bg-gray-100 rounded-md dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-800 focus:outline-none "
                    onClick={closeModal}
                  >
                    Close
                  </button>
                </div>
              </div>
            </Transition.Child>
          </div>
        </Dialog>
      </Transition>
    </>
  );
};
