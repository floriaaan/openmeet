import { Popover, Transition } from "@headlessui/react";
import { LinkIcon } from "@heroicons/react/outline";

export const ApiKey = ({ color = "gray", apikey }) => {
  return (
    <Popover className="relative">
      <Popover.Button className="flex flex-row items-center text-xs font-bold transition duration-300 cursor-pointer">
        <LinkIcon className="w-4 h-4 mr-1" />
        API key
      </Popover.Button>

      <Transition
        enter="transition duration-100 ease-out"
        enterFrom="transform scale-95 opacity-0"
        enterTo="transform scale-100 opacity-100"
        leave="transition duration-75 ease-out"
        leaveFrom="transform scale-100 opacity-100"
        leaveTo="transform scale-95 opacity-0"
      >
        <Popover.Panel className="absolute right-0 z-10 mt-2 origin-top-right">
          <div className="p-3 text-white transition duration-300 bg-gray-600 shadow-lg rounded-xl text-[0.6rem]">
            {apikey}
          </div>
        </Popover.Panel>
      </Transition>
    </Popover>
  );
};
