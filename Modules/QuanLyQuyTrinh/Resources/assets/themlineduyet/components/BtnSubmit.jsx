import React from 'react';
import * as Actions from '../actions/Actions';
import { ToastContainer, toast } from 'react-toastify';
import Stores from '../store/Stores';

export default class BtnSubmit extends React.Component{

  

  submitData(){
    Actions.submitData();
  }

  componentWillMount(){
    Stores.on('them-moi-line-duyet',(response)=>{
      switch (response.status) {
        case 1:
        toast.success('Thêm mới line duyệt: ' + response.name +' thành công!');
        break;

        case 0:
        toast.error('Lỗi truy vấn:' + response.code + '. Báo lỗi cho nhà phát triển!');

        break;

      }
    });
  }

  render(){
    return(
      <div className="form-group">
        <div className="col-sm-offset-2 col-sm-10">
          <button onClick={this.submitData.bind(this)} className="btn btn-primary"><i className="fa fa-save"></i> Lưu</button>
          <ToastContainer />
        </div>
      </div>
    )
  }
}
