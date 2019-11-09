import React from "react";
import ReactDOM from "react-dom";

import Posts from './posts';

class App extends React.Component {
	render() {
		return <Posts posts={ posts }/>
	}
}

ReactDOM.render(
	<App />,
	document.getElementById('posts')
);
  