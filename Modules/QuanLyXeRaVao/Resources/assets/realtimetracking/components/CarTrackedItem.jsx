import React from 'react';
import Stores from '../stores/Stores';

export default class CarTrackedItem extends React.Component{
  constructor(props){
    super(props);
    this.state = {
      tracks : JSON.parse(this.props.status)
    }
  }

  componentWillMount(){
    var _self = this;
    var interval;

    Stores.on(`session_${this.props.id}_step_in_checkpoint`,function(data){
      var newTracks = _self.state.tracks;
      newTracks[data.data.data.checkpointIndex].status = 1;
      newTracks[data.data.data.checkpointIndex].total_time = 0;

      interval = setInterval(function(){
        newTracks[data.data.data.checkpointIndex].total_time += 1;
        _self.setState({
            tracks:newTracks
          });
        }, 1000);

      _self.setState({
        tracks:newTracks
      });
    });

    Stores.on(`session_${this.props.id}_step_out_checkpoint`,function(data){
      clearInterval(interval);
      var newTracks = _self.state.tracks;
      newTracks[data.data.data.checkpointIndex].status = 2;
      //update new time
      newTracks[data.data.data.checkpointIndex].total_time = data.data.data.total_time;
      _self.setState({
        tracks:newTracks
      });
    });
  }

  render(){
    return(
      <tr key={this.props.id} className="danger">
        <td>{this.props.index +1}</td>
        <td>{this.props.bienso}</td>
        {
          this.state.tracks.map(node=>{
            var txtStatus;
            var time;
            switch (node.status) {
              case 2:
                txtStatus = 'Đã kiểm tra';
                var minutes = Math.floor(node.total_time / 60);
                var seconds = node.total_time - minutes * 60;
                time = `(${minutes} phút ${seconds} giây)`;
                break;
              case 1:
                txtStatus = 'Đang kiểm tra';
                var minutes = Math.floor(node.total_time / 60);
                var seconds = node.total_time - minutes * 60;
                time = `(${minutes} phút ${seconds} giây)`;
                break;
              case 0:
                txtStatus = 'Chưa kiểm tra'
                break;
            }

            return(
              <td>{txtStatus} {time}</td>
            )
          })
        }
      </tr>
    )
  }
}
