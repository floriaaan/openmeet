import React from "react";
import Link from "next/link";
import { AuthLayout } from "@components/layouts/AuthLayout";
import { useAuth } from "@hooks/useAuth";

// layout for page

export default function Login() {
  const { signinWithGoogle, signinWithGitHub, signinWithMicrosoft } = useAuth();
  return (
    <AuthLayout>
      <div className="items-center w-full h-full px-4 ">
        <div className="flex items-center content-center justify-center h-full">
          <div className="w-full px-4 lg:w-2/5">
            <div className="relative flex flex-col items-center w-full h-full min-w-0 mb-6 break-words bg-gray-100 border-2 dark:border-gray-900 dark:bg-gray-900 rounded-xl">
              
              <div className="px-6 py-6 mb-0 rounded-t-xl">
                <div className="mb-3 text-center">
                  <h6 className="text-sm font-bold text-gray-500">
                    Sign in with
                  </h6>
                </div>
                <div className="text-center btn-wrapper">
                  <button
                    className="inline-flex items-center px-4 py-2 mb-1 mr-2 text-xs font-normal text-gray-700 uppercase transition-all duration-150 ease-linear bg-white shadow outline-none rounded-xl active:bg-gray-50 focus:outline-none hover:shadow-md"
                    type="button"
                    onClick={() => signinWithGitHub()}
                  >
                    <img
                      alt="GitHub"
                      className="w-5 mr-1"
                      src="/img/brand/github.svg"
                    />
                    Github
                  </button>
                  <button
                    className="inline-flex items-center px-4 py-2 mb-1 mr-1 text-xs font-normal text-gray-700 uppercase transition-all duration-150 ease-linear bg-white shadow outline-none rounded-xl active:bg-gray-50 focus:outline-none hover:shadow-md"
                    type="button"
                    onClick={() => signinWithGoogle()}
                  >
                    <img
                      alt="Google"
                      className="w-5 mr-1"
                      src="/img/brand/google.svg"
                    />
                    Google
                  </button>
                  <button
                    className="inline-flex items-center px-4 py-2 mb-1 mr-1 text-xs font-normal text-gray-700 uppercase transition-all duration-150 ease-linear bg-white shadow outline-none rounded-xl active:bg-gray-50 focus:outline-none hover:shadow-md"
                    type="button"
                    onClick={() => signinWithMicrosoft()}
                  >
                    <img
                      alt="Microsoft"
                      className="w-5 mr-1"
                      src="/img/brand/microsoft.png"
                    />
                    Microsoft
                  </button>
                </div>
                {/* <hr className="mt-6 border-gray-300 dark:border-gray-800 border-b-1" /> */}
              </div>
              {/* <div className="flex-auto px-4 py-10 pt-0 lg:px-10">
                <div className="mb-3 font-bold text-center text-gray-400">
                  <small>Or sign in with credentials</small>
                </div>
                <form>
                  <div className="relative w-full mb-3">
                    <label
                      className="block mb-2 text-xs font-bold text-gray-600 uppercase dark:text-gray-400"
                      htmlFor="grid-password"
                    >
                      Email
                    </label>
                    <input
                      type="email"
                      className="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 shadow dark:text-gray-400 dark:bg-gray-900 rounded-xl focus:outline-none focus:ring"
                      placeholder="Email"
                    />
                  </div>

                  <div className="relative w-full mb-3">
                    <label
                      className="block mb-2 text-xs font-bold text-gray-600 uppercase dark:text-gray-400"
                      htmlFor="grid-password"
                    >
                      Password
                    </label>
                    <input
                      type="password"
                      className="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-300 transition-all duration-150 ease-linear bg-white border-0 shadow dark:text-gray-400 dark:bg-gray-900 rounded-xl focus:outline-none focus:ring"
                      placeholder="Password"
                    />
                  </div>
                  <div>
                    <label className="inline-flex items-center cursor-pointer">
                      <input
                        id="customCheckLogin"
                        type="checkbox"
                        className="w-5 h-5 ml-1 text-gray-700 transition-all duration-150 ease-linear border-0 dark:text-gray-300 rounded-xl form-checkbox"
                      />
                      <span className="ml-2 text-sm font-semibold text-gray-600">
                        Remember me
                      </span>
                    </label>
                  </div>

                  <div className="mt-6 text-center">
                    <button
                      className="w-full px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 ease-linear bg-gray-800 shadow outline-none rounded-xl active:bg-gray-600 hover:shadow-lg focus:outline-none"
                      type="button"
                    >
                      Sign In
                    </button>
                  </div>
                </form>
              </div> */}
            </div>
            {/* <div className="relative flex flex-wrap mt-6">
              <div className="w-1/2">
                <a
                  href="#"
                  onClick={(e) => e.preventDefault()}
                  className="text-gray-700 dark:text-gray-200"
                >
                  <small>Forgot password?</small>
                </a>
              </div>
              <div className="w-1/2 text-right">
                <Link href="/auth/register">
                  <a  className="text-gray-700 dark:text-gray-200">
                    <small>Create new account</small>
                  </a>
                </Link>
              </div>
            </div> */}
          </div>
        </div>
      </div>
    </AuthLayout>
  );
}
