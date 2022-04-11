import React, {Component} from 'react';
import {Route, Switch, Link} from 'react-router-dom';
import UsersList from './UsersList';
import User from './User';
import Posts from './Posts'
export default class Home extends Component {
    render() {
        return(
            <div>
                <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                    <Link className={"navbar-brand"} to={"#"}> Users List </Link>
                    <div className="collapse navbar-collapse" id="navbarText">
                        <ul className="navbar-nav mr-auto">
                        <li className="nav-item">
                               <Link className={"nav-link"} to={"/posts"}> Posts </Link>
                           </li>
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/users"}> Users </Link>
                           </li>
                        </ul>
                    </div>
                </nav>
            <Switch>
                <Route path="/users"><UsersList /></Route>
                <Route path="/user/:id"><User /></Route>
                <Route path="/posts"><Posts /></Route>
            </Switch>
            </div>
        )
    }
}
