<?php

/**
 * Ajax Search Widgets
 *
 *
 * @author 		Bokhtyer Abid
 * @category 	Widgets
 * @package 	Construc/Widgets
 * @version 	1.0.0
 * @extends 	WP_Widget
 *
 * Adds Ajax Search Search Widgets.
 */


class Ajax_Search_Blog_widgets extends WP_Widget{

	
	// to register widget and construct name and widget classes.
	Public function __construct(){
		parent::__construct(
			'ajax_widgets',
			esc_html__( 'Ajax Search Blog Widgets', 'fusta' ),
			array( 'description' => esc_html__( 'A Ajax Searchbar Blog Widgets', 'fusta' ), ) // Args
		);
		
	}
	
	// create widget form
	
	function form($instance){
	
		$title = $instance['title'];
		$per_page_search = $instance['per_page_search'];
		
		?>
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title');  ?>" type="text" value="<?php echo $title; ?>">
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('per_page_search'); ?>">Max search Result:
				
					<input class="widefat" id="<?php echo $this->get_field_id('per_page_search'); ?>" name="<?php echo $this->get_field_name('per_page_search');  ?>" type="number" value="<?php echo $per_page_search; ?>">
				</label>
			</p>
			
			
			
		<?php	
		
	}
	// to show result in fornt end;
	function widget($args, $instance ){
		
		$title = ($instance['title']) ? $instance['title'] : 'Serach';
		$per_page_search = $instance['per_page_search'] ? $instance['per_page_search'] : 5 ;

		echo $args['before_widget'].$args['before_title'].$title.$args['after_title']
		?>
		<div class="search-post-full-full">
			<div class="search-post">
				<input type="search" id="search_input_box" placeholder="Enter Keywords...">
				<button class="btn-search" title="Search"  type="submit"><i class="ion-ios-search-strong"></i></button>
				<input type="hidden" id="serach_per_page" value="<?php echo $per_page_search; ?>" >
			</div>
			<div class="search_result_warp">
			 	
			</div>
		</div>			 
						 
	<?php
	echo $args['after_widget'];
		
	}



}