import { AppLayout } from "@components/layouts/AppLayout";
import { firestore } from "@libs/firebase";


export default function EventPage({
  
}) {
  

  return (
    <AppLayout>
     </AppLayout>
  );
}

export async function getServerSideProps(ctx) {
  const event = await firestore.collection("event").doc(ctx.query.slug).get();

  return {
    props: {
      ...event.data(),

      slug: ctx.query.slug,
    },
  };
}
