<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;
class HexCoupon_Pro_Element_Area extends Widget_Base {

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
        return 'hexcoupon-pro-element-area-widget';
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
        return esc_html__( 'HexCoupon Pro Element Area', 'hexcoupon-master' );
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
            'pro_element_area_content',
            [
                'label' => esc_html__( 'Pro Element Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'pro_element_list',
            [
                'label' => esc_html__( 'Pro Element List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'List Title' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => esc_html__( 'Sub Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Coupon Features Crafted for Business in Mind' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'color',
                        'label' => esc_html__( 'Color', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'blue',
                        'options' => [
                            'blue' => esc_html__( 'Blue', 'hexcoupon-master' ),
                            'green' => esc_html__( 'Green', 'hexcoupon-master' ),
                            'yellow'  => esc_html__( 'Yellow', 'hexcoupon-master' ),
                            'pink' => esc_html__( 'Pink', 'hexcoupon-master' ),
                            'violet' => esc_html__( 'Violet', 'hexcoupon-master' ),
                            'red' => esc_html__( 'Red', 'hexcoupon-master' ),
                        ],
                    ],
                    [
                        'name' => 'icon',
                        'label' => esc_html__( 'Icon', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'la-ticket-alt',
                        'options' => [
                            'la-ticket-alt' => esc_html__( 'Ticket Alt', 'hexcoupon-master' ),
                            'la-gift' => esc_html__( 'Gift', 'hexcoupon-master' ),
                            'la-coins'  => esc_html__( 'Coins', 'hexcoupon-master' ),
                            'la-gifts' => esc_html__( 'Gifts', 'hexcoupon-master' ),
                            'la-cog' => esc_html__( 'Cog', 'hexcoupon-master' ),
                            'la-chart-bar' => esc_html__( 'Chart Bar', 'hexcoupon-master' ),
                            'la-shield-alt' => esc_html__( 'Sheild Alt', 'hexcoupon-master' ),
                            'la-file-alt' => esc_html__( 'File Alt', 'hexcoupon-master' ),
                            'la-headset' => esc_html__( 'Headset', 'hexcoupon-master' ),
                            'la-clock' => esc_html__( 'Clock', 'hexcoupon-master' ),
                            'la-shopping-cart' => esc_html__( 'Shopping Cart', 'hexcoupon-master' ),
                            'la-user' => esc_html__( 'User', 'hexcoupon-master' ),
                            'la-money-bill-wave' => esc_html__( 'Money', 'hexcoupon-master' ),
                            'la-stream' => esc_html__( 'Log', 'hexcoupon-master' ),
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
        ?>
        <!-- proElement area start -->
        <section class="proElement__area pab-60">
            <div class="container">
                <div class="row g-4">
                    <?php if ( $settings['pro_element_list'] ) : foreach ( $settings['pro_element_list'] as $item ) : ?>
                    <div class="col-xxl-4 col-lg-4 col-sm-6">
                        <div class="proElement color--<?php echo esc_attr( $item['color'] ); ?>">
                            <div class="proElement--icon"><a href="javascript:void(0)"><i class="las <?php echo esc_attr( $item['icon'] ); ?>"></i></a></div>
                            <div class="proElement--contents">
                                <h5 class="proElement--title"><a href="javascript:void(0)"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['title'] ) ); ?></a></h5>
                                <p class="proElement--para"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['sub_title'] ) ); ?></p>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>
        <!-- proElement area ends -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Pro_Element_Area() );