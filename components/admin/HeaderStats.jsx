import React, { useEffect, useState } from "react";
import Link from "next/link";
import semver from "semver";
import openmeet from "resources/openmeet";

import CardStats from "@components/cards/CardStats";
import { firestore } from "@libs/firebase";
import OpenMeetOverview from "./OpenMeetOverview";

export const HeaderStats = () => {
  const [security, setSecurity] = useState({ https: false, version: false });
  const [users, setUsers] = useState({ count: 0, stat: "" });
  const [groups, setGroups] = useState({ count: 0, stat: "" });

  useEffect(() => {
    const fetchVersion = async () => {
      const res = await fetch(
        "https://raw.githubusercontent.com/floriaaan/openmeet/main/resources/openmeet.json"
      );
      const body = await res.json();
      // console.log(body);
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

    firestore
      .collection("users")
      .get()
      .then((snap) => {
        let lastLastWeek = 0;
        let lastWeek = 0;
        snap.docs.forEach((doc) => {
          lastLastWeek +=
            new Date(doc.data().createdAt) <
              new Date() - 7 * 24 * 60 * 60 * 1000 &&
            new Date(doc.data().createdAt) >
              new Date() - 14 * 24 * 60 * 60 * 1000;

          lastWeek +=
            new Date(doc.data().createdAt) >
            new Date() - 7 * 24 * 60 * 60 * 1000;
        });
        setUsers({
          count: snap.size,
          stat: Math.floor((lastLastWeek / lastWeek) * 100).toString(),
        });
      });

    firestore
      .collection("groups")
      .get()
      .then((snap) => {
        let lastLastWeek = 0;
        let lastWeek = 0;
        snap.docs.forEach((doc) => {
          lastLastWeek +=
            new Date(doc.data().createdAt) <
              new Date() - 31 * 24 * 60 * 60 * 1000 &&
            new Date(doc.data().createdAt) >
              new Date() - 60 * 24 * 60 * 60 * 1000;

          lastWeek +=
            new Date(doc.data().createdAt) >
            new Date() - 31 * 24 * 60 * 60 * 1000;
        });
        setGroups({
          count: snap.size,
          stat: Math.floor((lastLastWeek / lastWeek) * 100).toString(),
        });
      });
  }, []);

  return (
    <>
      {/* Header */}
      <div className="relative hidden pt-12 pb-32 bg-gray-800 dark:bg-black md:flex md:pt-32">
        <div className="w-full px-4 mx-auto md:px-10">
          <div>
            {/* Card stats */}
            <div className="flex flex-wrap grid-cols-2 gap-3 lg:gap-6 xl:grid-cols-4 md:grid">
              <div className="w-full">
                <OpenMeetOverview />
              </div>
              <div className="w-full">
                <CardStats
                  statSubtitle="USERS"
                  statTitle={users.count}
                  statArrow={users.stat > 0 ? "up" : "down"}
                  statPercent={users.stat}
                  statPercentColor={
                    users.stat > 0 ? "text-emerald-500" : "text-red-500"
                  }
                  statDescripiron="Since last week"
                  statIconName="fas fa-users"
                  statIconColor="bg-orange-500"
                />
              </div>
              <div className="w-full">
                <Link href="/admin/security">
                  <a>
                    <CardStats
                      statSubtitle="SECURITY"
                      statTitle={
                        security.https && security.version ? "Good" : "Bad"
                      }
                      statDescripiron={
                        security.https && security.version
                          ? "All checks went correctly"
                          : "Some  checks went wrong"
                      }
                      statIconName="fas fa-shield-alt"
                      statIconColor={
                        security.https && security.version
                          ? "bg-emerald-500"
                          : "bg-red-500"
                      }
                      isLink
                    />
                  </a>
                </Link>
              </div>
              <div className="w-full">
                <CardStats
                  statSubtitle="GROUPS"
                  statTitle={groups.count}
                  statArrow={groups.stat > 0 ? "up" : "down"}
                  statPercent={groups.stat}
                  statPercentColor={
                    groups.stat > 0 ? "text-emerald-500" : "text-red-500"
                  }
                  statDescripiron="Since last month"
                  statIconName="fas fa-percent"
                  statIconColor="bg-lightBlue-500"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};
