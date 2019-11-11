import React from 'react';
import { format, parse } from 'date-fns';
import styled from 'styled-components';

/**
 * Internal dependencies
 */
import { LinkedTitle, MetaItem, Row, Title } from './';

const Article = styled.article`
	margin: 32px 0;
	padding-bottom: 32px;
	border-bottom: 1px solid var(--color-gray-2);
`;

const PostDate = ( { date } ) => {
	const postDate = parse( date, "yyyy-MM-dd HH:mm:ss", new Date() );
	return (
		<MetaItem>
			{ format( postDate, "MMM d, yyyy") }
		</MetaItem>
	);
};

const PostContent = ( { content } ) => (
	<p className="entry-content"
		dangerouslySetInnerHTML={ { __html: content } }
	/>
);

const Post = ( { post } ) => (
	<Article>
		<Title title={ post.title }/>
		<Row>
			<PostDate date={ post.date } />
		</Row>
		<PostContent content={ post.content } />
	</Article>
);

// PostSummary shown on archive pages
const PostSummary = ( { post } ) => (
	<Article key={ post.id }>
		<LinkedTitle title={ post.title } link={ post.permalink }/>
		<Row>
			<PostDate date={ post.date } />
		</Row>
		<PostContent content={ post.content } />
	</Article>
);

export default Post;
export { Post, PostSummary }
