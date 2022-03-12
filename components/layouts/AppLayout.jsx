import { AppFooter } from "components/footers/AppFooter";
import { AppNavbar } from "components/navbars/AppNavbar";
import { Alert } from "components/ui/Alert";
import { firestore } from "libs/firebase";
import { collection, onSnapshot } from "firebase/firestore";
import { useEffect, useState } from "react";

export const AppLayout = ({ children, shadowOnNavbar, noFooter = false }) => (
  <main className="flex flex-col h-screen">
    <AlertProvider />
    <AppNavbar shadowOnNavbar={shadowOnNavbar} />
    <div className="flex-grow dark:bg-black">
      {children}
    </div>
    {!noFooter && <AppFooter />}
  </main>
);

const AlertProvider = () => {
  const [alerts, setAlerts] = useState([]);

  useEffect(() => {
    const unsub = onSnapshot(
      collection(firestore, "alerts"),
      async (snapshot) => {
        setAlerts(
          snapshot.docs.map((doc) => {
            return { ...doc.data(), id: doc.id };
          })
        );
      }
    );
    return () => unsub();
  }, []);

  return (
    <div className="absolute right-0 z-[47] top-[96px] flex flex-col justify-end p-3 md:p-6 space-y-1 w-full md:w-[30rem]">
      {alerts.map((el, key) =>
        el.active ? <Alert {...el} key={key} /> : null
      )}
    </div>
  );
};
