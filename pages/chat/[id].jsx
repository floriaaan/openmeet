import { AppLayout } from "@components/layouts/AppLayout";

import { useRouter } from "next/router";
import { Conversation } from "@components/chat/Conversation";
import { Sidebar } from "@components/chat/Sidebar";
import { useEffect } from "react";
import { firestore } from "@libs/firebase";
import { useAuth } from "@hooks/useAuth";
import {
  collection,
  deleteDoc,
  getDocs,
  query,
  where,
} from "firebase/firestore";

export default function ConversationPage() {
  const router = useRouter();
  const { id } = router.query;
  const { user } = useAuth();

  useEffect(() => {
    if (user?.uid)
      getDocs(
        query(
          collection(firestore, "notifications"),
          where("uid", "==", user.uid),
          where("type", "==", "chat"),
          where("data.id", "==", id)
        )
      ).then(function (querySnapshot) {
        querySnapshot.forEach(function (doc) {
          deleteDoc(doc.ref);
        });
      });
  }, [user, id]);

  return (
    <AppLayout shadowOnNavbar>
      <div className="inline-flex w-full h-full">
        <Sidebar />
        <div className="flex-col flex-grow">
          <Conversation id={id} />
        </div>
      </div>
    </AppLayout>
  );
}
