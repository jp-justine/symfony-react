import React, { Component } from "react";
import UsersDataService from "../services/users.service";
import { Link } from "react-router-dom";

class UsersList extends Component {
  constructor(props) {
    super(props);

    this.getUsers = this.getUsers.bind(this);
    this.refreshList = this.refreshList.bind(this);
    this.setActiveUser = this.setActiveUser.bind(this);

    this.state = {
      users: [],
      currentUser: null,
      currentIndex: -1,
    };
  }

  componentDidMount() {
    this.getUsers();
  }

  getUsers() {
    UsersDataService.getAll()
      .then((response) => {
        this.setState({
          users: response.data,
          loading: false,
        });
        console.log(response.data);
      })
      .catch((e) => {
        console.log(e);
      });
  }

  refreshList() {
    this.retrieveUsers();
    this.setState({
      currentUser: null,
      currentIndex: -1,
    });
  }

  setActiveUser(user, index) {
    this.setState({
      currentUser: user,
      currentIndex: index,
    });
  }

  render() {
    const { users, currentUser, currentIndex } = this.state;

    return (
      <div className="list row">
        <div className="col-md-8">
          <div className="input-group mb-3">
            <div className="input-group-append"></div>
          </div>
        </div>
        <div className="col-md-6">
          <h4>Users List</h4>

          <ul className="list-group">
            {users &&
              users.map((user, index) => (
                <li
                  className={
                    "list-group-item " +
                    (index === currentIndex ? "active" : "")
                  }
                  onClick={() => this.setActiveUser(user, index)}
                  key={index}
                >
                  {user.firstname}
                  {user.lastName}
                </li>
              ))}
          </ul>
        </div>
        <div className="col-md-6">
          {currentUser ? (
            <div>
              <h4>User</h4>
              <div>
                <label>
                  <strong>first name:</strong>
                </label>{" "}
                {currentUser.firstName}
              </div>
              <div>
                <label>
                  <strong>last name :</strong>
                </label>{" "}
                {currentUser.lastName}
              </div>
              <div>
                <label>
                  <strong>Mail:</strong>
                </label>{" "}
                {currentUser.mail}
              </div>
              <div>
                <label>
                  <strong>Adress:</strong>
                </label>{" "}
                {currentUser.adress}
              </div>
              <div>
                <label>
                  <strong>Phone:</strong>
                </label>{" "}
                {currentUser.phonenumber}
              </div>
              <div>
                <label>
                  <strong>Birthdate:</strong>
                </label>{" "}
                {currentUser.birthdate}
              </div>
              <Link
                to={"/users/" + currentUser.id}
                className="badge badge-warning"
              >
                Edit
              </Link>
            </div>
          ) : (
            <div>
              <br />
              <p>Please click on a User...</p>
            </div>
          )}
        </div>
      </div>
    );
  }
}
// deleteUserById(id, event) {
//   event.preventDefault();
//   axios
//     .delete(`https://127.0.0.1:8000/api/delete/` + id)
//     .then((res) => {
//       this.getUsers();
//       const usersUpdate = this.getState.users.filter(
//         (user) => user.id !== id
//       );
//       $this.setState({ users: usersUpdate });
//     })
//     .catch((error) => {
//       console.log(error.response);
//     });
// }
//       <div>
//         <Header />
//         <section className="row-section">
//           <div className="container">
//             <div className="row">
//               <h2 className="text-center">
//                 <span>List of users</span>
//               </h2>
//             </div>
//             <div>
//               {this.state.users.map((user) => (
//                 <div className="col-md-10 offset-md-1 row-block" key={user.id}>
//                   <div className="media">
//                     <div className="media-body">
//                       <Link to={`/user/${user.id}`}>
//                         <h4>
//                           {user.firstName} {user.lastName}
//                         </h4>
//                       </Link>
//                       <p>{user.mail}</p>
//                     </div>
//                     <div>
//                       <button
//                         onClick={(event) => this.deleteUserById(user.id, event)}
//                       >
//                         Delete
//                       </button>
//                     </div>
//                   </div>
//                 </div>
//               ))}
//             </div>
//           </div>
//         </section>
//       </div>
//     );
//   }
// }
export default UsersList;
