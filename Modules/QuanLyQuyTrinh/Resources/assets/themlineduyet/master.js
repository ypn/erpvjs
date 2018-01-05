import React from 'react';
import ReactDOM from 'react-dom';
import GroupApproval from './components/GroupApproval';
import ChonQuyTrinh from './components/ChonQuyTrinh';
import NhapTenLineDuyet from './components/NhapTenLineDuyet';
import DienGiai from './components/DienGiai';
import BtnSubmit from './components/BtnSubmit';

class FormAddLineApproval extends React.Component{
  render(){
    return(
      <div className="form-horizontal">
        <ChonQuyTrinh/>
        <NhapTenLineDuyet/>
        <DienGiai/>
        <GroupApproval/>
        <BtnSubmit/>
      </div>
    );
  }
}

ReactDOM.render(
  <FormAddLineApproval/>,
  document.getElementById('react-root')
);
