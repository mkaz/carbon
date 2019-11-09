import React from 'react';
import styled from 'styled-components';

const Link = styled.a`
    text-decoration: none;
`;

const Title = ( { title } ) => (
    <h2 className="entry-title">
        { title }
    </h2>
);

const LinkedTitle = ( { title, link } ) => (
    <Title 
        title={ <Link href={ link }>{ title }</Link> }
    />
);

export { Title, LinkedTitle };
