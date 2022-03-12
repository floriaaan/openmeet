import { EventOverview } from "components/cards/CardEventOverview";
import { AppLayout } from "components/layouts/AppLayout";
import { RainbowHighlight } from "components/ui/RainbowHighlight";
import { RoughNotationGroup } from "react-rough-notation";

export default function TestBlurryPage() {
  const event = {
    data: () => {
      return {
        slug: "test",
        location: {
          location: "6 Chaussée Lamandé, Le Havre 76600, France",
          position: {
            lat: 49.48597005571962,
            lng: 0.11723955309840496,
          },
          details: {
            label: "6 Chaussée Lamandé 76600 Le Havre",
            citycode: "76351",
            id: "76351_pl592w_00006",
            importance: 0.64465,
            y: 6935824.8,
            country: "France",
            distance: 168,
            x: 491057.11,
            context: "76, Seine-Maritime, Normandie",
            street: "Chaussée Lamandé",
            name: "6 Chaussée Lamandé",
            housenumber: "6",
            postcode: "76600",
            type: "housenumber",
            score: 0.9999886833518531,
            city: "Le Havre",
          },
        },
        startDate: "2021-08-25T22:45",
        name: "Lorem ipsum dolor sit amet.",
        endDate: "2021-08-30T22:45",
        createdAt: "2021-08-04T20:45:57.919Z",
        description: `Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed lacus nec ante laoreet porttitor in eget erat. Curabitur bibendum eget urna at viverra. Praesent dictum eleifend mauris sit amet ultrices. Aliquam tempor elit at sapien euismod, et tristique metus iaculis. Quisque non mi sit amet ex congue vehicula. Fusce suscipit, mi a interdum vestibulum, lorem tortor ullamcorper magna, et mattis purus quam vitae risus. Maecenas vitae nulla non est accumsan maximus.

        Praesent convallis erat eget dapibus elementum. Suspendisse potenti. Maecenas lacinia lacinia pellentesque. Aliquam nulla lacus, cursus ac commodo nec, consequat convallis mauris. Cras euismod a erat sed porttitor. In convallis ultricies nibh, eu porttitor ante pretium quis. Mauris sodales dui nec eleifend fermentum. Suspendisse in diam iaculis eros auctor tempor. Pellentesque luctus elit non tincidunt finibus. In molestie elit rhoncus nisi pretium porttitor. Duis augue leo, auctor et vehicula eget, interdum eget ligula. Pellentesque ullamcorper, tellus nec consectetur vulputate, tortor justo sodales neque, sed elementum enim erat nec quam. Mauris leo risus, dignissim eu mi at, faucibus viverra nunc. Morbi nulla mauris, efficitur sed mauris in, semper consequat arcu. Sed mattis justo id ultrices cursus.

        Cras ullamcorper tempus purus, a vestibulum velit venenatis eget. Vivamus tempor pulvinar ex, a lacinia ex. Nullam quam odio, ullamcorper vitae urna ac, vehicula aliquam nisl. Etiam tempus, orci eu convallis posuere, elit sem imperdiet nunc, ac pellentesque risus ex non purus. Fusce lectus nunc, blandit et luctus nec, consequat venenatis magna. Etiam id nunc nec lorem tempor hendrerit. Curabitur malesuada lacus eu ex pretium porttitor. Etiam in facilisis velit. Duis tempus leo erat. Cras pretium congue purus, a malesuada augue viverra eget. Suspendisse dictum risus ac ante porta, et vehicula libero sagittis. Pellentesque ullamcorper est leo, et pretium magna pulvinar quis. Aenean eget commodo ipsum, at imperdiet leo. Ut molestie, nunc a laoreet dapibus, justo turpis feugiat diam, eget elementum erat metus non diam.

        Nullam eros dolor, ullamcorper ac feugiat ultrices, tempus quis eros. Phasellus volutpat nibh vitae tortor venenatis molestie. Proin laoreet aliquet ultricies. Donec dictum, tellus in porta imperdiet, mauris odio dapibus elit, eget sodales augue lectus sit amet neque. Nunc interdum vestibulum ipsum, sit amet fringilla enim porta non. Sed sagittis lobortis justo, ut scelerisque felis placerat vitae. Quisque non purus condimentum, hendrerit metus non, vestibulum velit. Phasellus eu nibh vitae nunc viverra efficitur non a tortor. Nullam a auctor lacus.

        Maecenas vitae tempus est. Nulla pellentesque nulla eget elit congue porta. Mauris commodo libero ex, nec elementum mauris commodo vel. Ut rutrum dolor et mi ultricies, ac blandit felis pharetra. Fusce dui velit, molestie at dignissim nec, malesuada vel ipsum. Nunc vestibulum neque neque, id eleifend quam vehicula vel. Nam feugiat placerat nunc, eget molestie nisi rhoncus non. Integer ut mauris accumsan, ullamcorper tortor sed, congue neque. Donec dapibus porta neque, at commodo erat. Etiam vel elit eget libero semper maximus.`,
        host: {
          photoUrl:
            "https://lh3.googleusercontent.com/a-/AOh14GgSJjELDsgk7Q16h6hQ7HTUQoscGUGg0CJFcucbkQ=s96-c",
          uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
          fullName: "Florian Leroux",
        },
        group: {
          slug: "test",
          name: "Lorem ipsum dolor sit amet.",
        },
      };
    },
  };

  const colors = ["#bbf7d0", "#e9d5ff", "#fef9c3", "#BFDBFE"];

  return (
    <AppLayout>
      <div className="flex items-center justify-center h-full px-16 bg-gray-50 dark:bg-black">
        <div className="relative w-full max-w-lg">
          <div className="absolute top-0 bg-purple-300 rounded-full dark:bg-purple-700 animate-blob filter blur-xl dark:blur-sm mix-blend-multiply -left-1 w-72 h-72"></div>
          <div className="absolute top-0 bg-yellow-300 rounded-full dark:bg-yellow-700 animate-blob filter blur-xl dark:blur-sm mix-blend-multiply -right-4 w-72 h-72 animation-delay-2000"></div>
          <div className="absolute bg-green-300 rounded-full dark:bg-green-700 w-72 h-72 animate-blob filter blur-xl dark:blur-sm mix-blend-multiply -bottom-8 -right-16 animation-delay-4000"></div>
          <div className="absolute bg-red-300 rounded-full dark:bg-red-700 w-72 h-72 animate-blob filter blur-xl dark:blur-sm mix-blend-multiply -bottom-16 -left-1 animation-delay-4000"></div>

          <div className="relative w-full m-8">
            <EventOverview {...event.data()} />
            {/* <div className="w-full mx-auto text-center md:text-left lg:p-20">
            <RoughNotationGroup show={true}>
            <RainbowHighlight color={colors[0]}>
              <h1 className="my-2 text-4xl font-bold text-green-700 dark:text-green-200">
                Your groups
              </h1>
            </RainbowHighlight>
            <RainbowHighlight color={colors[1]}>
              <h1 className="my-2 text-4xl font-bold text-purple-700 dark:text-purple-200">
                Your events
              </h1>
            </RainbowHighlight>
            <RainbowHighlight color={colors[2]}>
              <h1 className="my-2 text-4xl font-bold text-yellow-600 dark:text-yellow-200">
                at the same place.
              </h1>
            </RainbowHighlight>
            <RainbowHighlight color={colors[3]}>
              <h1 className="my-2 text-4xl font-bold text-blue-700 dark:text-blue-200">
                OpenMeet.
              </h1>
            </RainbowHighlight>
          </RoughNotationGroup> 
            </div> */}
          </div>
        </div>
      </div>
    </AppLayout>
  );
}
