import React from 'react';
import * as Actions from '../../actions/Actions';
import Store from '../../store/Stores';
import ItemVitri from './ItemVitri';

export default class DanhSachViTri extends React.Component{
  constructor(props){
    super(props);
    this.state = {
      listPos: []
    }
  }

  componentWillMount(){
    Actions.layDanhSachViTri();

    Store.on('tai-danh-sach-vi-tri',()=>{
      this.setState({
        listPos: Store.taiDanhSachViTri()
      });
    });
  }

  render(){
    return(
      <div className="table-responsive">
      <table className="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên vị trí</th>
            <th>Diễn giải</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          {
            this.state.listPos.map((node,key)=>{
              return(
                <ItemVitri index={key+1} node={node} />
              )
            })
          }
        </tbody>
      </table>
      </div>
    );
  }
}
