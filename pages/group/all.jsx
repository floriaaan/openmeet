import { GroupOverview } from "@components/cards/CardGroupOverview";
import { AppLayout } from "@components/layouts/AppLayout";
import { ChipList } from "@components/ui/ChipList";
import { firestore } from "@libs/firebase";
import { createRef, useEffect, useState } from "react";

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

  // eslint-disable-next-line react-hooks/exhaustive-deps
  useEffect(() => prepareDisplayable(), [selected]);

  return (
    <AppLayout>
      <div className="flex flex-col w-full h-full space-y-3 bg-gray-100 dark:bg-gray-900">
        <div className="flex flex-col xl:sticky xl:top-0 z-[47] w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
          <h3 className="mb-2 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
            Find a{" "}
            <span className="text-green-600 dark:text-green-400">group</span>
          </h3>

          <div className="flex flex-col items-center divide-y divide-gray-300 md:flex-row md:divide-y-0 md:divide-x dark:divide-gray-700">
            <div className="inline-flex items-center pb-3 lg:pr-3 md:pb-0">
              <div className="flex items-center overflow-x-auto sm:overflow-x-visible">
                <DistanceSelect distance={distance} setDistance={setDistance} />
                <CategorySelect category={category} setCategory={setCategory} />
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
        </div>
        <div className="grid grid-cols-1 gap-3 p-6 lg:grid-cols-3 md:grid-cols-2 lg:gap-6 lg:px-32">
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
  // const groups = [
  //   {
  //     slug: "marvel-fans",
  //     description: "On aime Marvel",
  //     createdAt: "2021-07-26T17:11:44.367Z",
  //     admin: {
  //       fullName: "Florian Leroux",
  //       uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
  //     },
  //     name: "Marvel Fans",
  //     tags: ["marvel", "ironman", "captain"],
  //   },
  //   {
  //     slug: "test",
  //     name: "test",
  //     tags: ["test"],
  //     createdAt: "2021-07-28T11:51:14.705Z",
  //     description: "test",
  //     admin: {
  //       uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
  //       fullName: "Florian Leroux",
  //     },
  //   },
  //   {
  //     slug: "test-de-location",
  //     name: "Test de location",
  //     createdAt: "2021-08-03T09:54:40.695Z",
  //     location: {
  //       position: { lat: 49.27071680843916, lng: 1.2134313583374023 },
  //       location: "Val-de-Reuil, France",
  //     },
  //     tags: ["location", "opéla"],
  //     admin: {
  //       uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
  //       fullName: "Florian Leroux",
  //     },
  //     description:
  //       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at leo in turpis posuere efficitur at non nulla. Fusce condimentum ultrices lectus eu venenatis. Suspendisse semper accumsan nisi at gravida. Nulla at tellus lobortis, sollicitudin ante nec, dapibus metus. Nunc finibus mauris tellus, id tristique lectus consequat quis. Nullam imperdiet mi non commodo sollicitudin. Phasellus aliquam finibus mauris ac tristique. Ut turpis nisl, volutpat id nibh eget, pellentesque efficitur enim. Sed pellentesque aliquet turpis a tincidunt. Etiam ornare ornare neque, sit amet accumsan justo egestas ut. Maecenas blandit magna eu massa posuere tempus.  In maximus orci nec commodo congue. Praesent malesuada, lectus ac elementum euismod, turpis orci congue ex, sed porttitor augue magna eget leo. Maecenas vitae facilisis justo. Praesent sed dui dui. Maecenas at purus odio. Sed tempor mauris a felis rutrum posuere. Nulla feugiat dolor metus. Sed feugiat dolor vel placerat facilisis. Praesent suscipit justo id ante consequat finibus. Suspendisse vehicula dapibus dolor sed varius. Quisque vestibulum, erat et sodales malesuada, ex mauris pretium lacus, in porttitor tellus elit rutrum est.",
  //   },
  //   {
  //     slug: "test2",
  //     createdAt: "2021-07-28T16:43:30.307Z",
  //     description: "e",
  //     name: "test-2",
  //     admin: {
  //       fullName: "Florian Leroux",
  //       uid: "Oa5FaaI2hAMmqA1vkCK7fI9X8wU2",
  //     },
  //     tags: ["efeg"],
  //   },
  // ];
  const groups = [];
  await firestore
    .collection("groups")
    .where("private", "==", false)

    .get()
    .then((querySnapshot) => {
      querySnapshot.forEach((doc) => {
        groups.push({ slug: doc.id, ...doc.data() });
      });
    });

  return {
    props: { groups },
  };
}

import { createPopper } from "@popperjs/core";
import { Menu, Transition } from "@headlessui/react";

const DistanceSelect = ({ distance, setDistance }) => {
  return (
    <Menu as="div" className="relative flex items-center h-full">
      {({ open }) => (
        <>
          <Menu.Button className="flex items-center justify-between px-4 py-2 mr-4 font-medium transition duration-300 rounded-xl max-h-12 w-max hover:bg-green-200 hover:text-green-700 dark:hover:bg-green-800 dark:hover:text-green-300">
            {distance?.label || "Any distance"}
            <span className="ml-2">
              <i className="text-xs fas fa-chevron-down"></i>
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
                  "text-sm py-2 px-4 font-normal block w-full text-center whitespace-nowrap hover:text-green-500 dark:hover:text-green-500 transition duration-300 text-gray-700 dark:text-gray-300"
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
                    "text-sm py-2 px-4 font-normal block w-full text-center whitespace-nowrap hover:text-green-500 dark:hover:text-green-500 transition duration-300 text-gray-700 dark:text-gray-300"
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
          <Menu.Button className="flex items-center justify-between px-4 py-2 mr-4 font-medium transition duration-300 rounded-xl max-h-12 w-max hover:bg-green-200 hover:text-green-700 dark:hover:bg-green-800 dark:hover:text-green-300">
            {category?.label || "Any category"}
            <span className="ml-2">
              <i className="text-xs fas fa-chevron-down"></i>
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
                  "text-sm py-2 px-4 font-normal block w-full text-center whitespace-nowrap hover:text-green-500 dark:hover:text-green-500 transition duration-300 text-gray-700 dark:text-gray-300"
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
                    "text-sm py-2 px-4 font-normal block w-full text-center whitespace-nowrap hover:text-green-500 dark:hover:text-green-500 transition duration-300 text-gray-700 dark:text-gray-300"
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
