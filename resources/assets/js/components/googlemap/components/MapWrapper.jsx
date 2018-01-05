import React from "react"
import { compose, withProps } from "recompose"
import { withScriptjs, withGoogleMap, GoogleMap, Marker } from "react-google-maps"


const MapComponent = compose(
  withProps({
    googleMapURL: "https://maps.googleapis.com/maps/api/js?key=AIzaSyDnYiPim3y8CmQ1_t8slDZTSLnhXk0II7Q&callback=initMap",
    loadingElement: <div style={{ height: `100%` }} />,
    containerElement: <div style={{ height: `100%` }} />,
    mapElement: <div style={{ height: `100%` }} />,
  }),
  withScriptjs,
  withGoogleMap
)((props) =>

  <GoogleMap
    defaultZoom={17}
    defaultCenter={{ lat: 20.904956, lng: 106.629027 }}
  >

    {
        <Marker position={{ lat: 20.904956, lng: 106.629027 }} onClick={props.onMarkerClick} />
    }
  </GoogleMap>
)

export default class MapWrapper extends React.PureComponent {
  constructor(props){
    super(props);
    this.state = {
      isMarkerShown: false
    }
  }


  componentDidMount() {
    this.delayedShowMarker()
  }

  delayedShowMarker () {
    setTimeout(() => {
      this.setState({ isMarkerShown: true })
    }, 3000)
  }

  handleMarkerClick () {
    this.setState({ isMarkerShown: false })
    this.delayedShowMarker()
  }

  render() {
    return (
      <MapComponent      
        isMarkerShown={this.state.isMarkerShown}
        onMarkerClick={this.handleMarkerClick}
      />
    )
  }
}
