import React from 'react';
import ReactDOM from 'react-dom';

export default class TableHeader extends React.Component{
  render(){
    return (
      <thead>
        <tr>
          <th><input type="checkbox" /></th>
          <th id='column-header-1'>Mã hàng<div id='column-header-1-sizer'></div></th>
          <th id='column-header-2'>Tên mặt hàng<div id='column-header-2-sizer'></div></th>
          <th id='column-header-3'>Đvt<div id='column-header-3-sizer'></div></th>
          <th id='column-header-4'>Xuất xứ	<div id='column-header-4-sizer'></div></th>
          <th id='column-header-5'>Thông số kĩ thuật<div id='column-header-5-sizer'></div></th>
          <th id='column-header-6'>Tỉ lệ tiêu hao<div id='column-header-6-sizer'></div></th>
          <th id='column-header-7'>Ngày YC hàng về<div id='column-header-7-sizer'></div></th>
          <th id='column-header-8'>Mục đích/ lý do<div id='column-header-8-sizer'></div></th>
          <th id='column-header-9'>Tồn<div id='column-header-9-sizer'></div></th>
          <th id='column-header-10'>Số lượng<div id='column-header-10-sizer'></div></th>
          <th id='column-header-11'>Giá<div id='column-header-11-sizer'></div></th>
          <th id='column-header-12'>Tiền<div id='column-header-12-sizer'></div></th>
          <th id='column-header-13'>Địa chỉ<div id='column-header-13-sizer'></div></th>
          <th id='column-header-14'>Kho hàng<div id='column-header-14-sizer'></div></th>
          <th id='column-header-15'>Mã ncc<div id='column-header-15-sizer'></div></th>
          <th id='column-header-16'>PIC<div id='column-header-16-sizer'></div></th>
          <th id='column-header-17'>Ghi chú<div id='column-header-17-sizer'></div></th>
          <th id='column-header-18'>Sl TBP duyệt<div id='column-header-18-sizer'></div></th>
          <th id='column-header-19'>Ghi chú cấp duyệt 1<div id='column-header-19-sizer'></div></th>
          <th id='column-header-20'>Sl TP LO/HC duyệt<div id='column-header-20-sizer'></div></th>
          <th id='column-header-21'>Ghi chú cấp duyệt 2<div id='column-header-21-sizer'></div></th>
          <th id='column-header-22'>Sl TGĐ duyệt<div id='column-header-22-sizer'></div></th>
          <th id='column-header-23'>Ghi chú cấp duyệt 3<div id='column-header-23-sizer'></div></th>
          <th id='column-header-24'>Sl đặt hàng<div id='column-header-24-sizer'></div></th>
          <th id='column-header-25'>Trạng thái<div id='column-header-25-sizer'></div></th>
          <th id='column-header-25'>Mã vụ việc<div id='column-header-24-sizer'></div></th>
          <th id='column-header-26'>Hợp đồng<div id='column-header-25-sizer'></div></th>
        </tr>
      </thead>
    )
  }
}
