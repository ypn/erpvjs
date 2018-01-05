function countColumn(table){
  console.log(table);
  return table.find('thead td').length;

}
(function($){
  $('.table-menu .btn-add-row').on('click',function(){

    table = $(this).parents('div.table-wrapper').find('table');
    cols = $(this).parents('div.table-wrapper').find('table thead th');

    table.find('tbody').append(
      $('tr')
    );
  });
}(jQuery));
