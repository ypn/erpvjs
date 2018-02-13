import React,{Component} from 'react';
import MenuContainer from './floatverticalmenu/MenuContainer';
import * as Actions from '../actions/Actions';

export default class App extends Component {
  componentWillMount(){
    var socket = io('113.160.215.214:3000');

    socket.on('session_step_into_checkpoint',function(data){
      Actions.SessionStepInCheckPoint(data);
    });

    socket.on('session_step_out_checkpoint',function(data){
      Actions.SessionStepOutCheckPoint(data);
    });

    socket.on('new_session_detected',function(data){
      Actions.newSessionDetected({data:data.data,position:data.position});
    });

    socket.on('update_position',(data)=>{    
      Actions.updatePosition(data);
    });

    socket.on('stop_tracking',function(data){
      Actions.stopTracking(data.sessionId);
    });
  }
  render(){
    return(
      <div>
        <MenuContainer/>
      </div>
    )
  }
}
