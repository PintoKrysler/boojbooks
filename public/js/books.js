
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