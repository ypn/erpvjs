import React from 'react';
import * as Actions from '../actions/actions';
import TableStore from '../store/table-stores';

export default class Rows extends React.Component{
  constructor(props){
    super(props);
  }

  tdChange(e){
    Actions.autoCompleteRow(this.props.id,e.target.innerText);
  }

  //thêm vào danh sách xóa
  toggleInDelList(e){
    if(e.target.checked){
      Actions.addToDelList(this.props.id);
    }
    else{
      Actions.removeFromDelList(this.props.id);
    }
  }

  render(){
    return(
      <tr key={this.props.id}>
        <td><input tabindex="-1"  type="checkbox" onChange = {this.toggleInDelList.bind(this)}/></td>
        <td style={{
          minWidth:100,
          paddingRight:25,
        }} contenteditable="true" onKeyUp = {this.tdChange.bind(this)}>

          {this.props.item.mahang}

        </td>
        <td  style={{
          minWidth:250
        }}>{this.props.item.tenmathang}</td>
        <td>{this.props.item.dtv}</td>
        <td>{this.props.item.xuatxu}</td>
        <td>{this.props.item.thongsokithuat}</td>
        <td>{this.props.item.tyletieuhao}</td>
        <td>{this.props.item.ngayhangve}</td>
        <td>{this.props.item.mucdich}</td>
        <td>{this.props.item.ton}</td>
        <td>{this.props.item.soluong}</td>
        <td>{this.props.item.gia}</td>
        <td>{this.props.item.tien}</td>
        <td>{this.props.item.diachi}</td>
        <td>{this.props.item.khohang}</td>
        <td>{this.props.item.mancc}</td>
        <td>{this.props.item.pic}</td>
        <td>{this.props.item.ghichu}</td>
        <td>{this.props.item.slduyet}</td>
        <td>{this.props.item.ghichuduyetcap1}</td>
        <td>{this.props.item.sltploduyet  }</td>
        <td>{this.props.item.ghichuduyetcap2}</td>
        <td>{this.props.item.sltgdduyet}</td>
        <td>{this.props.item.ghichuduyetcap3}</td>
        <td>{this.props.item.sldathang}</td>
        <td>{this.props.item.trangthai}</td>
        <td>{this.props.item.mavuviec}</td>
        <td>{this.props.item.hopdong}</td>
      </tr>
    )
  }
}
