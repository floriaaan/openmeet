export const Chip = (props) => {
  return (
    <div
      onClick={props.onClick}
      className={
        "inline-flex justify-center cursor-pointer dark:border-green-700 hover:bg-green-300 dark:hover:bg-green-800 transition duration-300 items-center font-medium py-2 px-4 rounded-full text-green-700 dark:text-green-300  border border-green-300 select-none " +
        (props.checked
          ? "bg-green-400 dark:bg-green-700"
          : "bg-green-200 dark:bg-green-900")
      }
    >
      <div className="inline-flex items-center text-sm font-semibold leading-none select-none min-w-max ">
        {props.name}
        {props.checked && (
        <div className="ml-3">
          <div style={{fontSize: "0.6rem"}}>&#10003;</div>
        </div>
      )}
      </div>
      
    </div>
  );
};
