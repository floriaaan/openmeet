import { AppLayout } from "@components/layouts/AppLayout";
import { GuestLayout } from "@components/layouts/GuestLayout";
import { firestore } from "@libs/firebase";
import { doc, updateDoc } from "firebase/firestore";
import { useRouter } from "next/router";
import { useState } from "react";

import Link from "next/link"

const VerifyEmail = () => {
  const router = useRouter();
  const { token } = router.query;
  const [name, setName] = useState("");

  const onSubmit = async (e) => {
    e.preventDefault();
    await updateDoc(
      doc(firestore, `newsletter_subscriptions/${token}`),
      {
        verified: true,
        name,
      },
      { merge: true }
    );
    router.push("/");
  };

  return (
    <GuestLayout>
      <div className="w-full max-w-sm mx-auto lg:w-96">
          <div>
            <Link href="/">
              <a>
                {/* eslint-disable-next-line @next/next/no-img-element */}
                <img className="w-auto h-12" src="/logo.svg" alt="OpenMeet" />
              </a>
            </Link>
            <h2 className="mt-6 text-3xl font-extrabold text-gray-900 dark:text-gray-100">
              One more step!
            </h2>
          </div>
        <div className="w-full mt-8">
          <div className="py-5">
            <h3 className="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">
              Tell us your name
            </h3>
            <div className="max-w-xl mt-2 text-sm text-gray-500">
              <p>
                We need to have your name to send you the latest news and
                updates.
              </p>
            </div>
            <form className="mt-5 sm:flex sm:items-center" onSubmit={onSubmit}>
              <div className="w-full sm:max-w-xs">
                <label htmlFor="name" className="sr-only">
                  Name
                </label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  value={name}
                  onChange={(e) => setName(e.target.value)}
                  className="block w-full border-gray-300 rounded-md shadow-sm form-input focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                  placeholder="John Doe"
                />
              </div>
              <button
                type="submit"
                className="inline-flex items-center justify-center w-full px-4 py-2 mt-3 font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Save
              </button>
            </form>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
};

export default VerifyEmail;
