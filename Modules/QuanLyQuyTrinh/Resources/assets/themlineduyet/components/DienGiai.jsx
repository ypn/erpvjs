import React from 'react';
import * as Actions from '../actions/Actions';

export default class  DienGiai extends React.Component{

  updateDiengiai(e){
    if(e.target.value!=''){
      Actions.updateDiengiai(e.target.value);
    }    
  }

  render(){
    return(
      <div className="form-group">
        <label className="control-label col-sm-2" for="pwd">Diễn giải</label>
        <div className="col-sm-10">
          <textarea onBlur={this.updateDiengiai.bind(this)} placeholder="Diễn giải ngắn gọn" className="form-control"></textarea>
        </div>
      </div>
    );
  }
}
