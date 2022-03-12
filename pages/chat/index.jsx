import { Sidebar } from "components/chat/Sidebar";
import { AppLayout } from "components/layouts/AppLayout";

export default function ChatPage() {
  return <AppLayout shadowOnNavbar>
    <div className="inline-flex w-full h-full">
        <Sidebar display />
      </div>
  </AppLayout>;
}
