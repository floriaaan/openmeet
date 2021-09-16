import { SearchIcon } from "@heroicons/react/outline";
import { connectSearchBox } from "react-instantsearch-dom";

function SearchBox({ refine }) {
  return (
    <form
      onSubmit={(e) => e.preventDefault()}
      role="search"
      className="flex flex-col"
    >
      <label
        htmlFor="algolia_search"
        className="text-sm font-bold leading-7 text-gray-600 dark:text-gray-400"
      >
        Search
      </label>
      <div className="inline-flex items-center space-x-2">
        <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-blue-200 rounded-lg dark:bg-blue-900">
          <SearchIcon className="w-5 h-5 text-blue-700 dark:text-blue-400" />
        </span>
        <input
          id="algolia_search"
          type="search"
          className="w-full h-10 p-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 border rounded-xl dark:text-gray-300 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100"
          placeholder="an absolutely awesome group!"
          onChange={(e) => refine(e.currentTarget.value)}
        />
      </div>
    </form>
  );
}

export default connectSearchBox(SearchBox);
