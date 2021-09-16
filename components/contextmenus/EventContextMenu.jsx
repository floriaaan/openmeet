import {
  CalendarIcon,
  EyeIcon,
  ShareIcon,
  PlusIcon,
  StarIcon as StarOutlineIcon,
  XIcon,
} from "@heroicons/react/outline";
import { StarIcon as StarSolidIcon } from "@heroicons/react/solid";
import { useAuth } from "@hooks/useAuth";
import useFirestoreToggle from "@hooks/useFirestoreToggle";

export const EventContextMenu = ({ slug, name }) => {
  const { user } = useAuth();
  const [isFavorite, toggleFav] = useFirestoreToggle(
    `users/${user?.uid}/favoritesEvents/${slug}`,
    {
      slug,
      name,
    }
  );

  const [isParticipant, togglePart] = useFirestoreToggle(
    `events/${slug}/participants/${user?.uid}`,
    {
      fullName: user?.fullName,
      photoUrl: user?.photoUrl,
      uid: user?.uid,
      createdAt: new Date().toISOString(),
    }
  );
  return (
    <div className="z-50 w-full h-auto py-3 bg-white rounded-lg shadow-lg dark:bg-black lg:w-96">
      <div className="inline-flex items-center w-full px-3 pb-3 mb-3 border-b dark:border-gray-800">
        <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-purple-200 rounded-lg dark:bg-purple-900">
          <CalendarIcon className="w-5 h-5 text-purple-700 dark:text-purple-400" />
        </span>
        <p className="ml-3 text-xs font-bold text-gray-400">{name}</p>
      </div>
      <div className="flex flex-col space-y-2">
        <a
          href={`/event/${slug}`}
          className="inline-flex items-center w-full px-4 py-2 text-sm duration-200 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800"
        >
          <EyeIcon className="flex items-center justify-center w-4 h-4 mr-2" />
          See more
        </a>
        <hr className="my-2 border-gray-200 dark:border-gray-800" />
        <button
          onClick={() => {
            if (navigator.share) {
              navigator
                .share({
                  title: `${name} - OpenMeet`,
                  text: "Check out this event on OpenMeet.",
                  url:
                    document.location.protocol +
                    "//" +
                    document.location.host +
                    "/event/" +
                    slug,
                })
                .then(() => console.log("Successful share"))
                .catch((error) => console.log("Error sharing", error));
            }
          }}
          className="inline-flex items-center w-full px-4 py-2 text-sm duration-200 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800"
        >
          <ShareIcon className="flex items-center justify-center w-4 h-4 mr-2" />
          Share
        </button>
        <button
          onClick={togglePart}
          className="inline-flex items-center w-full px-4 py-2 text-sm duration-200 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800"
        >
          {!isParticipant ? (
            <>
              <PlusIcon className="flex items-center justify-center w-4 h-4 mr-2" />
              Participate
            </>
          ) : (
            <>
              <XIcon className="flex items-center justify-center w-4 h-4 mr-2" />
              Leave the participants list
            </>
          )}
        </button>
        <button
          onClick={toggleFav}
          className="inline-flex items-center w-full px-4 py-2 text-sm duration-200 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800"
        >
          {!isFavorite ? (
            <>
              <StarOutlineIcon className="flex items-center justify-center w-4 h-4 mr-2" />
              Add to favorites
            </>
          ) : (
            <>
              <StarSolidIcon className="flex items-center justify-center w-4 h-4 mr-2" />
              Remove from favorites
            </>
          )}
        </button>
      </div>
    </div>
  );
};
