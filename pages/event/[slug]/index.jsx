import { AppLayout } from "@components/layouts/AppLayout";
import { firestore } from "@libs/firebase";
import { format } from "date-fns";

import Link from "next/link";

export default function EventPage(props) {
  return (
    <AppLayout>
      <div className="flex flex-col w-full bg-gray-100 dark:bg-gray-900 dark:bg-opacity-10">
        <div className="xl:sticky xl:top-0 z-[47] flex flex-col w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
          <p className="mb-2 text-sm text-gray-600 dark:text-gray-400">
            {format(new Date(props.startDate), "PPPPp")}
          </p>
          <h2 className="mb-2 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
            {props.name}
          </h2>
          <Link href={"/profile/" + props.host.uid}>
            <a className="inline-flex items-center px-1 py-1 pr-6 space-x-3 transition duration-300 bg-red-100 rounded-full cursor-pointer hover:bg-red-200 max-w-max dark:bg-red-900 dark:hover:bg-opacity-60 dark:bg-opacity-30">
              {props.host.photoUrl && (
                <img
                  src={props.host.photoUrl}
                  alt={props.host.fullName}
                  className="w-12 h-12 rounded-full"
                ></img>
              )}
              <div className="flex flex-col">
                <p className="text-xs text-gray-600 select-none dark:text-gray-500">
                  Hosted by
                </p>
                <p className="text-sm font-extrabold text-red-700 select-none dark:text-red-300">
                  {props.host.fullName}
                </p>
              </div>
            </a>
          </Link>
        </div>
        <div className="flex flex-col-reverse h-full px-6 py-6 pb-16 lg:pb-24 lg:px-32 xl:px-48 md:flex-row ">
          <div className="flex flex-col w-full mt-6 md:w-2/3 md:pr-5 md:mt-0">
            <div className="relative w-full pb-6 mb-6 border-b border-gray-300 dark:border-gray-700 ">
              <img
                src={
                  "https://picsum.photos/id/" +
                  Math.floor(Math.random() * 200) +
                  "/500/500"
                }
                alt="Neural Search and Benchmarking Information Retrieval"
                className="object-cover w-full rounded-lg max-h-32 lg:max-h-80"
              />
              <div className="absolute p-4 top-2 left-2">
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
            </div>

            <h4 className="text-xl font-bold text-gray-600 dark:text-gray-400">
              Details
            </h4>
            <p className="text-lg text-justify text-gray-800 dark:text-gray-200 ">
              {props.description}
            </p>
          </div>

          <div className="w-full md:w-1/3 md:pl-5">
            <div className="sticky flex flex-col space-y-6 md:top-6 xl:top-48">
              <Link href={"/group/" + props.group.slug}>
                <a className="inline-flex items-center p-3 space-x-4 transition duration-500 bg-white dark:bg-gray-900 rounded-xl hover:bg-green-100 dark:hover:bg-green-900">
                  <span className="flex items-center justify-center w-16 h-16 p-5 text-green-500 bg-green-200 rounded-xl dark:bg-green-700">
                    <i className="text-2xl fas fa-users" />
                  </span>
                  <div className="flex flex-col">
                    <h4 className="text-base font-bold">{props.group.name}</h4>
                    <p className="text-xs">Public group</p>
                  </div>
                </a>
              </Link>

              <div className="flex flex-col p-3 bg-white dark:bg-gray-900 rounded-xl">
                <div className="flex flex-col">
                  <div className="inline-flex items-center justify-between w-full pt-2 pb-4 space-x-4 ">
                    <span className="inline-flex items-center flex-grow space-x-4">
                      {props.endDate ? (
                        <div className="flex flex-col items-center w-6 ml-4 ">
                          <i className="text-lg text-center far fa-clock" />
                          <span className="text-[0.6rem] font-bold uppercase">
                            from
                          </span>
                        </div>
                      ) : (
                        <i className="w-6 ml-4 text-lg text-center far fa-clock" />
                      )}

                      <div className="flex flex-col">
                        <p className="text-xs">
                          {format(new Date(props.startDate), "PPPP")}
                        </p>
                        <p className="text-sm font-bold">
                          {format(new Date(props.startDate), "p")}
                        </p>
                      </div>
                    </span>
                    <a
                      href={
                        "https://calendar.google.com/calendar/render?action=TEMPLATE&" +
                        `dates=${format(
                          new Date(props.startDate),
                          "yyyyMMdd'T'HHmmss'Z'"
                        )}${
                          props.endDate
                            ? "%2F" +
                              format(
                                new Date(props.endDate),
                                "yyyyMMdd'T'HHmmss'Z'"
                              )
                            : ""
                        }&details=${
                          props.description
                        }%0A%0AEvent%20created%20by%20OpenMeet.&location=${
                          props.location.location
                        }&text=${props.name}`
                      }
                      target="_blank"
                    >
                      <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Google_Calendar_icon_%282020%29.svg/768px-Google_Calendar_icon_%282020%29.svg.png"
                        className="h-6 px-3 text-center"
                        alt="GCalendar"
                      ></img>
                    </a>
                  </div>

                  {props.endDate && (
                    <div className="inline-flex items-center justify-between w-full pt-2 pb-4 space-x-4 ">
                      <span className="inline-flex items-center flex-grow space-x-4">
                        <div className="flex flex-col items-center w-6 ml-4 ">
                          <i className="text-lg text-center far fa-clock" />
                          <span className="text-[0.6rem] text-center font-bold uppercase">
                            to
                          </span>
                        </div>

                        <div className="flex flex-col">
                          <p className="text-xs">
                            {format(new Date(props.endDate), "PPPP")}
                          </p>
                          <p className="text-sm font-bold">
                            {format(new Date(props.endDate), "p")}
                          </p>
                        </div>
                      </span>
                    </div>
                  )}
                </div>

                <div
                  className={
                    props.location.location === "Remote"
                      ? "inline-flex items-center space-x-4 pb-2 pt-4"
                      : "inline-flex items-center space-x-4 w-full justify-between pb-2 pt-4 border-t border-gray-200 dark:border-gray-600"
                  }
                >
                  <span className="inline-flex items-center flex-grow space-x-4">
                    {props.location.location === "Remote" ? (
                      <i className="w-6 ml-4 text-lg text-center fas fa-video" />
                    ) : (
                      <i className="w-6 ml-4 text-lg text-center far fa-map-marker-alt" />
                    )}
                    {props.location.location === "Remote" ? (
                      <div className="flex flex-col">
                        <p className="text-sm font-bold">Remote</p>
                      </div>
                    ) : (
                      <div className="flex flex-col">
                        <p className="text-xs">{props.location.details.name}</p>
                        <p className="text-sm font-bold">
                          {props.location.details.city}, France
                        </p>
                      </div>
                    )}
                  </span>
                  {props.location.location !== "Remote" && (
                    <a
                      href={
                        "https://www.google.com/maps/place/" +
                        encodeURIComponent(
                          props.location.details.name +
                            " " +
                            props.location.details.city +
                            ", France"
                        )
                      }
                      target="_blank"
                    >
                      <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Google_Maps_icon_%282020%29.svg/418px-Google_Maps_icon_%282020%29.svg.png"
                        className="h-6 px-3 text-center"
                        alt="GMaps"
                      ></img>
                    </a>
                  )}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AppLayout>
  );
}

export async function getServerSideProps(ctx) {
  const event = await firestore.collection("events").doc(ctx.query.slug).get();

  // const event = {
  //   data: () => {
  //     return {
  //       slug: "test",
  //       location: {
  //         location: "6 Chaussée Lamandé, Le Havre 76600, France",
  //         position: {
  //           lat: 49.48597005571962,
  //           lng: 0.11723955309840496,
  //         },
  //         details: {
  //           label: "6 Chaussée Lamandé 76600 Le Havre",
  //           citycode: "76351",
  //           id: "76351_pl592w_00006",
  //           importance: 0.64465,
  //           y: 6935824.8,
  //           country: "France",
  //           distance: 168,
  //           x: 491057.11,
  //           context: "76, Seine-Maritime, Normandie",
  //           street: "Chaussée Lamandé",
  //           name: "6 Chaussée Lamandé",
  //           housenumber: "6",
  //           postcode: "76600",
  //           type: "housenumber",
  //           score: 0.9999886833518531,
  //           city: "Le Havre",
  //         },
  //       },
  //       startDate: "2021-08-25T22:45",
  //       name: "Lorem ipsum dolor sit amet.",
  //       endDate: "2021-08-30T22:45",
  //       createdAt: "2021-08-04T20:45:57.919Z",
  //       description: `Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed lacus nec ante laoreet porttitor in eget erat. Curabitur bibendum eget urna at viverra. Praesent dictum eleifend mauris sit amet ultrices. Aliquam tempor elit at sapien euismod, et tristique metus iaculis. Quisque non mi sit amet ex congue vehicula. Fusce suscipit, mi a interdum vestibulum, lorem tortor ullamcorper magna, et mattis purus quam vitae risus. Maecenas vitae nulla non est accumsan maximus.

  //       Praesent convallis erat eget dapibus elementum. Suspendisse potenti. Maecenas lacinia lacinia pellentesque. Aliquam nulla lacus, cursus ac commodo nec, consequat convallis mauris. Cras euismod a erat sed porttitor. In convallis ultricies nibh, eu porttitor ante pretium quis. Mauris sodales dui nec eleifend fermentum. Suspendisse in diam iaculis eros auctor tempor. Pellentesque luctus elit non tincidunt finibus. In molestie elit rhoncus nisi pretium porttitor. Duis augue leo, auctor et vehicula eget, interdum eget ligula. Pellentesque ullamcorper, tellus nec consectetur vulputate, tortor justo sodales neque, sed elementum enim erat nec quam. Mauris leo risus, dignissim eu mi at, faucibus viverra nunc. Morbi nulla mauris, efficitur sed mauris in, semper consequat arcu. Sed mattis justo id ultrices cursus.

  //       Cras ullamcorper tempus purus, a vestibulum velit venenatis eget. Vivamus tempor pulvinar ex, a lacinia ex. Nullam quam odio, ullamcorper vitae urna ac, vehicula aliquam nisl. Etiam tempus, orci eu convallis posuere, elit sem imperdiet nunc, ac pellentesque risus ex non purus. Fusce lectus nunc, blandit et luctus nec, consequat venenatis magna. Etiam id nunc nec lorem tempor hendrerit. Curabitur malesuada lacus eu ex pretium porttitor. Etiam in facilisis velit. Duis tempus leo erat. Cras pretium congue purus, a malesuada augue viverra eget. Suspendisse dictum risus ac ante porta, et vehicula libero sagittis. Pellentesque ullamcorper est leo, et pretium magna pulvinar quis. Aenean eget commodo ipsum, at imperdiet leo. Ut molestie, nunc a laoreet dapibus, justo turpis feugiat diam, eget elementum erat metus non diam.

  //       Nullam eros dolor, ullamcorper ac feugiat ultrices, tempus quis eros. Phasellus volutpat nibh vitae tortor venenatis molestie. Proin laoreet aliquet ultricies. Donec dictum, tellus in porta imperdiet, mauris odio dapibus elit, eget sodales augue lectus sit amet neque. Nunc interdum vestibulum ipsum, sit amet fringilla enim porta non. Sed sagittis lobortis justo, ut scelerisque felis placerat vitae. Quisque non purus condimentum, hendrerit metus non, vestibulum velit. Phasellus eu nibh vitae nunc viverra efficitur non a tortor. Nullam a auctor lacus.

  //       Maecenas vitae tempus est. Nulla pellentesque nulla eget elit congue porta. Mauris commodo libero ex, nec elementum mauris commodo vel. Ut rutrum dolor et mi ultricies, ac blandit felis pharetra. Fusce dui velit, molestie at dignissim nec, malesuada vel ipsum. Nunc vestibulum neque neque, id eleifend quam vehicula vel. Nam feugiat placerat nunc, eget molestie nisi rhoncus non. Integer ut mauris accumsan, ullamcorper tortor sed, congue neque. Donec dapibus porta neque, at commodo erat. Etiam vel elit eget libero semper maximus.`,
  //       host: {
  //         photoUrl:
  //           "https://lh3.googleusercontent.com/a-/AOh14GgSJjELDsgk7Q16h6hQ7HTUQoscGUGg0CJFcucbkQ=s96-c",
  //         uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
  //         fullName: "Florian Leroux",
  //       },
  //       group: {
  //         slug: "test",
  //         name: "Lorem ipsum dolor sit amet.",
  //       },
  //     };
  //   },
  // };

  return {
    props: {
      ...event.data(),

      slug: ctx.query.slug,
    },
  };
}
