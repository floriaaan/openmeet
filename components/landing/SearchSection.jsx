import { Chip } from "@components/ui/Chip";
import { SearchIcon, CalendarIcon, LocationMarkerIcon } from "@heroicons/react/outline";
import { useState } from "react";

export const SearchSection = () => {
  const [query, setQuery] = useState("");
  const [location, setLocation] = useState("");
  return (
    <div className="flex-col hidden w-full px-32 my-4 mb-12 space-y-4 lg:flex lg:my-12">
      <h4 className="mb-1 text-xl font-bold tracking-tight text-center sm:text-2xl">
        What do you want to do ?
      </h4>
      <div className="relative w-full ">
        <div className="absolute inset-0 flex items-center" aria-hidden="true">
          <div className="w-full mx-12 border-t border-gray-300 dark:border-gray-700" />
        </div>
        <div className="relative flex flex-col justify-center space-y-1 text-sm lg:space-x-3 lg:space-y-0 lg:flex-row">
          <label className="relative text-gray-400 focus-within:text-gray-600">
            <CalendarIcon className="absolute w-4 h-4 transform -translate-y-1/2 pointer-events-none top-1/2 left-3" />
            <input
              id="query"
              name="query"
              type="text"
              autoComplete="off"
              value={query}
              onChange={(e) => setQuery(e.target.value)}
              required
              className="w-full px-5 py-2 pl-[2.25rem] placeholder-gray-500 duration-300 bg-white border border-gray-300 dark:border-gray-700 lg:w-96 rounded-xl dark:bg-black form-input focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white"
              placeholder="Search for ..."
            />
          </label>
          <label className="relative text-gray-400 focus-within:text-gray-600">
            <LocationMarkerIcon className="absolute w-4 h-4 transform -translate-y-1/2 pointer-events-none top-1/2 left-3" />
            <input
              id="query"
              name="query"
              type="text"
              autoComplete="off"
              value={location}
              onChange={(e) => setLocation(e.target.value)}
              required
              className="w-full px-5 py-2 pl-[2.25rem] placeholder-gray-500 duration-300 bg-white border border-gray-300 lg:w-48 dark:border-gray-700 rounded-xl dark:bg-black form-input focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white"
              placeholder="Where ..."
            />
          </label>
          <button className="inline-flex items-center justify-center w-full px-5 py-2 mt-3 text-base font-semibold text-white duration-300 bg-blue-600 shadow rounded-xl hover:bg-blue-700 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0">
            <SearchIcon className="w-4 h-4 mr-2" />
            Search
          </button>
        </div>
      </div>
      <div className="hidden pt-3 mx-auto space-x-3 overflow-x-hidden lg:inline-flex md:pt-0 md:pl-3">
        <Chip color="green" name="Tomorrow" />
        <Chip color="amber" name="This week" />
        <Chip color="purple" name="Near you" />
        <Chip color="blue" name="Online" />
        <Chip color="red" name="In person" />
      </div>
    </div>
  );
};
