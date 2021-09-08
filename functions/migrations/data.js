const faker = require("faker/locale/fr");
const admin = require("firebase-admin");
const serviceAccount = require("../../resources/firebase_admin.json");
if (admin.apps.length === 0) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount),
  });
}
const db = admin.firestore();

const fakeUsers = (number) => {
  if (number < 1 || typeof number !== "number")
    throw new Error("Invalid number");
  return Array(number)
    .fill(0)
    .map(() => {
      return {
        uid: faker.datatype.uuid(),
        createdAt: faker.date.past().toISOString(),
        email: faker.internet.email(),
        fullName: faker.name.findName(),
        lastSignedIn: faker.date.past().toISOString(),
        phoneNumber: faker.phone.phoneNumber(),
        photoUrl: faker.image.avatar(),
        providerId: faker.internet.url(),
      };
    });
};

const fakeGroups = (number, users) => {
  if (number < 1 || typeof number !== "number" || !users || !users.length)
    throw new Error("Invalid params");

  return Array(number)
    .fill(0)
    .map(() => {
      const admin = faker.random.arrayElement(users);
      const name = faker.company.companyName();
      const privateGroup = faker.datatype.boolean();

      return {
        admin: { fullName: admin.fullName, uid: admin.uid },
        createdAt: faker.date.past().toISOString(),
        description: faker.lorem.sentence(),
        events: [],
        location: {
          location: faker.address.city(),
          position: {
            lat: faker.address.latitude(),
            lng: faker.address.longitude(),
          },
        },
        name,
        private: privateGroup,
        tags: [faker.lorem.word(), faker.lorem.word()],
        slug: privateGroup
          ? faker.datatype.uuid()
          : name
              .toLowerCase()
              .replace(/[^\w ]+/g, "")
              .replace(/ +/g, "-"),
      };
    });
};

const fakeEvents = (number, users, groups) => {
  if (
    number < 1 ||
    typeof number !== "number" ||
    !users ||
    !users.length ||
    !groups ||
    !groups.length
  )
    throw new Error("Invalid params");

  return Array(number)
    .fill(0)
    .map(() => {
      const host = faker.random.arrayElement(users);
      const group = faker.random.arrayElement(groups);
      const name = faker.lorem.words(4);
      const privateEvent = faker.datatype.boolean();

      return {
        attachment: null,
        createdAt: faker.date.past().toISOString(),
        description: faker.lorem.sentence(),
        endDate: faker.date.future().toISOString(),
        externalLink: faker.internet.url(),
        group: {
          name: group.name,
          slug: group.slug,
        },
        host: {
          fullName: host.fullName,
          uid: host.uid,
          photoUrl: host.photoUrl,
        },
        location: {
          location: faker.address.city(),
          position: {
            lat: faker.address.latitude(),
            lng: faker.address.longitude(),
          },
        },
        name,
        picture: faker.image.abstract(),
        private: privateEvent,
        slug: privateEvent
          ? faker.datatype.uuid()
          : name
              .toLowerCase()
              .replace(/[^\w ]+/g, "")
              .replace(/ +/g, "-"),
        startDate: faker.date.future().toISOString(),
      };
    });
};

const fakeChats = (number, users) => {
  if (number < 1 || typeof number !== "number" || !users || !users.length)
    throw new Error("Invalid params");

  return Array(number)
    .fill(0)
    .map(() => {
      const members = [
        faker.random.arrayElement(users),
        faker.random.arrayElement(users),
      ];

      return {
        lastMessageAt: faker.date.past(),
        members: members.map((member) => {
          return {
            fullName: member.fullName,
            uid: member.uid,
            photoUrl: member.photoUrl,
          };
        }),
        messages: Array(faker.datatype.number({ min: 10, max: 20 }))
          .fill(0)
          .map(() => {
            return {
              content: faker.lorem.sentence(),
              createdAt: faker.date.past().toISOString(),
              sender: members[faker.datatype.number({ min: 0, max: 1 })].uid,
            };
          }),
      };
    });
};

const randomExistantUsers = async (number) => {
  const users = await db.collection("users").get();

  if ((number < 1 || typeof number !== "number") && users.size < number)
    throw new Error("Invalid param");

  let usersData = [];
  users.forEach((user) => {
    usersData.push({
      fullName: user.data().fullName,
      uid: user.id,
      photoUrl: user.data().photoUrl,
    });
  });

  return Promise.resolve(
    Array(number).fill(faker.random.arrayElement(usersData))
  );
};

module.exports = {
  fakeChats,
  fakeEvents,
  fakeGroups,
  fakeUsers,
  randomExistantUsers,
};
