import { AppLayout } from "components/layouts/AppLayout";
import Lottie from "react-lottie";
import animationData from "resources/lotties/404.json";

export default function Custom404() {
  return (
    <AppLayout>
      <main className="flex flex-col items-center justify-center w-full h-full">
        <div className="w-72 h-72">
          <Lottie
            isClickToPauseDisabled
            options={{
              loop: true,
              autoplay: true,
              animationData: animationData,

              rendererSettings: {
                preserveAspectRatio: "xMidYMid slice",
              },
            }}
            // height={"8rem"}
            // width={"8rem"}
          />
        </div>
        <h3 className="mb-2 text-3xl font-extrabold text-center text-gray-800 dark:text-gray-200">
          It seems that you are
          <span className="mx-2 text-blue-600 dark:text-blue-400">lost</span>
          ...
        </h3>
      </main>
    </AppLayout>
  );
}
