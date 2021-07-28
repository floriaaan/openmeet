import { AppLayout } from "@components/layouts/AppLayout";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { useRouter } from "next/router";
import { useState } from "react";

export default function GroupCreatePage() {
  const [name, setName] = useState("");
  const [tags, setTags] = useState("");
  const [description, setDescription] = useState("");

  const Router = useRouter();

  const { user } = useAuth();

  const createGroup = async () => {
    const slug = name
      .toLowerCase()
      .replace(/[^\w ]+/g, "")
      .replace(/ +/g, "-");
    const groupRef = firestore.collection("groups").doc(slug).get();

    if (user && !groupRef.exists) {
      const slug = name
        .toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
      const response = await firestore
        .collection("groups")
        .doc(slug)
        .set({
          name,
          tags: tags.split(";"),
          description,
          createdAt: new Date().toISOString(),
          admin: { uid: user.uid, fullname: user.fullname },
        });
      await firestore
        .collection("groups")
        .doc(slug)
        .collection("subscribers")
        .doc(user.uid)
        .set({ fullname: user.fullname, photoUrl: user.photoUrl });
      // if (response.ok) {
      Router.push("/group/" + slug);
      // }
    }
  };

  return (
    <AppLayout>
      <section className="relative h-full text-gray-600 bg-gray-100 dark:bg-black body-font">
        <div className="container flex flex-wrap px-5 py-5 mx-auto sm:flex-nowrap">
          <div className="relative items-end justify-start hidden p-10 overflow-hidden rounded-xl lg:w-1/3 md:w-1/2 sm:mr-10 md:flex">
            <iframe
              width="100%"
              height="100%"
              className="absolute inset-0"
              frameBorder={0}
              title="map"
              marginHeight={0}
              marginWidth={0}
              scrolling="no"
              src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=Rouen&ie=UTF8&t=&z=14&iwloc=B&output=embed"
            />
          </div>
          <div className="flex flex-col w-full mt-8 lg:w-2/3 md:w-1/2 md:ml-auto md:py-8 md:mt-0">
            <h2 className="mb-1 text-2xl font-bold text-green-500 title-font">
              Create a group
            </h2>
            <p className="mb-5 leading-relaxed text-gray-400">
              Group together people who have the same interests as you
            </p>
            <div className="relative mb-4">
              <label htmlFor="name" className="text-sm leading-7 text-gray-600">
                Name
              </label>
              <input
                type="text"
                id="name"
                name="name"
                value={name}
                onChange={(e) => setName(e.target.value)}
                className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 pr-28"
              />
            </div>
            <div className="relative mb-4">
              <label htmlFor="tags" className="text-sm leading-7 text-gray-600">
                Tags
              </label>
              <input
                type="text"
                id="tags"
                name="tags"
                value={tags}
                onChange={(e) => setTags(e.target.value)}
                className="w-full h-10 px-5 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 pr-28"
              />
            </div>
            <div className="relative mb-4">
              <label
                htmlFor="description"
                className="text-sm leading-7 text-gray-600"
              >
                Description
              </label>
              <textarea
                id="description"
                name="description"
                rows={7}
                className="w-full px-2 py-2 text-sm leading-tight text-gray-700 transition-colors duration-200 ease-in-out border-2 appearance-none rounded-xl dark:text-gray-300 bg-gray-50 dark:bg-gray-700 dark:focus:border-gray-600 dark:bg-opacity-75 border-gray-50 dark:border-gray-900 focus:outline-none focus:bg-white focus:border-primary-100 pr-28"
                defaultValue={""}
                onChange={(e) => setDescription(e.target.value)}
              />
            </div>
            <div className="flex flex-row mb-3 space-x-2">
              <button
                type="submit"
                className="flex-grow px-6 py-2 text-lg text-white bg-green-500 border-0 rounded-xl focus:outline-none hover:bg-green-600"
                onClick={createGroup}
              >
                Create
              </button>
              <button
                id="meetup-display-btn"
                type="button"
                className="flex-shrink px-6 py-2 text-lg text-white bg-red-600 border-0 rounded-xl focus:outline-none hover:bg-red-700"
              >
                <i className="mr-2 fab fa-meetup" />
                Import from meetup.com
              </button>
            </div>
            <p className="text-xs text-gray-500">
              What an adventure that begins
            </p>
          </div>
        </div>
      </section>
    </AppLayout>
  );
}
