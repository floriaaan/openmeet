import { AppLayout } from "@components/layouts/AppLayout";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { useEffect, useState } from "react";

export default function GroupSettingsPage() {
  const [groups, setGroups] = useState([]);
  const { user } = useAuth();

  useEffect(() => {
    if (user) {
      firestore
        .collection("groups")
        .where("admin.uid", "==", user.uid)
        .get()
        .then((querySnapshot) => {
          const groups = [];
          querySnapshot.forEach((doc) => {
            groups.push({ slug: doc.id, ...doc.data() });
          });
          setGroups(groups);
        });
    }
  }, [user]);

  return (
    <AppLayout>
      <pre>{JSON.stringify(groups, undefined, 2)}</pre>
    </AppLayout>
  );
}
