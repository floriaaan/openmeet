import React, { useEffect } from "react";
import { Navbar } from "@components/navbars/GuestNavbar";
import { FooterSmall } from "@components/footers/SmallFooter";
import { isMobile } from "@libs/isMobile";

export const GuestLayout = ({ children }) => {
  const [mobile, setMobile] = React.useState(false);

  useEffect(() => {
    setMobile(isMobile());
  }, []);

  return (
    <>
      {!mobile ? (
        <>
          {/* <Navbar transparent /> */}
          <main>
            <section className="relative w-full h-full min-h-screen">
              <div
                className="absolute top-0 w-full h-full bg-gray-100 bg-no-repeat dark:bg-black bg-full"
                style={{
                  backgroundImage: "url('/img/register_bg_2.png')",
                }}
              ></div>
              <div className="w-full h-screen">{children}</div>
              <FooterSmall absolute />
            </section>
          </main>
        </>
      ) : (
        <div className="w-full h-screen">{children}</div>
      )}
    </>
  );
};
