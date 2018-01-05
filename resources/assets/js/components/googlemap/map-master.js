import React from 'react'
import ReactDOM from 'react-dom'
import MapWrapper from './components/MapWrapper';

class A extends React.Component{
  render(){
    return(
      <h1>Map here</h1>
    )
  }
}

ReactDOM.render(
  <MapWrapper/>,
  document.getElementById('map')
)
