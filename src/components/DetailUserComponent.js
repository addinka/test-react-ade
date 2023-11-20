import React from "react";
import { connect } from "react-redux";
import { Table } from "reactstrap";

const mapStateToProps = (state) => {
  return {
    getUserDetail: state.users.getUserDetail,
    errorUserDetail: state.users.errorUserDetail,

    
  };
};
let today = new Date().getTime();
console.log (today)
const DetailUserComponent = (props) => {
  return (
    <Table striped>
      <tbody>
      <tr>
          <td width="200">nik</td>
          <td width="10">:</td>
          <td>{props.getUserDetail.nik}</td>
        </tr>
        <tr>
          <td width="200">Nama</td>
          <td width="10">:</td>
          <td>{props.getUserDetail.nama}</td>
        </tr>
        <tr>
          <td width="200">Alamat</td>
          <td width="10">:</td>
          <td>{props.getUserDetail.alamat}</td>
        </tr>
        <tr>
          <td width="200">Tanggal Lahir</td>
          <td width="10">:</td>
          <td>{props.getUserDetail.tgl_lahir}</td>
        </tr>
        <tr>
          <td width="200">Tanggal Masuk</td>
          <td width="10">:</td>
          <td>{props.getUserDetail.tgl_msk}</td>
        </tr>
        

      </tbody>
    </Table>
  );
};

export default connect(mapStateToProps, null)(DetailUserComponent);
