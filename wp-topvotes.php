<?php
/*
Plugin Name: WP Topvotes
Plugin URI: http://saquery.com/wordpress/wp-topvotes/
Description: A Plugin for topvotes.appspot.com Service.
Version: 1.1
Author: Stephan Ahlf
Author URI: http://saquery.com
*/
	global $topvotes;
	$topvotes = new topvotes();

	
	function _topvotes_option($id, $defaultValue){
		$result = get_option($id);
		if ($result===false){ 
			$result = $defaultValue;
		}
		return $result;
	}

	class topvotes{
		
		function admin_init() {
			// register_setting( 'topvotesOptions', 'includeJQueryCore' );
			// register_setting( 'topvotesOptions', 'includeJQueryUI' );
			// register_setting( 'topvotesOptions', 'includeJQueryTheme' );
			// register_setting( 'topvotesOptions', 'JQueryCoreVersion' );
			// register_setting( 'topvotesOptions', 'JQueryUIVersion' );
			// register_setting( 'topvotesOptions', 'JQueryUIThemeName' );
		}
		
		function init(){		
			if ( (is_single() || is_page()) && !is_admin() && !is_home() ) {
				$cdnURL = 'http://ajax.googleapis.com/ajax/libs/';
				$v = '1.4.2';
				$u = $cdnURL.'jquery/'.$v.'/jquery.min.js';
				wp_register_script( 'jquery', $u, array(), $v, false);
				wp_enqueue_script('jquery');

				$u = 'http://topvotes.appspot.com/src/widget.js';
				$v = '1.0';
				wp_deregister_script( 'topvotes' );
				wp_register_script( 'topvotes', $u, array(), $v, false);
				wp_enqueue_script('topvotes');
			}
		}
		
		function admin_menu(){
			add_submenu_page('options-general.php', 'Topvotes Options', 'topvotes', 8, __FILE__,  array('topvotes', 'options'));
			add_action( 'admin_init', array('topvotes','admin_init') );
		}
		
		function the_content($content = '') {
			if ( (is_single() || is_page()) && !is_admin() && !is_home() ) {
				$content = $content . '<h4>Vote this page</h4><div class="topvotes-widget-vote"></div>'.
				'<div style="padding-left:38px;font-size:8px"><i><a target="_blank" href="http://topvotes.appspot.com">topvotes.appspot.com</a></i></div>';
			}
			return $content;
		}

		function options(){
			require_once dirname(__FILE__).'/topvotes.options.php';
?>
<?php			
		}
	}

	/* add_action('admin_menu', array('topvotes', 'admin_menu')); */
	add_action('wp_print_scripts', array('topvotes', 'init'), 1);
	add_filter( 'the_content', array( 'topvotes', 'the_content' ), 9999999 );
?>