import { AppFooter } from "@components/footers/AppFooter";
import { AppNavbar } from "@components/navbars/AppNavbar";
import { Alert } from "@components/ui/Alert";
import { firestore } from "@libs/firebase";
import { useEffect, useState } from "react";

export const AppLayout = ({ children, shadowOnNavbar, noFooter = false }) => (
  <main className="flex flex-col h-screen">
    <AlertProvider />
    <AppNavbar shadowOnNavbar={shadowOnNavbar} />
    <div className="flex-grow dark:bg-gray-900 dark:bg-opacity-10">
      {children}
    </div>
    {!noFooter && <AppFooter />}
  </main>
);

const AlertProvider = () => {
  const [alerts, setAlerts] = useState([]);

  useEffect(() => {
    firestore.collection("alerts").onSnapshot(async (snapshot) => {
      setAlerts(
        snapshot.docs.map((doc) => {
          return { ...doc.data(), id: doc.id };
        })
      );
    });
  }, []);

  return (
    <div className="absolute right-0 z-[49] top-[96px] flex flex-col justify-end m-6 lg:mx-12 space-y-2 w-96">
      {alerts.map((el, key) => (
        <Alert {...el} key={key} />
      ))}
    </div>
  );
};
