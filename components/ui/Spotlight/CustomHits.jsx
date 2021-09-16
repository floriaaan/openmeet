import { UserGroupIcon } from "@heroicons/react/outline";
import { formatDistance } from "date-fns";
import Link from "next/link";
import { connectStateResults } from "react-instantsearch-dom";

function Hits({ searchState, searchResults }) {
  const validQuery = searchState.query?.length >= 2;

  return (
    <>
      {validQuery && (
        <hr className="mx-8 my-4 border-gray-200 dark:border-gray-700" />
      )}
      {searchResults?.hits.length === 0 && validQuery && (
        <p className="text-xs text-center">
          Aw snap! No search results were found.
        </p>
      )}
      {searchResults?.hits.length <= 3 && validQuery && (
        <>
          <div className="flex flex-col space-y-2">
            {searchResults.hits.map((hit, index) => (
              <GroupOverviewList key={hit.objectID} {...hit} />
            ))}
          </div>
        </>
      )}
      {searchResults?.hits.length > 3 && validQuery && (
        <>
          <div className="grid grid-cols-3 gap-3 px-4 mb-2 w-full mx-auto min-h-[6rem]">
            {searchResults.hits.map(
              (hit, index) =>
                index < 3 && <GroupOverview key={hit.objectID} {...hit} />
            )}
          </div>
          <div className="flex flex-col space-y-2 overflow-y-auto max-h-72">
            {searchResults.hits.map(
              (hit, index) =>
                index >= 3 && <GroupOverviewList key={hit.objectID} {...hit} />
            )}
          </div>
        </>
      )}
    </>
  );
}

export default connectStateResults(Hits);

const GroupOverview = ({ objectID, name }) => (
  <Link href={"/group/" + objectID}>
    <a className="flex flex-col items-center justify-center w-full min-h-[6rem] p-2 duration-300 rounded-xl hover:bg-green-50 dark:hover:bg-green-900">
      <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white bg-white rounded-full">
        <span className="flex items-center justify-center w-16 h-16 p-5 text-green-500 bg-green-200 rounded-full dark:bg-green-700">
          <UserGroupIcon className="w-8 h-8" />
        </span>
      </div>
      <div className="flex flex-col items-center justify-center w-full px-1">
        <span className="text-[0.7rem] overflow-ellipsis text-center tracking-tight leading-[1.12rem] text-gray-800 dark:text-gray-200">
          {name || "Name not provided"}
        </span>
        {/* <span className="text-[0.6rem] leading-4">
              from {format(new Date(props.startDate), "Pp")} to{" "}
              {format(new Date(props.endDate), "Pp")}
            </span> */}
      </div>
    </a>
  </Link>
);

const GroupOverviewList = ({ objectID, name, createdAt }) => (
  <Link href={"/group/" + objectID}>
    <a className="flex flex-row w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out rounded-md cursor-pointer dark:text-gray-200 hover:text-green-400 hover:bg-green-50 dark:hover:bg-green-900 focus:outline-none ">
      <span className="flex items-center justify-center w-8 h-8 p-5 text-green-500 bg-green-200 rounded-xl dark:bg-green-700">
      <UserGroupIcon className="w-4 h-4" />
      </span>
      <div className="flex flex-col ml-2">
        <span className="font-bold text-green-600 dark:text-green-400">
          {name}
        </span>

        <span className="text-xs text-gray-400 dark:text-gray-300">
          created{" "}
          {formatDistance(new Date(createdAt), new Date(), {
            addSuffix: true,
          })}
        </span>
      </div>
    </a>
  </Link>
);
