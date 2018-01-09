var markers = [];
var lchkps =[];//Danh sách tất cả các check point được tạo từ polygon;
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 17,
      center: {lat: 20.904956, lng: 106.629027}
    });
    var marker =null;
    var socket = io('127.0.0.1:3000');
    var path = [];
    var poly = new google.maps.Polyline({
      map: map
    });

    drawMap(map);

    //Tạo polygon từ checkpoins
    var listPolygon = JSON.parse(listCheckpoints);
    for(let i in listPolygon){
      let cp = new google.maps.Polygon({
        paths: JSON.parse(listPolygon[i]),
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 0,
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

function drawMap(map){
  var ic_nhacan = './images/iconmap/nhacan/home_x32.png';
  var nhacan = new google.maps.Marker({
    position: {lat: 20.905995, lng: 106.631583},
    map: map,
    icon: ic_nhacan
  });

  var ic_sanbong = './images/iconmap/iconstadium/football-field_x32.png';

  var sanbong= new google.maps.Marker({
    position: {lat:20.904725, lng: 106.632203},
    map: map,
    icon: ic_sanbong
  });

  //Khối nhà văn phòng
  var ic_nhavp = './images/iconmap/nhavp/vp_x32.png';
  var nhavp = new google.maps.Marker({
    position: {lat:20.905513,lng:106.631977},
    map:map,
    icon:ic_nhavp
  });
  //Kết thúc khối nhà văn phòng.

  //Vẽ văn phòng ban quản lý

  //Kết thúc văn phòng ban quản lý
  var ic_nmc = './images/iconmap/nhavp/vp_x32.png';
  var vpbql = new google.maps.Marker({
    position: {lat:20.906390,lng:106.628815},
    map:map,
    icon:ic_nmc
  });
  //vẽ đường vào.
  var cor_duongvao = [
     {lat: 20.906891, lng: 106.632325},
     {lat: 20.906463, lng:  106.632608},
     {lat: 20.906013, lng:  106.632846},
     {lat: 20.905338, lng: 106.633210}
   ];

   var duongvao = new google.maps.Polyline({
      path: cor_duongvao,
      geodesic: true,
      strokeColor: '#fff',
      strokeOpacity: 1.0,
      strokeWeight: 7
    });

    duongvao.setMap(map);
    //kết thúc vẽ đường vào.

    //Vẽ đường 12m
    var cor_duong12m = [
       {lat: 20.905984, lng:  106.632846},
       {lat: 20.905912, lng:  106.632479},//cổng vào A1
       {lat: 20.905879, lng:   106.632018},//Cổng sau khối văn phòng.
       {lat: 20.905885, lng: 106.631554},//nhà cân
       {lat: 20.905843, lng:106.631269},//Ngã rẽ
       {lat: 20.905233, lng:106.631294},//rẽ sang đường 6m
     ];

     var duong12m = new google.maps.Polyline({
        path: cor_duong12m,
        geodesic: true,
        strokeColor: '#fff',
        strokeOpacity: 1.0,
        strokeWeight: 7
      });

      duong12m.setMap(map);
    //Kết thúc vẽ đường 12m

    //Vẽ đường 6m
    var cor_duong6m = [
       {lat: 20.905239, lng:  106.631295},//Ngã rẽ đường 12m
       {lat: 20.905223, lng:  106.630188},
       {lat:20.905229, lng:   106.628959},//Cổng sau khối văn phòng.
       {lat: 20.905212, lng:  106.628111},//Đường rẽ ra bãi phế

       {lat:20.904433,lng:106.628093},
       {lat:20.904166,lng:106.628004},
       {lat:20.904049,lng:106.627761},
       {lat:20.904052,lng:106.626886},
       {lat:20.904113,lng:106.625571}
     ];
     var duong6m = new google.maps.Polyline({
        path: cor_duong6m,
        geodesic: true,
        strokeColor: '#fff',
        strokeOpacity: 1.0,
        strokeWeight: 5
    });
    duong6m.setMap(map);
    //Kết thúc vẽ đường 6m

    //Đường bao bãi phế
    var cor_duongbaobaiphe = [
      {lat:20.904127,lng:106.625568},
      {lat:20.905281,lng:106.625494},
      {lat:20.905812,lng:106.625537},
      {lat:20.905922,lng:106.625670},
      {lat:20.905926,lng:106.626757},
      {lat:20.905244,lng:106.626775},
      {lat:20.904385,lng:106.626795},
      {lat:20.904043,lng:106.626862}
    ];

    var duongbaobaiphe = new google.maps.Polyline({
       path: cor_duongbaobaiphe,
       geodesic: true,
       strokeColor: '#fff',
       strokeOpacity: 1.0,
       strokeWeight: 5
   });

   duongbaobaiphe.setMap(map);

   //vẽ nhà máy luyện
   var cor_nhamayluyen  = [
      {lat: 20.905978, lng: 106.626851},
      {lat: 20.905986, lng: 106.627389},
      {lat: 20.905115, lng: 106.627408},
      {lat: 20.905059, lng: 106.628018},
      {lat:20.904454,lng: 106.628047},
      {lat:20.904454,lng:106.626850}
    ];
    var nhamayluyen = new google.maps.Polygon({
       paths: cor_nhamayluyen,
       strokeColor: 'rgba(0,0,0,0)',
       strokeOpacity: 1,
       strokeWeight: 0,
       fillColor: '#3c8dbc',
       fillOpacity:0.35,
       label: 'Nhà máy luyện'
     });

     nhamayluyen.setMap(map);
   //kết thúc vẽ nhà máy luyện

   //Vẽ nhà máy cán
   var cor_nmc  = [
      {lat: 20.905660, lng: 106.627594},
      {lat: 20.905666, lng: 106.628137},
      {lat: 20.905934, lng: 106.628151},
      {lat: 20.905901, lng: 106.630885},
      {lat:20.905377,lng: 106.630913},
      {lat:20.905422,lng:106.627597}
    ];

    var nmc = new google.maps.Polygon({
       paths: cor_nmc,
       strokeColor: 'rgba(0,0,0,0)',
       strokeOpacity: 1,
       strokeWeight: 0,
       fillColor: '#3c8dbc',
       fillOpacity:0.35
     });

  nmc.setMap(map);

  var a = [];

  a.push(nhacan);
  a.push(nhavp);
  a.push(sanbong);
  a.push(vpbql);



  var markerCluster = new MarkerClusterer(map, a,
      {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

   //kết thúc
   map.addListener('zoom_changed',function(){
     let zoomLevel = map.getZoom();
     console.log(zoomLevel);
     if(zoomLevel < 14){
       duongbaobaiphe.setOptions({
         strokeWeight:0
       });
       duong6m.setOptions({
         strokeWeight:0
       });
       duong12m.setOptions({
         strokeWeight:0
       });
     }else if( zoomLevel == 14 || zoomLevel == 15){
       duongbaobaiphe.setOptions({
         strokeWeight:1
       });
       duong6m.setOptions({
         strokeWeight:1
       });
       duong12m.setOptions({
         strokeWeight:1
       });
       duongvao.setOptions({
         strokeWeight:1
       });
     }else if( zoomLevel > 15 && zoomLevel <= 17 ){
        duongbaobaiphe.setOptions({
          strokeWeight:3
        });
        duong6m.setOptions({
          strokeWeight:3
        });
        duong12m.setOptions({
          strokeWeight:3
        });
        duongvao.setOptions({
          strokeWeight:3
        });
    }else if(zoomLevel > 17 && zoomLevel <=19){
         duongbaobaiphe.setOptions({
           strokeWeight:10
         });
         duong6m.setOptions({
           strokeWeight:10
         });
         duong12m.setOptions({
           strokeWeight:10
         });
         duongvao.setOptions({
           strokeWeight:10
         });
     }else{
       duongbaobaiphe.setOptions({
         strokeWeight:30
       });
       duong6m.setOptions({
         strokeWeight:30
       });
       duong12m.setOptions({
         strokeWeight:30
       });
       duongvao.setOptions({
         strokeWeight:30
       });
     }

   });

}

$('#toggle-bottom-sheet').on('click',function(){
  $('.bottom-sheet').toggleClass('open');
});
