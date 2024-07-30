<?php
/*
Plugin Name: HexCoupon Master
Plugin URI: https://themeforest.net/user/ir-tech/portfolio
Description: Plugin to design HexCoupon theme.
Author: Sharifur
Author URI:https://themeforest.net/user/ir-tech
Version: 1.0.1
Text Domain: hexcoupon-master
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//plugin dir path
define( 'Hexcoupon_MASTER_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'Hexcoupon_MASTER_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'Hexcoupon_MASTER_SELF_PATH', 'hexcoupon-master/hexcoupon-master.php' );
define( 'Hexcoupon_MASTER_VERSION', '1.0.1' );
define( 'Hexcoupon_MASTER_INC', Hexcoupon_MASTER_ROOT_PATH .'/inc');
define( 'Hexcoupon_MASTER_LIB', Hexcoupon_MASTER_ROOT_PATH .'/lib');
define( 'Hexcoupon_MASTER_ELEMENTOR', Hexcoupon_MASTER_ROOT_PATH .'/elementor');
define( 'Hexcoupon_MASTER_DEMO_IMPORT', Hexcoupon_MASTER_ROOT_PATH .'/demo-data-import');
define( 'Hexcoupon_MASTER_ADMIN', Hexcoupon_MASTER_ROOT_PATH .'/admin');
define( 'Hexcoupon_MASTER_ADMIN_ASSETS', Hexcoupon_MASTER_ROOT_URL .'admin/assets');
define( 'Hexcoupon_MASTER_WP_WIDGETS', Hexcoupon_MASTER_ROOT_PATH .'/wp-widgets');
define( 'Hexcoupon_MASTER_ASSETS', Hexcoupon_MASTER_ROOT_URL .'assets/');
define( 'Hexcoupon_MASTER_CSS', Hexcoupon_MASTER_ASSETS .'css');
define( 'Hexcoupon_MASTER_JS', Hexcoupon_MASTER_ASSETS .'js');
define( 'Hexcoupon_MASTER_IMG', Hexcoupon_MASTER_ASSETS .'img');

//load wphex helpers functions
if (!function_exists('wphex')){
    require_once Hexcoupon_MASTER_LIB .'/codestar-framework/codestar-framework.php';
	require_once Hexcoupon_MASTER_INC .'/class-wphex-helper-functions.php';
	if (!function_exists('wphex')){
		function wphex(){
			return class_exists('wphex_Helper_Functions') ? new wphex_Helper_Functions() : false;
		}
	}
}
//load codester framework functions
if ( !wphex()->is_wphex_active()) {
	if ( file_exists( Hexcoupon_MASTER_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once Hexcoupon_MASTER_ROOT_PATH . '/inc/csf-functions.php';
	}
}

//plugin init
if ( file_exists( Hexcoupon_MASTER_ROOT_PATH . '/inc/class-wphex-master-init.php' ) ) {
	require_once Hexcoupon_MASTER_ROOT_PATH . '/inc/class-wphex-master-init.php';
}
