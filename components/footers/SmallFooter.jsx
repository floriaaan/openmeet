import React from "react";

export const FooterSmall = (props) => {
  return (
    <>
      <footer
        className={
          (props.absolute
            ? "absolute w-full bottom-0 bg-gray-800"
            : "relative") + " pb-6"
        }
      >
        <div className="container px-4 mx-auto">
          <hr className="mb-6 border-gray-600 border-b-1" />
          <div className="flex flex-wrap items-center justify-center md:justify-between">
            <div className="w-full px-4 md:w-4/12">
              <div className="py-1 text-sm font-semibold text-center text-gray-500 md:text-left">
                Copyright © {new Date().getFullYear()}{" "}
                <a
                  href="https://github.com/floriaaan"
                  className="py-1 text-sm font-semibold text-white hover:text-gray-300"
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
                    className="block px-3 py-1 text-sm font-semibold text-white hover:text-gray-300"
                  >
                    About Us
                  </a>
                </li>
                <li>
                  <a
                    href="https://floriaaan.github.io"
                    className="block px-3 py-1 text-sm font-semibold text-white hover:text-gray-300"
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
