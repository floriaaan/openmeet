import { AppLayout } from "@components/layouts/AppLayout";
import { RainbowHighlight } from "@components/ui/RainbowHighlight";
import { RoughNotationGroup } from "react-rough-notation";

export default function TestBlurryPage() {
  const colors = ["#bbf7d0", "#e9d5ff", "#fef9c3", "#BFDBFE"];

  return (
    <AppLayout>
      <div className="flex w-full h-[500px] bg-gray-50 dark:bg-gray-900">
        <div className="flex items-center px-8 text-center lg:text-left md:px-12 lg:w-1/2">
          <div className="w-[32rem]">
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
          </div>
        </div>
        <div
          className="hidden lg:block lg:w-1/2"
          style={{ clipPath: "polygon(10% 0, 100% 0%, 100% 100%, 0 100%)" }}
        >
          <div
            className="object-cover h-full"
            style={{
              backgroundImage:
                "url(https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80)",
            }}
          >
            <div className="h-full bg-black opacity-25" />
          </div>
        </div>
      </div>
    </AppLayout>
  );
}
