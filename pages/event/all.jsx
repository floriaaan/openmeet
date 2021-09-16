import { AppLayout } from "@components/layouts/AppLayout";
import { ChipList } from "@components/ui/ChipList";
import { firestore } from "@libs/firebase";
import { useEffect, useState } from "react";

import { Menu, Transition } from "@headlessui/react";
import { collection, getDocs, query, where } from "firebase/firestore";
import { EventOverview } from "@components/cards/CardEventOverview";
import { ChevronDownIcon } from "@heroicons/react/outline";

export default function EventAllPage({ events }) {
  const [displayables, setDisplayables] = useState(events);
  const [selected, setSelected] = useState([]);

  const [distance, setDistance] = useState(null);
  const [category, setCategory] = useState(null);

  const prepareDisplayable = () => {
    if (selected.length !== 0) {
      let displayables = [];

      events.forEach((el) => {
        if (selected.includes(el?.location?.location || "Remote"))
          displayables.push(el);
      });
      setDisplayables(displayables);
    } else setDisplayables(events);
  };

  // eslint-disable-next-line react-hooks/exhaustive-deps
  useEffect(() => prepareDisplayable(), [selected]);

  return (
    <AppLayout>
      <div className="flex flex-col w-full h-full space-y-3 bg-gray-100 dark:bg-gray-900">
        <div className="flex flex-col xl:sticky xl:top-0 z-[47] w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
          <h3 className="mb-2 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
            Find an{" "}
            <span className="text-purple-600 dark:text-purple-400">event</span>
          </h3>

          <div className="flex flex-col items-center divide-y divide-gray-300 md:flex-row md:divide-y-0 md:divide-x dark:divide-gray-700">
            <div className="inline-flex items-center pb-3 lg:pr-3 md:pb-0">
              <div className="flex items-center overflow-x-auto sm:overflow-x-visible">
                <DistanceSelect distance={distance} setDistance={setDistance} />
                <CategorySelect category={category} setCategory={setCategory} />
                <div className="flex items-center mr-4">
                  <button
                    className="flex text-sm font-medium transition duration-300 hover:text-purple-500"
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
            <div className="inline-flex pt-3 overflow-x-hidden md:pt-0 md:pl-3">
              <ChipList
                list={["Rouen, France", "Val-de-Reuil, France", "Remote"]}
                selected={selected}
                setSelected={setSelected}
                color="purple"
              />
            </div>
          </div>
        </div>
        <div className="grid grid-cols-1 gap-3 p-6 lg:grid-cols-3 md:grid-cols-2 2xl:grid-cols-4 lg:gap-6 lg:px-32">
          {displayables.map((el, index) => (
            <EventOverview {...el} key={index} />
          ))}
        </div>
      </div>
      {/* <pre>{JSON.stringify(groups, undefined, 2)}</pre> */}
    </AppLayout>
  );
}

export async function getServerSideProps() {
  const events = [];

  await getDocs(
    query(collection(firestore, "events"), where("private", "==", false))
  ).then((querySnapshot) => {
    querySnapshot.forEach((doc) => {
      events.push({ slug: doc.id, ...doc.data() });
    });
  });

  return {
    props: { events },
  };
}

const DistanceSelect = ({ distance, setDistance }) => {
  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button className="flex items-center justify-between px-4 py-2 mr-4 font-medium transition duration-300 rounded-xl max-h-12 w-max hover:bg-purple-200 hover:text-purple-700 dark:hover:bg-purple-800 dark:hover:text-purple-300">
            {distance?.label || "Any distance"}
            <span className="ml-2">
              <ChevronDownIcon className="w-3 h-3"/>
            </span>
          </Menu.Button>
          <Transition
            show={open}
            enter="transform transition duration-100 ease-in"
            enterFrom="opacity-0 scale-95"
            enterTo="opacity-100 scale-100"
            leave="transform transition duration-75 ease-out"
            leaveFrom="opacity-100 scale-100"
            leaveTo="opacity-0 scale-95"
          >
            <Menu.Items
              static
              className={
                "bg-white md:origin-top-left absolute left-0 mt-6 dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg min-w-48"
              }
            >
              <button
                onClick={() => {
                  setDistance(null);
                  // closeDropdownPopover();
                }}
                className={
                  "text-sm py-2 px-4 font-normal block w-full text-center whitespace-nowrap hover:text-purple-500 dark:hover:text-purple-500 transition duration-300 text-gray-700 dark:text-gray-300"
                }
              >
                Any distance
              </button>
              {[
                { label: "< 5 km", value: "5km" },
                { label: "10 km", value: "10km" },
                { label: "20 km", value: "20km" },
                { label: "50 km", value: "50km" },
                { label: "100 km", value: "100km" },
              ].map((el, key) => (
                <button
                  key={key}
                  onClick={() => {
                    setDistance(el);
                    // closeDropdownPopover();
                  }}
                  className={
                    "text-sm py-2 px-4 font-normal block w-full text-center whitespace-nowrap hover:text-purple-500 dark:hover:text-purple-500 transition duration-300 text-gray-700 dark:text-gray-300"
                  }
                >
                  {el.label}
                </button>
              ))}
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};

const CategorySelect = ({ category, setCategory }) => {
  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button className="flex items-center justify-between px-4 py-2 mr-4 font-medium transition duration-300 rounded-xl max-h-12 w-max hover:bg-purple-200 hover:text-purple-700 dark:hover:bg-purple-800 dark:hover:text-purple-300">
            {category?.label || "Any category"}
            <span className="ml-2">
            <ChevronDownIcon className="w-3 h-3"/>
            </span>
          </Menu.Button>
          <Transition
            show={open}
            enter="transform transition duration-100 ease-in"
            enterFrom="opacity-0 scale-95"
            enterTo="opacity-100 scale-100"
            leave="transform transition duration-75 ease-out"
            leaveFrom="opacity-100 scale-100"
            leaveTo="opacity-0 scale-95"
          >
            <Menu.Items
              static
              className={
                "bg-white origin-top-left absolute left-0 mt-6 dark:bg-gray-900 text-base z-50 float-left py-2 list-none text-left rounded-xl shadow-lg min-w-48"
              }
            >
              <button
                onClick={() => {
                  setCategory(null);
                  // closeDropdownPopover();
                }}
                className={
                  "text-sm py-2 px-4 font-normal block w-full text-center whitespace-nowrap hover:text-purple-500 dark:hover:text-purple-500 transition duration-300 text-gray-700 dark:text-gray-300"
                }
              >
                Any category
              </button>
              {[
                { label: "Art & Culture", value: "art_culture" },
                { label: "Career & Business", value: "career_business" },
                {
                  label: "Community & Environment",
                  value: "community_environment",
                },
                // { label: "Dancing", value: "dancing" },
                { label: "Games", value: "games" },
                // { label: "Health & Wellbeing", value: "health_wellbeing" },
                { label: "Hobbies & Passions", value: "hobbies_passions" },
                // { label: "Identity & Language", value: "identity_language" },
                { label: "Movements & Politics", value: "movements_politics" },
                { label: "Music", value: "music" },
                // { label: "Parents & Family", value: "parents_family" },
                { label: "Pets & Animals", value: "pets_animals" },
                // { label: "Religion & Spirituality", value: "religion_spirituality" },
                { label: "Science & Education", value: "science_education" },
                { label: "Social Activities", value: "socialactivities" },
                { label: "Sports & Fitness", value: "sports_fitness" },
                // { label: "Support & Coaching", value: "support_coaching" },
                { label: "Technology", value: "technology" },
                { label: "Travel & Outdoor", value: "travel_outdoor" },
                // { label: "Writing", value: "writing" },
              ].map((el, key) => (
                <button
                  key={key}
                  onClick={() => {
                    setCategory(el);
                    // closeDropdownPopover();
                  }}
                  className={
                    "text-sm py-2 px-4 font-normal block w-full text-center whitespace-nowrap hover:text-purple-500 dark:hover:text-purple-500 transition duration-300 text-gray-700 dark:text-gray-300"
                  }
                >
                  {el.label}
                </button>
              ))}
            </Menu.Items>
          </Transition>
        </>
      )}
    </Menu>
  );
};
