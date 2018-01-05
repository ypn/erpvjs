import React from 'react';
import DataList from './DataList';

export default class ModalAddNode extends React.Component{
  constructor(props){
    super(props);
    this.state ={
      list : 0
    }
  }

  closeModal(){
    this.props.closeModal();
  }

  changeOptions(e){
    this.setState({
      list:e.target.value
    });
  }

  render(){
    return(
      <div className="modal show" role="dialog">
        <div className="modal-dialog">
          <div className="modal-content">
            <div className="modal-header">
              <button type="button" className="close" data-dismiss="modal" onClick={this.closeModal.bind(this)}>&times;</button>
              <h4 className="modal-title">Thêm cấp duyệt</h4>
            </div>
            <div className="modal-body">
              <div className="form-horizontal">
                <div className="form-group">
                  <label className="control-label col-sm-3" for="pwd">Đối tượng duyệt:</label>
                  <div className="col-sm-9">
                    <select onChange={this.changeOptions.bind(this)} ref="" className="form-control">
                      <option selected="true" disabled>Chọn đối tượng duyệt</option>
                      <option value="1">Chỉ định theo vị trí cấp bậc</option>
                      <option value="2">Chỉ định theo cá nhân</option>
                    </select>
                  </div>

                  {
                    this.state.list !=0 ? (
                      <div>
                        <br/><br/><br/>
                        <div className="col-xs-12">
                          <DataList option={this.state.list} />
                        </div>
                      </div>
                    ):(
                      <div>
                      <br/><br/><br/>
                      <p class="col-xs-12">Cần chọn đối tượng duyệt trước.</p>
                      </div>
                    )
                  }

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}
