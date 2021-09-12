import { RainbowHighlight } from "@components/ui/RainbowHighlight";
import { RoughNotationGroup } from "react-rough-notation";


const colors = ["#bbf7d0", "#e9d5ff", "#fef9c3", "#BFDBFE"];
export const HeroSection = () => (
  <section className="flex w-full h-[500px] bg-gray-50 dark:bg-gray-900">
    <div className="flex items-center w-full px-8 lg:text-left md:px-12 lg:w-1/2">
      <div className="w-full">
        <RoughNotationGroup show={true}>
          <RainbowHighlight color={colors[0]}>
            <h1 className="my-2 text-4xl font-bold text-green-700 ">
              Your groups
            </h1>
          </RainbowHighlight>
          <RainbowHighlight color={colors[1]}>
            <h1 className="my-2 text-4xl font-bold text-purple-700 ">
              Your events
            </h1>
          </RainbowHighlight>
          <RainbowHighlight color={colors[2]}>
            <h1 className="my-2 text-4xl font-bold text-yellow-600 ">
              at the same place.
            </h1>
          </RainbowHighlight>
          <RainbowHighlight color={colors[3]}>
            <h1 className="my-2 text-4xl font-bold text-blue-700 ">
              OpenMeet.
            </h1>
          </RainbowHighlight>
        </RoughNotationGroup>
      </div>
    </div>
    <div
      className="hidden lg:block lg:w-1/2 z-[20]"
      style={{ clipPath: "polygon(10% 0, 100% 0%, 100% 100%, 0 100%)" }}
    >
      <div
        className="object-cover h-full"
        style={{
          backgroundImage:
            "url(https://images.unsplash.com/photo-1532635241-17e820acc59f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=703&q=80)",
        }}
      >
        <div className="h-full bg-black opacity-25" />
      </div>
    </div>
  </section>
);
