import React from 'react';
import UserForm from './UserForm';

const AddUser = () => {
  const handleOnSubmit = (user) => {
    console.log(user);
  };

  return (
    <React.Fragment>
      <UserForm handleOnSubmit={handleOnSubmit} />
    </React.Fragment>
  );
};

export default AddUser;

// import React, { Component } from "react";
// import UsersDataService from "../services/users.service";

// export default class AddUser extends Component {
//   constructor(props) {
//     super(props);
//     this.onChangeFirstName = this.onChangeFirstName.bind(this);
//     this.onChangeLastName = this.onChangeLastName.bind(this);
//     this.onChangeMail = this.onChangeMail.bind(this);
//     this.onChangeAddress = this.onChangeAddress.bind(this);
//     this.onChangePhonenumber = this.onChangePhonenumber.bind(this);
//     this.onChangeBirthDate = this.onChangeBirthDate.bind(this);
//     this.saveUser = this.saveUser.bind(this);
//     this.newUser = this.newUser.bind(this);

//     this.state = {
//       id: null,
//       firstname: "",
//       lastname: "",
//       mail: "",
//       address: "",
//       phonenumber: "",
//       birthdate: "",

//       submitted: false,
//     };
//   }
//   onChangeFirstName(e) {
//     this.setState({
//       title: e.target.value,
//     });
//   }

//   onChangeLastName(e) {
//     this.setState({
//       title: e.target.value,
//     });
//   }

//   onChangeMail(e) {
//     this.setState({
//       mail: e.target.value,
//     });
//   }

//   onChangeAddress(e) {
//     this.setState({
//       address: e.target.value,
//     });
//   }

//   onChangePhonenumber(e) {
//     this.setState({
//       phonenumber: e.target.value,
//     });
//   }

//   onChangeBirthDate(e) {
//     this.setState({
//       birthdate: e.target.value,
//     });
//   }

//   saveUser() {
//     var data = {
//       firstname: this.state.firstname,
//       lastname: this.state.lastname,
//       mail: this.state.mail,
//       address: this.state.address,
//       phonenumber: this.state.phonenumber,
//       birthdate: this.state.birthdate,
//     };

//     UsersDataService.create(data)
//       .then((response) => {
//         this.setState({
//           id: response.data.id,
//           firstname: response.data.firstname,
//           lastname: response.data.lastname,
//           mail: response.data.mail,
//           address: response.data.address,
//           phonenumber: response.data.phonenumber,
//           birthdate: response.data.birthdate,

//           submitted: true,
//         });
//         console.log(response.data);
//       })
//       .catch((e) => {
//         console.log(e);
//       });
//   }

//   newUser() {
//     this.setState({
//       id: null,
//       firstname: "",
//       lastname: "",
//       mail: "",
//       address: "",
//       phonenumber: "",
//       birthdate: "",

//       submitted: false,
//     });
//   }

//   render() {
//     return (
//       <div className="submit-form">
//         {this.state.submitted ? (
//           <div>
//             <h4>You submitted successfully!</h4>
//             <button className="btn btn-success" onClick={this.newUser}>
//               Add
//             </button>
//           </div>
//         ) : (
//           <div>
//             <div className="form-group">
//               <label htmlFor="firstname">first Name</label>
//               <input
//                 type="text"
//                 className="form-control"
//                 id="firstname"
//                 required
//                 value={this.state.firstname}
//                 onChange={this.onChangeFirstName}
//                 name="firstname"
//               />
//             </div>

//             <div className="form-group">
//               <label htmlFor="lastname">Last Name</label>
//               <input
//                 type="text"
//                 className="form-control"
//                 id="lastname"
//                 required
//                 value={this.state.lastname}
//                 onChange={this.onChangeLastName}
//                 name="lastname"
//               />
//             </div>

//             <div className="form-group">
//               <label htmlFor="mail">mail</label>
//               <input
//                 type="text"
//                 className="form-control"
//                 id="mail"
//                 required
//                 value={this.state.mail}
//                 onChange={this.onChangeMail}
//                 name="mail"
//               />
//             </div>

//             <div className="form-group">
//               <label htmlFor="address">address</label>
//               <input
//                 type="text"
//                 className="form-control"
//                 id="address"
//                 required
//                 value={this.state.address}
//                 onChange={this.onChangeAddress}
//                 name="address"
//               />
//             </div>

//             <div className="form-group">
//               <label htmlFor="phonenumber">phonenumber</label>
//               <input
//                 type="text"
//                 className="form-control"
//                 id="phonenumber"
//                 required
//                 value={this.state.phonenumber}
//                 onChange={this.onChangePhonenumber}
//                 name="phonenumber"
//               />
//             </div>

//             <div className="form-group">
//               <label htmlFor="birthdate">birthdate</label>
//               <input
//                 type="date"
//                 className="form-control"
//                 id="birthdate"
//                 required
//                 value={this.state.birthdate}
//                 onChange={this.onChangeBirthDate}
//                 name="birthdate"
//               />
//             </div>

//             <button onClick={this.saveUser} className="btn btn-success">
//               Submit
//             </button>
//           </div>
//         )}
//       </div>
//     );
//   }
// }