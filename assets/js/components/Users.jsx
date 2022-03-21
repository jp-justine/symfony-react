import React, { Component } from "react";
import axios from "axios";

class Users extends Component {
  constructor() {
    super();
    this.state = { users: [] };
  }

  componentDidMount() {
    this.showUsers();
  }

  showUsers() {
    axios.get(`https://127.0.0.1:8000/api/users`).then((users) => {
      this.setState({ users: users.data });
    });
  }

  render() {
    const loading = this.state.loading;
    return (
      <div>
        <section className="row-section">
          <div className="container">
            <div className="row">
              <h2 className="text-center">
                <span>List of users</span>
              </h2>
            </div>
            <div>
              {this.state.users.map((user) => (
                <div className="col-md-10 offset-md-1 row-block" key={user.id}>
                  <div className="media">
                    <div className="media-body">
                      <h4>{user.firstName}</h4>
                      <p>{user.lastName}</p>
                      <p>{user.mail}</p>
                      <p>{user.address}</p>
                      <p>{user.phoneNumber}</p>
                      <p>{user.birthDate}</p>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </section>
      </div>
    );
  }
}
export default Users;
