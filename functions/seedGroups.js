const admin = require("firebase-admin");
const serviceAccount = require("../resources/firebase_admin.json");
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
});

const faker = require("faker");

const db = admin.firestore();

const fakeIt = () => {
  return db.collection("groups").add({
    admin: { fullName: faker.name.findName(), uid: faker.datatype.uuid() },
    createdAt: faker.date.past().toISOString(),
    description: faker.lorem.paragraph(),
    location: {
      location: faker.address.city(),
      position: {
        lat: faker.address.latitude(),
        lng: faker.address.longitude(),
      },
    },
    name: faker.company.companyName(),
    private: false,
    tags: [faker.lorem.word(), faker.lorem.word(), faker.lorem.word()],
  });
};

Array(20).fill(0).forEach(fakeIt);
