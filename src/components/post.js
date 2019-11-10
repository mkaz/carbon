import React from 'react';
import { format, parse } from 'date-fns';
import styled from 'styled-components';

/**
 * Internal dependencies
 */
import { LinkedTitle, MetaItem, Row, Title } from './components';

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

const Post = ( { post } ) => (
    <Article key={ post.ID }>
        <Title title={ post.post_title }/>
        <Row>
            <PostDate date={ post.post_date } />
        </Row>
        <div className="entry-content"
            dangerouslySetInnerHTML={ { __html: post.post_content } }
        />
    </Article>
);

// PostSummary shown on archive pages
export const PostSummary = ( { post } ) => (
    <Article key={ post.ID }>
        <LinkedTitle title={ post.post_title } link={ post.guid }/>
        <Row>
            <PostDate date={ post.post_date } />
        </Row>
        <div className="entry-content"
            dangerouslySetInnerHTML={ { __html: post.post_content } }
        />
    </Article>
);

export default Post;
