import React from 'react';
import * as Actions from '../../actions/Actions';
import Stores from '../../store/Stores';
import ItemNhanSu from './ItemNhanSu';

export default class DanhSachNhanSu extends React.Component{
  constructor(props){
    super(props);
    this.state = {
      dsNhanSu :[],
    }
  }

  componentWillMount(){  
    Actions.layDanhSachNhanSu();
    Stores.on('tai-danh-sach-nhan-su',()=>{
      this.setState({
        dsNhanSu:Stores.layDanhSachNhanSu()
      })
    });

  }

  render(){
    return(
      <div className="table-responsive">
      <table className="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Họ và tên</th>
            <th>Tên phòng ban</th>
            <th>Vị trí</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          {
            this.state.dsNhanSu.map((node,key)=>{
              return(
                <ItemNhanSu index={key+1} node={node}/>
              )
            })
          }
        </tbody>
      </table>
      </div>
    );
  }
}
