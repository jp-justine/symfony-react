import axios from "axios";
import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import CalcAge from '../services/CalcAge';


export default function User() {

    const { id } = useParams()
    const [user, setUsers] = useState([])
    const [articles, setArticles] = useState([]);

    useEffect(() => {
        axios.get(`/api/user/${id}`)
            .then((res) => {
                setUsers(res.data);
                setArticles(res.data.articles);
            });
    }, []);

    return (
        <div>
            <section className="row-section">
                <div className="container">
                <div className="row">
                            <h2 className="text-center"><span>{user.name} informations</span></h2>
                        </div>
                    <div className={'row'}>
                        <div className="col-md-10 offset-md-1 row-block" >
                            <ul id="sortable">
                                <li>
                                <div className="media">
                                    <div className="media-body">
                                        <h4>{user.name}</h4>
                                        <p>Email : <br></br> {user.mail}</p>
                                        <p>Adresse : <br></br> {user.address}</p>
                                        <p>Phone : <br></br> {user.phone}</p>
                                        <p>Age : <br></br>{CalcAge (user.birthDate)}</p>
                                    </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div className="row">
                        <h2 className="text-center"><span>Articles of {user.name} </span></h2>
                    </div>
                    <div className={'row'}>
                        {articles.map(article =>
                            <div className="col-md-10 offset-md-1 row-block" key={article.id}>
                                <ul id="sortable">
                                    <li>
                                    <div className="media">
                                    <div className="media-body">
                                            <p>Article:   {article.name}</p>
                                            <p>Value: {article.value} €</p>
                                            <p>Type: {article.type}</p>
                                        </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        )}
                    </div>
                </div>
            </section>
        </div>
    )
}
