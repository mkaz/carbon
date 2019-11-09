import React from 'react';
import { format, parse } from 'date-fns';
import styled from 'styled-components';


const Article = styled.article`
    margin: 32px;
    padding-bottom: 32px;
    border-bottom: 1px solid #999
`;

const Row = styled.div`
    display: flex;
`;

const MetaItem = styled.div`
    color: #666;
    font-size: 0.8888rem;
    font-family: var(--system-font);
`;

const Post = ( { post } ) => {
    console.log( "Post", post );
    const postDate = parse( post.post_date, "yyyy-MM-dd HH:mm:ss", new Date() );
    return (
        <Article key={ post.ID }>
            <h2 className="entry-title"> { post.post_title } </h2>
            <Row>
                <MetaItem>
                    { format( postDate, "MMM d, yyyy") }
                </MetaItem>
            </Row>
            <div className="entry-content"
                dangerouslySetInnerHTML={ { __html: post.post_content } }
            />
        </Article>
    );
}

export default Post;
