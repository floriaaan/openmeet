import { AppFooter } from "@components/footers/AppFooter";
import { AppNavbar } from "@components/navbars/AppNavbar";

export const AppLayout = ({ children, shadowOnNavbar, noFooter = false }) => (
  <main className="flex flex-col h-screen">
    {/* <Navbar /> */}
    <AppNavbar shadowOnNavbar={shadowOnNavbar} />
    <div className="flex-grow dark:bg-gray-900 dark:bg-opacity-10">
      {children}
    </div>
    {!noFooter && <AppFooter />}
  </main>
);
