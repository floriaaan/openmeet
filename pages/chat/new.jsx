import { NewConversation } from "components/chat/Conversation";
import { Sidebar } from "components/chat/Sidebar";
import { AppLayout } from "components/layouts/AppLayout";

export default function ChatNewPage() {
  return (
    <AppLayout shadowOnNavbar>
      <div className="inline-flex w-full h-full">
        <Sidebar />
        <div className="flex-col flex-grow">
            <NewConversation />
        </div>
      </div>
    </AppLayout>
  );
}
