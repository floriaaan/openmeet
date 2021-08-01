import { AppLayout } from "@components/layouts/AppLayout";

import { useRouter } from "next/router";
import { Conversation } from "@components/chat/Conversation";
import { Sidebar } from "@components/chat/Sidebar";
import { useEffect } from "react";
import { firestore } from "@libs/firebase";
import { useAuth } from "@hooks/useAuth";

export default function ConversationPage() {
  const router = useRouter();
  const { id } = router.query;
  const { user } = useAuth();

  useEffect(() => {
    firestore
      .collection("notifications")
      .where("uid", "==", user.uid)
      .where("type", "==", "chat")
      .where("data.id", "==", id)
      .get()
      .then(function (querySnapshot) {
        querySnapshot.forEach(function (doc) {
          doc.ref.delete();
        });
      });
  }, [id]);

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
