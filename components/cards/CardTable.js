/* eslint-disable @next/next/no-img-element */
import React from "react";
import PropTypes from "prop-types";

// components

import TableDropdown from "components/Dropdowns/TableDropdown.js";

export default function CardTable({ color }) {
  return (
    <>
      <div
        className={
          "relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-xl " +
          (color === "light" ? "bg-white dark:bg-gray-900" : "bg-gray-700 text-white")
        }
      >
        <div className="px-4 py-3 mb-0 border-0 rounded-t-xl">
          <div className="flex flex-wrap items-center">
            <div className="relative flex-1 flex-grow w-full max-w-full px-4">
              <h3
                className={
                  "font-semibold text-lg " +
                  (color === "light" ? "text-gray-700 dark:text-gray-300" : "text-white")
                }
              >
                Card Tables
              </h3>
            </div>
          </div>
        </div>
        <div className="block w-full overflow-x-auto">
          {/* Projects table */}
          <table className="items-center w-full bg-transparent border-collapse">
            <thead>
              <tr>
                <th
                  className={
                    "px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left " +
                    (color === "light"
                      ? "bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 text-gray-500 border-gray-100 dark:border-gray-800"
                      : "bg-gray-600 text-gray-200 border-gray-500")
                  }
                >
                  Project
                </th>
                <th
                  className={
                    "px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left " +
                    (color === "light"
                      ? "bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 text-gray-500 border-gray-100 dark:border-gray-800"
                      : "bg-gray-600 text-gray-200 border-gray-500")
                  }
                >
                  Budget
                </th>
                <th
                  className={
                    "px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left " +
                    (color === "light"
                      ? "bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 text-gray-500 border-gray-100 dark:border-gray-800"
                      : "bg-gray-600 text-gray-200 border-gray-500")
                  }
                >
                  Status
                </th>
                <th
                  className={
                    "px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left " +
                    (color === "light"
                      ? "bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 text-gray-500 border-gray-100 dark:border-gray-800"
                      : "bg-gray-600 text-gray-200 border-gray-500")
                  }
                >
                  Users
                </th>
                <th
                  className={
                    "px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left " +
                    (color === "light"
                      ? "bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 text-gray-500 border-gray-100 dark:border-gray-800"
                      : "bg-gray-600 text-gray-200 border-gray-500")
                  }
                >
                  Completion
                </th>
                <th
                  className={
                    "px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left " +
                    (color === "light"
                      ? "bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 text-gray-500 border-gray-100 dark:border-gray-800"
                      : "bg-gray-600 text-gray-200 border-gray-500")
                  }
                ></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th className="flex items-center p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <img
                    src="/img/bootstrap.jpg"
                    className="w-12 h-12 bg-white border rounded-full dark:bg-gray-900"
                    alt="..."
                  ></img>{" "}
                  <span
                    className={
                      "ml-3 font-bold " +
                      +(color === "light" ? "text-gray-600" : "text-white")
                    }
                  >
                    Argon Design System
                  </span>
                </th>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  $2,500 USD
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <i className="mr-2 text-orange-500 fas fa-circle"></i> pending
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex">
                    <img
                      src="/img/team-1-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-2-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-3-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-4-470x470.png"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex items-center">
                    <span className="mr-2">60%</span>
                    <div className="relative w-full">
                      <div className="flex h-2 overflow-hidden text-xs bg-red-200 rounded-xl">
                        <div
                          style={{ width: "60%" }}
                          className="flex flex-col justify-center text-center text-white bg-red-500 shadow-none whitespace-nowrap"
                        ></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs text-right align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <TableDropdown />
                </td>
              </tr>
              <tr>
                <th className="flex items-center p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <img
                    src="/img/angular.jpg"
                    className="w-12 h-12 bg-white border rounded-full dark:bg-gray-900"
                    alt="..."
                  ></img>{" "}
                  <span
                    className={
                      "ml-3 font-bold " +
                      +(color === "light" ? "text-gray-600" : "text-white")
                    }
                  >
                    Angular Now UI Kit PRO
                  </span>
                </th>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  $1,800 USD
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <i className="mr-2 fas fa-circle text-emerald-500"></i>{" "}
                  completed
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex">
                    <img
                      src="/img/team-1-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-2-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-3-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-4-470x470.png"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex items-center">
                    <span className="mr-2">100%</span>
                    <div className="relative w-full">
                      <div className="flex h-2 overflow-hidden text-xs rounded-xl bg-emerald-200">
                        <div
                          style={{ width: "100%" }}
                          className="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-emerald-500"
                        ></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs text-right align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <TableDropdown />
                </td>
              </tr>
              <tr>
                <th className="flex items-center p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <img
                    src="/img/sketch.jpg"
                    className="w-12 h-12 bg-white border rounded-full dark:bg-gray-900"
                    alt="..."
                  ></img>{" "}
                  <span
                    className={
                      "ml-3 font-bold " +
                      +(color === "light" ? "text-gray-600" : "text-white")
                    }
                  >
                    Black Dashboard Sketch
                  </span>
                </th>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  $3,150 USD
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <i className="mr-2 text-red-500 fas fa-circle"></i> delayed
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex">
                    <img
                      src="/img/team-1-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-2-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-3-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-4-470x470.png"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex items-center">
                    <span className="mr-2">73%</span>
                    <div className="relative w-full">
                      <div className="flex h-2 overflow-hidden text-xs bg-red-200 rounded-xl">
                        <div
                          style={{ width: "73%" }}
                          className="flex flex-col justify-center text-center text-white bg-red-500 shadow-none whitespace-nowrap"
                        ></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs text-right align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <TableDropdown />
                </td>
              </tr>
              <tr>
                <th className="flex items-center p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <img
                    src="/img/react.jpg"
                    className="w-12 h-12 bg-white border rounded-full dark:bg-gray-900"
                    alt="..."
                  ></img>{" "}
                  <span
                    className={
                      "ml-3 font-bold " +
                      +(color === "light" ? "text-gray-600" : "text-white")
                    }
                  >
                    React Material Dashboard
                  </span>
                </th>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  $4,400 USD
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <i className="mr-2 text-teal-500 fas fa-circle"></i> on
                  schedule
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex">
                    <img
                      src="/img/team-1-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-2-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-3-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-4-470x470.png"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex items-center">
                    <span className="mr-2">90%</span>
                    <div className="relative w-full">
                      <div className="flex h-2 overflow-hidden text-xs bg-teal-200 rounded-xl">
                        <div
                          style={{ width: "90%" }}
                          className="flex flex-col justify-center text-center text-white bg-teal-500 shadow-none whitespace-nowrap"
                        ></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs text-right align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <TableDropdown />
                </td>
              </tr>
              <tr>
                <th className="flex items-center p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <img
                    src="/img/vue.jpg"
                    className="w-12 h-12 bg-white border rounded-full dark:bg-gray-900"
                    alt="..."
                  ></img>{" "}
                  <span
                    className={
                      "ml-3 font-bold " +
                      +(color === "light" ? "text-gray-600" : "text-white")
                    }
                  >
                    React Material Dashboard
                  </span>
                </th>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  $2,200 USD
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <i className="mr-2 fas fa-circle text-emerald-500"></i>{" "}
                  completed
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex">
                    <img
                      src="/img/team-1-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-2-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-3-800x800.jpg"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                    <img
                      src="/img/team-4-470x470.png"
                      alt="..."
                      className="w-10 h-10 -ml-4 border-2 rounded-full shadow border-gray-50"
                    ></img>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <div className="flex items-center">
                    <span className="mr-2">100%</span>
                    <div className="relative w-full">
                      <div className="flex h-2 overflow-hidden text-xs rounded-xl bg-emerald-200">
                        <div
                          style={{ width: "100%" }}
                          className="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-emerald-500"
                        ></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td className="p-4 px-6 text-xs text-right align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                  <TableDropdown />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </>
  );
}

CardTable.defaultProps = {
  color: "light",
};

CardTable.propTypes = {
  color: PropTypes.oneOf(["light", "dark"]),
};
