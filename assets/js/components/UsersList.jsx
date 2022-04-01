import React, {Component, Link} from 'react';
import axios from 'axios';

class UsersList extends Component {

  constructor(props) {
    super(props);
    this.state = {
       users: [],
       
      };
  }

  componentDidMount() {
    this.getUsers();
  }

  getUsers() {
    axios.get(`https://127.0.0.1:8000/api/users`).then((users) => {
      this.setState({ users: users.data, loading: false });
    })
    .catch((error) => {
        console.log(error.response)
    });
}

  deleteUserById(id, event) {
    event.preventDefault();
    axios.delete(`https://127.0.0.1:8000/api/delete/`+ id).then(res => {
        this.getUsers();
        const usersUpdate = this.getState.users.filter(user => user.id !== id);
        $this.setState({users: usersUpdate});
    })
    .catch((error) => {
        console.log(error.response)
    });
}

  

  render() {
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
              {this.state.users.map((user, index) => (
                <div className="col-md-10 offset-md-1 row-block" key={index}>
                  <div className="media">
                    <div className="media-body">
                      <h4>
                      <Link to={`/users/${user.id}`}>{user.name}</Link> 
                      </h4>
                      <p>{user.mail}</p>
                      <p>{user.address}</p>
                      <p>{user.phone}</p>
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
export default UsersList;
