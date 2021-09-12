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
          <i className="text-green-700 dark:text-green-400 fas fa-users" />
        </span>
        <p className="ml-3 text-xs font-bold text-gray-400">{name}</p>
      </div>
      <div className="flex flex-col space-y-2">
        <a
          href={`/group/${slug}`}
          className="inline-flex items-center w-full px-4 text-sm duration-200 hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300"
        >
          <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-eye"></i>
          See more
        </a>
        {admin.uid === user?.uid && (
          <a
            href={`/group/settings?slug=${slug}`}
            className="inline-flex items-center w-full px-4 text-sm duration-200 hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300"
          >
            <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-pencil-alt"></i>
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
          className="inline-flex items-center w-full px-4 text-sm duration-200 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800"
        >
          <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-share-alt"></i>
          Share
        </button>

        <button
          onClick={toggleSub}
          className="inline-flex items-center w-full px-4 text-sm duration-200 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800"
        >
          {!isSubscribed ? (
            <>
              <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-plus"></i>
              Subscribe
            </>
          ) : (
            <>
              <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-times"></i>
              Unsubscribe
            </>
          )}
        </button>
        <button
          onClick={toggleFav}
          className="inline-flex items-center w-full px-4 text-sm duration-200 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800"
        >
          {!isFavorite ? (
            <>
              <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-star"></i>
              Add to favorites
            </>
          ) : (
            <>
              <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-star"></i>
              Remove from favorites
            </>
          )}
        </button>
      </div>
    </div>
  );
};
