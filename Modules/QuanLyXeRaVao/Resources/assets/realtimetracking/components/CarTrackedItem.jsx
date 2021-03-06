import React from 'react';
import Stores from '../stores/Stores';

export default class CarTrackedItem extends React.Component{
  constructor(props){
    super(props);
    console.log('created at');
    console.log(this.props.created);
    var time1 = new Date(this.props.created);
    var time2 = new Date();
    var t = $.map(JSON.parse(this.props.status),function(v,i){
      return [v];
    });
    this.state = {
      tracks : t,
      count_time : Math.floor((time2-time1)/1000)
    }
  }

  componentWillMount(){
    var _self = this;
    var interval;

    var tungnui = this.state.tracks;
    var listInterval = [];
    var total_time_count;
    total_time_count = setInterval(function(){
      _self.setState({
        count_time: _self.state.count_time+1
      });
    },1000);
    for(let i=0;i < tungnui.length ;i++){
      if(tungnui[i].status ==1){
         var time1 = new Date(tungnui[i].time_start);
         var time2 = new Date();
         tungnui[i].total_time = Math.floor((time2-time1)/1000);

         var a = setInterval(function(){
           tungnui[i].total_time += 1;
           _self.setState({
               tracks:tungnui
             });
           }, 1000);

           listInterval[i] = a;

        }
    }

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
      if(interval){
          clearInterval(interval);
      }

      if(listInterval[data.data.data.checkpointIndex]){
        clearInterval(listInterval[data.data.data.checkpointIndex]);
      }

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
    var minutes_count = Math.floor(this.state.count_time / 60);
    var seconds_count = this.state.count_time - minutes_count * 60;
    var ct = `(${minutes_count} phút ${seconds_count} giây)`;
    return(
      <tr key={this.props.id} className="info">
        <td>{this.props.index +1}</td>
        <td>{this.props.bienso}</td>
        {
          this.state.tracks.map(node=>{
            var txtStatus;
            var time;
            var cssClass = null;

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
            if(node.total_time > node.max_time*60) cssClass='danger';

            return(
              <td className={cssClass}>{txtStatus} {time}</td>
            )
          })
        }
        <td>{this.props.created}</td>
        <td>{ct}</td>
      </tr>
    )
  }
}
