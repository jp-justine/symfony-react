import React, { Component } from "react";
import { Route, Switch, Link } from "react-router-dom";
import Users from "./Users";

class Home extends Component {
  render() {
    return (
      <div>
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
          <Link className={"navbar-brand"} to={"/"}>
            {" "}
            Users of Gaea21{" "}
          </Link>
          <div className="collapse navbar-collapse" id="navbarText">
            <ul className="navbar-nav mr-auto">
                <li className="nav-item">
                <Link className={"nav-link"} to={"/users"}>
                  {" "}
                  Users{" "}
                </Link>
              </li>
            </ul>
          </div>
        </nav>
        <Switch>
          <Route path="/users" component={Users} />
        </Switch>
      </div>
    );
  }
}

export default Home;
