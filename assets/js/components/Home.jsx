import React, {Component} from 'react';
import {Route, Switch, Link} from 'react-router-dom';
import UsersList from './UsersList';
import User from './User';

export default class Home extends Component {
    render() {
        return(
            <div>
                <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                    <Link className={"navbar-brand"} to={"/"}> Symfony React Project </Link>
                    <div className="collapse navbar-collapse" id="navbarText">
                        <ul className="navbar-nav mr-auto">
                            <li className="nav-item">
                                <Link className={"nav-link"} to={"/users"}> Users </Link>
                            </li>
                        </ul>
                    </div>
                </nav>
            <Switch>
                <Route path="/users" element={<UsersList />} />
                <Route path="/users/:id" element={<User />} />
            </Switch>
            </div>
        )
    }
}
