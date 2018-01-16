$('#myModal').on('shown.bs.modal', function (e) {
  var invoke = e.relatedTarget;
  $.ajax({
    method:'GET',
    url:'/quanlyxeravao/report/detail',
    data:{
      sessionId:$(invoke).attr('data-sessionId')
    },
    success:function(response){
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
       strokeWeight: 2
      });

      flightPath.setMap(map);
      google.maps.event.trigger(map, "resize");

      var status = response.status;
      var aa = [];
      for(var i= 0 ; i< status.length ; i++){
          let minutes = Math.floor(status[i].total_time / 60);
          let seconds = status[i].total_time - minutes * 60;
          aa.push({
            name:status[i].name,
            time:`${minutes} phút ${seconds} giây`
          });
      }
      console.log(aa);
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
    item.append($('<td>').html(i+1));
    item.append($('<td>').html(data[i].name));
    item.append($('<td>').html(data[i].time));
    time_report.append(item);


  }

}
