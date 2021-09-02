/// --------------------------------------------------
/// -----------------   Algolia   --------------------
/// --------------------------------------------------
const functions = require("firebase-functions");
const algoliasearch = require("algoliasearch");

const APP_ID = functions.config().algolia.app;
const ADMIN_KEY = functions.config().algolia.key;

const client = algoliasearch(APP_ID, ADMIN_KEY);
const groupIndex = client.initIndex("group");
const eventIndex = client.initIndex("event");

/// -------------------------------------------------
///                     GROUPS
/// -------------------------------------------------

const addGroup = functions
  .region("europe-west1")
  .firestore.document("groups/{slug}")
  .onCreate((snapshot) => {
    const data = snapshot.data();
    const objectID = snapshot.id;

    if (!data.private) return groupIndex.saveObject({ ...data, objectID });
    else return null;
  });

const updateGroup = functions
  .region("europe-west1")
  .firestore.document("groups/{slug}")
  .onUpdate(async (change) => {
    const newData = change.after.data();
    const objectID = change.after.id;

    const group = await groupIndex.getObject(objectID);

    if (change.before.data().private && !newData.private)
      return groupIndex.saveObject({ ...newData, objectID });
    else {
      if (group != null) groupIndex.deleteObject(objectID);
      else groupIndex.saveObject({ ...newData, objectID });
    }
  });

const deleteGroup = functions
  .region("europe-west1")
  .firestore.document("groups/{slug}")
  .onDelete((snapshot) => groupIndex.deleteObject(snapshot.id));

/// -------------------------------------------------
///                     EVENTS
/// -------------------------------------------------

const addEvent = functions
  .region("europe-west1")
  .firestore.document("events/{slug}")
  .onCreate((snapshot) => {
    const data = snapshot.data();
    const objectID = snapshot.id;

    if (!data.private) return eventIndex.saveObject({ ...data, objectID });
    else return null;
  });

const updateEvent = functions
  .region("europe-west1")
  .firestore.document("events/{slug}")
  .onUpdate(async (change) => {
    const newData = change.after.data();
    const objectID = change.after.id;

    const event = await eventIndex.getObject(objectID);

    if (change.before.data().private && !newData.private)
      return eventIndex.saveObject({ ...newData, objectID });
    else {
      if (event != null) eventIndex.deleteObject(objectID);
      else eventIndex.saveObject({ ...newData, objectID });
    }
  });

const deleteEvent = functions
  .region("europe-west1")
  .firestore.document("events/{slug}")
  .onDelete((snapshot) => eventIndex.deleteObject(snapshot.id));

module.exports = {
  addGroup,
  updateGroup,
  deleteGroup,
  addEvent,
  updateEvent,
  deleteEvent,
};
