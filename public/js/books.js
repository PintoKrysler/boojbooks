
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