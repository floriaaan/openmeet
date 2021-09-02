import { Chip } from "./Chip";

export const ChipList = ({
  list = [],
  selected = [],
  setSelected = null,
  color = "green",
}) => {
  return (
    <div className="inline-flex items-center max-w-max space-x-3 overflow-x-auto p-1.5">
      {list.map((el, index) => (
        <Chip
          color={color}
          name={el}
          key={index}
          checked={selected.findIndex((chip) => chip === el) !== -1}
          onClick={
            setSelected
              ? () =>
                  selected.findIndex((chip) => chip === el) === -1
                    ? setSelected([...selected, el])
                    : setSelected(selected.filter((chip) => chip !== el))
              : null
          }
        />
      ))}
    </div>
  );
};
