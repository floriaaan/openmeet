import { AppLayout } from "@components/layouts/AppLayout";

import { useRouter } from "next/router";
// import { firestore } from "@libs/firebase";
import { Conversation } from "@components/chat/Conversation";
import { useAuth } from "@hooks/useAuth";

export default function ConversationPage() {
  const router = useRouter();
  const { id } = router.query;

  return (
    <AppLayout>
      <div className="inline-flex w-full h-full">
        <div className="flex-col"></div>
        <div className="flex-col flex-grow">
          
          <Conversation id={id} />
        </div>
      </div>
    </AppLayout>
  );
}

