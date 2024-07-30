<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;
class HexCoupon_Banner_Area extends Widget_Base {

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
        return 'hexcoupon-banner-area-widget';
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
        return esc_html__( 'HexCoupon Banner Area', 'hexcoupon-master' );
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
                'label' => esc_html__( 'Banner Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_first',
            [
                'label' => esc_html__( 'Title First', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Boost your sales up to', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title first here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'title_percent',
            [
                'label' => esc_html__( 'Title Percent', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '30%', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title first here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'title_last_first',
            [
                'label' => esc_html__( 'Title Last First', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'with', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title first here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'title_last_last',
            [
                'label' => esc_html__( 'Title Last Last', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'HexCoupon', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title first here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Elevate your sales strategy with HexCoupon! Boost sales by 30% with our innovative solution. Unleash revenue growth now', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get Hexcoupon', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Banner List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__( 'Powerful Automations', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'List Title' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'list_icon_bg',
                        'label' => esc_html__( 'Icon Background', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'gradient_two' , 'hexcoupon-master' ),
                        'label_block' => true,
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
        <!-- Banner area starts -->
        <section class="banner_area banner_bg">
            <div class="banner__shapes">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/shape1.svg" alt="shape1" loading="lazy">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/shape2.svg" alt="shape2" loading="lazy">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/shape3.svg" alt="shape3" loading="lazy">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/shape4.svg" alt="shape4" loading="lazy">
            </div>
            <div class="container">
                <div class="row align-items-center flex-column-reverse flex-lg-row">
                    <div class="col-lg-12">
                        <div class="banner text-center">
                            <div class="banner__contents">
                                <h1 class="banner__contents__title">
                                    <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title_first'] ) ); ?>
                                    <span class="banner__contents__title__circle banner__contents__title__color">
                                    <svg width="189" height="95" viewBox="0 0 189 95" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M156.224 6.82235C121.403 -0.872126 43.4759 -5.00791 10.3319 40.0048C-31.0981 96.2707 93.0168 97.7602 140.264 89.057C168.534 83.8497 187 71.1088 187 52.6753C187 36.8055 167.38 12.1352 109.346 16.6437"
                                                stroke="#A760FE" stroke-width="4" stroke-linecap="round" />
                                    </svg>
                                    <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title_percent'] ) ); ?>
                                </span>
                                    <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title_last_first'] ) ); ?>
                                    <span class="banner__contents__title__color"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title_last_last'] ) ); ?></span>
                                </h1>
                                <p class="banner__contents__para mt-3"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['description'] ) ); ?></p>
                                <div class="banner__promo mt-5">
                                    <div class="banner__promo__flex">
                                        <?php

                                            if ( ! empty( $settings['list'] ) ) :
                                                $count = 0;
                                                foreach ( $settings['list'] as $item ) :
                                        ?>
                                                <div class="banner__promo__item">
                                                    <div class="banner__promo__icon <?php echo esc_attr( $item['list_icon_bg'] ); ?>"><i class="las la-<?php if ( ! empty( $icon_array[$count] ) ) echo esc_attr( $icon_array[$count] ); ?>"></i></div>
                                                    <p class="banner__promo__para"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['list_title'] ) ); ?></p>
                                                </div>
                                        <?php $count++; endforeach; endif; ?>
                                    </div>
                                </div>
                                <div class="btn_wrapper mt-5">
                                    <div class="cmn_btn gradient_1 radius-5"><a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['button_text'] ) ); ?> <i
                                                    class="las la-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner__themes text-center">
                <div class="banner__themes__main">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/main.jpg" alt="main" loading="lazy">
                </div>
                <div class="banner__themes__small">
                    <div class="banner__themes__small__item">
                        <div class="banner__themes__small__item__thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/one.jpg" alt="one" loading="lazy">
                        </div>
                    </div>
                    <div class="banner__themes__small__item">
                        <div class="banner__themes__small__item__textImg">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/text.png" alt="text" loading="lazy">
                        </div>
                        <div class="banner__themes__small__item__thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/two.png" alt="two" loading="lazy">
                        </div>
                    </div>
                    <div class="banner__themes__small__item">
                        <div class="banner__themes__small__item__thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/three.jpg" alt="three" loading="lazy">
                        </div>
                    </div>
                    <div class="banner__themes__small__item">
                        <div class="banner__themes__small__item__thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/four.jpg" alt="four" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner area ends -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Banner_Area() );