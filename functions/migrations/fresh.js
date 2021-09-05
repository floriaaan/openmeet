const admin = require("firebase-admin");
const serviceAccount = require("../../resources/firebase_admin.json");
const { fakeUsers, fakeGroups, fakeEvents, fakeChats } = require("./data");
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
});

const db = admin.firestore();

const fresh = async () => {
  const collections = await db.listCollections();

  return Promise.all([
    ...collections.map(async (collection) => {
      return db
        .collection(collection.id)
        .get()
        .then((snapshot) => {
          snapshot.forEach(async (doc) => {
            await db.collection(collection.id).doc(doc.id).delete();
          });
        });
    }),
    // TODO: storage
  ]);
};

const populate = async () => {
  const users = fakeUsers(20);

  await Promise.all(
    users.map(async (u) => {
      await db.collection("users").doc(u.uid).set(u);
    })
  );

  const groups = fakeGroups(10, users);

  await Promise.all(
    groups.map(async (g) => {
      await db.collection("groups").doc(g.slug).set(g);
    })
  );

  const events = fakeEvents(10, users, groups);

  await Promise.all(
    events.map(async (e) => {
      await db.collection("events").doc(e.slug).set(e);
    })
  );

  const chats = fakeChats(20, users);

  await Promise.all(
    chats.map(async (c) => {
      await db.collection("chats").add(c);
    })
  );
};

fresh().then(() => populate());
