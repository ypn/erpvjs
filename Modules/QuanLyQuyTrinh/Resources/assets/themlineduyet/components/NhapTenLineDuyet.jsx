import React from 'react';
import * as Actions from '../actions/Actions';

export default class NhapTenLineDuyet extends React.Component{

  focusout(e){
    if(e.target.value!==''){      
      Actions.updateNameLineDuyet(e.target.value);
    }

  }
  render(){
    return(
      <div className="form-group">
        <label className="control-label col-sm-2" for="email">Tên line duyệt *</label>
        <div className="col-sm-10">
          <input onBlur  = {this.focusout.bind(this)} type="text" className="form-control" id="pwd" placeholder="Nhập tên line duyệt"/>
        </div>
      </div>
    );
  }
}
