import "./bootstrap";
import "alpinejs";

import QuickSearch from "./components/QuickSearch";
import { spotlight } from "./routes";

import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router } from "react-router-dom";
import StringToReact from "string-to-react";

const App = () => {
    const [routes, setRoutes] = useState(spotlight);

    useEffect(() => {
        if (spotlight_token !== null && spotlight_token !== "")
            (async () => {
                const res = await fetch("/api/v1/spotlight/" + spotlight_token);
                const body = await res.json();

                let _tmp = routes;
                body.forEach((element) => {
                    element.icon = StringToReact(element.icon);
                    _tmp.push(element);
                });
                setRoutes(_tmp);
                console.log(routes);
            })();
    }, [spotlight_token]);

    return (
        <>
            <Router>
                <QuickSearch routes={routes}></QuickSearch>
            </Router>
        </>
    );
};
ReactDOM.render(<App />, document.getElementById("react_root"));
