import React, { useState, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";
import Header from "./Header";

function User() {
  const { id } = useParams();
  const [user, setUser] = useState([]);

  useEffect(() => {
    axios.get(`https://127.0.0.1:8000/api/user/` + id).then((res) => {
      setUser(JSON.parse(res.data));
    });
  }, []);

  return (
    <div>
      <Header />
      <section className="row-section">
        <div className="container">
          <div className="row">
            <h2 className="text-center">
              <span></span>
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

export default User;

// import React, { Component } from "react";
// import UsersDataService from "../services/users.service";

// export default class User extends Component {
//   constructor(props) {
//     super(props);
//     this.onChangeFirstName = this.onChangeFirstName.bind(this);
//     this.onChangeLastName = this.onChangeLastName.bind(this);
//     this.onChangeMail = this.onChangeMail.bind(this);
//     this.onChangeAddress = this.onChangeAddress.bind(this);
//     this.onChangePhonenumber = this.onChangePhonenumber.bind(this);
//     this.onChangeBirthDate = this.onChangeBirthDate.bind(this);
//     this.getUser = this.getUser.bind(this);
//     this.deleteUser = this.deleteUser.bind(this);

//     this.state = {
//       currentUser: {
//         id: null,
//         firstname: "",
//         lastname: "",
//         mail: "",
//         address: "",
//         phonenumber: "",
//         birthdate: "",
//       },
//       message: "",
//     };
//   }

//   componentDidMount() {
//     this.getUser(this.props.match.params.id);
//   }

//   onChangeFirstName(e) {
//     const firstname = e.target.value;

//     this.setState(function (prevState) {
//       return {
//         currentUser: {
//           ...prevState.currentUser,
//           firstname: firstname,
//         },
//       };
//     });
//   }

//   onChangeLastName(e) {
//     const lastname = e.target.value;

//     this.setState(function (prevState) {
//       return {
//         currentUser: {
//           ...prevState.currentUser,
//           lastname: lastname,
//         },
//       };
//     });
//   }

//   onChangeMail(e) {
//     const mail = e.target.value;

//     this.setState(function (prevState) {
//       return {
//         currentUser: {
//           ...prevState.currentUser,
//           mail: mail,
//         },
//       };
//     });
//   }

//   onChangeAddress(e) {
//     const address = e.target.value;

//     this.setState(function (prevState) {
//       return {
//         currentUser: {
//           ...prevState.currentUser,
//           address: address,
//         },
//       };
//     });
//   }

//   onChangePhonenumber(e) {
//     const phonenumber = e.target.value;

//     this.setState(function (prevState) {
//       return {
//         currentUser: {
//           ...prevState.currentUser,
//           phonenumber: phonenumber,
//         },
//       };
//     });
//   }

//   onChangeBirthDate(e) {
//     const birthdate = e.target.value;

//     this.setState(function (prevState) {
//       return {
//         currentUser: {
//           ...prevState.currentUser,
//           birthdate: birthdate,
//         },
//       };
//     });
//   }

//   getUser(id) {
//     UsersDataService.get(id)
//       .then((response) => {
//         this.setState({
//           currentUser: response.data,
//         });
//         console.log(response.data);
//       })
//       .catch((e) => {
//         console.log(e);
//       });
//   }

//   updateUser() {
//     UsersDataService.update(this.state.currentUser.id, this.state.currentUser)
//       .then((response) => {
//         console.log(response.data);
//         this.setState({
//           message: "The user was updated successfully!",
//         });
//       })
//       .catch((e) => {
//         console.log(e);
//       });
//   }

//   deleteUser() {
//     UsersDataService.delete(this.state.currentUser.id)
//       .then((response) => {
//         console.log(response.data);
//         this.props.history.push("/users");
//       })
//       .catch((e) => {
//         console.log(e);
//       });
//   }

//   render() {
//     const { currentUser } = this.state;

//     return (
//       <div>
//         {currentUser ? (
//           <div className="edit-form">
//             <h4>User</h4>
//             <form>
//             <div className="form-group">
//                 <label htmlFor="firstname">first name</label>
//                 <input
//                   type="text"
//                   className="form-control"
//                   id="firstname"
//                   value={currentUser.firstname}
//                   onChange={this.onChangeFirstName}
//                 />
//               </div>
//               <div className="form-group">
//                 <label htmlFor="lastname">last name</label>
//                 <input
//                   type="text"
//                   className="form-control"
//                   id="lastname"
//                   value={currentUser.lastname}
//                   onChange={this.onChangeLastName}
//                 />
//               </div>
//               <div className="form-group">
//                 <label htmlFor="mail">Mail</label>
//                 <input
//                   type="text"
//                   className="form-control"
//                   id="mail"
//                   value={currentUser.mail}
//                   onChange={this.onChangeMail}
//                 />
//               </div>
//               <div className="form-group">
//                 <label htmlFor="address">address</label>
//                 <input
//                   type="text"
//                   className="form-control"
//                   id="address"
//                   value={currentUser.address}
//                   onChange={this.onChangeAddress}
//                 />
//               </div><div className="form-group">
//                 <label htmlFor="phonenumber">phonenumber</label>
//                 <input
//                   type="text"
//                   className="form-control"
//                   id="phonenumber"
//                   value={currentUser.phonenumber}
//                   onChange={this.onChangePhonenumber}
//                 />
//               </div><div className="form-group">
//                 <label htmlFor="birthdate">birthdate</label>
//                 <input
//                   type="date"
//                   className="form-control"
//                   id="birthdate"
//                   value={currentUser.birthdate}
//                   onChange={this.onChangeBirthDate}
//                 />
//               </div>
//             </form>

//             <button
//               className="badge badge-danger mr-2"
//               onClick={this.deleteUser}
//             >
//               Delete
//             </button>

//             <p>{this.state.message}</p>
//           </div>
//         ) : (
//           <div>
//             <br />
//             <p>Please click on a User...</p>
//           </div>
//         )}
//       </div>
//     );
//   }
// }

