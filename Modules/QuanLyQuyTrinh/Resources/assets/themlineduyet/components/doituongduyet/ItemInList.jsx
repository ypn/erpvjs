import React from 'react';
import * as Actions from '../../actions/Actions';

export default class ItemInList extends React.Component{

  moveNode(pos,type){
    Actions.moveNode({
      pos,type
    })
  }

  toggleDelInListApproval(e){
    if(e.target.checked){
      Actions.addToDelInListApproval(this.props.node._id);
    }else{
      Actions.removeFromDelInListApproval(this.props.node._id);
    }
  }

  render(){
    return(
      <tr key={this.props.node._id}>
        <td><input onChange={this.toggleDelInListApproval.bind(this)} type="checkbox"/></td>
        <td>
          {
            this.props.pos!=='first' ? (
              <div>
                <a href="javascript:void(0);" onClick={this.moveNode.bind(this,this.props.index,-1)}><i className="glyphicon glyphicon-menu-up"></i></a>
              </div>
            ):null
          }
          {
            this.props.pos!='last' ? (
            <div>
              <a href="javascript:void(0);" onClick={this.moveNode.bind(this,this.props.index,1)}><i className="glyphicon glyphicon-menu-down"></i></a>
            </div>
            ):null
          }
        </td>
        <td>Cấp duyệt LV{this.props.index+1}</td>
        <td>{this.props.node.ten}</td>
        <td>{this.props.node.capbac}</td>
        <td>{this.props.node.phongban}</td>
        <td></td>
      </tr>
    )
  }
}
