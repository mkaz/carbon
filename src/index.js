import React from "react";
import ReactDOM from "react-dom";

import Posts from './posts';
import Post from './post';

// index
class IndexApp extends React.Component {
	render() {
		return <Posts posts={ posts }/>
	}
}
const postsTarget = document.getElementById('posts');
if ( postsTarget) {
	ReactDOM.render( <IndexApp />, postsTarget );
}
  
// single
class SingleApp extends React.Component {
	render() {
		return <Post post={ post }/>
	}
}

const postTarget = document.getElementById('post');
if ( postTarget ) {
	ReactDOM.render( <SingleApp />, postTarget );
}