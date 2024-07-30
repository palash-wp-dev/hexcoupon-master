<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;
class HexCoupon_Pricing_Area extends Widget_Base {

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
        return 'hexcoupon-pricing-area-widget';
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
        return esc_html__( 'HexCoupon Pricing Area', 'hexcoupon-master' );
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
            'pricing_area_content',
            [
                'label' => esc_html__( 'Pricing Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_badge',
            [
                'label' => esc_html__( 'Show Badge', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'badge',
            [
                'label' => esc_html__( 'Badge', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Most Popular', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your badge here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Basic', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Subtitle', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Package description will go in here', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your subtitle', 'hexcoupon-master' ),
            ]
        );
		
		 $this->add_control(
            'regular_price_text',
            [
                'label' => esc_html__( 'Regular Price Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Regular Price', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter regular price text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'regular_price',
            [
                'label' => esc_html__( 'Regular Price', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$29.99', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter your price here', 'hexcoupon-master' ),
            ]
        );
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'regular_price_typography',
				'selector' => '{{WRAPPER}} .pricing__item__price .regular',
			]
		);
		
		$this->add_control(
            'discount_price_text',
            [
                'label' => esc_html__( 'Discount Price Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Offer Price', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter discount price text here', 'hexcoupon-master' ),
            ]
        );
		
		$this->add_control(
            'discount_price',
            [
                'label' => esc_html__( 'Discount Price', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$29.99', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter your price here', 'hexcoupon-master' ),
            ]
        );
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'discount_price_typography',
				'selector' => '{{WRAPPER}} .pricing__item__price .discount',
			]
		);

        $this->add_control(
            'time_frame',
            [
                'label' => esc_html__( 'Time Frame', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '/Year', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter time frame here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get Started', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter button text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Features List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'feature_title',
                        'label' => esc_html__( 'Feature Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Coupon Validity for specific Days/Hours' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'show_cross_icon',
                        'label' => esc_html__( 'Show Cross Icon', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                    ]
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
        ?>
        <!-- Pricing area starts -->

            <div class="pricing__item <?php if ( 'yes' === $settings['show_badge'] ) echo esc_attr( 'featured' ); ?>">
                <?php if ( 'yes' === $settings['show_badge'] ) :?>
                <span class="pricing__item__popular"><?php  printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['badge'] ) ); ?></span>
                <?php endif; ?>
                    <div class="pricing__item__header">
                        <h2 class="pricing__item__title"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title'] ) ); ?></h2>
                        <p class="pricing__item__para mt-2"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['sub_title'] ) ); ?></p>
						<div class="regular_price">
							<h3 class="pricing__item__price"><sub><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['regular_price_text'] ) ); ?> :</sub><span class="ms-2 regular"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['regular_price'] ) ); ?></span> <sub><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['time_frame'] ) ); ?></sub></h3>
						</div>
						<div class="offer_price">
							<h3 class="pricing__item__price"><sub><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['discount_price_text'] ) ); ?> :</sub> <span class="ms-2 discount"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['discount_price'] ) ); ?></span> <sub><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['time_frame'] ) ); ?></sub></h3>
						</div>                    
                        <div class="btn_wrapper mt-4">
                            <a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="cmn_btn btn_bg_1 radius-5 w-100"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['button_text'] ) ); ?> <i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="pricing__item__inner">
                        <div class="pricing__item__list">
                            <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                            <span class="pricing__item__list__single <?php if ( 'yes' === $item['show_cross_icon'] ) echo esc_attr( 'crossIcon' ); ?>"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['feature_title'] ) ); ?></span>
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>

        <!-- Pricing area ends -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Pricing_Area() );