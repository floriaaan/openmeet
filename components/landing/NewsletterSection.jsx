import { firestore } from "@libs/firebase";
import { addDoc, collection } from "firebase/firestore";
import useTranslation from "next-translate/useTranslation";
import Link from "next/link";
import { useState } from "react";

import Lottie from "react-lottie";
import animationData from "resources/lotties/check.json";

export const NewsletterSection = () => {
  const { t } = useTranslation(["common", "landing"]);

  const [email, setEmail] = useState("");
  const [sended, setSended] = useState(false);

  const onSubmit = async (e) => {
    e.preventDefault();
    await addDoc(collection(firestore, "newsletter_subscriptions"), {
      email,
      createdAt: new Date().toISOString(),
      verified: false,
    });
    setSended(true);
  };

  return (
    <section className="lg:px-12">
      <div className="px-6 py-6 rounded-lg bg-gradient-to-bl from-purple-600 to-indigo-500 md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
        <div className="xl:w-0 xl:flex-1">
          <h2 className="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
            {t("landing:newsletter.title")}
          </h2>
          <p className="max-w-3xl mt-3 text-lg leading-6 text-indigo-200">
            {t("landing:newsletter.subtitle")}
          </p>
        </div>
        <div className="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
          {!sended ? (
            <form className="sm:flex" onSubmit={onSubmit}>
              <label htmlFor="email-address" className="sr-only">
                {t("common:email.email-address")}
              </label>
              <input
                id="email-address"
                name="email-address"
                type="email"
                autoComplete="email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                required
                className="w-full px-5 py-3 placeholder-gray-500 duration-300 border-white rounded-xl form-input focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white"
                placeholder={t("common:email.enter-your-email")}
              />
              <button
                type="submit"
                className="flex items-center justify-center w-full px-5 py-3 mt-3 text-base font-semibold text-white duration-300 bg-blue-600 shadow rounded-xl hover:bg-blue-700 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0"
              >
                {t("common:notify-me")}
              </button>
            </form>
          ) : (
            <div className="w-72 h-72">
              <Lottie
                isClickToPauseDisabled
                options={{
                  loop: true,
                  autoplay: false,
                  animationData,
                  rendererSettings: {
                    preserveAspectRatio: "xMidYMid slice",
                  },
                }}
              />
            </div>
          )}
          <p className="mt-3 text-sm text-gray-200">
            {t("common:privacy-policy.sentence") +" "}
            <Link href="/legal/privacy-policy">
              <a className="font-medium text-white underline">
                {t("common:privacy-policy.name")}.
              </a>
            </Link>
          </p>
        </div>
      </div>
    </section>
  );
};
