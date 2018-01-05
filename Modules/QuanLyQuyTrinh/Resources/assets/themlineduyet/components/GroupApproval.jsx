import React from 'react';
import ModalAddNode from './ModalAddNode';
import InList from './doituongduyet/InList';
import * as Actions from '../actions/Actions';

export default class GroupApproval extends React.Component{

  constructor(props){
    super(props);
    this.state = {
      wndAddAproval: false
    }
  }

  openModal(){
    this.setState({
      wndAddAproval:true
    });
  }

  closeModal(){
    this.setState({
      wndAddAproval:false
    });
  }

  removeRows(){
    Actions.removeRows();
  }

  render(){
    return(
      <div className="form-group">
        <label className="control-label col-sm-2" for="pwd">Nhóm người duyệt:</label>
        <div className="col-sm-10">
          <div>
            <ul className="nav navbar-nav nav-custom">
              <li data-toggle="tooltip" title="Thêm cấp duyệt"><a href="javascript:void(0);" onClick={this.openModal.bind(this)}><i className="fa fa-plus" aria-hidden="true"></i></a></li>
              <li><a href="javascript:void(0);" onClick={this.removeRows.bind(this)} data-toggle="tooltip" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
            </ul>
            <span className="clearfix"></span>

            <InList/>

          </div>
        </div>
        {
          this.state.wndAddAproval ? <ModalAddNode closeModal={this.closeModal.bind(this)}/> : null
        }
      </div>
    );
  }
}
