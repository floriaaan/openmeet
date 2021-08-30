import { initializeApp, getApps } from "firebase/app";
import { getFirestore, doc, updateDoc, getDoc } from "firebase/firestore";

const clientCredentials = {
  apiKey: process.env.NEXT_PUBLIC_FIREBASE_API_KEY,
  authDomain: process.env.NEXT_PUBLIC_FIREBASE_AUTH_DOMAIN,
  //   databaseURL: process.env.NEXT_PUBLIC_FIREBASE_DATABASE_URL,
  projectId: process.env.NEXT_PUBLIC_FIREBASE_PROJECT_ID,
  appId: process.env.NEXT_PUBLIC_FIREBASE_APP_ID,
  storageBucket: process.env.NEXT_PUBLIC_FIREBASE_STORAGE_BUCKET,
  messagingSenderId: process.env.NEXT_PUBLIC_FIREBASE_MESSAGING_SENDER_ID,
  //   measurementId: process.env.NEXT_PUBLIC_FIREBASE_MEASUREMENT_ID,
};

const apps = getApps();
let firebase;
if (!apps.length) {
  firebase = initializeApp(clientCredentials);
} else {
  firebase = apps[0];
}

const firestore = getFirestore();

export { firebase, firestore };

/**
 *
 * TODO: refactor (1 read/write access instead of 2)
 */
export async function createUser(data) {
  const userRef = doc(firestore, `users/${data.uid}`);

  await updateDoc(userRef, { ...data }, { merge: true });
  const userSnap = await getDoc(userRef);
  return { ...userSnap.data() };
}

/**
 * TODO: migrate to firebase 9.x
 * 
 * Uploads image to firebase storage and returns the url
 * @param {File} file
 * @param {string} url
 * @returns {Promise<string>}
 * @throws {Error}
 *
 */
export async function uploadInFirebaseStorage(file, url) {
  // return new Promise((resolve, reject) => {
  //   // console.log("Uploading image ...");
  //   const storageRef = firebase.storage().ref();
  //   const uploadTask = storageRef.child(url).put(file);

  //   uploadTask.on(
  //     firebase.storage.TaskEvent.STATE_CHANGED,
  //     (snapshot) => {
  //       const progress =
  //         (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
  //       console.log("Upload is " + progress + "% done");
  //     },
  //     (error) => {
  //       console.log(error);
  //       reject(error);
  //     },
  //     async () => {
  //       const imgURL = await uploadTask.snapshot.ref.getDownloadURL();
  //       resolve(imgURL);
  //     }
  //   );
  // });
  return null
  // throw new Error("Not migrated to Firebase 9.x");
}
