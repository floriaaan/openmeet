import Link from "next/link"

export const AvatarGroup = ({ users, limit }) => {
  return (
    <div className="flex -space-x-1 overflow-hidden">
      {users?.map(
        (user, index) =>
          index < limit && (
            <Link
              href={"/profile/" + user.id}
            //   as={
            //     "/profile/" +
            //     user.fullName.toLowerCase().replace(" ", "-").replace("'", "")
            //   }
            >
              <img
                className="inline-block w-6 h-6 rounded-full cursor-pointer ring-2 ring-white dark:ring-gray-900"
                src={
                  user.photoUrl
                    ? user.photoUrl
                    : "https://ui-avatars.com/api/?name=" +
                      user.fullName +
                      "&color=007bff&background=054880"
                }
                alt={user.fullName}
              />
            </Link>
          )
      )}
    </div>
  );
};
