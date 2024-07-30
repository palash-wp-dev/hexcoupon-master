<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;

class HexCoupon_Growth_Area extends Widget_Base {

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
        return 'hexcoupon-growth-widget';
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
        return esc_html__( 'HexCoupon Growth Area', 'hexcoupon-master' );
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
        return 'eicon-scroll';
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

        // product features content section starts here
        $this->start_controls_section(
            'growth_area_content',
            [
                'label' => esc_html__( 'Growth Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_first',
            [
                'label' => esc_html__( 'Title First', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Leave the promotions to us; focus yourself on', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'title_last',
            [
                'label' => esc_html__( 'Title Last', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Growth', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Our automation features are designed to let you concentrate on the business growth. Set one time coupon automations and it runs whenever conditions are met until you turn it off', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'hexcoupon-master' ),
            ]
        );

        $this->end_controls_section();

        // product features content section ends here
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
        <!-- Growth area start -->
        <section class="growth__area pab-120 growth__bg">
            <div class="growth__shape">
                <svg width="64" height="54" viewBox="0 0 64 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.1632 2C-4.0239 13.7709 2.34799 28.6263 11.0562 36.8968C24.0864 49.2721 48.7435 59.2713 58.1015 44.9847C67.4595 30.6981 59.6904 14.602 37.8042 6.56798C21.2276 0.48306 12.7462 12.3433 13.9584 21.3611C15.3192 31.4832 26.2155 39.4698 34.9853 42.0436C44.9939 44.981 49.9424 40.1408 51.5893 33.0027C53.6369 24.128 41.8509 16.0061 34.7979 16.0316C27.745 16.0571 27.1052 23.964 29.336 27.907"
                        stroke="#A760FE" stroke-width="2.5" stroke-linecap="round" />
                </svg>
                <svg width="31" height="42" viewBox="0 0 31 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28.8506 37.8857C19.7543 28.0299 1.68317 7.8543 2.1685 5.99917" stroke="#A760FE"
                          stroke-width="2.5" stroke-linecap="round" />
                    <path d="M26.2527 1.83158C25.1405 5.09191 15.9428 14.9061 11.483 19.4057L5.8516 22.7313"
                          stroke="#A760FE" stroke-width="2.5" stroke-linecap="round" />
                </svg>

            </div>
            <div class="container">
                <div class="row g-4 gy-lg-0">
                    <div class="col-lg-6">
                        <div class="growth__wrap pat-120">
                            <div class="new_sectionTitle text-left">
                                <h2 class="title"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title_first'] ) ); ?>
                                    <span class="title__circle title__color">
                                    <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title_last'] ) ); ?>
                                    <svg width="183" height="70" viewBox="0 0 183 70" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M151.222 5.49753C117.531 -0.0830805 42.1308 -3.08266 10.0617 29.5639C-30.0247 70.3721 90.0649 71.4524 135.78 65.1403C163.133 61.3635 181 52.1229 181 38.7536C181 27.2435 149.974 9.94455 93.8219 13.2144"
                                            stroke="#A760FE" stroke-width="3" stroke-linecap="round" />
                                    </svg>
                                </span>
                                </h2>
                                <p class="section_para mt-3"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['description'] ) ); ?></p>
                            </div>
                            <div class="growth__left mt-5">
                                <div class="growth__left__thumb">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/growth/growth_left.svg" alt="growth_left" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="growth__right">
                            <div class="growth__right__shapeText">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/growth/growth_shapeText.png" alt="growth_shapeText" loading="lazy">
                            </div>
                            <div class="growth__right__thumb">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/growth/growth.png" alt="growth" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Growth area end -->
        <?php
    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Growth_Area() );