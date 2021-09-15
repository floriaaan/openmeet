import React from "react";
import Map from "./Map";

export default {
  title: "Map",
  component: Map,
  argTypes: {
    position: {
      control: "array",
    },
    zoom: {
      control: "number",
    },
    
  },
};

export const Default = () => <Map className="absolute h-96 inset-0"></Map>;
