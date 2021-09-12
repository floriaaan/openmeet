import { AppLayout } from "@components/layouts/AppLayout";
import { firestore } from "@libs/firebase";
import { doc, updateDoc } from "firebase/firestore";
import { useRouter } from "next/router";
import { useState } from "react";

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
    <AppLayout>
      <div className="flex flex-col justify-center h-full p-12">
        <div className="inline-flex justify-center w-full">
          <h3 className="inline-flex items-center mb-4 text-3xl font-extrabold text-center text-gray-800 dark:text-gray-200">
            One more <span className="ml-2 text-green-600">step!</span>
          </h3>
        </div>
        <div className="mx-auto bg-white shadow max-w-max dark:bg-black rounded-xl">
          <div className="px-4 py-5 sm:p-6">
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
    </AppLayout>
  );
};

export default VerifyEmail;
