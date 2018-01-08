import dispatcher from '../dispatcher/dispatcher';

export function SessionStepInCheckPoint(data){
  dispatcher.dispatch({
    type:'SESSION_STEP_IN_CHECKPOINT',
    data
  })

}

export function SessionStepOutCheckPoint(data){
  dispatcher.dispatch({
    type:'SESSION_STEP_OUT_CHECKPOINT',
    data
  });
}

export function getListTrakingCar(){
  dispatcher.dispatch({
    type:'GET_LIST_TRACKING_CAR'
  });
}

export function newSessionDetected(data){
  dispatcher.dispatch({
    type:'NEW_SESSION_DETECTED',
    data
  });
}

export function getTotalSessions(){
  dispatcher.dispatch({
    type:'GET_TOTAL_SESSIONS'
  });
}
