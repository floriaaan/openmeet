const functions = require('firebase-functions');
const { default: next } = require('next');

const isDev = process.env.NODE_ENV !== 'production';

const server = next({
  dev: isDev,
  conf: { distDir: '.next' },
});

const nextjsHandle = server.getRequestHandler();
exports.nextServer = functions.https.onRequest((req, res) => {
  return server.prepare().then(() => nextjsHandle(req, res));
});


/// --------------------------------------------------
/// -----------------   Algolia   --------------------
/// --------------------------------------------------

const algoliasearch = require("algoliasearch");

const APP_ID = functions.config().algolia.app;
const ADMIN_KEY = functions.config().algolia.key;

const client = algoliasearch(APP_ID, ADMIN_KEY);
const groupIndex = client.initIndex("group");
const eventIndex = client.initIndex("event");

/// -------------------------------------------------
///                     GROUPS
/// -------------------------------------------------

exports.addGroup = functions.firestore
  .document("groups/{slug}")
  .onCreate((snapshot) => {
    const data = snapshot.data();
    const objectID = snapshot.id;

    if (!data.private) return groupIndex.addObject({ ...data, objectID });
    else return null;
  });

exports.updateGroup = functions.firestore
  .document("groups/{slug}")
  .onUpdate(async (change) => {
    const newData = change.after.data();
    const objectID = change.after.id;

    const group = await groupIndex.getObject(objectID);

    if (change.before.data().private && !newData.private)
      return groupIndex.addObject({ ...newData, objectID });
    else {
      if (group != null) groupIndex.deleteObject(objectID);
      else groupIndex.saveObject({ ...newData, objectID });
    }
  });

exports.deleteGroup = functions.firestore
  .document("groups/{slug}")
  .onDelete((snapshot) => groupIndex.deleteObject(snapshot.id));

/// -------------------------------------------------
///                     EVENTS
/// -------------------------------------------------

exports.addEvent = functions.firestore
  .document("events/{slug}")
  .onCreate((snapshot) => {
    const data = snapshot.data();
    const objectID = snapshot.id;

    if (!data.private) return eventIndex.addObject({ ...data, objectID });
    else return null;
  });

exports.updateEvent = functions.firestore
  .document("events/{slug}")
  .onUpdate(async (change) => {
    const newData = change.after.data();
    const objectID = change.after.id;

    const event = await eventIndex.getObject(objectID);

    if (change.before.data().private && !newData.private)
      return eventIndex.addObject({ ...newData, objectID });
    else {
      if (event != null) eventIndex.deleteObject(objectID);
      else eventIndex.saveObject({ ...newData, objectID });
    }
  });

exports.deleteEvent = functions.firestore
  .document("events/{slug}")
  .onDelete((snapshot) => eventIndex.deleteObject(snapshot.id));