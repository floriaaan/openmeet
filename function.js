const functions = require("firebase-functions");
const {
  addGroup,
  updateGroup,
  deleteGroup,
  addEvent,
  updateEvent,
  deleteEvent,
} = require("./functions/algolia");
const { sendVerificationEmail } = require("./functions/newsletter/verifyEmail");
const { default: next } = require("next");

const isDev = process.env.NODE_ENV !== "production";

const server = next({
  dev: isDev,
  conf: { distDir: ".next" },
});

const nextjsHandle = server.getRequestHandler();
exports.nextServer = functions
  // .region("europe-west1")
  .https.onRequest(async (req, res) => {
    await server.prepare();
    return await nextjsHandle(req, res);
  });

exports.addGroup = addGroup;
exports.updateGroup = updateGroup;
exports.deleteGroup = deleteGroup;
exports.addEvent = addEvent;
exports.updateEvent = updateEvent;
exports.deleteEvent = deleteEvent;
exports.sendVerificationEmail = sendVerificationEmail;
