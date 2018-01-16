const NO_SIZE = 0;
const SIZE_XS = 1;
const SIZE_SM = 3;
const SIZE_MD = 5;
const SIZE_LG = 15;
const SIZE_EXT= 30;
var markers = [];
var lchkps =[];//Danh sách tất cả các check point được tạo từ polygon;
initMap();
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 17,
      center: {lat: 20.904956, lng: 106.629027}
    });
    var marker =null;
    var socket = io('113.160.215.214:3000');
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
    var nhamayluyen = drawPolygon(cor_nhamayluyen,'#3c8dbc');

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

    var nmc = drawPolygon(cor_nmc,'#3c8dbc');

    nmc.setMap(map);//Kết thúc vẽ nhà máy cán

  //Vẽ cảng
  var cor_cang  = [
     {lat: 20.906994, lng: 106.624772},
     {lat: 20.906980, lng: 106.625190},
     {lat: 20.906330, lng: 106.625213},
     {lat: 20.905120, lng: 106.625210},
     {lat: 20.905231,lng: 106.624485},
     {lat: 20.906191,lng: 106.624590}
   ];
   var cang = drawPolygon(cor_cang,'#3c8dbc');

   cang.setMap(map);


  //Kết thúc vẽ cảng

  var a = [];

  a.push(nhacan);
  a.push(nhavp);
  a.push(sanbong);
  a.push(vpbql);


      var markerCluster = new MarkerClusterer(map, a,
      {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

      var lbBaiphe = new MapLabel({
        text: 'Bãi phế',
        position: new google.maps.LatLng(20.905024, 106.626112),
        map: map,
        fontSize: 15,
        align: 'right'
      });

      var lbNmc = new MapLabel({
        text: 'Nhà máy cán',
        position: new google.maps.LatLng(20.905704, 106.629209),
        map: map,
        fontSize: 15,
        align: 'right'
      });

      var lbNml = new MapLabel({
        text: 'Nhà máy luyện',
        position: new google.maps.LatLng(20.905619,106.627438),
        map: map,
        'rotate':90,
        fontSize: 12,
        align: 'right'
      });

      var lbDuong6m = new MapLabel({
        text: 'Đường 12m',
        position: new google.maps.LatLng(20.905126, 106.629755),
        map: map,
        fontSize: 13,
        align: 'right'
      });

      var lbCang = new MapLabel({
        text: 'Cảng Việt Nhật',
        position: new google.maps.LatLng(20.906428, 106.625229),
        map: map,
        'rotate':90,
        fontSize: 13,
        align: 'right'
      });

      var lbVpnm = new MapLabel({
        text: 'Văn phòng nhà máy',
        position: new google.maps.LatLng(20.906313, 106.628938),
        map: map,
        fontSize: 12,
        align: 'right'
      });

      var lbNhacan = new MapLabel({
        text: 'Nhà cân',
        position: new google.maps.LatLng(20.906016,106.631884),
        map: map,
        fontSize: 12,
        align: 'right'
      });

   //kết thúc
   map.addListener('zoom_changed',function(){
     let zoomLevel = map.getZoom();
     console.log(zoomLevel);

     if(zoomLevel<= 16){
       vpbql.setOptions({
         icon:'./images/iconmap/nhavp/vp_x16.png'
       });
       lbBaiphe.setMap(null);
       lbNmc.setMap(null);
       lbNml.setMap(null);
       lbDuong6m.setMap(null);
       lbCang.setMap(null);
       lbVpnm.setMap(null);
       lbNhacan.setMap(null);
     }else{
       vpbql.setOptions({
         icon:'./images/iconmap/nhavp/vp_x32.png'
       });
       lbBaiphe.setMap(map);
       lbNmc.setMap(map);
       lbNml.setMap(map);
       lbDuong6m.setMap(map);
       lbCang.setMap(map);
       lbVpnm.setMap(map);
       lbNhacan.setMap(map);
     }

     if(zoomLevel < 14){
       duongbaobaiphe.setOptions({
         strokeWeight:NO_SIZE
       });
       duong6m.setOptions({
         strokeWeight:NO_SIZE
       });
       duong12m.setOptions({
         strokeWeight:NO_SIZE
       });
     }else if( zoomLevel == 14 || zoomLevel == 15){
       duongbaobaiphe.setOptions({
         strokeWeight:SIZE_XS
       });
       duong6m.setOptions({
         strokeWeight:SIZE_XS
       });
       duong12m.setOptions({
         strokeWeight:SIZE_XS
       });
       duongvao.setOptions({
         strokeWeight:SIZE_XS
       });
     }else if( zoomLevel == 16){
        duongbaobaiphe.setOptions({
          strokeWeight:SIZE_SM
        });
        duong6m.setOptions({
          strokeWeight:SIZE_SM
        });
        duong12m.setOptions({
          strokeWeight:SIZE_SM
        });
        duongvao.setOptions({
          strokeWeight:SIZE_SM
        });
    }

    else if(zoomLevel == 17){
      duongbaobaiphe.setOptions({
        strokeWeight:SIZE_MD
      });
      duong6m.setOptions({
        strokeWeight:SIZE_MD
      });
      duong12m.setOptions({
        strokeWeight:SIZE_MD
      });
      duongvao.setOptions({
        strokeWeight:SIZE_MD
      });
    }

    else if(zoomLevel == 18 || zoomLevel ==19){
         duongbaobaiphe.setOptions({
           strokeWeight:SIZE_LG
         });
         duong6m.setOptions({
           strokeWeight:SIZE_LG
         });
         duong12m.setOptions({
           strokeWeight:SIZE_LG
         });
         duongvao.setOptions({
           strokeWeight:SIZE_LG
         });
     }else{
       duongbaobaiphe.setOptions({
         strokeWeight:SIZE_EXT
       });
       duong6m.setOptions({
         strokeWeight:SIZE_EXT
       });
       duong12m.setOptions({
         strokeWeight:SIZE_EXT
       });
       duongvao.setOptions({
         strokeWeight:SIZE_EXT
       });
     }

   });

}

function drawPolygon(paths,fillColor){
  return new google.maps.Polygon({
    paths,
    fillColor,
    strokeColor: 'rgba(0,0,0,0)',
    strokeOpacity: 0,
    strokeWeight: 0,
    fillOpacity:0.35
  });
}

$('#toggle-bottom-sheet').on('click',function(){
  $('.bottom-sheet').toggleClass('open');
});
