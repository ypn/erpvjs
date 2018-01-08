import {EventEmitter} from 'events';
import dispatcher from '../dispatcher/dispatcher';
import axios from 'axios';

class CarTrackerStore extends EventEmitter {

  constructor(){
    super();
    this.listTrackingCar = [];
  }

  /**
   * Load danh sách xe đang kiểm tra.
   */
  loadListTrackingCar(){
    axios.get('/quanlyxeravao/session-tracking/list').then(response=>{
      this.listTrackingCar = response.data;
      this.emit('load_list_tracking_car');
    });
  }

  /**
   * Xe vào điểm kiểm tra.
   */
  sessionStepInCheckPoint(data){
    this.emit(`session_step_in_checkpoint_${data.data.checkpointId}`);
    console.log('session in checkpoint:');
    console.log(`session_${data.data.sessionId}_step_in_checkpoint`);
    this.emit(`session_${data.data.sessionId}_step_in_checkpoint`,{data:data});

  }

  /**
   * Xe ra khỏi điểm kiểm tra.
   */
  SessionStepOutCheckPoint(data){
    this.emit(`session_step_out_checkpoint_${data.data.checkpointId}`);
    console.log('session out checkpoint:');
    console.log(`session_${data.data.sessionId}_step_out_checkpoint`);
    this.emit(`session_${data.data.sessionId}_step_out_checkpoint`,{data:data});
  }

  detectNewSession(data){
    this.listTrackingCar.push(JSON.parse(data));
    console.log('STORE:detect new session');
    this.emit('new_session_was_add_to_track');
  }

  getTotalSessions(){
    console.log('sdfsfdsfsdf get total session');
    this.emit('get_total_session_traking');
  }

  handleAction(action){
    switch (action.type) {
      case 'SESSION_STEP_IN_CHECKPOINT':
        this.sessionStepInCheckPoint(action.data)
        break;
      case 'SESSION_STEP_OUT_CHECKPOINT':
        this.SessionStepOutCheckPoint(action.data);
        break;
      case 'GET_LIST_TRACKING_CAR':
        this.loadListTrackingCar();
        break;
      case 'NEW_SESSION_DETECTED':
        this.detectNewSession(action.data);
        break;
      case 'GET_TOTAL_SESSIONS':
        this.getTotalSessions();
        break;
    }
  }

  getTotal(){
    return this.listTrackingCar.length;
  }

  getListTrackingCar(){
    return this.listTrackingCar;
  }
}

const Store = new CarTrackerStore();
dispatcher.register(Store.handleAction.bind(Store));
export default Store;
