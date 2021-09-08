import algoliasearch from "algoliasearch/lite";
const searchClient = algoliasearch(
  process.env.NEXT_PUBLIC_ALGOLIA_APP_ID,
  process.env.NEXT_PUBLIC_ALGOLIA_SEARCH_API_KEY
);

import { InstantSearch } from "react-instantsearch-dom";
import CustomSearchBox from "./CustomSearchBox";
import CustomHits from "./CustomHits";

export const SearchCore = () => {
  return (
    <InstantSearch searchClient={searchClient} indexName="group">
      <CustomSearchBox />
      <CustomHits />
    </InstantSearch>
  );
};
