import {EventEmitter} from 'events';
import dispatcher from '../dispatcher/dispatcher';
import axios from 'axios';

/**
 * created by: ypn - ypn@vijagroup.com.vn
 * desc: Store xử lý cho phần khai báo line duyệt.
 */
class ApprovalStore extends EventEmitter
{
  constructor(){
    super();
    this.dsVitri  =[];
    this.dsNhanSu =[];
    this.inListApprovals = [];
    this.inDelList =[];
    this.dsQuyTrinh=[];
    this.tenLineDuyet=null;
    this.diengiai=null;
    this.quytrinh=null;

  }

  getDanhSachQuyTrinhTuServer(input){
    axios.get('/quanlyquytrinh/quan-ly-quy-trinh/api/list').then((response)=>{
      this.dsQuyTrinh = response.data;
      this.emit('tai-danh-sach-quy-trinh-thanh-cong');
    });
  }

  /**
   * created by: ypn - ypn@vijagroup.com.vn
   * desc: Liệt kê danh sách các vị trí - cấp bậc đã tạo.
   */
  getServerData(){
    axios.get('/quanlynhansu/vitri-capbac/api/list').then((response)=>{
      this.dsVitri = response.data;
      this.emit('tai-danh-sach-vi-tri');
    });
  }

  /**
   * created by: ypn-ypn@vijagroup.com.vn
   * desc: Liệt kê các nhân sự, user đã tạo.
   */
  taiDanhSachNhanSu(){
    let result=[];
    axios.get('/quanlynhansu/nhansu/api/list').then((response)=>{
      this.dsNhanSu = response.data;
      this.emit('tai-danh-sach-nhan-su');
    });
  }

  /**
   * created by: ypn - ypn@vijagroup.com.vn
   * thêm 1 cấp duyệt mới.
   */
  addNodeApproval(data){
    this.inListApprovals.push({
      _id:new Date().getTime(),
      type:data.type,
      ten:data.ten,
      id:data.id,
      capbac:data.capbac,
      phongban:data.phongban
    })
    this.emit('add-node-approval');
  }

  /**
   * created by: ypn-ypn@vijagroup.com.vn
   * desc: Thay đổi vị trí các đối tượng duyệt trong line duyệt.
   */
  moveNode(data){
    this.swapItem(this.inListApprovals,data.pos,data.pos+data.type);
    this.emit('update-list-approval');
  }

  /**
   * create by: ypn-ypn@vijagroup.com.vn
   * desc: thêm 1 node đã chọn vào danh sách xóa.
   */
  addToDelInListApproval(row_id){
    this.inDelList.push(row_id);
  }
  /**
   * created by: ypn-ypn@vijagroup.com.vn
   * desc: xóa những hàng đã chọn nằm trong danh sách xóa.
   */
  removeRows(){
    this.inListApprovals = this.inListApprovals.filter(o=> this.inDelList.indexOf(o._id) ==-1);
    this.emit('update-list-approval');
  }

  /**
   * created by: ypn-ypn@vijagroup.com.vn
   * desc: xóa 1 phần tử đã chọn vào danh sách xóa.
   */
  removeFromDelInListApproval(row_id){
    let rowIndex = this.inDelList.findIndex(r => r === row_id);
    this.inDelList.splice(rowIndex,1);
  }

  /**
   * created by: ypn - ypn@vijagroup.com.vn
   * desc: gửi dữ liệu lên server để lưu lại.
   */
  submitData(){
    axios({
      method:'POST',
      url:'/quanlyquytrinh/line-duyet/create',
      data:{
        tenQuytrinh:this.quytrinh,
        tenLineDuyet:this.tenLineDuyet,
        diengiai:this.diengiai,
        groupApproval:this.inListApprovals,
      }
    }).then((response)=>{
      this.emit('them-moi-line-duyet',response.data);      
    });
  }

  /**
   * created by: ypn - ypn@vijagroup.com.vn
   * Cập nhật tên line duyệt
   */
  updateNameLineDuyet(text){
    this.tenLineDuyet = text;
  }

  /**
   * created by: ypn - ypn@vijagroup.com.vn
   * Cập nhật quy trình cho line duyệt.
   */
  chonQuyTrinh(id){
    this.quytrinh =1;
  }

  /**
   * created by: ypn - ypn@vijagroup.com.vn
   * Cập nhật diễn giải cho line duyệt.
   */
  updateDiengiai(text){
    this.diengiai = text;
  }

  /**
   * created by: ypn - ypn@vijagroup.com.vn
   * Nhận sự kiện cần xừ lý được gửi sang tử dispatcher
   */
  handleAction(action){
    switch (action.type) {
      case 'LAY_DANH_SACH_VI_TRI':
        this.getServerData();
        break;
      case 'LAY_DANH_SACH_NHAN_SU':
        this.taiDanhSachNhanSu();
        break;
      case 'ADD_NODE_APPROVAL':
        this.addNodeApproval(action.data);
        break;
      case 'MOVE_NODE':
        this.moveNode(action.data);
        break;
      case 'ADD_TO_DEL_LIST_APPROVAL':
        this.addToDelInListApproval(action.data.row_id);
        break;
      case 'REMOVE_FROM_DEL_LIST_APPROVAL':
        this.removeFromDelInListApproval(action.data.row_id);
        break;
      case 'DEL_SELECTION_ROWS':
        this.removeRows();
        break;
      case 'SUBMIT_DATA':
        this.submitData();
        break;
      case 'UPDATE_NAME_LINE_DUYET':
        this.updateNameLineDuyet(action.data.text);
        break;
      case 'CHON_QUY_TRINH':
        this.chonQuyTrinh(action.data.id);
        break;
      case 'UPDATE_DIEN_GIAI':
        this.updateDiengiai(action.data.text);
        break;
      case 'TAI_DANH_SACH_QUY_TRINH':
        this.getDanhSachQuyTrinhTuServer();
    }
  }

  /**
   * created by: ypn - ypn@vijagroup.com.vn
   * đổi chỗ 2 phần tử trong mảng.
   */
  swapItem(arr,index_1,index_2){
    let temp = arr[index_1];
    arr[index_1] = arr[index_2];
    arr[index_2] = temp;

  }

  getInListApproval(){
    return this.inListApprovals;
  }

  taiDanhSachViTri(){
    return this.dsVitri;
  }
  layDanhSachNhanSu(){
    return this.dsNhanSu;
  }

  taiDanhSachQuyTrinh(){
    console.log('sdfsfsdfdf:');
    console.log(this.dsQuyTrinh);
    return this.dsQuyTrinh;
  }
}

const Store = new ApprovalStore();
dispatcher.register(Store.handleAction.bind(Store));
export default Store;
