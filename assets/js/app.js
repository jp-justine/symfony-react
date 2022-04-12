 
import '../css/app.css';

import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

import Home from './components/Home';
    
ReactDOM.render(<Router><Home /></Router>, document.getElementById('root'));
