/* eslint-disable @next/next/no-img-element */
import { AppLayout } from "@components/layouts/AppLayout";
import { ApiKey } from "@components/profile/ApiKey";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { formatDistance } from "date-fns";
import Lottie from "react-lottie";
import notExisting from "resources/lotties/404.json";

export default function ProfilePage({ user, uid }) {
  const { user: auth } = useAuth();

  return (
    <AppLayout>
      {user ? (
        <div className="grid grid-cols-1 gap-6 p-6 md:grid-cols-2 lg:grid-cols-3">
          <ProfileOverview user={user} />
          <div className="w-full h-full bg-red-500 lg:col-span-2 md:row-span-2 lg:row-span-1">
            e
          </div>
          <div className="w-full h-full bg-green-500 lg:col-span-2">e</div>
        </div>
      ) : auth?.uid === uid ? (
        <div className="grid grid-cols-1 gap-6 p-6 md:grid-cols-2 lg:grid-cols-3">
          <ProfileOverview user={auth} />
          <div className="w-full h-full bg-red-500 lg:col-span-2 md:row-span-2 lg:row-span-1">
            e
          </div>
          <div className="w-full h-full bg-green-500 lg:col-span-2">e</div>
        </div>
      ) : (
        <main className="flex flex-col items-center justify-center w-full h-full">
          <div className="w-72 h-72">
            <Lottie
              isClickToPauseDisabled
              options={{
                loop: true,
                autoplay: true,
                animationData: notExisting,

                rendererSettings: {
                  preserveAspectRatio: "xMidYMid slice",
                },
              }}
              // height={"8rem"}
              // width={"8rem"}
            />
          </div>
          <h3 className="mb-2 text-3xl font-extrabold text-center text-gray-800 dark:text-gray-200">
            {"There's no profile at this"}
            <span className="mx-2 text-red-600 dark:text-red-500">address</span>
            ...
          </h3>
        </main>
      )}
    </AppLayout>
  );
}

const ProfileOverview = ({ user }) => {
  const { user: auth } = useAuth();

  return (
    <div className="h-full row-span-2 px-4 py-5 bg-gray-800 shadow sm:p-6 rounded-xl">
      <div className="flex flex-col items-center justify-center text-white">
        {user.uid === auth?.uid && (
          <div className="flex flex-row-reverse items-center w-full mb-3 text-gray-400">
            <ApiKey apikey={auth?.uid} />
          </div>
        )}
        <img
          className="w-32 h-32 transition duration-300 ease-in-out rounded-full hover:shadow-lg"
          src={
            user.photoUrl
              ? user.photoUrl
              : "https://ui-avatars.com/api/?name=" +
                user.fullName +
                "&color=007bff&background=054880"
          }
          alt={user.fullName}
        />
        <div className="max-w-xl mt-4 text-lg font-bold tracking-widest uppercase ">
          {user.fullName}
        </div>
        <div className="flex items-center text-sm tracking-wide">
          <svg
            className="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              fillRule="evenodd"
              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
              clipRule="evenodd"
            />
          </svg>
          Signed up{" "}
          {user?.createdAt &&
            formatDistance(new Date(user.createdAt), new Date(), {
              addSuffix: true,
            })}
        </div>
      </div>
    </div>
  );
};

export async function getServerSideProps(ctx) {
  const { uid } = ctx.query;
  try {
    const user = await firestore.collection("users").doc(uid).get();
    return {
      props: {
        user: JSON.parse(JSON.stringify({ uid: user.id, ...user.data() })),
        uid,
      },
    };
  } catch (err) {
    console.error(err);
    return {
      props: {
        user: false,
        uid,
      },
    };
  }
}
