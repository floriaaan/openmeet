const withPlugins = require("next-compose-plugins");
const runtimeCaching = require("next-pwa/cache");

const withBundleAnalyzer = require("@next/bundle-analyzer")({
  enabled: process.env.ANALYZE === "true",
});

const withTranslate = require("next-translate");

const withPWA = require("next-pwa")({
  pwa: {
    dest: "public",
    runtimeCaching,
    disable: process.env.NODE_ENV === "development",
  },
  reactStrictMode: true,
});

module.exports = withPlugins([
  withBundleAnalyzer,
  withPWA,
  withTranslate,
]);
