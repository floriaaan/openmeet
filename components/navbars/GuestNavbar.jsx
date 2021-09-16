import React from "react";
import Link from "next/link";
import { MenuIcon } from "@heroicons/react/outline";
// components

export const Navbar = (props) => {
  const [navbarOpen, setNavbarOpen] = React.useState(false);
  return (
    <>
      <nav className="absolute top-0 z-50 flex flex-wrap items-center justify-between w-full px-2 py-3 navbar-expand-lg">
        <div className="container flex flex-wrap items-center justify-between px-4 mx-auto">
          <div className="relative flex justify-between w-full lg:w-auto lg:static lg:block lg:justify-start">
            <Link href="/">
              <a
                className="inline-block py-2 mr-4 text-sm font-bold leading-relaxed text-gray-700 dark:text-white whitespace-nowrap"
                href="#"
              >
                OpenMeet
              </a>
            </Link>
            <button
              className="block px-3 py-1 text-xl leading-none bg-transparent border border-transparent border-solid outline-none cursor-pointer rounded-xl lg:hidden focus:outline-none"
              type="button"
              onClick={() => setNavbarOpen(!navbarOpen)}
            >
              <MenuIcon className="w-6 h-6"/>
            </button>
          </div>
          <div
            className={
              "lg:flex flex-grow items-center bg-white dark:bg-gray-900 lg:bg-opacity-0 lg:shadow-none" +
              (navbarOpen ? " block rounded-xl shadow-lg" : " hidden")
            }
            id="example-navbar-warning"
          >
            <ul className="flex flex-col mr-auto list-none lg:flex-row">
              
            </ul>
            <ul className="flex flex-col list-none lg:flex-row lg:ml-auto">
              
            </ul>
          </div>
        </div>
      </nav>
    </>
  );
};
