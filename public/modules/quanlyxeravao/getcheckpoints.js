var markers = [];
var checkpoins = null;
var checkpoints_data = $('input[name="checkpoints"]');
var path = checkpoints_data.val() != '' ? checkpoints_data.val() : [];
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,
    center: {lat: 20.904266, lng: 106.628278},
    mapTypeId: 'terrain',
     draggableCursor: 'default',
    draggingCursor: 'pointer',
  });

  $('#clearmap').on('click',function(){
    clearmap();
  });

  if(path.length > 0){
    checkpoins = new google.maps.Polygon({
      paths: JSON.parse(path),
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35
    });

    checkpoins.setMap(map);

  }

  // Define the LatLng coordinates for the polygon's path. Note that there's
  // no need to specify the final coordinates to complete the polygon, because
  // The Google Maps JavaScript API will automatically draw the closing side.
  google.maps.event.addListener(map,'click',function(event){
    if(checkpoins!=null){
      checkpoins.setMap(null);
    }
    path.push(event.latLng);

    marker = new google.maps.Marker({
      position:event.latLng,
      map:map
    });

    markers.push(marker);

    checkpoins = new google.maps.Polygon({
      paths: path,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35
    });
    checkpoins.setMap(map);

    marker.addListener('click',function(){
      this.setMap(null);
    });

    marker.setMap(map);

    checkpoints_data.val(JSON.stringify(path));

  });
}

function clearmap(){

    if(markers){
      for(i in markers){
        markers[i].setMap(null);
      }
    }
    markers = [];

    if(checkpoins!==null){
      checkpoins.setMap(null);
    }

    path=[];
    checkpoints_data.val(null);

}
