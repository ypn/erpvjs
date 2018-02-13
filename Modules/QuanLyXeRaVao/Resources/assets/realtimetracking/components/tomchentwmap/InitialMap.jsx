import React,{Component} from 'react';
import{
  withGoogleMap,
  GoogleMap,
  InfoWindow,
  Marker,
  Polyline
} from 'react-google-maps';
import Stores from '../../stores/Stores';
import MornitorMaster from '../dashboard/MornitorMaster';

const InitialMap = withGoogleMap(props=>{
  var mk= props.markers
  return(
    <GoogleMap
      ref={props.onMapLoad}
      defaultZoom={17}
      defaultCenter = {{lat:20.903975, lng: 106.629445}}
    >
    {
      props.polylines.map((pl,k)=>{
        return(
          pl.isShowed &&
          <Polyline
            key = {k}
            path = {pl.path}
            options = {pl.options}
          />
        )
      })
    }
    {
      props.markers.map(mk=>{
        return(
          <Marker
            defaultZIndex = {mk.index}
            key = {mk.id}
            position = {mk.position}
            onClick = {()=>{props.onMarkerClick(mk)}}
          >{
            mk.showInfo &&
            <InfoWindow
              onCloseClick = {()=>props.handleMarkerClose(mk)}
            >
              {
                <div><h6>{mk.bienso}</h6></div>
              }
            </InfoWindow>
          }
          </Marker>
        )
      })
    }
    </GoogleMap>
  )
})

export default class MapContainer extends Component{
    constructor(props){
      super(props);
      this.state = {
        markers:[],
        polylines:[]
      }
    }

    componentWillMount(){
      var _self = this;
      Stores.on('new_session_was_add_to_track',()=>{
        _self.setState({
          markers:Stores.getListMarkerObject(),
          polylines:Stores.getListPolylines()
        });
      });

      Stores.on('load_list_tracking_car',()=>{
        _self.setState({
          markers:Stores.getListMarkerObject(),
          polylines:Stores.getListPolylines()
        });
      });

      Stores.on('togglePath',(id)=>{
        _self.setState({
          polylines:_self.state.polylines.map(pl=>{
            if(pl.id == id){
              pl.isShowed = !pl.isShowed
            }
            return pl;
          })
        })
      });

      Stores.on('stop_session_tracking',()=>{
        _self.setState({
          markers:Stores.getListMarkerObject(),
          polylines:Stores.getListPolylines()
        });
      });

      Stores.on('change_path_color',(data)=>{
        _self.setState({
          polylines:_self.state.polylines.map(pl=>{
            if(pl.id== data.id){
              pl.options = {
                strokeWeight:4,
                strokeColor:data.pathColor
              }
            }
            return pl;
          })
        });
      })

      Stores.on('update_marker',(data)=>{
        console.log('update _mar ker');
        _self.setState({
          markers:_self.state.markers.map(mk=>{
            if(mk.id == data.data.id){
              mk.position = {
                lat:data.data.marker.lat,
                lng:data.data.marker.lng
              }
            }
            return mk;
          }),
          polylines:_self.state.polylines.map(pl=>{
            if(pl.id == data.data.id){
              pl.path = [ ...pl.path,{
                lat:data.data.marker.lat,
                lng:data.data.marker.lng
              }]
            }
            return pl;
          })
        });
      });
    }

    onClick(mk){
      this.setState({
        markers:this.state.markers.map(marker=>{
          if(marker.id == mk.id) marker.showInfo = !marker.showInfo;
          return marker;
        })
      })
    }

    onHandleMarkerClose(mk){
      this.setState({
        markers:this.state.markers.map(marker=>{
          if(marker.id == mk.id) mk.showInfo = false;
          return marker;
        })
      })
    }

    render(){
      return(
        <div style = {{
          width:"100vw",
          height:"100vh"
        }}>
          <MornitorMaster/>
          <InitialMap
            containerElement = {
              <div style = {{height:"100%"}}/>
            }
            mapElement = {
              <div style = {{height:"100%"}}/>
            }

            markers = {this.state.markers}

            polylines = {this.state.polylines}

            onMarkerClick = {this.onClick.bind(this)}

            handleMarkerClose = {this.onHandleMarkerClose.bind(this)}
          />
      </div>
      )
    }
}
