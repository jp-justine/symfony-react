import React, { Component} from "react";
import {
  Link
} from 'react-router-dom';
import axios from "axios";
export default class  UsersList extends Component {
  
constructor() {
  super();
  this.state = {
     users: [], 
     loading: true 
    };
}

componentDidMount() {
  this.getUsers();
}

getUsers() {
  axios.get(`https://127.0.0.1:8000/api/users`).then(users => {
    this.setState({ users: users.data, loading: false})
})
}

deleteUserById(id, event) {
  event.preventDefault();
  axios.delete(`https://127.0.0.1:8000/api/users/delete/`+ id).then(res => {
      this.getUsers();
      const usersUpdate = this.getState.users.filter(user => user.id !== id);
      $this.setState({users: usersUpdate});
  })
  .catch((error) => {
      console.log(error.response)
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
                    <h4>
                    <Link className={"link"} to={`/users/${user.id}`}>{user.name}</Link>
                    </h4>
                    <p>{user.mail}</p>
                    <p>{user.address}</p>
                    <p>{user.phoneNumber}</p>
                    <p>{user.birthDate}</p>
                  </div>
                  <div>
                    <button onClick={(event) => this.deleteUserById(user.id, event)}>Delete</button>
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