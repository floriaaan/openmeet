import "../styles/globals.css";
import "../styles/nprogress.css";
import "leaflet/dist/leaflet.css";

import { AuthProvider } from "@hooks/useAuth";
import { ThemeProvider } from "next-themes";
import Head from "next/head";
import dynamic from "next/dynamic";
import { Spotlight } from "@components/ui/Spotlight";
import { DarkModeToggler } from "@components/helpers/DarkMode";

function MyApp({ Component, pageProps }) {
  const Loader = dynamic(
    () => {
      return import("@components/ui/TopLoader");
    },
    { ssr: false }
  );

  return (
    <>
      <Head>
        <title>OpenMeet</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <link rel="icon" href="/logo.svg" />
      </Head>
      <ThemeProvider attribute="class">
        <AuthProvider>
          <Component {...pageProps} />
          <Spotlight />
          <DarkModeToggler />
          <Loader />
        </AuthProvider>
      </ThemeProvider>
    </>
  );
}

export default MyApp;
