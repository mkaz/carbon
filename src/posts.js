import React from 'react';
import styled from 'styled-components';

/**
 * Internal dependencies
 */
import { PostSummary } from './post';

const PostList = styled.div`
    margin: 32px 0;
`;

const PageTitle = styled.h3`
    font-family: var(--system-font);    
    text-decoration: underline;
`;

const Posts = ( { posts } ) => {
    
    return (
        <PostList>
            <PageTitle> Articles </PageTitle>
            { posts.map( post => (
                <PostSummary
                    key={ post.ID }
                    post={ post }
                />
            ) ) }
        </PostList>
    );
}
export default Posts;