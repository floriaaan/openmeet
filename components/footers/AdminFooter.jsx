import React from "react";

export const FooterAdmin = () => {
  return (
    <>
      <footer className="block py-4">
        <div className="container px-4 mx-auto">
          <hr className="mb-4 border-gray-200 dark:border-gray-800 border-b-1" />
          <div className="flex flex-wrap items-center justify-center md:justify-between">
            <div className="w-full px-4 md:w-4/12">
              <div className="py-1 text-sm font-semibold text-center text-gray-500 md:text-left">
                Copyright © {new Date().getFullYear()}{" "}
                <a
                  href="https://github.com/floriaaan"
                  className="py-1 text-sm font-semibold text-gray-500 hover:text-gray-700 dark:text-gray-300"
                >
                  Floriaaan
                </a>
              </div>
            </div>
            <div className="w-full px-4 md:w-8/12">
              <ul className="flex flex-wrap justify-center list-none md:justify-end">
                
                <li>
                  <a
                    href="https://github.com/floriaaan"
                    className="block px-3 py-1 text-sm font-semibold text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-300"
                  >
                    About Us
                  </a>
                </li>
                <li>
                  <a
                    href="https://floriaaan.github.io/"
                    className="block px-3 py-1 text-sm font-semibold text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-300"
                  >
                    Portfolio
                  </a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </>
  );
};
