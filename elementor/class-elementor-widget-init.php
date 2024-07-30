<?php
/**
 * All Elementor widget init
 * @package hexcoupon
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('wphex_Elementor_Widget_Init') ){

	class wphex_Elementor_Widget_Init{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/widgets_registered',array($this,'_widget_registered'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'hexcoupon_widgets',
				[
					'title' => __( 'HexCoupon Widgets', 'wphex-master' ),
					'icon' => 'fa fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(
                'banner-area',
                'banner-two-area',
                'boost-area',
                'faq-area',
                'gift-area',
                'store-credit-area',
                'growth-area',
                'loyalty-program-area',
                'start-area',
                'megamenu',
                'docs-settings',
                'wedoc-settings',
                'pricing-area',
                'comparison-area',
                'moneyback-guarantee-area',
                'pro-element-area',
                'loyalty-most-features',
                'loyalty-features-cart',
                'loyalty-upcoming-features',
                'slider-area',
			);

			$elementor_widgets = apply_filters('wphex_elementor_widget',$elementor_widgets);
			sort($elementor_widgets);
			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					if(file_exists(Hexcoupon_MASTER_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php')){
						require_once Hexcoupon_MASTER_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php';
					}
				}
			}
 
		}

	}

	if ( class_exists('wphex_Elementor_Widget_Init') ){
		wphex_Elementor_Widget_Init::getInstance();
	}

}//end if
