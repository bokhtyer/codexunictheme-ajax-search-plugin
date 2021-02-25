<?php


function fusta_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Right Sidebar', 'fusta' ),
			'id'            => 'blog-right-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'fusta' ),
			'before_widget' => '<div class="shop-sidebar mb--30">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>',
		)
	);


	register_widget( 'Ajax_Search_Blog_widgets' );
}
add_action( 'widgets_init', 'fusta_widgets_init' );



// Define File
define('FUSTA_THEME_DIR', get_template_directory());
define('FUSTA_THEME_URI', get_template_directory_uri());
define('FUSTA_THEME_CSS_DIR', FUSTA_THEME_URI. '/assets/css/');
define('FUSTA_THEME_JS_DIR', FUSTA_THEME_URI. '/assets/js/');
define('FUSTA_THEME_INC',FUSTA_THEME_DIR. '/inc/');


/**
 * Enqueue scripts and styles.
 */
function fusta_scripts() {



	wp_enqueue_script('ajax_search_js', FUSTA_THEME_JS_DIR. 'ajax-search.js', array('jquery'), false, true);

	$SearchObj = array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'security' => wp_create_nonce( 'submitted-data' )
	);
	wp_localize_script( 'ajax_search_js', 'SearchObj', $SearchObj );


}
add_action( 'wp_enqueue_scripts', 'fusta_scripts' );



add_action('wp_ajax_start_ajax_pro_search','codexunictheme_ajax_search');
add_action('wp_ajax_nopriv_start_ajax_pro_search','codexunictheme_ajax_search');

// File included





/*
 * Customizer File
*/
require_once FUSTA_THEME_INC. 'a_search.php';
require_once FUSTA_THEME_INC. 'ajax-blog-search.php';

