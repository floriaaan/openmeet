import { AppLayout } from "@components/layouts/AppLayout";

import { useRouter } from "next/router";
import { Conversation } from "@components/chat/Conversation";
import { Sidebar } from "@components/chat/Sidebar";


export default function ConversationPage() {
  const router = useRouter();
  const { id } = router.query;

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

