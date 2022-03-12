import React from "react";
import { AdminLayout } from "components/layouts/AdminLayout";

import CardSocialTraffic from "components/admin/CardSocialTraffic";
import ThemeOverview from "components/admin/ThemeOverview";

export default function Dashboard() {
  return (
    <AdminLayout pageTitle="Dashboard">
      <div className="flex flex-wrap grid-cols-2 gap-6 lg:grid min-h-[50vh]">
        <div className="w-full">
          <ThemeOverview />
        </div>
        <div className="w-full">
          <CardSocialTraffic />
        </div>
      </div>
    </AdminLayout>
  );
}
