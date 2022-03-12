import React from "react";

// components

import { AdminNavbar } from "components/navbars/AdminNavbar";
import { Sidebar } from "components/admin/Sidebar";
import { HeaderStats } from "components/admin/HeaderStats";
import { FooterAdmin } from "components/footers/AdminFooter";

export const AdminLayout = ({ children, pageTitle }) => {
  return (
    <>
      <Sidebar />
      <div className="relative bg-gray-100 dark:bg-gray-800 md:ml-64">
        <AdminNavbar title={pageTitle} />
        {/* Header */}
        <HeaderStats />
        <div className="w-full px-4 pt-6 mx-auto md:px-10">
          {children}
          <FooterAdmin />
        </div>
      </div>
    </>
  );
};
