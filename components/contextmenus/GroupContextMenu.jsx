import {
  EyeIcon,
  PencilAltIcon,
  ShareIcon,
  UserGroupIcon,
  PlusIcon,
  StarIcon as StarOutlineIcon,
  XIcon,
} from "@heroicons/react/outline";
import { StarIcon as StarSolidIcon } from "@heroicons/react/solid";

import { useAuth } from "@hooks/useAuth";
import useFirestoreToggle from "@hooks/useFirestoreToggle";

export const GroupContextMenu = ({ slug, name, admin }, props) => {
  const { user } = useAuth();
  const [isFavorite, toggleFav] = useFirestoreToggle(
    `users/${user?.uid}/favoritesGroups/${slug}`,
    {
      slug,
      name,
    }
  );

  const [isSubscribed, toggleSub] = useFirestoreToggle(
    `groups/${slug}/subscribers/${user?.uid}`,
    {
      fullName: user?.fullName,
      photoUrl: user?.photoUrl,
      uid: user?.uid,
      createdAt: new Date().toISOString(),
    }
  );

  return (
    <div className="z-[70] w-full h-auto py-3 bg-white dark:bg-black rounded-lg shadow-lg lg:w-96">
      <div className="inline-flex items-center w-full px-3 pb-3 mb-3 border-b dark:border-gray-800">
        <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-green-200 rounded-lg dark:bg-green-900">
          <UserGroupIcon className="w-5 h-5 text-green-700 dark:text-green-400" />
        </span>
        <p className="ml-3 text-xs font-bold text-gray-400">{name}</p>
      </div>
      <div className="flex flex-col space-y-2">
        <a
          href={`/group/${slug}`}
          className="inline-flex items-center w-full px-4 py-2 text-sm duration-200 hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300"
        >
          <EyeIcon className="flex items-center justify-center w-4 h-4 mr-2" />{" "}
          See more
        </a>
        {admin.uid === user?.uid && (
          <a
            href={`/group/settings?slug=${slug}`}
            className="inline-flex items-center w-full px-4 py-2 text-sm duration-200 hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300"
          >
            <PencilAltIcon className="flex items-center justify-center w-4 h-4 mr-2" />
            Edit
          </a>
        )}
        <hr className="my-2 border-gray-200 dark:border-gray-800" />
        <button
          onClick={() => {
            if (navigator.share) {
              navigator
                .share({
                  title: `${props.name} - OpenMeet`,
                  text: "Check out this group on OpenMeet.",
                  url:
                    document.location.protocol +
                    "//" +
                    document.location.host +
                    "/group/" +
                    props.slug,
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
          onClick={toggleSub}
          className="inline-flex items-center w-full px-4 py-2 text-sm duration-200 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800"
        >
          {!isSubscribed ? (
            <>
              <PlusIcon className="flex items-center justify-center w-4 h-4 mr-2" />
              Subscribe
            </>
          ) : (
            <>
              <XIcon className="flex items-center justify-center w-4 h-4 mr-2" />
              Unsubscribe
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
