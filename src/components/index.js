import React from 'react';
import styled from 'styled-components';

const CleanLink = styled.a`
    text-decoration: none;
`;

const Row = styled.div`
    display: flex;
`;

const MetaItem = styled.div`
    color: var(--color-gray-4);
    font-size: var(--size-2);
    font-family: var(--system-font);
`;

const Title = ( { title } ) => (
    <h2 className="entry-title">
        { title }
    </h2>
);

const LinkedTitle = ( { title, link } ) => (
    <Title
        title={ <CleanLink href={ link }>{ title }</CleanLink> }
    />
);

export { LinkedTitle, MetaItem, Row, Title };
