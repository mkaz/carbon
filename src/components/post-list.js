import React from 'react';
import styled from 'styled-components';

/**
 * Internal dependencies
 */
import { PostSummary } from './post';

const PageTitle = styled.h3`
	font-family: var(--system-font);
	text-decoration: underline;
	margin-top: 32px;
`;

const PostList = ( { posts } ) => {
	console.log( posts );
	return (
		<>
			<PageTitle> Articles </PageTitle>
			{ posts.map( post => (
				<PostSummary
					key={ post.id }
					post={ post }
				/>
			) ) }
		</>
	);
}
export default PostList;
