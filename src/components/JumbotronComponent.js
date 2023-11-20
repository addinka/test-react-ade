import React from "react";
import { Jumbotron, Button, Container } from "reactstrap";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faInfo } from '@fortawesome/free-solid-svg-icons'
import { connect } from 'react-redux'

const mapStateToProps = (state) => {
  return {
    title: state.users.title
  }
}

const JumbotronComponent = (props) => {
  return (
    <div>
      <Jumbotron>
        <Container>
          <h1 className="display-3">{props.title}</h1>
          <p className="lead">
            Aplikasi Sederhana ini di bangun menggunakan React JS, Redux, Axios, Redux Thunk, React Strap, Redux Form, Font Awsome, dan Code Igniter sebagai Rest API nya. 
          </p>
          <hr className="my-2" />
          <p>
          Ini adalah Test untuk Masuk PT Etana Biotechnologies Indonesia, Semoga saya di terima 🙏

          </p>
          <p className="lead">
            <Button color="dark"><FontAwesomeIcon icon={faInfo} /> Learn More</Button>
          </p>
        </Container>
      </Jumbotron>
    </div>
  );
};

export default connect(mapStateToProps, null)(JumbotronComponent);
