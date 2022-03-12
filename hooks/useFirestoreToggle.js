import { setDoc, deleteDoc, getDoc, doc } from "@firebase/firestore";
import { firestore } from "libs/firebase";
import { useEffect, useState } from "react";

export default function useFirestoreToggle(queryPath = "", document) {
  const [docExists, setDocExists] = useState(false);
  const docRef = doc(firestore, queryPath);

  useEffect(() => {
    async function checkDoc() {
      const docSnap = await getDoc(docRef);
      if (docSnap.exists()) {
        setDocExists(true);
      } else {
        setDocExists(false);
      }
    }
    checkDoc();
  }, [docRef]);

  const toggle = async () => {
    if (docExists) {
      await deleteDoc(docRef);
    } else {
      await setDoc(docRef, document);
    }
    setDocExists(!docExists);
  };

  return [docExists, toggle];
}
