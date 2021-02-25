jQuery(document).ready(function($){
	
	var ProductSearchProcess = function(formdata, action){
		$.ajax({
			url: SearchObj.ajax_url,
			type: 'POST',
			data: {
				action: action,
				data: formdata,
				security: SearchObj.security,
			},
			success: function(response){
				$('.search_result_warp').html(response);
			},
			 error: function(){
				 console.log('Some problem');
			 }
			
			
		});
		
		
	};
	
	$(document).on('ProductSearch', function(){
		var val = $('#search_input_box').val();
		if(val.length > 2 ){
			 $('.search_result_warp').html('<div class="spinner_warp"><div id="Search_loading"><div id="Search_loading-center"><div id="Search_loading-center-absolute"><div class="Search_object" id="Search_object_four"></div><div class="Search_object" id="Search_object_three"></div><div class="Search_object" id="Search_object_two"></div><div class="Search_object" id="Search_object_one"></div></div></div></div></div>');
			var formdata = {
				'query_text' : val,
				'_per_page'	 : $('#serach_per_page').val()
				
			};	
			ProductSearchProcess(formdata, 'start_ajax_pro_search');
		}
	});
	
	$('#search_input_box').keyup(function(){
		
		$(document).trigger('ProductSearch');
	});
	$('#search_input_box').keydown(function(){
		
		$(document).trigger('ProductSearch');
	});
	
	$(document.body).on('click', '.main-content-wrap' ,function(){
		$('.search_results').slideUp();
	});
	$(document.body).on('click', '.search-post-full-full' ,function(e){
		e.stopPropagation();
	});
	
});