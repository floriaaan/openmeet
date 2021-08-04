import { useEffect, useState } from "react";

function getSessionStorageOrDefault(key, defaultValue) {
  const stored = sessionStorage.getItem(key);
  if (!stored) {
    return defaultValue;
  }
  return JSON.parse(stored);
}

export const Alert = ({ content, link, color = "amber", id = "" }) => {
  const [showAlert, setShowAlert] = useState(
    getSessionStorageOrDefault("alert-" + id, true)
  );

  useEffect(() => {
    sessionStorage.setItem("alert-" + id, JSON.stringify(showAlert));
  }, [showAlert]);
  
  return (
    <>
      <div className="invisible bg-opacity-75 bg-amber-500"></div>
      {showAlert ? (
        <div
          className={
            "inline-flex justify-between items-center text-white px-6 py-4 border-0 rounded-xl relative mb-4 bg-" +
            color +
            "-500"
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
              <a href={link} target="_blank">
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
      ) : null}
    </>
  );
};
