import React, { Component } from "react";
import axios from "axios";

class Users extends Component {
  constructor() {
    super();
    this.state = { users: [], loading: true };
  }

  componentDidMount() {
    this.showUsers();
  }

  showUsers() {
    axios.get(`https://127.0.0.1:8000/api/users`).then((users) => {
      this.setState({ users: users.data, loading: false });
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
            {loading ? (
              <div >
                <span className="fa fa-spin fa-spinner fa-4x"></span>
              </div>
            ) : (
              <div >
                {this.state.users.map((user) => (
                  <div >
                    <h4>{user.name}</h4>
                    <h4>{user.firstname}</h4>
                    <p>{user.email}</p>
                  </div>
                ))}
              </div>
            )}
          </div>
        </section>
      </div>
    );
  }
}
export default Users;
