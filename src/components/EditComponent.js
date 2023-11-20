import React, { Component } from "react";
import { reduxForm, Field } from "redux-form";
import { connect } from "react-redux";
import { FormGroup, Col, Label, Input, Row, Button } from "reactstrap";
import UserValidation from "../validations/UserValidation";

const renderField = ({
  input,
  type,
  placeholder,
  label,
  disabled,
  readOnly,
  meta: { touched, error, warning },
}) => (
  <Row>
    <Col md="12">
      <Label htmlFor="{input}" className="col-form-label">
        {label}
      </Label>
    </Col>
    <Col md="12">
      <Input
        {...input}
        type={type}
        placeholder={placeholder}
        disabled={disabled}
        readOnly={readOnly}
      ></Input>
      {touched &&
        ((error && <p style={{ color: "red" }}>{error}</p>) ||
          (warning && <p style={{ color: "brown" }}>{warning}</p>))}
    </Col>
  </Row>
);

const mapStateToProps = (state) => {
  return {
    initialValues : {
      nama : state.users.getUserDetail.nama,
      nik : state.users.getUserDetail.nik,
      tgl_msk : state.users.getUserDetail.tgl_msk,
      tgl_lahir : state.users.getUserDetail.tgl_lahir,
      alamat : state.users.getUserDetail.alamat,
     
    }
  };
};

class EditComponent extends Component {
  render() {
    return (
      <form onSubmit={this.props.handleSubmit}>
        <FormGroup row>
        <Col md={6}>
            <FormGroup>
              <Field
                type="number"
                name="nik"
                disabled={true}
                component={renderField}
                label="nik :"
              />
            </FormGroup>
          </Col>
          
          <Col md={6}>
            <FormGroup>
              <Field
                type="text"
                name="nama"
                component={renderField}
                label="Nama :"
              />
            </FormGroup>
          </Col>

          <Col md={6}>
            <FormGroup>
              <Field
                type="date"
                name="tgl_lahir"
                disabled={true}
                component={renderField}
                label="Tanggal lahir :"
              />
            </FormGroup>
          </Col>


          <Col md={6}>
            <FormGroup>
              <Field
                type="date"
                name="tgl_msk"
                disabled={true}
                component={renderField}
                label="Tanggal Masuk :"
              />
            </FormGroup>
          </Col>

          <Col md={6}>
            <FormGroup>
              <Field
                type="textarea"
                name="alamat"
                disabled={true}
                component={renderField}
                label="Alamat :"
              />
            </FormGroup>
          </Col>

         

          
        </FormGroup>

        <FormGroup row>
          <Col md="12">
            <FormGroup>
              <Button
                color="dark"
                type="submit"
                disabled={this.props.submitting}
              >
                Submit
              </Button>
            </FormGroup>
          </Col>
        </FormGroup>
      </form>
    );
  }
}

EditComponent = reduxForm({
  form: "formCreateUser",
  validate: UserValidation,
  enableReinitialize: true,
})(EditComponent);
export default connect(mapStateToProps, null)(EditComponent);
