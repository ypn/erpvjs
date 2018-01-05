import React from 'react';
import Store from '../../store/Stores';
import ItemInList from './ItemInList';

export default class InList extends React.Component{
  constructor(props){
    super(props);
    this.state = {
      inList:[]
    }
  }

  componentWillMount(){
    Store.on('add-node-approval',()=>{
      this.setState({
        inList: Store.getInListApproval()
      })
    });

    Store.on('update-list-approval',()=>{
      this.setState({
        inList:Store.getInListApproval()
      });
    });
  }


  render(){
    return(

      <div className="table-responsive">
        <table className="table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th>#</th>
              <th>Cấp duyệt</th>
              <th>Đối tượng duyệt</th>
              <th>Cấp bậc người duyệt</th>
              <th>Phòng ban người duyệt</th>
              <th>Diễn giải</th>
            </tr>
          </thead>
          <tbody>

          {
            this.state.inList.map((node,key)=>{
              let pos;

              if(key==0){
                pos = 'first';
              }else if(key==this.state.inList.length-1){
                pos = 'last';
              }
              return(
                <ItemInList pos={pos} index={key} node={node} />
              )
            })
          }
          </tbody>
        </table>
      </div>

    );
  }
}
