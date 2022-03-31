import React, { Component } from "react";
import { Switch, Route, Link } from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";

import AddUser from "./add-User";
import User from "./user";
import UsersList from "./UsersList";
class Home extends Component {
  render() {
    return (
      <div>
        <nav className="navbar navbar-expand navbar-dark bg-dark">
          <Link to={"/users"} className="navbar-brand">
            bezKoder
          </Link>
          <div className="navbar-nav mr-auto">
            <li className="nav-item">
              <Link to={"/users"} className="nav-link">
                users
              </Link>
            </li>
            <li className="nav-item">
              <Link to={"/add"} className="nav-link">
                Add
              </Link>
            </li>
          </div>
        </nav>

        <div className="container mt-3">
          <Switch>
            <Route exact path={["/", "/users"]} component={UsersList} />
            <Route exact path="/add" component={AddUser} />
            <Route path="/users/:id" component={User} />
          </Switch>
        </div>
      </div>
    );
  }
}

export default Home;


// import React, { Component } from "react";
// import { Route, Switch } from "react-router-dom";
// import UserList from "./UserList";
// import User from "./User";
// import Header from "./Header";

// class Home extends Component {

//   render() {
    
//     return (
//       <div>
//         <Header />
//         <Switch>
//           <Route exact path={["/", "/users"]} component={UserList} />
//           <Route path="/user/:id" component={User} />
//         </Switch>
//       </div>
//     );
//   }
// }

// export default Home;
