import React, {Component} from 'react';
import MenuItem from './MenuItem';
import MenuMaster from './MenuMaster';
import {
  BrowserRouter as Router,
  Route,
  Link
} from 'react-router-dom';
import InitialMap from '../tomchentwmap/InitialMap';

const MapMaster = () => (
  <div>
    <InitialMap/>
  </div>
)

const Home = () => (
  <div>
    <h2>Báo cáo</h2>
  </div>
)

const About = () => (
  <div>
    <h2>Trạm theo dõi</h2>
  </div>
)

export default class MenuContainer extends Component {
  constructor(props){
    super(props);
    this.state = {
      isOpen:false,
      items:[
        {
          id:1,
          route:'/quanlyxeravao',
          title:'Theo dõi thời gian thực',
          icon:'fa fa-map'
        },

        {
          id:2,
          route:'/quanlyxeravao/checkpoints',
          title:'Trạm theo dõi',
          icon:'fa fa-location-arrow'
        },

        {
          id:3,
          route:'/quanlyxeravao/reports',
          title:'Báo cáo',
          icon:'fa fa-chart-line'
        }
      ]
    }
  }
  toggleMenu(){
    this.setState({
      isOpen:!this.state.isOpen
    })
  }
  render(){
    return(
      <Router>
      <div>
        <div className="float-vertical-menu">
          <MenuMaster index ="-1" isOpen={this.state.isOpen} toggleMenu = {this.toggleMenu.bind(this)}/>
          {
            this.state.items.map((node,key)=>{
              return(
                <Link key={key} to={node.route}><MenuItem icon={node.icon} title={node.title} index={key}  isOpen={this.state.isOpen} /></Link>
              )
            })
          }
        </div>
        <Route exact path="/quanlyxeravao" component={MapMaster}/>
        <Route path="/quanlyxeravao/checkpoints" component={About}/>
        <Route path="/quanlyxeravao/reports" component={Home}/>
        </div>
      </Router>
    )
  }
}
