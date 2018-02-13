import React, {Component} from 'react';

export default class MenuMaster extends Component{
  render(){
    return(
      <div key={this.props.index} onClick = {()=>{return this.props.toggleMenu()}} className="menu-master">
        <div className="btn-circle">
            <span className="_label"><i className={this.props.isOpen? 'fa fa-minus':'fa fa-plus'}></i></span>
        </div>
      </div>
    )
  }
}
