import { AppLayout } from "@components/layouts/AppLayout";
import { firestore } from "@libs/firebase";

export default function GroupAllPage({ groups }) {
  return <AppLayout><pre>{JSON.stringify(groups, undefined, 2)}</pre></AppLayout>;
}

export async function getServerSideProps() {
  const groups = [];
  await firestore
    .collection("groups")
    .get()
    .then((querySnapshot) => {
      querySnapshot.forEach((doc) => {
        groups.push({ slug: doc.id, ...doc.data() });
      });
    });

  return {
    props: { groups },
  };
}
