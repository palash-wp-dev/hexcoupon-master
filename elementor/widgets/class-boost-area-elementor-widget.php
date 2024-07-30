<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */
namespace Elementor;

class HexCoupon_Boost_Area extends Widget_Base {

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
        return 'hexcoupon-boost-area-widget';
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
        return esc_html__( 'HexCoupon Theme Boost Area', 'hexcoupon-master' );
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
            'boost_area_content',
            [
                'label' => esc_html__( 'Boost Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_button',
            [
                'label' => esc_html__( 'Show Button', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Boost Your Sales Now With HexCoupon', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Default description', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get HexCoupon Now', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type button text here', 'hexcoupon-master' ),
            ]
        );


        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'hexcoupon-master' ),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
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
        <!-- Boost area start -->
        <section class="boost__area growth__bg pat-60 pab-120">
            <div class="container">
                <div class="boost__wrapper">
                    <div class="boost__wrapper__shape">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/boost/boost_shape.png" alt="boost_shape" loading="lazy">
                    </div>
                    <div class="row g-4 align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="boost__wrap">
                                <div class="new_sectionTitle text-left sectionTitle__white">
                                    <h2 class="title"><?php printf( esc_html__( '%s', 'hexcoupon-master', ), esc_html( $settings['title'] ) ); ?></h2>
                                    <p class="section_para mt-3"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['description'] ) ); ?>
                                    </p>
                                </div>
                                <div class="btn_wrapper mt-4 mt-xl-5">
                                    <a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="cmn_btn btn_bg_white radius-5"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['button_text'] ) ); ?> <i
                                                class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="boost__thumb">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/boost/boost.svg" alt="boost" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Boost area end -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Boost_Area() );