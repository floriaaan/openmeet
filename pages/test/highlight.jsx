import { AppLayout } from "@components/layouts/AppLayout";
import { RainbowHighlight } from "@components/ui/RainbowHighlight";
import { RoughNotationGroup } from "react-rough-notation";

export default function TestBlurryPage() {
    const colors = ["#bbf7d0", "#e9d5ff", "#fef9c3", "#BFDBFE"];

  return (
    <AppLayout>
      <div className="flex items-center justify-center h-full px-16 bg-gray-50 dark:bg-gray-900">
        <div className="w-full mx-auto text-center md:w-1/2 md:text-left lg:p-20">
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
    </AppLayout>
  );
}
