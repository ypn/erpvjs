import dispatcher from '../dispatcher/dispatcher';

export function layDanhSachViTri(){
  dispatcher.dispatch({
    type:'LAY_DANH_SACH_VI_TRI'
  });
}

export function layDanhSachNhanSu(){
  dispatcher.dispatch({
    'type':'LAY_DANH_SACH_NHAN_SU'
  });
}

export function addNodeApproval(data){
  dispatcher.dispatch({
    type:'ADD_NODE_APPROVAL',
    data
  });
}

export function moveNode(data){
  dispatcher.dispatch({
    type:'MOVE_NODE',
    data
  })
}

export function addToDelInListApproval(row_id){
  dispatcher.dispatch({
    type:'ADD_TO_DEL_LIST_APPROVAL',
    data:{
      row_id
    }
  })
}

export function removeFromDelInListApproval(row_id){
  dispatcher.dispatch({
    type:'REMOVE_FROM_DEL_LIST_APPROVAL',
    data:{
      row_id
    }
  })
}

export function removeRows(){
  dispatcher.dispatch({
    type:'DEL_SELECTION_ROWS'
  })
}

export function submitData(){
  dispatcher.dispatch({
    type:'SUBMIT_DATA'
  })
}

export function updateNameLineDuyet(text){
  dispatcher.dispatch({
    type:'UPDATE_NAME_LINE_DUYET',
    data:{
      text
    }
  })
}

export function chonQuyTrinh(id){
  dispatcher.dispatch({
    type:'CHON_QUY_TRINH',
    data:{
      id
    }
  });
}

export function updateDiengiai(text){
  dispatcher.dispatch({
    type:'UPDATE_DIEN_GIAI',
    data:{
      text
    }
  });
}

export function taiDanhSachQuyTrinh(){
  dispatcher.dispatch({
    type:'TAI_DANH_SACH_QUY_TRINH'
  });
}
