import React, { useState, useEffect } from 'react'; 
import { useParams } from "react-router-dom";
import axios from 'axios';
import { Table } from 'react-bootstrap';


export default function User () {
    const { id } = useParams()
    const [user, setUser] = useState([])
    const [articles, setArticles] = useState([]);

    useEffect(()=>{
            axios.get(`http://localhost:8000/users/${id}`)
                .then(res => {
                    setUser(res.data)
                    setArticles(res.data.articles);
                })
    },[]);

    return <div>
            <section className="row-section">
                 <div className="container">
                 <div className="row">
                    <h2 className="text-center"><span>User</span></h2>
                </div>
                    { !user.name ? (
                        <div className={'row text-center'}>
                            <span className="fa fa-spin fa-spinner fa-4x"></span>
                        </div>
                    ) : (
                        <div className={'row'}>
                            <div className="col-lg offset-md-1 row-block">
                                <Table>
                                    <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Age</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <td>{user.name}</td>
                                    <td>{user.email}</td>
                                    <td>{user.address}</td>
                                    <td>{user.phone}</td>
                                    <td>{user.birthDate }</td>
                                    </tr>
                                </tbody>
                                </Table>
                            </div>
                        </div>
                    )}
                    <div className={'row'}>
                        <div className="col-lg offset-md-1 row-block">
                            <Table>
                                <thead>
                                    <tr>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                { articles.map((article, index) =>
                                    <tr key={index}>
                                    <td>{article.name}</td>
                                    <td>{article.value}</td>
                                    <td>{article.type}</td>
                                    </tr>
                                )}
                                </tbody>
                            </Table>
                        </div>
                    </div>
                 </div>
             </section>
        </div>
}
