import React from 'react';
import ReactDOM from 'react-dom';
import TableStore from '../store/table-stores';
import Rows from './Rows';
import Items from '../objects/Items';

export default class TableBody extends React.Component{
  constructor(props){
    super(props);
    this.state={
      list:TableStore.getListSupplies()
    }
  }

  componentWillMount(){
    TableStore.on('add-new-row',()=>{
      this.setState({
        list:TableStore.getListSupplies()
      });
    });

    TableStore.on('update-list',()=>{
      this.setState({
        list:TableStore.getListSupplies()
      });
    });

    TableStore.on('auto-complete-row',()=>{
      this.setState({
        list:TableStore.getListSupplies()
      });
    });
  }

  render(){
    return(
      <tbody>
      {
        this.state.list.map((note,index)=>{
          return(
            <Rows item = {note.item} id= {note._id}/>
          )
        })
      }
      </tbody>
    );
  }
}
