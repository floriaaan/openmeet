export const Chip = ({ onClick, color = "green", checked, name }) => {
  let chipClassName =
    "inline-flex items-center justify-center px-4 py-2 font-medium transition duration-300 rounded-full select-none " +
    (onClick ? "cursor-pointer" : "");
  switch (color) {
    case "green":
      chipClassName +=
        " hover:bg-green-300 dark:hover:bg-green-800 text-green-700 dark:text-green-300 ";
      checked
        ? (chipClassName += "bg-green-400 dark:bg-green-700")
        : (chipClassName += "bg-green-200 dark:bg-green-900");
      break;
    case "amber":
      chipClassName +=
        " hover:bg-amber-300 dark:hover:bg-amber-800 text-amber-700 dark:text-amber-300 ";
      checked
        ? (chipClassName += "bg-amber-400 dark:bg-amber-700")
        : (chipClassName += "bg-amber-200 dark:bg-amber-900");
      break;
    case "red":
      chipClassName +=
        " hover:bg-red-300 dark:hover:bg-red-800 text-red-700 dark:text-red-300 ";
      checked
        ? (chipClassName += "bg-red-400 dark:bg-red-700")
        : (chipClassName += "bg-red-200 dark:bg-red-900");
      break;
    case "blue":
      chipClassName +=
        " hover:bg-blue-300 dark:hover:bg-blue-800 text-blue-700 dark:text-blue-300 ";
      checked
        ? (chipClassName += "bg-blue-400 dark:bg-blue-700")
        : (chipClassName += "bg-blue-200 dark:bg-blue-900");
      break;
    case "gray":
      chipClassName +=
        " hover:bg-gray-300 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300 ";
      checked
        ? (chipClassName += "bg-gray-400 dark:bg-gray-700")
        : (chipClassName += "bg-gray-200 dark:bg-gray-900");
      break;
    case "purple":
      chipClassName +=
        " hover:bg-purple-300 dark:hover:bg-purple-800 text-purple-700 dark:text-purple-300 ";
      checked
        ? (chipClassName += "bg-purple-400 dark:bg-purple-700")
        : (chipClassName += "bg-purple-200 dark:bg-purple-900");
      break;
    case "indigo":
      chipClassName +=
        " hover:bg-indigo-300 dark:hover:bg-indigo-800 text-indigo-700 dark:text-indigo-300 ";
      checked
        ? (chipClassName += "bg-indigo-400 dark:bg-indigo-700")
        : (chipClassName += "bg-indigo-200 dark:bg-indigo-900");
      break;
    case "pink":
      chipClassName +=
        " hover:bg-pink-300 dark:hover:bg-pink-800 text-pink-700 dark:text-pink-300 ";
      checked
        ? (chipClassName += "bg-pink-400 dark:bg-pink-700")
        : (chipClassName += "bg-pink-200 dark:bg-pink-900");
      break;
    case "teal":
      chipClassName +=
        " hover:bg-teal-300 dark:hover:bg-teal-800 text-teal-700 dark:text-teal-300 ";
      checked
        ? (chipClassName += "bg-teal-400 dark:bg-teal-700")
        : (chipClassName += "bg-teal-200 dark:bg-teal-900");
      break;
    case "orange":
      chipClassName +=
        " hover:bg-orange-300 dark:hover:bg-orange-800 text-orange-700 dark:text-orange-300 ";
      checked
        ? (chipClassName += "bg-orange-400 dark:bg-orange-700")
        : (chipClassName += "bg-orange-200 dark:bg-orange-900");
      break;
    case "yellow":
      chipClassName +=
        " hover:bg-yellow-300 dark:hover:bg-yellow-800 text-yellow-700 dark:text-yellow-300 ";
      checked
        ? (chipClassName += "bg-yellow-400 dark:bg-yellow-700")
        : (chipClassName += "bg-yellow-200 dark:bg-yellow-900");
      break;
  }

  return (
    <div onClick={onClick} className={chipClassName}>
      <div className="inline-flex items-center text-sm font-semibold leading-none select-none min-w-max ">
        {name}
        {checked && (
          <div className="ml-3">
            <div style={{ fontSize: "0.6rem" }}>&#10003;</div>
          </div>
        )}
      </div>
    </div>
  );
};

