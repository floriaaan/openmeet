import { user } from "firebase-functions/lib/providers/auth";
import firebase from "firebase/app";
import "firebase/auth";
import "firebase/firestore";
import "firebase/storage";

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

if (!firebase.apps.length) {
  firebase.initializeApp(clientCredentials);
}
const auth = firebase.auth();
const firestore = firebase.firestore();
const storage = firebase.storage();

const FieldValue = firebase.firestore.FieldValue;

/**
 *
 * TODO: refactor (1 read/write access instead of 2)
 */
export async function createUser(data) {
  const userRef = await firestore
    .collection("users")
    .doc(data.uid)
    .set({ ...data }, { merge: true });

  const user = await firestore.collection("users").doc(data.uid).get();

  return { ...user.data() };
}

export async function uploadInFirebaseStorage(file, url) {
  return new Promise((resolve, reject) => {
    // console.log("Uploading image ...");
    const storageRef = firebase.storage().ref();
    const uploadTask = storageRef.child(url).put(file);

    uploadTask.on(
      firebase.storage.TaskEvent.STATE_CHANGED,
      (snapshot) => {
        const progress =
          (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        console.log("Upload is " + progress + "% done");
      },
      (error) => {
        console.log(error);
        reject(error);
      },
      async () => {
        const imgURL = await uploadTask.snapshot.ref.getDownloadURL();
        resolve(imgURL);
      }
    );
  });
}

export { firebase, auth, firestore, storage, FieldValue };
