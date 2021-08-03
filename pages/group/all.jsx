import { GroupOverview } from "@components/cards/CardGroupOverview";
import { AppLayout } from "@components/layouts/AppLayout";
import { ChipList } from "@components/ui/ChipList";
import { firestore } from "@libs/firebase";
import { useEffect, useState } from "react";

export default function GroupAllPage({ groups }) {
  const [displayables, setDisplayables] = useState(groups);
  const [selected, setSelected] = useState([]);

  const [distance, setDistance] = useState(null);
  const [category, setCategory] = useState(null);

  const prepareDisplayable = () => {
    if (selected.length !== 0) {
      let displayables = [];

      groups.forEach((el) => {
        if (selected.includes(el?.location?.location || "Remote"))
          displayables.push(el);
      });
      setDisplayables(displayables);
    } else setDisplayables(groups);
  };

  useEffect(() => prepareDisplayable(), [selected]);

  return (
    <AppLayout>
      <div className="flex flex-col w-full h-full p-6 space-y-3 bg-gray-100 lg:px-12">
        <h3 className="mb-6 text-xl font-medium text-gray-600 dark:text-gray-300 md:font-bold md:text-3xl lg:text-6xl">Find a <span className="underline">group</span></h3>

        <div className="flex flex-col items-center divide-y divide-gray-300 md:flex-row md:divide-y-0 md:divide-x dark:divide-gray-700">
          <div className="inline-flex items-center pb-3 lg:pr-3 md:pb-0">
            <div className="flex items-center overflow-x-auto sm:overflow-x-visible">
              <div className="mr-4">
                <div className="relative">
                  <div className="relative">
                    <button className="flex items-center justify-between px-4 py-2 font-medium transition duration-300 rounded-xl max-h-12 w-max hover:bg-green-200 hover:text-green-700 dark:hover:bg-green-800 dark:hover:text-green-300">
                      Any distance
                      <span className="ml-2">
                        <i className="text-xs fas fa-chevron-down"></i>
                      </span>
                    </button>
                  </div>
                </div>
              </div>
              <div className="mr-4">
                <div className="relative">
                  <div className="relative">
                    <button className="flex items-center justify-between px-4 py-2 font-medium transition duration-300 rounded-xl max-h-12 w-max hover:bg-green-200 hover:text-green-700 dark:hover:bg-green-800 dark:hover:text-green-300">
                      Any category
                      <span className="ml-2">
                        <i className="text-xs fas fa-chevron-down"></i>
                      </span>
                    </button>
                  </div>
                </div>
              </div>
              <div className="flex items-center mr-4">
                <button
                  className="flex text-sm font-medium transition duration-300 hover:text-green-500"
                  onClick={() => {
                    setSelected([]);
                    setDistance(null);
                    setCategory(null);
                  }}
                >
                  Reset filters
                </button>
              </div>
            </div>
          </div>
          <div className="inline-flex flex-grow pt-3 md:pt-0 md:pl-3">
            <ChipList
              list={["Rouen, France", "Val-de-Reuil, France", "Remote"]}
              selected={selected}
              setSelected={setSelected}
            />
          </div>
        </div>
        <div className="grid grid-cols-1 gap-3 lg:grid-cols-3 2xl:grid-cols-4 md:grid-cols-2 lg:gap-6">
          {displayables.map((el, index) => (
            <GroupOverview {...el} key={index} />
          ))}
        </div>
      </div>
      {/* <pre>{JSON.stringify(groups, undefined, 2)}</pre> */}
    </AppLayout>
  );
}

export async function getServerSideProps() {
  const groups = [
    {
      slug: "marvel-fans",
      admin: {
        uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
        fullName: "Florian Leroux",
      },
      tags: ["marvel", "ironman", "captain"],
      createdAt: "2021-07-26T17:11:44.367Z",
      description: "On aime Marvel",
      name: "Marvel Fans",
    },
    {
      slug: "test",
      description: "test",
      name: "test",
      admin: {
        fullName: "Florian Leroux",
        uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
      },
      createdAt: "2021-07-28T11:51:14.705Z",
      tags: ["test"],
    },
    {
      slug: "test-de-location",
      name: "Test de location",
      location: {
        location: "Val-de-Reuil, France",
        position: { lat: 49.27071680843916, lng: 1.2134313583374023 },
      },
      tags: ["location", "opéla"],
      createdAt: "2021-08-03T09:54:40.695Z",
      admin: {
        uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
        fullName: "Florian Leroux",
      },
      description: "Coucou",
    },
    {
      slug: "test2",
      tags: ["efeg"],
      admin: {
        fullName: "Florian Leroux",
        uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
      },
      createdAt: "2021-07-28T16:43:30.307Z",
      description: "e",
      name: "test-2",
    },
  ];
  // await firestore
  //   .collection("groups")
  //   .get()
  //   .then((querySnapshot) => {
  //     querySnapshot.forEach((doc) => {
  //       groups.push({ slug: doc.id, ...doc.data() });
  //     });
  //   });

  return {
    props: { groups },
  };
}
