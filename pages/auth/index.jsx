/* eslint-disable @next/next/no-img-element */
import Link from "next/link";
import Image from "next/image";
import { GuestLayout } from "@components/layouts/GuestLayout";
import { useAuth } from "@hooks/useAuth";


// layout for page

export default function Login() {
  const { signinWithGoogle, signinWithGitHub, signinWithMicrosoft } = useAuth();
  return (
    <GuestLayout>
      <div className="flex flex-col w-full h-full bg-gray-100 dark:bg-gray-900">
        <div className="flex flex-col md:flex-row items-center md:items-start xl:sticky xl:top-0 z-[47] w-full px-6 py-16 bg-white border-b border-gray-200 lg:px-32 xl:px-48 dark:bg-black dark:border-gray-800">
          <Link href="/">
            <a>
              <img src="/logo.svg" alt="OpenMeet" className="w-12 h-12 mb-3 md:mb-0" />
            </a>
          </Link>
          <h3 className="inline-flex items-center ml-6 text-3xl font-extrabold text-gray-800 dark:text-gray-200">
            Authenticate <span className="ml-2 text-red-600">yourself</span>
          </h3>
        </div>

        <div className="flex items-center justify-center flex-grow h-full bg-gray-100 dark:bg-gray-900 backdrop-filter backdrop-blur-lg bg-opacity-10 dark:bg-opacity-10">
          <div className="inline-flex p-6 space-x-3 rounded-xl bg-gray-50 dark:bg-gray-900">
            <button
              className="inline-flex items-center h-12 px-4 py-2 text-xs font-normal text-gray-700 uppercase transition-all duration-150 ease-linear bg-white shadow outline-none dark:hover:bg-gray-700 dark:bg-gray-800 dark:text-gray-200 rounded-xl active:bg-gray-50 focus:outline-none hover:shadow-md"
              type="button"
              onClick={() => signinWithGitHub()}
            >
              <img
                alt="GitHub"
                className="w-5 h-5 mr-1"
                src="/img/brand/github.svg"
              />
              <span className="ml-1">Github</span>
            </button>
            <button
              className="inline-flex items-center h-12 px-4 py-2 text-xs font-normal text-gray-700 uppercase transition-all duration-150 ease-linear bg-white shadow outline-none dark:hover:bg-gray-700 dark:bg-gray-800 rounded-xl dark:text-gray-200 active:bg-gray-50 focus:outline-none hover:shadow-md"
              type="button"
              onClick={() => signinWithGoogle()}
            >
              <img
                alt="Google"
                className="w-5 h-5 mr-1 "
                src="/img/brand/google.svg"
              />
              <span className="ml-1">Google</span>
            </button>
            <button
              className="inline-flex items-center h-12 px-4 py-2 text-xs font-normal text-gray-700 uppercase transition-all duration-150 ease-linear bg-white shadow outline-none dark:hover:bg-gray-700 dark:bg-gray-800 rounded-xl dark:text-gray-200 active:bg-gray-50 focus:outline-none hover:shadow-md"
              type="button"
              onClick={() => signinWithMicrosoft()}
            >
              <img
                alt="Microsoft"
                className="w-4 h-4 mr-1"
                src="/img/brand/microsoft.png"
              />
              <span className="ml-1">Microsoft</span>
            </button>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}

/* <div className="items-center w-full h-full px-4 ">
        <div className="flex items-center content-center justify-center h-full">
          <div className="w-full px-4 lg:w-2/5">
            <div className="relative flex flex-col w-full h-full min-w-0 mb-6 break-words bg-gray-100 border-2 dark:border-gray-900 dark:bg-gray-900 rounded-xl">
              <div className="px-6 py-6 mb-0 rounded-t-xl">
                <h3 className="pb-6 mb-6 text-3xl font-extrabold text-gray-800 border-b border-gray-300 max-w-max dark:border-gray-700 dark:text-gray-200">
                  Social login{" "}
                  <span className="text-red-600 dark:text-red-400">only</span>
                </h3>
                <div className="text-center btn-wrapper">
                  
                </div>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>
     */
