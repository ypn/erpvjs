import dispatcher from '../dispatcher/dispatcher';
import Items from '../objects/Items';

export function addNewRow(){
  dispatcher.dispatch({
    type:'ADD_NEW_ROW'
  });
}

//Tự động cập nhật thông tin của row khi có mã hàng
export function autoCompleteRow(id,mahang){
  dispatcher.dispatch({
    type:'AUTO_COMPLETE_ROW',
    data:{
      id,
      mahang
    }
  })
}

export function addToDelList(row_id){
  dispatcher.dispatch({
    type:'ADD_TO_DEL_LIST',
    data:{
      row_id
    }
  });
}

export function delRows(){
  dispatcher.dispatch({
    type:'DEL_ROWS'
  })
}

export function removeFromDelList(row_id){
  dispatcher.dispatch({
    type:'REMOVE_FROM_DEL_LIST',
    data:{
      row_id
    }
  })
}
