import { useEventListener } from "hooks/useEventListener";
import useTranslation from "next-translate/useTranslation";

export const PWASection = () => {
  const { t } = useTranslation("landing");

  let deferredPrompt;
  useEventListener("beforeinstallprompt", (e) => {
    e.preventDefault();
    deferredPrompt = e;
  });

  return (
    <section className="flex flex-col h-full px-6 py-12 bg-white dark:bg-black lg:px-24 2xl:px-32">
      <div className="flex flex-col overflow-hidden shadow-xl lg:flex-row bg-gradient-to-tr from-blue-600 to-green-500 lg:mx-12 rounded-xl ">
        <div className="px-6 pt-10 pb-12 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
          <div className="flex-col justify-center h-full lg:flex">
            <h2 className="text-3xl font-extrabold text-white sm:text-4xl">
              <span className="block">{t("pwa.title")}</span>
              <span className="block">{t("pwa.subtitle")}</span>
            </h2>
            <p className="mt-4 text-lg leading-6 text-blue-100">
            {t("pwa.description")}
            </p>
            <button
              onClick={(e) => {
                console.log(deferredPrompt);
                deferredPrompt?.prompt();
                deferredPrompt?.userChoice.then((choiceResult) => {
                  if (choiceResult.outcome === "accepted") {
                    console.log("User accepted the A2HS prompt");
                  } else {
                    console.log("User dismissed the A2HS prompt");
                  }
                  deferredPrompt = null;
                });
              }}
              //   disabled={!deferredPrompt}
              className={
                "inline-flex items-center px-5 py-3 mt-8 text-base font-medium text-blue-600 duration-300 bg-white border border-transparent shadow max-w-max hover:bg-blue-50 focus:outline-none rounded-xl" +
                // (deferredPrompt ? "" : " opacity-50 cursor-not-allowed")
                ""
              }
            >
              {t("pwa.button")}
            </button>
          </div>
        </div>
        <div className="inline-flex justify-end w-full -mt-6 md:hidden lg:inline-flex">
          {/* eslint-disable-next-line @next/next/no-img-element */}
          <img
            className="object-cover object-right-top w-[32rem] transform translate-x-6 translate-y-6 rounded-xl sm:translate-x-16 lg:translate-y-20"
            src="/img/install2.png"
            alt="App screenshot"
          />
        </div>
      </div>
    </section>
  );
};
