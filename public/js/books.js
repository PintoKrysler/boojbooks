console.log('got here');



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


$(document).ready(function() {

	$('.x_search_book').select2({
		placeholder: "Search by Book Title",
		ajax: {
		    url: "https://www.googleapis.com/books/v1/volumes",
		    dataType: 'json',
		    delay: 250,
		    data: function (params) {
		      return {
		        q: params.term, // search term
		        page: params.page
		      };
		    },
		    processResults: function (data, params) {
		      // parse the results into the format expected by Select2
		      // since we are using custom formatting functions we do not need to
		      // alter the remote JSON data, except to indicate that infinite
		      // scrolling can be used
		      params.page = params.page || 1;
		      var results = [];
		      for (var i = 0; i < data.items.length; i++) {
		      	var book = data.items[i];
		      	var authors = (book.volumeInfo && book.volumeInfo.authors) ? book.volumeInfo.authors : '';
		      	var desc = (book.volumeInfo && book.volumeInfo.description) ? book.volumeInfo.description : '';

		      	console.log(book.volumeInfo.authors);
		      	results.push({ 
		      		id:book.id , 
		      		text : '<em>Title</em>: '+book.volumeInfo.title+' </br><em>Authors: </em>:'+authors.toString()+'<br>'+
		      	'<em>Description: </em>'+desc.substring(0,200)+'<br> <em>Published Date: </em>'+book.volumeInfo.publishedDate, 
		      		desc: desc,
		      		authors:authors,
		      		title:book.volumeInfo.title,
		      		publish_date: book.volumeInfo.publishedDate,
		      	 })
		      }

		      return {
		        results: results,
		        pagination: {
		          more: (params.page * 30) < data.items.length
		        }
		      };
		    },
		    cache: true
		  },
		  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
		  minimumInputLength: 3,
		  //templateResult: formatRepo, // omitted for brevity, see the source of this page
		  templateSelection: function(data){
		  	if (data.id==""){
		  		return data.text;
		  	}
		  	$('#form_new_book #title').val(data.title);
		  	$('#form_new_book #author').val(data.authors);
		  	$('#form_new_book #date').val(data.publish_date);
		  	return data.title;
		  } // omitted for brevity, see the source of this page
	});
});
