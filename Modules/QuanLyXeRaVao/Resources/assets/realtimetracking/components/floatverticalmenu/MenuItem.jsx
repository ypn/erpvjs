import React,{Component} from 'react';

export default class MenuItem extends Component {
  render(){
    var offsetY = this.props.isOpen?-(this.props.index + 1) * 65:0;
    return(
      <div key={this.props.index} className="menu-item" style={{
        transform:`translate(0,${offsetY}px)`
      }}>
        <div className="btn-circle">
          <span className="_label"><i className={this.props.icon}></i></span>
          {
              this.props.isOpen &&
              <div className="item-title">{this.props.title}</div>
          }
        </div>
      </div>
    )
  }
}
