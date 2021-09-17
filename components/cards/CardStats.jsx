import React from "react";
import PropTypes from "prop-types";

export default function CardStats({
  statSubtitle,
  statTitle,
  statArrow,
  statPercent,
  statPercentColor,
  statDescripiron,
  statIconName,
  statIconColor,
  isLink,
}) {
  return (
    <>
      <div
        className={
          "relative flex flex-col min-w-0 break-words bg-white shadow-lg dark:bg-gray-900 rounded-xl" +
          (isLink ? " cursor-pointer hover:bg-gray-100 hover:shadow-xl transition duration-500 dark:hover:bg-gray-700" : "")
        }
      >
        <div className="flex-auto p-4">
          <div className="flex flex-wrap">
            <div className="relative flex-1 flex-grow w-full max-w-full pr-4">
              <h5 className="inline-flex items-center justify-start w-full text-xs font-bold text-gray-400 uppercase">
                {statSubtitle}

                {isLink && (
                  <i className="w-3 h-3 ml-2 fas fa-external-link-alt"></i>
                )}
              </h5>
              <span className="text-xl font-semibold text-gray-700 dark:text-gray-300">
                {statTitle}
              </span>
            </div>
            <div className="relative flex-initial w-auto pl-4">
              <div
                className={
                  "text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full " +
                  statIconColor
                }
              >
                <i className={statIconName}></i>
              </div>
            </div>
          </div>
          <p className="mt-4 text-sm text-gray-400">
            {statPercent && (
              <span className={statPercentColor + " mr-2"}>
                <i
                  className={
                    statArrow === "up"
                      ? "fas fa-arrow-up"
                      : statArrow === "down"
                      ? "fas fa-arrow-down"
                      : ""
                  }
                ></i>{" "}
                {statPercent}%
              </span>
            )}
            <span className="whitespace-nowrap">{statDescripiron}</span>
          </p>
        </div>
      </div>
    </>
  );
}

CardStats.defaultProps = {
  statSubtitle: "Traffic",
  statTitle: "350,897",
  // statArrow: "up",
  // statPercent: "3.48",
  // statPercentColor: "text-emerald-500",
  statDescripiron: "Since last month",
  statIconName: "far fa-chart-bar",
  statIconColor: "bg-red-500",
  isLink: false,
};

CardStats.propTypes = {
  statSubtitle: PropTypes.string,
  statTitle: PropTypes.string,
  statArrow: PropTypes.oneOf(["up", "down"]),
  statPercent: PropTypes.string,
  // can be any of the text color utilities
  // from tailwindcss
  statPercentColor: PropTypes.string,
  statDescripiron: PropTypes.string,
  statIconName: PropTypes.string,
  // can be any of the background color utilities
  // from tailwindcss
  statIconColor: PropTypes.string,
};