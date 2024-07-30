<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;
class HexCoupon_Slider_Area extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_name() {
        return 'hexcoupon-slider-area-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return esc_html__( 'HexCoupon Slider Area', 'hexcoupon-master' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'eicon-info-box';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories() {
        return [ 'hexcoupon_widgets' ];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'banner_area_content',
            [
                'label' => esc_html__( 'Banner Slider Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'hexcoupon-master' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'review',
						'label' => esc_html__( 'Review', 'hexcoupon-master' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'List Title' , 'hexcoupon-master' ),
						'label_block' => true,
					],
					[
						'name' => 'name',
						'label' => esc_html__( 'Name', 'hexcoupon-master' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Content' , 'hexcoupon-master' ),
						'show_label' => false,
					],
					[
						'name' => 'designation',
						'label' => esc_html__( 'Designation', 'hexcoupon-master' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Content' , 'hexcoupon-master' ),
						'show_label' => false,
					],
					[
					    'name' => 'icon',
        				'label' => esc_html__( 'Choose Image', 'textdomain' ),
        				'type' => \Elementor\Controls_Manager::MEDIA,
        				'default' => [
        					'url' => \Elementor\Utils::get_placeholder_image_src(),
        				],
        			],
					
				],
			]
		);

        $this->end_controls_section();
    }

    /**
     * Render Elementor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings_for_display();
        $icon_array = [ 'cog', 'coins', 'gift', 'ticket-alt', 'chart-bar' ];
        ?>
        <div class="container global-slick-init">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="slick-init">
                    
					  <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : $icon = ! empty( $item['icon']['url'] ) ? $item['icon']['url'] : ''; ?>
					  <div class="testimonialItem">
                        <div class="testimonialItem__review">
                            <span class="icon"><i class="fa-solid fa-star"></i></span>
                            <span class="icon"><i class="fa-solid fa-star"></i></span>
                            <span class="icon"><i class="fa-solid fa-star"></i></span>
                            <span class="icon"><i class="fa-solid fa-star"></i></span>
                            <span class="icon"><i class="fa-solid fa-star"></i></span>
                        </div>
                        <p class="testimonialItem__para mt-4"><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['review'] ) ); ?></p>
                        <div class="testimonialItem__author mt-5">
                            <div class="testimonialItem__author__left">
                                <div class="testimonialItem__author__contents">
                                    <h6 class="testimonialItem__author__name"><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['name'] ) ); ?></h6>
                                    <p> <span class="testimonialItem__author__subtitle"><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['designation'] ) ); ?></span></p>
                                </div>
                            </div>
                            <div class="testimonialItem__author__right">
                                <div class="testimonialItem__author__right__logo">
                                    <img width="122" height="30" decoding="async" src="<?php echo esc_url( $icon ); ?>" alt="Trustpilot" title="Single And Multiple Page Applications 47">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
            </div>
        </div>
    </div>  
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Slider_Area() );