import {EventEmitter} from 'events';
import dispatcher from '../dispatcher/dispatcher';
import Items from '../objects/Items';
import _ from 'lodash';


class TableStore extends EventEmitter{
    constructor(){
      super();
      //Khởi tạo danh sách vật tư là rỗng.
      this.listSupplies = [
        {
          _id:0,
          item:new Items()
        }
      ];

      this.listTemple = [
          new Items('p','casino','chiec','trung quoc'),
          new Items('df','acaini','lit','vietnam'),
          new Items('moto','acaini','lit','nhat',null,null,null,'Love the way you lie'),
          new Items('casio','May tinh casio','lit','vietnam',null,null,'15/199/1992'),
      ]

      //Khởi tạo danh sách xóa trống
      this.listDel =[];
    }

    //Thêm hàng mới rỗng vào danh sách vật tư.
    addNewRow(){
      this.listSupplies.push(
        {
          _id:new Date().getTime(),
          item:new Items()
        }
      );
      this.emit('add-new-row');
    }

    //Tự động điền thông tin về vật tư khi có mã vật tư.
    autoCompleteRow(id,mahang){
      let rowIndex = this.listSupplies.findIndex(r => r._id === id );
      let obj = this.listSupplies[rowIndex];
      var i = _.findIndex(this.listTemple, o => o.mahang === mahang);

      if(i!=-1){
        obj.item = this.listTemple[i];
      }else{
        obj.item = new Items();
      }

      this.emit('update-list');
    }

    //thêm hàng vào danh sách xóa
    addToDelList(row_id){
      this.listDel.push(row_id);
    }

    //Xóa những hàng đã chọn
    delRows(){
      this.listSupplies = this.listSupplies.filter(o=> this.listDel.indexOf(o._id) ==-1);
      this.emit('update-list');

    }

    //Loại bỏ hàng khỏi danh sách xóa.
    removeFromDelList(row_id){
      let rowIndex = this.listDel.findIndex(r => r === row_id);
      this.listDel.splice(rowIndex,1);
    }

    //Bắt các actions được gửi sang từ dispatcher.
    handleAction(action){
      switch(action.type){
        case 'ADD_NEW_ROW':
          this.addNewRow();
          break;
        case 'AUTO_COMPLETE_ROW':
          this.autoCompleteRow(action.data.id,action.data.mahang);
          break;
        case 'ADD_TO_DEL_LIST':
          this.addToDelList(action.data.row_id);
          break;
        case 'DEL_ROWS':
          this.delRows();
          break;
        case 'REMOVE_FROM_DEL_LIST':
          this.removeFromDelList(action.data.row_id);
          break;
      }
    }

    getListSupplies(){
      return this.listSupplies;
    }
}

const Store = new TableStore();
dispatcher.register(Store.handleAction.bind(Store));
export default Store;
