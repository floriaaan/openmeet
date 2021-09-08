export const Chip = ({ onClick, color, checked, name }) => {
  if (name.toLowerCase() === "floriaaan") color = "amber";
  return (
    <div
      onClick={onClick}
      className={
        "inline-flex justify-center hover:bg-" +
        color +
        "-300 dark:hover:bg-" +
        color +
        "-800 transition duration-300 items-center font-medium py-2 px-4 rounded-full text-" +
        color +
        "-700 dark:text-" +
        color +
        "-300 select-none " +
        (checked
          ? "bg-" + color + "-400 dark:bg-" + color + "-700"
          : "bg-" + color + "-200 dark:bg-" + color + "-900") +
        (onClick ? " cursor-pointer" : "")
      }
    >
      <div className="hidden bg-amber-200 dark:bg-amber-900"></div>
      <div className="hidden hover:bg-amber-300 dark:hover:bg-amber-800 text-amber-700 dark:text-amber-300 bg-amber-400 dark:bg-amber-700"></div>
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
