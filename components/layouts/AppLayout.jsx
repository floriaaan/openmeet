import { AppFooter } from "@components/footers/AppFooter";
import { AppNavbar } from "@components/navbars/AppNavbar";

export const AppLayout = ({ children }) => (
  <main className="flex flex-col h-screen">
    {/* <Navbar /> */}
    <AppNavbar />
    <div className="flex-grow dark:bg-gray-900 dark:bg-opacity-10">
      {children}
    </div>
    <AppFooter />
  </main>
);
