import { Chip } from "./Chip";

export const ChipList = (props) => {
  return (
    <div className="inline-flex items-center w-full space-x-3 overflow-x-auto p-1.5">
      {props.list?.map((el, index) => (
        <Chip
          name={el}
          key={index}
          checked={props.selected?.findIndex((chip) => chip === el) !== -1}
          onClick={() =>
            props.selected?.findIndex((chip) => chip === el) === -1
              ? props.setSelected([...props.selected, el])
              : props.setSelected(props.selected?.filter((chip) => chip !== el))
          }
        />
      ))}
    </div>
  );
};
