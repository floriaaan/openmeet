/* eslint-disable @next/next/no-img-element */
import { AvatarGroup } from "@components/ui/AvatarGroup";
import { format } from "date-fns";
import Link from "next/link";

export const EventOverview = (props) => {
  // const [subs, setSubs] = useState([]);
  // useEffect(() => {
  //   firestore
  //     .collection("events")
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
        <Link href={"/event/" + props.slug}>
          <a className="relative w-full cursor-pointer ">
            {props.picture ? (
              <img
                src={props.picture}
                alt={props.name}
                className="object-cover w-full rounded-lg max-h-32 lg:max-h-48"
              />
            ) : (
              <span className="flex items-center justify-center w-full h-24 bg-purple-200 rounded-lg lg:h-32 xl:h-48 dark:bg-purple-900">
                <i className="text-purple-700 dark:text-purple-400 fas fa-calendar" />
              </span>
            )}
            <div className="absolute top-2 left-2">
              <div className="z-10 flex flex-row items-center px-2 py-1 text-xs font-medium text-gray-200 truncate bg-gray-800 shadow-xl rounded-xl">
                {props?.location?.location === "Remote" ? (
                  <>
                    <i className="mr-1 fas fa-video"></i>
                    <span className="truncate">Online Event</span>
                  </>
                ) : (
                  <>
                    <i className="mr-1 fas fa-map-marker"></i>
                    <span className="truncate">
                      {props?.location?.details
                        ? props.location.details.city +
                          ", " +
                          props.location.details.country
                        : props?.location?.location}
                    </span>
                  </>
                )}
              </div>
            </div>
          </a>
        </Link>
        <div className="flex flex-col justify-between w-full h-full p-3">
          <Link href={"/event/" + props.slug}>
            <a className="overflow-hidden cursor-pointer ">
              <div className="flex flex-col pt-1 pb-1 text-sm font-bold leading-5 tracking-tight text-gray-800 uppercase dark:text-gray-300">
                {format(new Date(props.startDate), "eee, LLL L @ p")}
              </div>
              <p className="pt-0 text-base font-medium text-gray-700 dark:text-gray-200 line-clamp-3 xs:h-auto">
                {props.name}
              </p>
            </a>
          </Link>
          <hr className="mx-6 my-3 border-gray-200 dark:border-gray-700" />

          <div className="flex justify-between w-full">
            <div className="inline-flex items-center text-sm text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
              <AvatarGroup users={temp} limit={4} />
              <i className="flex items-center fas fa-users flex-shrink-0 mx-1.5 h-5 w-5 "></i>
              {temp?.length || 0}{" "}
              {temp?.length > 1 ? "participants" : "participant"}
            </div>
            <div className="flex">
              <button className="text-gray-500 transition duration-200 hover:text-gray-700 dark:text-gray-400">
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
