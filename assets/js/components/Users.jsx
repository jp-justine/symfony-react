import React, {Component} from 'react';
import axios from 'axios';

class Users extends Component {
  constructor() {
      super();
      this.state = { users: [], loading: true};
  }
  
  componentDidMount() {
      this.getUsers();
  }
  
  getUsers() {
     axios.get(`http://localhost:8000/api/users`).then(users => {
         this.setState({ users: JSON.parse(users.data), loading: false})
     })
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
              { this.state.users.map((user, index) => 
                <div className="col-md-10 offset-md-1 row-block"  key={index}>
                  <div className="media">
                    <div className="media-body">
                      <h4>{user.firstName}{" "}{user.lastName}</h4>
                      <p>{user.mail}</p>
                      <p>{user.address}</p>
                      <p>{user.phoneNumber}</p>
                      <p>{user.birthDate}</p>
                    </div>
                    <div>
                      <button>Delete</button>
                    </div>
                  </div>
                </div>
              )}
            </div>
          </div>
        </section>
      </div>
    );
  }
}
export default Users;

