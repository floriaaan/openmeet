import { AdminLayout } from "@components/layouts/AdminLayout";
import { useEffect, useState } from "react";

import semver from "semver";
import openmeet from "resources/openmeet";

export default function AdminSecurityPage() {
  return (
    <AdminLayout pageTitle="Security and Privacy">
      <div className="flex flex-wrap grid-cols-1 gap-6 lg:grid min-h-[52vh]">
        <Checklist />
      </div>
    </AdminLayout>
  );
}

const Checklist = () => {
  const [security, setSecurity] = useState({ https: false, version: false });

  useEffect(() => {
    const fetchVersion = async () => {
      const res = await fetch(
        "https://raw.githubusercontent.com/floriaaan/openmeet/main/resources/openmeet.json"
      );
      const body = await res.json();
      // console.log(body)
      setSecurity({
        ...security,
        version: semver.gte(openmeet.version, body.version),
      });
    };

    fetchVersion();

    setSecurity({
      ...security,
      https: window.location.protocol === "https:",
    });
  }, []);

  return (
    <div className="w-full">
      <>
        <div className="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white shadow-lg dark:bg-gray-900 rounded-xl">
          <div className="px-4 py-3 mb-0 border-0 rounded-t-xl">
            <div className="flex flex-wrap items-center">
              <div className="relative flex-1 flex-grow w-full max-w-full px-4">
                <h3 className="flex items-center justify-start pt-2 text-xs font-bold text-gray-400 uppercase dark:text-gray-300">
                  Security checklist
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
                    Check
                  </th>
                  <th className="px-6 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle border border-l-0 border-r-0 border-gray-100 border-solid dark:border-gray-800 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-75 whitespace-nowrap">
                    Pass
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td className="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                    Is HTTPS enabled ?
                  </td>
                  <td className="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                    {security.https ? "✅" : "❌"}
                  </td>
                </tr>

                <tr>
                  <td className="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                    Is OpenMeet up to date ?
                  </td>
                  <td className="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                    {security.version ? "✅" : "❌"}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </>
    </div>
  );
};
