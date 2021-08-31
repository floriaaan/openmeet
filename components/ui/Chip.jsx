export const Chip = ({ onClick, color, checked, name }) => {
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
          : "bg-" + color + "-200 dark:bg-" + color + "-900") + (onClick ? " cursor-pointer" : "")
      }
    >
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
