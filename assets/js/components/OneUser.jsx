import React, { useState, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

function OneUser() {
  const { id } = useParams();
  const [user, setUser] = useState([]);
  let poss = [];

  useEffect(() => {
    axios.get(`https://127.0.0.1:8000/api/user/` + id).then((res) => {
      setUser(JSON.parse(res.data));
      poss = res.data.possessions;
    });
  }, []);

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
            <div className="col-md-10 offset-md-1 row-block">
              <div className="media">
                <div className="media-body">
                  <h4>
                    {user.firstName} {user.lastName}
                  </h4>
                  <p>{user.mail}</p>
                  <p>{user.address}</p>
                  <p>{user.phoneNumber}</p>
                  <p>{user.birthDate}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

export default OneUser;
