import React from 'react';
import * as Actions from '../../actions/Actions';
import Store from '../../store/Stores';
import _ from 'lodash';

export default class ItemVitri extends React.Component{
  constructor(props){
    super(props);
    this.inListApprovals=[];
    this.state = {
      disabled:false
    }
  }

  componentWillMount(){
    this.inListApprovals = Store.getInListApproval();
  }

  addApprovalNode(id,ten){
    Actions.addNodeApproval({
      type:'PB',
      id,
      ten,
      capbac:ten,
      phongban:'Phòng/bộ phận của người gửi phiếu nhu cầu'
    });

    this.setState({
      disabled:true
    });
  }

  render(){

    if(_.findIndex(this.inListApprovals,{type:'PB',id:this.props.node.id})!==-1){
      this.state.disabled = true;
    }

    return(
      <tr>
        <td>{this.props.index}</td>
        <td>{this.props.node.ten}</td>
        <td>{this.props.node.diengiai}</td>
        <td>
          {
            this.state.disabled ? <button disabled className= "btn btn-defaukt btn-xs">đã thêm</button> :
            <button onClick={this.addApprovalNode.bind(this,this.props.node.id,this.props.node.ten)} className="btn btn-primary btn-xs">Thêm</button>
          }
        </td>
      </tr>
    );
  }
}
