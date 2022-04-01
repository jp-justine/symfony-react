
import React, { useState, useEffect } from 'react'; 
import { useParams } from "react-router-dom";
import axios from 'axios';


function User () {
    const { id } = useParams()
    const [users, setUser] = useState([])
    let items = [];

    (users.articles) ? items=users.articles : items=[];

    useEffect(()=>{
            axios.get(`http://localhost:8000/api/user/${id}`)
                .then(res => {
                    setUser(JSON.parse(res.data))
                    items = res.data.articles
                })
    },[]);

    return (
            <div>
                <h1>User and articles</h1>
                <table className="table table-striped">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>mail</th>
                            <th>Adsress</th>
                            <th>phone</th>
                            <th>birthdate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{ users.name }</td>
                            <td>{ users.mail }</td>
                            <td>{ users.address }</td>
                            <td>{ users.phone }</td>
                            <td>{ users.birthDate }</td>
                        </tr>
                    </tbody>
                </table>
                <table className="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        {items.map((item, index) =>
                                                    <tr key={index}>
                                                        <td>{ item.name }</td>
                                                        <td>{ item.value }</td>
                                                        <td>{ item.type }</td>
                                                    </tr>
                                                )
                        }
                    </tbody>
                </table>
            </div>
    )
}

export default User;