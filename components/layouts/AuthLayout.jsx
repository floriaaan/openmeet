import React from "react";

// components

import { Navbar } from "components/navbars/GuestNavbar";
import { FooterSmall } from "components/footers/SmallFooter";

export const AuthLayout = ({ children }) => {
  return (
    <>
      <Navbar transparent />
      <main>
        <section className="relative flex items-center w-full h-full min-h-screen">
          <div
            className="absolute top-0 w-full h-full bg-gray-100 bg-no-repeat dark:bg-black bg-full"
            style={{
              backgroundImage: "url('/img/register_bg_2.png')",
            }}
          ></div>
          {children}
          <FooterSmall absolute />
        </section>
      </main>
    </>
  );
};
