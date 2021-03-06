import React from 'react';
import CheckPoint from './CheckPoint';
import axios from 'axios';
import Stores from '../stores/Stores';

export default class TableHeader extends React.Component{
  constructor(props){
    super(props);
    this.state = {
      total:0,
      listCheckPoints : []
    }
  }

  componentWillMount(){
    axios.get('/quanlyxeravao/checkpoints/api/list').then((response)=>{
      this.setState({
        listCheckPoints:response.data
      });
    });  
  }
  render(){
    return(
      <thead key='table-header'>
          <tr style = {{background:'#000',color:'#fff'}}>
            <th key={-2}>#</th>
            <th key={-1}>Xe({this.state.total})</th>
            {
              this.state.listCheckPoints.map((node,k)=>{
                return(
                  <CheckPoint index={k} id={node.id} key={node.id} name={node.name} />
                );
              })
            }
            <th>Giờ bắt đầu</th>
            <th>Thời gian giám sát</th>
          </tr>
      </thead>
    )
  }
}
