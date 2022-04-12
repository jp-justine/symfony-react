import React, { useState } from 'react';
import Modal from 'react-bootstrap/Modal'
import { Button, Form } from 'react-bootstrap';
import axios from 'axios';

export default function MyModal(props) {
    const [name, setName] = useState("");
    const [mail, setMail] = useState("");
    const [address, setAddress] = useState("");
    const [phone, setPhone] = useState("");
    const [birthdate, setBirthdate] = useState("");

    const handleSubmit = event => {
        setName('');      
        setMail('');
        setAddress('');
        setPhone('');
        setBirthdate('');
    
        axios.post('/api/new', {
          name: name,
          mail: mail,
          address: address,
          phone: phone,
          birthdate: birthdate
        })
        }

    return (

      <Modal
        {...props}
        backdrop="static"
        keyboard={false}
      >
        <Modal.Header closeButton>

          <Modal.Title >
            New User
          </Modal.Title>
        </Modal.Header>

        <Modal.Body > 

      <Form className="modal-body" onSubmit = { handleSubmit }>

        <Form.Group className="mb-3">
          <Form.Label>Name</Form.Label>
          <Form.Control type="name" placeholder="Enter name" value={name} onChange={(e) => setName(e.target.value)}/>
        </Form.Group>

        <Form.Group className="mb-1" controlId="formBasicemail">
          <Form.Label>Mail</Form.Label>
          <Form.Control type="email" placeholder="Enter email" value={mail} onChange={(e) => setMail(e.target.value)}/>
        </Form.Group>

        <Form.Group className="mb-3">
          <Form.Label>Address</Form.Label>
          <Form.Control type="text" placeholder="Enter Address" value={address} onChange={(e) => setAddress(e.target.value)}/>
        </Form.Group>

        <Form.Group className="mb-3">
          <Form.Label>Phone number</Form.Label>
          <Form.Control type="phone" placeholder="Enter phoneNumber" value={phone} onChange={(e) => setPhone(e.target.value)}/>
        </Form.Group>

        <Form.Group className="mb-3" controlId="formBasicDate">
          <Form.Label>Birthdate</Form.Label>
          <Form.Control type="date" placeholder="Enter birthdate" value={birthdate} onChange={(e) => setBirthdate(e.target.value)}/>
        </Form.Group>
        
        <Button variant="primary" type="submit" >Submit</Button>
      </Form>

      </Modal.Body>
    </Modal>
  );
}

