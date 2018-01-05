import React from 'react';
import * as Actions from '../../actions/Actions';
import Stores from '../../store/Stores';
import _ from 'lodash';

export default class ItemNhanSu extends React.Component{

  constructor(props){
    super(props);
    this.inListApprovals=[]
    this.state = {
      disabled:false
    }
  }

  componentWillMount(){
      this.inListApprovals = Stores.getInListApproval();
  }

  addApprovalNode(id,ten,capbac,phongban){
    Actions.addNodeApproval({
      type:'NS',
      id,
      ten,
      capbac,
      phongban
    });
    this.setState({
      disabled:true
    });
  }

  render(){
    if(_.findIndex(this.inListApprovals,{type:'NS',id:this.props.node.id}) !==-1){
      this.state.disabled = true;
    }

    return(
      <tr>
        <td>{this.props.index}</td>
        <td>{this.props.node.first_name} {this.props.node.last_name}</td>
        <td>{this.props.node.bophan_phongban}</td>
        <td>{this.props.node.vitri_capbac}</td>
        <td>
          {
            this.state.disabled ? <button disabled className="btn btn-default btn-xs">đã thêm</button>:
            <button
              onClick={
                this.addApprovalNode.bind(
                  this,this.props.node.id,
                  this.props.node.first_name + ' ' +this.props.node.last_name,
                  this.props.node.vitri_capbac,this.props.node.bophan_phongban
                )}
              className="btn btn-primary btn-xs">
              Thêm
            </button>
          }
        </td>

      </tr>
    )
  }
}
