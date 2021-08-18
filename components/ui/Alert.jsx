import { useEffect, useState } from "react";

function getSessionStorageOrDefault(key, defaultValue) {
  const stored = sessionStorage.getItem(key);
  if (!stored) {
    return defaultValue;
  }
  return JSON.parse(stored);
}

export const Alert = ({ content, link = null, color = "amber", id = "", details = null }) => {
  const [showAlert, setShowAlert] = useState(
    getSessionStorageOrDefault("alert-" + id, true)
  );

  useEffect(() => {
    sessionStorage.setItem("alert-" + id, JSON.stringify(showAlert));
  }, [showAlert, id]);

  return (
    <>
      <div className="invisible bg-opacity-75 bg-amber-500 border-amber-600"></div>
      <div className="invisible bg-green-500 bg-opacity-75 border-green-600"></div>
      {showAlert ? (
        <div
          className={
            "flex flex-col justify-between items-center text-white px-6 py-4 border-0 rounded-xl  mb-4 bg-" +
            color +
            "-500"
          }
        >
          <div
            className={
              details
                ? "inline-flex w-full justify-between items-center border-b mb-1 pb-1 border-" +
                  color +
                  "-600"
                : "inline-flex items-center w-full justify-between"
            }
          >
            <span className="inline-flex items-center text-xl">
              <i className="mr-5 fas fa-bell" />
              <span className="inline-block mr-8 text-base align-middle">
                {content}
              </span>
            </span>

            <span className="inline-flex items-center space-x-3 ">
              {link && (
                <a href={link} target="_blank" rel="noreferrer noopener">
                  <i className="fas fa-external-link-alt"></i>
                </a>
              )}
              <button
                className="font-semibold leading-none bg-transparent outline-none focus:outline-none"
                onClick={() => setShowAlert(false)}
              >
                <i className="fa-times fas"></i>
              </button>
            </span>
          </div>
          {details && <div className="inline-flex justify-center w-full text-xs">
                {details}
          </div>}
        </div>
      ) : null}
    </>
  );
};
