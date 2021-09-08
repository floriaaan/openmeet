const admin = require("firebase-admin");
const serviceAccount = require("../../resources/firebase_admin.json");

if (admin.apps.length === 0) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount),
  });
}
const db = admin.firestore();

const { randomExistantUsers } = require("./data");

const addSubscribers = async () => {
  const users = await randomExistantUsers(10);
  const groupSubscriberRef = db.collection("groups/openmeet-fans/subscribers");

  users.forEach(async (user) => {
    await groupSubscriberRef.doc(user.uid).set(user);
  });
};

addSubscribers();
