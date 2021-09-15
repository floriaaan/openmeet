import { AppLayout } from "@components/layouts/AppLayout";
import { postFilePaths, POSTS_PATH } from "@libs/mdx";

// import { MDXRemote } from "next-mdx-remote";
// import { serialize } from "next-mdx-remote/serialize";

import fs from "fs";
import matter from "gray-matter";
import path from "path";

export default function BlogSlugPage({ source, frontMatter }) {
  return (
    <AppLayout>
      <div className="post-header">
        <h1>{frontMatter.title}</h1>
        {frontMatter.description && (
          <p className="description">{frontMatter.description}</p>
        )}
      </div>
      <main>{/* <MDXRemote {...source} components={components} /> */}</main>
    </AppLayout>
  );
}

export const getStaticProps = async ({ params }) => {
  const postFilePath = path.join(POSTS_PATH, `${params.slug}.mdx`);
  const source = fs.readFileSync(postFilePath);

  const { content, data } = matter(source);

  //   const mdxSource = await serialize(content, {
  //     // Optionally pass remark/rehype plugins
  //     mdxOptions: {
  //       remarkPlugins: [],
  //       rehypePlugins: [],
  //     },
  //     scope: data,
  //   });

  const mdxSource = "";

  return {
    props: {
      source: mdxSource,
      frontMatter: data,
    },
  };
};

export const getStaticPaths = async () => {
  const paths = postFilePaths
    // Remove file extensions for page paths
    .map((path) => path.replace(/\.mdx?$/, ""))
    // Map the path into the static paths object required by Next.js
    .map((slug) => ({ params: { slug } }));

  return {
    paths,
    fallback: false,
  };
};
