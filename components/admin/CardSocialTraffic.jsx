import React, { useEffect } from "react";
import { firestore } from "@libs/firebase";

// components

export default function CardSocialTraffic() {
  const [providers, setProviders] = React.useState(null);

  useEffect(() => {
    firestore
      .collection("users")
      .onSnapshot((querySnapshot) => {
        let _tmp = {
          google: [],
          github: [],
          email: [],
          microsoft: [],
          total: 0,
        };
        querySnapshot.forEach((doc) => {
          let data = doc.data();
          _tmp.total += 1;
          switch (data.provider) {
            case "google.com":
              _tmp.google.push(data.id);
              break;
            case "github.com":
              _tmp.github.push(data.id);
              break;
            case "email":
              _tmp.email.push(data.id);
              break;
            case "microsoft.com":
              _tmp.microsoft.push(data.id);
              break;
            default:
              break;
          }
        });
        setProviders(_tmp);
      });
  }, []);
  return (
    <>
      <div className="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white shadow-lg dark:bg-gray-900 rounded-xl">
        <div className="px-4 py-3 mb-0 border-0 rounded-t-xl">
          <div className="flex flex-wrap items-center">
            <div className="relative flex-1 flex-grow w-full max-w-full px-4">
            <h3 className="flex items-center justify-start pt-2 text-xs font-bold text-gray-400 uppercase dark:text-gray-300">
                Authentications by providers
              </h3>
            </div>
          </div>
        </div>
        <div className="block w-full overflow-x-auto">
          {/* Projects table */}
          <table className="items-center w-full bg-transparent border-collapse">
            <thead className="thead-light">
              <tr>
                <th className="px-6 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle border border-l-0 border-r-0 border-gray-100 border-solid dark:border-gray-800 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 whitespace-nowrap">
                  Provider
                </th>
                <th className="px-6 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle border border-l-0 border-r-0 border-gray-100 border-solid dark:border-gray-800 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 whitespace-nowrap">
                  Visitors
                </th>
                <th className="px-6 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle border border-l-0 border-r-0 border-gray-100 border-solid dark:border-gray-800 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 whitespace-nowrap min-w-[140px]"></th>
              </tr>
            </thead>
            <tbody>
              {providers && (
                <>
                  <Line
                    title="Google"
                    data={providers.google}
                    total={providers.total}
                  ></Line>
                  <Line
                    title="Github"
                    data={providers.github}
                    total={providers.total}
                  ></Line>
                  <Line
                    title="Microsoft"
                    data={providers.microsoft}
                    total={providers.total}
                  ></Line>
                  <Line
                    title="Email"
                    data={providers.email}
                    total={providers.total}
                  ></Line>
                </>
              )}
              
            </tbody>
          </table>
        </div>
      </div>
      <div className="hidden bg-green-500"></div>
      <div className="hidden bg-green-200"></div>
      <div className="hidden bg-orange-500"></div>
      <div className="hidden bg-orange-200"></div>
      <div className="hidden bg-red-500"></div>
      <div className="hidden bg-red-200"></div>
    </>
  );
}

const Line = (props) => {
  let color;

  if ((props?.data?.length / props?.total) * 100 >= 66) {
    color = "bg-green";
  } else if ((props?.data?.length / props?.total) * 100 >= 33) {
    color = "bg-orange";
  } else if ((props?.data?.length / props?.total) * 100 < 33) {
    color = "bg-red";
  }

  return (
    <tr>
      <th className="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
        {props?.title}
      </th>
      <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
        {props?.data?.length}
      </td>
      <td className="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
        <div className="flex items-center">
          <span className="mr-2">
            {Math.floor((props?.data?.length / props?.total) * 100)}%
          </span>
          <div className="relative w-full">
            <div
              className={
                "flex h-2 overflow-hidden text-xs rounded-xl " + color + "-200"
              }
            >
              <div
                style={{
                  width:
                  Math.floor((props?.data?.length / props?.total) * 100).toString() +
                    "%",
                }}
                className={
                  "flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap " +
                  color +
                  "-500"
                }
              ></div>
            </div>
          </div>
        </div>
      </td>
    </tr>
  );
};
