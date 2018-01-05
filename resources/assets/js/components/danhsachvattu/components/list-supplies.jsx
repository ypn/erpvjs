import React from 'react';
import ReactDOM from 'react-dom';

export default class ListSupplies extends React.Component{

  dismiss(){
    this.props.close();
  }

  render(){
    return(
      <div id="myModal" className="modal show" role="dialog">
        <div className="modal-dialog modal-lg">
          <div className="modal-content">
            <div className="modal-header">
              <button type="button" className="close" onClick={this.dismiss.bind(this)}>&times;</button>
              <h4 className="modal-title">Danh mục hàng hóa - vật tư</h4>
            </div>
            <div className="modal-body">
            <div className="table-responsive">
              <table className="table table-bordered">
               <thead>
                 <tr>
                   <th></th>
                   <th>#</th>
                   <th>Mã vật tư</th>
                   <th>Tên vật tư</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <th><input type="checkbox" /></th>
                   <td>1</td>
                   <td>10CB300</td>
                   <td>Thép TV D10/CB300-Test Thép TV D10/CB300-Test Thép TV D10/CB300-Test est Thép TV D10/CB300-Test est Thép TV D10/CB300-Test</td>
                 </tr>
                 <tr>
                   <th><input type="checkbox" /></th>
                   <td>2</td>
                   <td>10CB300</td>
                   <td>Thép TV D10/CB300-Test</td>
                 </tr>
                 <tr>
                   <th><input type="checkbox" /></th>
                   <td>3</td>
                   <td>10CB300</td>
                   <td>Thép TV D10/CB300-Test</td>
                 </tr>
               </tbody>
              </table>
              <nav className="pull-right" aria-label="Page navigation example">
                <ul className="pagination">
                  <li className="page-item">
                    <a className="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li className="page-item"><a className="page-link" href="#">1</a></li>
                  <li className="page-item"><a className="page-link" href="#">2</a></li>
                  <li className="page-item"><a className="page-link" href="#">3</a></li>
                  <li className="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span className="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}
