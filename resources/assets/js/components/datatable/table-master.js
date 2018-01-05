import React from 'react';
import ReactDOM from 'react-dom';
import TableHeader from './components/TableHeader';
import TableBody from './components/TableBody';
import WdnListSupplies from '../danhsachvattu/components/list-supplies';
import * as Actions from './actions/actions';

class TableMaster extends React.Component {
  constructor(props){
    super(props);
    this.state={
      wdnListSupplies:false
    }
  }
  openListSupplies(){
    this.setState({
      wdnListSupplies:true
    });
  }

  closeListSupplies(){
    this.setState({
      wdnListSupplies:false
    });
  }

  addRow(){
    Actions.addNewRow();
  }
  delRow(){
    Actions.delRows();
  }
  render(){
    return (
      <div>
      <div className="table-menu">
        <ul class="nav navbar-nav nav-custom">
          <li><a href="javascript:void(0);" title="thêm" onClick={this.addRow.bind(this)}><i class="fa fa-plus" aria-hidden="true"></i></a></li>
          <li><a href="javascript:void(0);" title="xóa" onClick={this.delRow.bind(this)}><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      {
        this.state.wdnListSupplies ? <WdnListSupplies close={this.closeListSupplies.bind(this)}/> : null
      }
      <table id="demo-table"  className="table bordered table-bordered table-hover cellpadding-0 cellspacing-0">
        <TableHeader/>
        <TableBody/>
      </table>
      </div>
    );
  }
}

ReactDOM.render(
  <TableMaster/>,
  document.getElementById('table-list-buy-item')
);
