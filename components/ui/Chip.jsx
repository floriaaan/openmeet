export const Chip = (props) => {
  return (
    <div
      onClick={props.onClick}
      className={
        "inline-flex justify-center cursor-pointer dark:border-" +
        props.color +
        "-700 hover:bg-" +
        props.color +
        "-300 dark:hover:bg-" +
        props.color +
        "-800 transition duration-300 items-center font-medium py-2 px-4 rounded-full text-" +
        props.color +
        "-700 dark:text-" +
        props.color +
        "-300  border border-" +
        props.color +
        "-300 select-none " +
        (props.checked
          ? "bg-" + props.color + "-400 dark:bg-" + props.color + "-700"
          : "bg-" + props.color + "-200 dark:bg-" + props.color + "-900")
      }
    >
      <div className="inline-flex items-center text-sm font-semibold leading-none select-none min-w-max ">
        {props.name}
        {props.checked && (
          <div className="ml-3">
            <div style={{ fontSize: "0.6rem" }}>&#10003;</div>
          </div>
        )}
      </div>
    </div>
  );
};
