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
          </div>
        </section>
      </div>
    );
  }
}
export default Users;
