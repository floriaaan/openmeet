import Link from "next/link";

import { Menu, Transition } from "@headlessui/react";
import { FlagIcon as HiFlagIcon } from "@heroicons/react/outline";
import { useRouter } from "next/router";
import { FlagIcon } from "@components/FlagIcon";
import { classes } from "@libs/classes";

const locales = [
  { code: "en", label: "English" },
  { code: "fr", label: "Français" },
];

export const LocaleDropdown = () => {
  const router = useRouter();
  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button>
            <div className="flex items-center">
              <span
                className={classes(
                  "btn-gray rounded-full p-2",
                  open &&
                    "text-gray-800 bg-gray-300 dark:bg-gray-700 dark:text-gray-300"
                )}
              >
                <FlagIcon className="w-4 h-4" locale={router.locale} />
              </span>
            </div>
          </Menu.Button>
          <Transition
            show={open}
            enter="transform transition duration-100 ease-in"
            enterFrom="opacity-0 scale-95"
            enterTo="opacity-100 scale-100"
            leave="transform transition duration-75 ease-out"
            leaveFrom="opacity-100 scale-100"
            leaveTo="opacity-0 scale-95"
          >
            <Menu.Items
              static
              className={
                "bg-white md:origin-top-right fixed md:absolute left-0 md:left-auto md:right-0 mt-6 dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg w-full md:w-48"
              }
            >
              <div className="block px-4 py-2 text-xs text-gray-400">
                Locale
              </div>

              <div className="flex flex-col">
                {locales.map((locale, key) => (
                  <Locale {...locale} key={key} />
                ))}
              </div>
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const Locale = ({ code, label }) => {
  const router = useRouter();
  return (
    <Link href={router.pathname} locale={code}>
      <a className="inline-flex items-center px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800">
        {/* eslint-disable-next-line @next/next/no-img-element */}
        <FlagIcon
          className="w-6 h-6 pr-2 mr-2 text-center border-r border-gray-200 dark:border-gray-800"
          locale={code}
        />
        {label}
      </a>
    </Link>
  );
};
