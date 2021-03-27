import React, { useEffect, useState } from "react";
import { Link, useHistory } from "react-router-dom";

import { useEventListener } from "../hooks/useEventListener";
/**
 *  Spotlight-like component, that creates next/Link for each routes elements
 *
 */

const easter = [
    {
        label: "Floriaaan",
        href: "https://floriaaan.github.io",
        icon: (
            <img
                src="https://floriaaan.github.io/images/logo.png"
                className="w-6 h-6"
                alt="Floriaan"
            ></img>
        ),
        level: -1,
    },
    {
        label: "Snake",
        href: "https://floriaaan.github.io/snake",
        icon: (
            <img
                src="https://www.dlf.pt/dfpng/middlepng/22-221929_snake-game-png-transparent-png.png"
                className="w-6 h-6"
                alt="Floriaan"
            ></img>
        ),
        level: -1,
    },
];

export const QuickSearch = ({ routes }) => {
    const [visible, setVisible] = useState(false);
    const [focusedIndex, setFocusedIndex] = useState(-1);
    let history = useHistory();

    useEffect(() => {
        setVisible(false);
        setFocusedIndex(-1);
    }, [history.location.pathname]);

    useEventListener("keydown", (e) => {
        if (e.key === "k" && e.ctrlKey === true) {
            e.preventDefault();
            setVisible(!visible);
        }

        if (visible) {
            switch (e.code) {
                case "ArrowUp":
                    if (results.length > 0) {
                        focusedIndex > 0
                            ? setFocusedIndex(focusedIndex - 1)
                            : setFocusedIndex(0);
                    }
                    break;
                case "ArrowDown":
                    if (results.length > focusedIndex)
                        setFocusedIndex(focusedIndex + 1);

                    break;
                case "Escape":
                    setVisible(false);
                    break;
                default:
                    break;
            }
        }
    });

    useEffect(() => {
        if (typeof window !== undefined && results.length >= focusedIndex) {
            console.log("here")
            const focusedElement = window.document.getElementById(
                `spotlight-${focusedIndex}`
            );
            if (focusedElement !== null) {
                console.log(focusedElement)
                focusedElement.focus();
            }
        }
    }, [focusedIndex]);

    let input = null;
    const [search, setSearch] = useState("");
    const [results, setResults] = useState([]);
    const onInputChange = (e) => {
        setSearch(e.target.value);
        if (
            e.target.value !== "" &&
            easter
                .map(function (e) {
                    return e.label.toLowerCase();
                })
                .indexOf(e.target.value) !== -1
        ) {
            setResults([
                easter[
                    easter
                        .map(function (e) {
                            return e.label.toLowerCase();
                        })
                        .indexOf(e.target.value)
                ],
            ]);
            setFocusedIndex(0);
        } else if (e.target.value !== "") {
            let _tmp = [];
            routes.forEach((el) => {
                if (
                    el.label.toLowerCase().includes(e.target.value) ||
                    el.href.toLowerCase().includes(e.target.value)
                ) {
                    _tmp.push(el);
                }
            });
            setResults(_tmp);
            setFocusedIndex(0);
        } else {
            setResults([]);
        }
    };

    useEffect(() => {
        if (visible === true) {
            input.focus();
        } else {
            setFocusedIndex(-1);
        }
    }, [visible]);

    const handleLink = (e) => {
        setVisible(false);
        setSearch("");
    };

    return (
        <>
            <div
                className={`transition duration-300 justify-center items-center flex overflow-x-hidden overflow-y-auto fixed inset-0 outline-none focus:outline-none ${
                    !visible ? "hidden" : ""
                } `}
                style={{ zIndex: 10000 }}
            >
                <div className="relative w-full my-6 mx-auto max-w-sm">
                    {/*content*/}
                    <div className=" border-0 rounded-md shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        {/*header*/}
                        <div className="flex items-start justify-between p-2 rounded-t">
                            <div className="relative w-full text-gray-600 focus-within:text-gray-400">
                                <span className="absolute inset-y-0 left-0 flex items-center pl-2">
                                    <button
                                        type="submit"
                                        className="p-1 focus:outline-none focus:shadow-outline"
                                    >
                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth="2"
                                            viewBox="0 0 24 24"
                                            className="w-4 h-4 mr-1"
                                        >
                                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </span>
                                <input
                                    ref={(ref) => (input = ref)}
                                    type="text"
                                    value={search}
                                    onChange={onInputChange}
                                    onFocus={(e) => setVisible(true)}
                                    type="search"
                                    className="my-1 pl-10 bg-gray-100 appearance-none border-2 border-gray-100 rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200"
                                    placeholder="Spotlight"
                                    autoComplete="off"
                                />
                            </div>
                        </div>
                        {/*body*/}
                        <div className="relative p-2 space-y-1 flex-auto">
                            {results.map((el, key) => {
                                return (
                                    <div
                                        key={key}
                                        onClick={() =>
                                            (window.location.href = el.href)
                                        }
                                    >
                                        <a
                                            id={`spotlight-${key}`}
                                            className="flex flex-row p-3 items-center rounded text-gray-700 bg-gray-100 cursor-pointer focus:bg-gray-300 hover:bg-gray-200 space-x-4"
                                        >
                                            {el.icon}
                                            <div className="flex flex-col">
                                                <p className="font-semibold text-gray-700">
                                                    {el.label}
                                                </p>
                                                <p className="font-light text-xs text-gray-500">
                                                    {el.href}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                );
                            })}
                        </div>

                        {/* <h6 className="font-thin tracking-widest text-gray-300 flex flex-row-reverse relative">
              designed by Floriaaan
            </h6> */}
                    </div>
                </div>
            </div>
            <div
                onClick={() => setVisible(false)}
                className={`opacity-75 fixed inset-0 bg-black ${
                    !visible ? "hidden" : ""
                } `}
                style={{ zIndex: 9999 }}
            ></div>
        </>
    );
};

export default QuickSearch;
