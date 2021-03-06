 import React from 'react';
import CarTrackedItem from './CarTrackedItem';
import TableHeader from './TableHeader';
import * as Actions from '../actions/Actions';
import Stores from '../stores/Stores';

export default class CarTracker extends React.Component {
  constructor(props){
    super(props);
    this.state = {
      listTrackingCar:[]
    }
  }
  componentWillMount(){
    var socket = io('113.160.215.214:3000');

    socket.on('session_step_into_checkpoint',function(data){
      Actions.SessionStepInCheckPoint(data);
    });

    socket.on('session_step_out_checkpoint',function(data){
      Actions.SessionStepOutCheckPoint(data);
    });

    socket.on('new_session_detected',function(data){
      Actions.newSessionDetected(data.data);
    });

    socket.on('stop_tracking',function(data){
      Actions.stopTracking(data.sessionId);
    });

    Stores.on('load_list_tracking_car',()=>{
      this.setState({
        listTrackingCar:Stores.getListTrackingCar()
      });
    });

    Stores.on('new_session_was_add_to_track',()=>{
      this.setState({
        listTrackingCar:Stores.getListTrackingCar()
      });
    });

    Stores.on('stop_session_tracking',()=>{
      this.setState({
        listTrackingCar:Stores.getListTrackingCar()
      });
    });

    Actions.getListTrakingCar();
  }
  render(){
    return(
      <div>
        <table className="table table-bordered">
          <TableHeader />
          <tbody>
          {
            this.state.listTrackingCar.map((node,k)=>{
              return(
                  <CarTrackedItem status = {node.status} bienso={node.bienso} index={k} id={node.id} created = {node.created_at} />
              )
            })
          }
          </tbody>
        </table>
      </div>
    )
  }
}
