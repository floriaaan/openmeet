/* eslint-disable @next/next/no-img-element */
import { ChevronRightIcon, StarIcon } from "@heroicons/react/solid";
import { useEffect, useState } from "react";

import Link from "next/link";
import useTranslation from "next-translate/useTranslation";

export const HeroSection = () => {
  const [stars, setStars] = useState(null);
  const { t } = useTranslation("landing");

  useEffect(
    () => [
      (async () => {
        const res = await fetch(
          "https://api.github.com/repos/floriaaan/openmeet"
        );
        const body = await res.json();
        setStars(body.stargazers_count);
      })(),
    ],
    []
  );

  const colors = [
    "text-green-500",
    "text-amber-500",
    "text-purple-500",
    "text-blue-500",
    "text-red-500",
  ];

  return (
    <main>
      <div>
        <div className="pt-8 overflow-hidden sm:pt-12 lg:relative lg:py-24">
          <div className="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24">
            <div className="mt-20">
              <div>
                <Link href="/blog/latest">
                  <a className="inline-flex space-x-4">
                    <span className="rounded bg-blue-50 dark:bg-blue-800 dark:text-blue-200 px-2.5 py-1 text-xs font-semibold text-blue-600 tracking-wide uppercase">
                      {t("what-new")}
                    </span>
                    <span className="inline-flex items-center space-x-1 text-sm font-medium text-blue-600 dark:text-blue-400">
                      <span>Just shipped our first release 🎉</span>
                      <ChevronRightIcon
                        className="w-5 h-5"
                        aria-hidden="true"
                      />
                    </span>
                  </a>
                </Link>
              </div>
              <div className="mt-6 sm:max-w-xl">
                <h1 className="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100 sm:text-5xl">
                  <span className="mr-2">{t("tagline.sentence")}</span>
                  {t("tagline.subsentence")
                    .split("")
                    .map((c, i) => (
                      <span className={colors[i]} key={i}>
                        {c}
                      </span>
                    ))}
                </h1>
                <p className="mt-6 text-xl text-gray-500 dark:text-gray-400">
                  {t('paragraph')}
                </p>
              </div>

              <div className="mt-6">
                <div className="inline-flex items-center divide-x divide-gray-300 dark:divide-gray-700">
                  <div className="flex flex-shrink-0 pr-5">
                    <StarIcon
                      className="w-5 h-5 text-yellow-400"
                      aria-hidden="true"
                    />
                    <StarIcon
                      className="w-5 h-5 text-yellow-400"
                      aria-hidden="true"
                    />
                    <StarIcon
                      className="w-5 h-5 text-yellow-400"
                      aria-hidden="true"
                    />
                    <StarIcon
                      className="w-5 h-5 text-yellow-400"
                      aria-hidden="true"
                    />
                    <StarIcon
                      className="w-5 h-5 text-yellow-400"
                      aria-hidden="true"
                    />
                  </div>
                  <div className="flex-1 min-w-0 py-1 pl-5 text-sm text-gray-500 dark:text-gray-400 sm:py-3">
                    {stars ? (
                      <>
                        <span className="font-medium text-gray-900 dark:text-gray-200">
                          {stars} {t("stars")}
                        </span>{" "}
                        {t("on") + " "}
                        <a
                          href="https://github.com/floriaaan/openmeet"
                          target="_blank"
                          rel="noreferrer noopenner"
                        >
                          <span className="font-medium text-blue-600 dark:text-blue-500">
                            OpenMeet{" "}
                          </span>
                          project
                        </a>
                      </>
                    ) : (
                      t("retrieving")
                    )}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="sm:mx-auto sm:max-w-3xl sm:px-6 ">
            <div className="py-12 sm:relative sm:mt-12 sm:py-16 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
              <div className="hidden lg:block">
                <div className="absolute inset-y-0 w-screen left-1/2 bg-gray-50 dark:bg-gray-900 rounded-l-3xl lg:left-80 lg:right-0 lg:w-full" />
                <svg
                  className="absolute -mr-3 top-8 right-1/2 lg:m-0 lg:left-0"
                  width={404}
                  height={392}
                  fill="none"
                  viewBox="0 0 404 392"
                >
                  <defs>
                    <pattern
                      id="837c3e70-6c3a-44e6-8854-cc48c737b659"
                      x={0}
                      y={0}
                      width={20}
                      height={20}
                      patternUnits="userSpaceOnUse"
                    >
                      <rect
                        x={0}
                        y={0}
                        width={4}
                        height={4}
                        className="text-gray-200 dark:text-gray-700"
                        fill="currentColor"
                      />
                    </pattern>
                  </defs>
                  <rect
                    width={404}
                    height={392}
                    fill="url(#837c3e70-6c3a-44e6-8854-cc48c737b659)"
                  />
                </svg>
              </div>
              <div className="relative pl-4 -mr-40 sm:mx-auto sm:max-w-3xl sm:px-0 lg:max-w-none lg:h-full lg:pl-12">
                <img
                  className="w-full rounded-md shadow-xl ring-1 ring-black ring-opacity-5 lg:h-full lg:w-auto lg:max-w-none"
                  src="https://images.unsplash.com/photo-1532635241-17e820acc59f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=703&q=80"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>

        {/* <div className="bg-white">
        <div className="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <p className="text-sm font-semibold tracking-wide text-center text-gray-500 uppercase">
            Trusted by over 5 very average small businesses
          </p>
          <div className="grid grid-cols-2 gap-8 mt-6 md:grid-cols-6 lg:grid-cols-5">
            <div className="flex justify-center col-span-1 md:col-span-2 lg:col-span-1">
              <img
                className="h-12"
                src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg"
                alt="Tuple"
              />
            </div>
            <div className="flex justify-center col-span-1 md:col-span-2 lg:col-span-1">
              <img
                className="h-12"
                src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg"
                alt="Mirage"
              />
            </div>
            <div className="flex justify-center col-span-1 md:col-span-2 lg:col-span-1">
              <img
                className="h-12"
                src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg"
                alt="StaticKit"
              />
            </div>
            <div className="flex justify-center col-span-1 md:col-span-2 md:col-start-2 lg:col-span-1">
              <img
                className="h-12"
                src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg"
                alt="Transistor"
              />
            </div>
            <div className="flex justify-center col-span-2 md:col-span-2 md:col-start-4 lg:col-span-1">
              <img
                className="h-12"
                src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg"
                alt="Workcation"
              />
            </div>
          </div>
        </div>
      </div> */}
      </div>
    </main>
  );
};
