
$(document).ready(function() {
  var list_items = [];
  $("#form-mua-hang").submit(function(event) {
      event.preventDefault();
  });
  $('.js-example-basic-single').select2();
  $('#datepicker').datepicker({
    autoclose: true
  })
  $('#form-mua-hang').validate({
    rules: {
            itmh_ma_hang: "required",
            itmh_ten_hang: "required",
            itmh_dtv:'required',

        },
        messages: {
            itmh_ma_hang: "Vui lòng nhập mã hàng",
            itmh_ten_hang: "Vui lòng nhập tên hàng",
        },
        submitHandler:function(e){
          let item = {
            id:list_items.length,
            ma_hang:$('#itmh_ma_hang').val(),
            ten_hang:$('#itmh_ten_hang').val(),
            dvt:$('#itmh_dtv').val(),
            xuat_xu:$('#itmh_xuat_xu').val(),
            thong_so_ky_thuat:$('#itmh_thong_so_ky_thuat').val(),
            ngay_yc:$('#itmh_ngay_yc').val(),
            ncc:$('#itmh_ncc').val(),
            ton:$('#itmh_ton').val(),
            mucdich:$('#itmh_mucdich').val(),
            ghichu:$('#itmh_ghichu').val()
          }

          list_items.push(item);

          let tr = $('<tr>');
          let ma_hang = $('<td>').text(item.ma_hang);
          let ten_hang = $('<td>').text(item.ten_hang);
          let dvt = $('<td>').text(item.dvt);
          let xuat_xu = $('<td>').text(item.xuat_xu);
          let thong_so_ky_thuat = $('<td>').text(item.thong_so_ky_thuat);
          let ngay_yc = $('<td>').text(item.ngay_yc);
          let ncc = $('<td>').text(item.ncc);
          let ton = $('<td>').text(item.ton);
          let thaotac = $('<td>').append($('<a href="javascript:void(0);">').text('Sửa')).append(' | ').append(
            $('<a href="javascript:void(0);">')
            .text('Xóa')
            .on('click',function(){
              list_items.splice($(this).attr('data-id'),1);
              $(this).parents('tr').remove();
              console.log(list_items);
            })
          );

          tr.append(ma_hang).append(ten_hang).append(dvt).append(xuat_xu).append(thong_so_ky_thuat).append(ngay_yc).append(ngay_yc).append(ncc).append(ton).append(thaotac);
          $('#tb-them-nhu-cau').append(tr);

          $('#modal-add-new-item-buy input[type=text], #modal-add-new-item-buy textarea').val('');
          $('#modal-add-new-item-buy').modal('hide');

          console.log(list_items);

        }
  });

  var thHeight = $("table#demo-table th:first").height();
  $("table#demo-table th").resizable({
      handles: "e",
      minHeight: thHeight,
      maxHeight: thHeight,
      minWidth: 40,
      resize: function (event, ui) {
        var sizerID = "#" + $(event.target).attr("id") + "-sizer";
        $(sizerID).width(ui.size.width);
      }
  });
});
