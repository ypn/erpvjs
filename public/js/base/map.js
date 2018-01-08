var markers = [];
var lchkps =[];//Danh sách tất cả các check point được tạo từ polygon;
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: {lat: 20.904956, lng: 106.629027}
    });
    var marker =null;
    var socket = io('127.0.0.1:3000');
    var path = [];
    var poly = new google.maps.Polyline({
      map: map
    });

    //Tạo polygon từ checkpoins
    var listPolygon = JSON.parse(listCheckpoints);
    for(let i in listPolygon){
      let cp = new google.maps.Polygon({
        paths: JSON.parse(listPolygon[i]),
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35,
        name:'nha can'
      });
      lchkps.push(cp);
      cp.setMap(map);
    }

    socket.on('new_device_connected', function (data) {
      let uluru = data.position
      marker = new google.maps.Marker({
        position: uluru,
        map: map
      });
      markers.push(marker);
      path.push(uluru);
    });

    //Updata position
    socket.on('update_position',function(data){
      let uluru = data.marker;
      if(marker == null){
          marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
      }

      //let result = getCheckpointOfCar(marker.getPosition());

      marker.setPosition(uluru);
      path.push(uluru);
      poly.setPath(path);

    });//---End update position--//

}

function updateMarkerPosition(maker,position) {
  marker.setPosition(position);
}

$('#toggle-bottom-sheet').on('click',function(){
  $('.bottom-sheet').toggleClass('open');
});

/**
 * Kiểm tra xe có nằm trong checkpoint hay không
 * trả về checkpoin nếu xe thuộc check point và null nếu không thuôc.
 */
// function getCheckpointOfCar(latlng){
//   for(i in lchkps ){
//     if( google.maps.geometry.poly.containsLocation(latlng, lchkps[i]) ){
//       console.log('clgt');
//       return lchkps[i];
//     }
//   }
//
//   return null;
// }
