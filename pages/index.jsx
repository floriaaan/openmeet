import { EventSection } from "components/landing/EventSection";
import { Footer } from "components/landing/Footer";
import { GroupsSection } from "components/landing/GroupSection";
import { HeroSection } from "components/landing/HeroSection";
import { NewsletterSection } from "components/landing/NewsletterSection";
import { PWASection } from "components/landing/PWASection";
import { SearchSection } from "components/landing/SearchSection";
import { AppLayout } from "components/layouts/AppLayout";

export default function Index() {
  // const { user, signout } = useAuth();

  return (
    <AppLayout noFooter>
      <div className="">
        <HeroSection />
        <SearchSection />
        <section className="flex flex-col h-full px-6 pt-6 pb-6 space-y-6 bg-gray-100 dark:bg-black lg:px-24 2xl:px-32">
          <EventSection />
          <NewsletterSection />
          <GroupsSection />
        </section>
        <PWASection />
      </div>
      <Footer />
    </AppLayout>
  );
}
