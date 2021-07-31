import { AuthProvider } from "@hooks/useAuth";
import { ThemeProvider } from "next-themes";
import "../styles/globals.css";
import Head from 'next/head'


function MyApp({ Component, pageProps }) {
  return (
    <>
      <Head>
        <title>OpenMeet</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <link rel="icon"  href="/logo.svg" />
      </Head>
      <ThemeProvider attribute="class">
        <AuthProvider>
          <Component {...pageProps} />
        </AuthProvider>
      </ThemeProvider>
    </>
  );
}

export default MyApp;