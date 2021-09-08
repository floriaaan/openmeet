export const EventContextMenu = ({ slug, name }) => {
  return (
    <div className="z-50 w-full h-auto py-3 bg-white rounded-lg shadow-lg dark:bg-black lg:w-96">
      <div className="inline-flex items-center w-full px-3 pb-3 mb-3 border-b dark:border-gray-800">
        <span className="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-purple-200 rounded-lg dark:bg-purple-900">
          <i className="text-purple-700 dark:text-purple-400 fas fa-calendar" />
        </span>
        <p className="ml-3 text-xs font-bold text-gray-400">{name}</p>
      </div>
      <div className="flex flex-col space-y-2">
        <a
          href={`/event/${slug}`}
          className="inline-flex items-center w-full px-4 text-sm duration-200 hover:bg-gray-50 dark:hover:bg-gray-800"
        >
          <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-eye"></i>
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
          className="inline-flex items-center w-full px-4 text-sm duration-200 hover:bg-gray-50 dark:hover:bg-gray-800"
        >
          <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-share-alt"></i>
          Share
        </button>
        <button
          onClick={() => {}}
          className="inline-flex items-center w-full px-4 text-sm duration-200 hover:bg-gray-50 dark:hover:bg-gray-800"
        >
          <i className="flex items-center justify-center w-8 h-8 mr-2 fas fa-star"></i>
          Add to favorites
        </button>
      </div>
    </div>
  );
};
