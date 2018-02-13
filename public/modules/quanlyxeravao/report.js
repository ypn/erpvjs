$('#myModal').on('shown.bs.modal', function (e) {
  var invoke = e.relatedTarget;
  var sp_created_at = $(this).find('.report-general .sp_created_at');
  var ended_at = $(this).find('.report-general .sp_end_at');
  var sp_total_time = $(this).find('.report-general .sp_total_time');
  $.ajax({
    method:'GET',
    url:'/quanlyxeravao/report/detail',
    data:{
      sessionId:$(invoke).attr('data-sessionId')
    },
    success:function(response){
      sp_created_at.text(response.created_at);
      ended_at.text(response.ended_at);
      var time1 = new Date(response.created_at);
      var time2 = new Date(response.ended_at);
      var time_diff = Math.floor((time2-time1)/1000);
      var minutes_count = Math.floor(time_diff / 60);
      var seconds_count = time_diff - minutes_count * 60;
      var ct = `${minutes_count} phút ${seconds_count} giây`;
      sp_total_time.text(ct);
      var flightPlanCoordinates = JSON.parse(response.car_positions);
      var path =[];
      for(var i = 0 ;i <flightPlanCoordinates.length; i++){
        var obj = eval('(' + JSON.parse(JSON.stringify(flightPlanCoordinates[i])) + ')');
        path.push(obj);
      }
      var map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 17,
        center: {lat:20.905003,lng:106.627771}
      });

      var flightPath = new google.maps.Polyline({
       path: path,
       geodesic: true,
       strokeColor: '#FF0000',
       strokeOpacity: 1.0,
       strokeWeight: 5
      });

      flightPath.setMap(map);
      google.maps.event.trigger(map, "resize");

      var status = response.status;
      var status = $.map(status,function(v,k){
        return [v];
      });

      var aa = [];
      for(var i= 0 ; i< status.length ; i++){
          let minutes = Math.floor(status[i].total_time / 60);
          let seconds = status[i].total_time - minutes * 60;

          let time_diff = - status[i].total_time + status[i].max_time * 60;
          aa.push({
            name:status[i].name,
            time:`${minutes} : ${seconds}`,
            max_time:status[i].max_time,
            time_diff:time_diff
          });
      }
      updateTimeReport(aa);
    }
  });

});

$('#myModal').on('hidden.bs.modal', function () {
    var map = $('#map-canvas');
    map.empty();
});

function updateTimeReport(data){
  var time_report = $('#myModal .time-report table tbody');
  time_report.empty();
  for(var i =0 ; i< data.length ;i++){
    var item = $('<tr>');

    if(data[i].time_diff < 0){
      item.addClass('danger');
    }

    item.append($('<td>').html(i+1));
    item.append($('<td>').html(data[i].name));
    item.append($('<td>').html(data[i].time));
    item.append($('<td>').html(data[i].max_time));
    item.append($('<td>').html(_time(data[i].time_diff)));
    time_report.append(item);
  }

}

function _time(t){
  let y = Math.abs(t);
  let minutes = Math.floor(y / 60);
  let seconds = y - minutes * 60;

  return t>=0?`+ ${minutes} : ${seconds} ` : `- ${minutes} : ${seconds} `;
}
