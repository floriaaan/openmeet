import { GuestLayout } from "@components/layouts/GuestLayout";
import Lottie from "react-lottie";
import animationData from "resources/lotties/offline.json";

import Link from "next/link";
import Image from "next/image";

export default function OfflinePage() {
  return (
    <GuestLayout>
      <div className="flex flex-col items-center flex-grow h-full pt-32 bg-gray-100 dark:bg-gray-900 backdrop-filter backdrop-blur-lg bg-opacity-10 dark:bg-opacity-10">
        <Link href="/">
          <a>
            <Image src="/logo.svg" alt="OpenMeet" width={64} height={64} />
          </a>
        </Link>
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
          <span className="mx-2 text-red-600 dark:text-red-400">offline</span>
          ...
        </h3>
      </div>
    </GuestLayout>
  );
}
