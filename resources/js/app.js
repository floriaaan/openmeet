import "./bootstrap";
import "alpinejs";

import QuickSearch from "./components/QuickSearch";
import { spotlight } from "./routes";

import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router } from "react-router-dom";

const App = () => {
    return (
        <>
            <Router>
                <QuickSearch routes={spotlight}></QuickSearch>
            </Router>
        </>
    );
};
ReactDOM.render(<App />, document.getElementById("react_root"));
