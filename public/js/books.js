
$('#books_list tbody').sortable({
	update : function () {
		var order = $('#books_list tbody').sortable('toArray').toString();
		// console.log($('#books_list tbody').sortable('toArray'));
  //       console.log(order);
		$.ajax({
             type: "POST",
             url: "/books/order/"+order,
             dataType: "json",
             complete: function (data) {
             	//location.reload();
             }
         });

	}
});

$('#books_container .x_add_book').on('click',function(){
	$(this).hide();
	$('#books_container').removeClass('form_invisible');
});

$('#books_container .x_cancel').on('click',function(){
	$('#books_container .x_add_book').show();
	$('#books_container').addClass('form_invisible');
});

$("#books_list tr").on('click',function(){
	var id = $(this).attr('id');
	window.location='/books/'+id;
});

$(".x_edit_book").on('click',function(){
	var id = $(this).data('id');
	window.location='/books/'+id+'/edit';
});

$(".x_cancel_edit").on('click',function(){
	window.location='/books/';
});