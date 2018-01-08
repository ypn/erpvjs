import React from 'react';
import Store from '../store/Stores';
import * as Actions from '../actions/Actions';

export default class ChonQuyTrinh extends React.Component{

  constructor(){
    super();
    this.state = {
      listQuyTrinh:[]
    }
  }

  componentWillMount(){
    Actions.taiDanhSachQuyTrinh();
    Store.on('tai-danh-sach-quy-trinh-thanh-cong',()=>{
      this.setState({
        listQuyTrinh:Store.taiDanhSachQuyTrinh()
      });   

    });
  }

  changeOptions(e){
    Actions.chonQuyTrinh(e.target.value);
  }

  render(){
    return(
      <div className="form-group">
        <label className="control-label col-sm-2" for="email">Chọn Quy trình</label>
        <div className="col-sm-10">
          <select onChange={this.changeOptions.bind(this)}  className="form-control" >
            <option disabled selected >Chọn quy trình</option>
            {
              this.state.listQuyTrinh.map(node=>{
                return(
                  <option value={node.id}>{node.ten}</option>
                );
              })
            }
          </select>
        </div>
      </div>
    );
  }
}
