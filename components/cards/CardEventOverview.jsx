import { AvatarGroup } from "@components/ui/AvatarGroup";
import Link from "next/link";

export const EventOverview = (props) => {
  // const [subs, setSubs] = useState([]);
  // useEffect(() => {
  //   firestore
  //     .collection("groups")
  //     .doc(props.slug)
  //     .collection("subscribers")
  //     .onSnapshot((querySnapshot) => {
  //       let subs = [];
  //       querySnapshot.forEach((doc) => {
  //         subs.push({ id: doc.id, ...doc.data() });
  //       });
  //       setSubs(subs);
  //     });
  // }, []);

  let temp = [
    {
      id: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
      fullName: "Florian Leroux",
      photoUrl:
        "https://lh3.googleusercontent.com/a-/AOh14GgSJjELDsgk7Q16h6hQ7HTUQoscGUGg0CJFcucbkQ=s96-c",
    },
    {
      id: "pfPXuxzgMgZsiFH09L78zZzPxjV2",
      photoUrl: "https://avatars.githubusercontent.com/u/10078837?v=4",
      fullName: "Florian Leroux",
    },
  ];

  return (
    <>
      <div className="flex flex-col w-full h-full p-2 transition duration-300 bg-white shadow rounded-xl dark:bg-gray-800 group hover:bg-gray-100 dark:hover:bg-gray-900">
        <Link href="/">
          <div className="relative w-full cursor-pointer ">
            <img
              src="https://secure-content.meetupstatic.com/images/classic-events/497370926/265x149.jpg"
              alt="Neural Search and Benchmarking Information Retrieval"
              className="object-cover w-full rounded-lg max-h-32 lg:max-h-full"
            />
            <div
              className="absolute p-4 top-2 left-2"
              role="status"
              aria-label="Online Event"
              data-testid="online-indicator"
            >
              <div className="z-10 flex flex-row items-center px-2 py-1 text-xs font-medium text-gray-200 truncate bg-gray-800 shadow-xl rounded-xl">
                <i className="mr-1 fas fa-video"></i>
                <span className="truncate">Online Event</span>
              </div>
            </div>
          </div>
        </Link>
        <div className="flex flex-col justify-between w-full h-full p-3">
          <Link href="/">
            <div className="overflow-hidden cursor-pointer ">
              <div className="flex flex-col pt-1 pb-1 text-sm font-bold leading-5 tracking-tight text-gray-800 uppercase dark:text-gray-300">
                Thu, Aug 12 @ 7:00 PM UTC+2
              </div>
              <p className="pt-0 text-base font-medium text-gray-700 dark:text-gray-200 line-clamp-3 xs:h-auto">
                Neural Search and Benchmarking Information Retrieval
              </p>
            </div>
          </Link>
          <hr className="mx-6 my-3 border-gray-200 dark:border-gray-700" />

          <div className="flex justify-between w-full">
            <div className="inline-flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
              <AvatarGroup users={temp} limit={4} />
              <i className="flex items-center fas fa-users flex-shrink-0 mx-1.5 h-5 w-5 "></i>
              {temp?.length || 0} {temp?.length > 1 ? "participants" : "participant"}
            </div>
            <div className="flex">
              <button
                aria-label="Share event"
                tabIndex={0}
                data-element-name="shelfEvent-share-click"
                data-event-label="Share icon"
                data-testid="share-btn"
                className="text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400"
              >
                <div className="flex items-center">
                  <i className="fas fa-share-square"></i>
                </div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};
