<?php 


function codexunictheme_ajax_search(){
	$data = $_POST['data'];
	
	$query_text = sanitize_text_field($data['query_text']);
	$per_page = sanitize_text_field($data['_per_page']);
	
	if(!check_ajax_referer( 'submitted-data', 'security' )){
		wp_send_json('some problem');
		die();
	}
			// The Query
		$the_query = new WP_Query( array(
				'post_type' => 'post',
				'posts_per_page' => $per_page,
				's' => $query_text
		) );

		// The Loop
		if ( $the_query->have_posts() ) {
			$responsone  = '<div class="search_results">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$responsone  .= '<div class="search_result">
									<a href="'.get_the_permalink().'">
										<img src="'. get_the_post_thumbnail_url(get_the_ID()).'" alt="" />
										<h6>'.get_the_title().'</h6>
									</a>
								</div>';
			}
			$responsone  .=  '</div>';
			/* Restore original Post Data */
			wp_reset_postdata();
			wp_send_json($responsone);
		} else {
			wp_send_json('No product Found');
		}
	
	
	die();
}