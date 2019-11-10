// External
import React from "react";
import ReactDOM from "react-dom";

/* global posts post */

// Internal
import PostList from './components/post-list';
import Post from './components/post';

let component = {};
let nodeId = {};

if ( typeof posts !== 'undefined' ) {
	component = <PostList posts={ posts }/>
	nodeId = 'posts';
} else {
	component = <Post post={ post }/>
	nodeId = 'post';
}

ReactDOM.render(
	component,
	document.getElementById( nodeId )
);
