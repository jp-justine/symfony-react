import React, { Component } from 'react';
import axios from 'axios';
import {
    Link
} from 'react-router-dom';

import { Button } from 'react-bootstrap';
import MyModal from './Modal';

export default class UsersList extends Component {
    constructor() {
        super();
        this.state = { users: [], loading: true, modalShow: false };
    }

    componentDidMount() {
        this.getUsers();
    }

    getUsers() {
        axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
        axios.get(`/api/users`).then(users => {
            this.setState({ users: users.data, loading: false })
        })
            .catch((error) => {
                console.log(error.response)
            });
    }

    deleteUserById(id, event) {
        event.preventDefault();
        axios.delete(`api/users/delete/` + id).then(res => {
            this.getUsers();
            const usersUpdate = this.getState.users.filter(user => user.id !== id);
            $this.setState({ users: usersUpdate });
        })
            .catch((error) => {
                console.log(error.response)
            });
    }

    changeModalShow(bool) {
        this.setState({ modalShow: bool });
    }

    render() {
        const loading = this.state.loading;

        return (
            <div>
                <section className="row-section">
                    <div className="container">
                        <div className="row">
                            <h2 className="text-center"><span>List of users</span></h2>
                        </div>
                        {loading ? (
                            <div className={'row text-center'}>
                                <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>
                        ) : (
                            <div className={'row'}>
                                <Button  onClick={() => this.changeModalShow(true)}>
                                    Add New User
                                </Button>
                                {this.state.users.map(user =>
                                    <div className="col-md-10 offset-md-1 row-block" key={user.id}>
                                        <ul id="sortable">
                                            <li>
                                                <div className="media">
                                                    <div className="media-body">
                                                        <h4><Link to={`/user/${user.id}`}> {user.name}</Link></h4>
                                                        <p>Email : {user.mail}</p>
                                                    </div>
                                                    <div>
                                                        <Button as="input" type="reset" value="Delete" onClick={(event) => this.deleteUserById(user.id, event)}></Button>
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>
                                    </div>
                                )}
                            </div>
                        )}
                    </div>
                    <MyModal show={this.state.modalShow} onHide={() => this.changeModalShow(false)} />
                </section>

            </div>
        )
    }
}
