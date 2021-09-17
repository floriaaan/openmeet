import { AppLayout } from "@components/layouts/AppLayout";
import useTranslation from "next-translate/useTranslation";

import { useRouter } from "next/router";
import Link from "next/link";

export default function I18NPage() {
  const { t } = useTranslation("common");
  const router = useRouter();

  return (
    <AppLayout>
      <div className="flex flex-col space-y-3">
        {t`test`}
        <Link href="/test/i18n" locale={router.locale === "en" ? "fr" : "en"}>
          <a>change locale</a>
        </Link>
      </div>
    </AppLayout>
  );
}
