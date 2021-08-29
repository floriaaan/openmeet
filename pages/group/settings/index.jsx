import { AppLayout } from "@components/layouts/AppLayout";
import { Dialog, Transition } from "@headlessui/react";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { Fragment, useEffect, useRef, useState } from "react";

export default function GroupSettingsPage() {
  const [groups, setGroups] = useState([]);
  const { user } = useAuth();
  const [selected, setSelected] = useState(null);
  const [modalOpen, setModalOpen] = useState(false);

  useEffect(() => {
    if (user) {
      firestore
        .collection("groups")
        .where("admin.uid", "==", user.uid)
        .get()
        .then((querySnapshot) => {
          const groups = [];
          querySnapshot.forEach((doc) => {
            groups.push({ slug: doc.id, ...doc.data() });
          });
          setGroups(groups);
          setSelected(groups[0]);
        });
    }
  }, [user]);

  const Modal = ({ isOpen, setIsOpen }) => {
    function closeModal() {
      setIsOpen(false);
    }

    function openModal() {
      setIsOpen(true);
    }
    const cancelButtonRef = useRef();

    return (
      <>
        <Transition appear show={isOpen} as={Fragment}>
          <Dialog
            initialFocus={cancelButtonRef}
            as="div"
            className="fixed inset-0 z-[49] overflow-y-auto"
            onClose={closeModal}
          >
            <div className="min-h-screen px-4 text-center">
              <Transition.Child
                as={Fragment}
                enter="ease-out duration-300"
                enterFrom="opacity-0"
                enterTo="opacity-100"
                leave="ease-in duration-200"
                leaveFrom="opacity-100"
                leaveTo="opacity-0"
              >
                <Dialog.Overlay className="fixed inset-0 bg-black opacity-90" />
              </Transition.Child>

              {/* This element is to trick the browser into centering the modal contents. */}
              <span
                className="inline-block h-screen align-middle"
                aria-hidden="true"
              >
                &#8203;
              </span>
              <Transition.Child
                as={Fragment}
                enter="ease-out duration-300"
                enterFrom="opacity-0 scale-95"
                enterTo="opacity-100 scale-100"
                leave="ease-in duration-200"
                leaveFrom="opacity-100 scale-100"
                leaveTo="opacity-0 scale-95"
              >
                <div className="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl dark:bg-gray-900 rounded-2xl">
                  <Dialog.Title
                    as="h3"
                    className="text-lg font-extrabold leading-6 text-gray-900 dark:text-gray-200 "
                  >
                    Select a group
                  </Dialog.Title>
                  <div className="grid grid-cols-3 gap-3 px-4 mt-3 w-full mx-auto min-h-[6rem]">
                    {groups?.map((el, key) => (
                      <div
                        onClick={() => setSelected(el)}
                        key={key}
                        className="flex flex-col cursor-pointer items-center justify-center w-full min-h-[6rem] p-2 duration-300 rounded-xl hover:bg-green-50 dark:hover:bg-green-900"
                      >
                        <div className="relative flex items-center justify-center w-16 h-16 m-1 mr-2 text-xl text-white rounded-full">
                          {selected.slug === el.slug ? (
                            <span className="flex items-center justify-center w-16 h-16 p-5 text-green-700 bg-green-400 rounded-full dark:bg-green-900">
                              <i className="text-2xl fas fa-check" />
                            </span>
                          ) : (
                            <span className="flex items-center justify-center w-16 h-16 p-5 text-green-500 bg-green-200 rounded-full dark:bg-green-700">
                              <i className="text-2xl fas fa-users" />
                            </span>
                          )}
                        </div>
                        <div className="flex flex-col items-center justify-center w-full px-1">
                          <span className="text-[0.7rem] overflow-ellipsis text-center tracking-tight leading-[1.12rem] text-gray-800 dark:text-gray-200">
                            {el.name || "Name not provided"}
                          </span>
                          {/* <span className="text-[0.6rem] leading-4">
                        from {format(new Date(props.startDate), "Pp")} to{" "}
                        {format(new Date(props.endDate), "Pp")}
                      </span> */}
                        </div>
                      </div>
                    ))}
                  </div>

                  <div className="mt-4">
                    <button
                      ref={cancelButtonRef}
                      type="button"
                      className="inline-flex justify-center px-4 py-2 text-sm font-medium text-green-900 duration-300 bg-green-100 rounded-md dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 hover:bg-green-200 focus:outline-none"
                      onClick={closeModal}
                    >
                      Close
                    </button>
                  </div>
                </div>
              </Transition.Child>
            </div>
          </Dialog>
        </Transition>
      </>
    );
  };

  return (
    <AppLayout>
      <div className="flex flex-col w-full h-full space-y-3 bg-gray-100 dark:bg-gray-900">
        <div className="inline-flex justify-between xl:sticky xl:top-0 z-[47] w-full px-6 py-6 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
          <h3 className="mb-2 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
            Manage
            <span className="ml-2 text-green-600 dark:text-green-400">
              {selected?.name}
            </span>
          </h3>
          <span className="inline-flex space-x-2">
            <button
              onClick={() => setModalOpen(true)}
              className="inline-flex items-center px-1 py-1 pr-6 space-x-3 transition duration-300 bg-gray-100 rounded-full cursor-pointer focus:outline-none group max-w-max dark:bg-gray-900 hover:bg-green-100 dark:hover:bg-green-800 dark:bg-opacity-30 "
            >
              <span className="flex items-center justify-center w-8 h-8 duration-300 bg-gray-300 rounded-full dark:bg-gray-800 dark:group-hover:bg-green-700 group-hover:bg-green-200 dark:bg-opacity-30">
                <i className="text-gray-700 duration-300 select-none fas fa-cog dark:text-gray-300 dark:group-hover:text-green-400 group-hover:text-green-600"></i>
              </span>
              <p className="text-sm font-extrabold text-gray-700 duration-300 select-none dark:text-gray-300 dark:group-hover:text-green-200 group-hover:text-green-600">
                Another group
              </p>
            </button>
          </span>
        </div>
      </div>
      <Modal isOpen={modalOpen} setIsOpen={setModalOpen} />
    </AppLayout>
  );
}
