import React from 'react';
import DanhSachViTri from './doituongduyet/DanhSachViTri';
import DanhSachNhanSu from './doituongduyet/DanhSachNhanSu';

export default class DataList extends React.Component{
  render(){
    var viewttt;
    if(this.props.option==1){
      viewttt = <DanhSachViTri/>;
    }else{
      viewttt = <DanhSachNhanSu/>;
    }
    return(

      {...viewttt}

    );
  }
}
