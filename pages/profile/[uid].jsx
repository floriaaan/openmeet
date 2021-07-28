import { AppLayout } from "@components/layouts/AppLayout";
import { useAuth } from "@hooks/useAuth";
import { firestore } from "@libs/firebase";
import { formatDistance } from "date-fns";

export default function ProfilePage({ firebaseUser }) {
  const { user } = useAuth();

  console.log({ user, firebaseUser });
  return (
    <AppLayout>
      <div className="grid grid-cols-3 gap-6 p-6">
        <ProfileOverview user={firebaseUser} auth={user} />
        <div className="h-full col-span-2 bg-red-500"></div>
        <div className="h-full col-span-2 bg-green-500"></div>
      </div>
    </AppLayout>
  );
}

const ProfileOverview = ({ user, auth }) => {
  return (
    <div className="h-full row-span-2 px-4 py-5 bg-gray-800 shadow sm:p-6 rounded-xl">
      <div className="flex flex-col items-center justify-center text-white">
        {user.uid === auth?.uid && (
          <div className="flex flex-row-reverse items-center w-full mb-3 text-gray-400">
            <div className="flex flex-row items-center text-xs font-bold transition duration-300 group">
              <span className="invisible p-3 -mt-12 text-white transition duration-300 bg-gray-600 shadow-lg rounded-xl group-hover:visible">
                {user?.uid}
              </span>
              <i className="w-3 h-3 mr-1 fas fa-link" />
              API key
            </div>
          </div>
        )}
        <img
          className="w-32 h-32 transition duration-300 ease-in-out rounded-full hover:shadow-lg"
          src={
            user.photoUrl
              ? user.photoUrl
              : "https://ui-avatars.com/api/?name=" +
                user.fullname +
                "&color=007bff&background=054880"
          }
          alt={user.fullname}
        />
        <div className="max-w-xl mt-4 text-lg font-bold tracking-widest uppercase ">
          {user.fullname}
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
  const user = await firestore.collection("users").doc(uid).get();
  return {
    props: {
      firebaseUser: JSON.parse(
        JSON.stringify({ uid: user.id, ...user.data() })
      ),
    },
  };
}
