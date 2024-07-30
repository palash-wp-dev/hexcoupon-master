<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;

class HexCoupon_Gift_Area extends Widget_Base {

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
        return 'hexcoupon-gift-area-widget';
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
        return esc_html__( 'HexCoupon Gift Area', 'hexcoupon-master' );
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
            'gift_area_content',
            [
                'label' => esc_html__( 'Gift Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Send Promotional Gift Cards for Your', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'title_last',
            [
                'label' => esc_html__( 'Title Last', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Customers', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Custom domain support for a website involves the ability to use a Personalized web address that reflects your brand', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'hexcoupon-master' ),
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
            'button_text',
            [
                'label' => esc_html__( 'Explore More', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get HexCoupon Now', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type button text here', 'hexcoupon-master' ),
                'condition' => [
        			'show_button' => 'yes',
        		],
            ]
        );


        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'hexcoupon-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
                'condition' => [
        			'show_button' => 'yes',
        		],
            ]
        );
        
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
            'gift_list',
            [
                'label' => esc_html__( 'Faq List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__( 'Faq Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'How loyalty program works' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
                ],
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
        $image = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : '' ;
        ?>
        <!-- Gift Card area start -->
        <section class="sectionItem_area pat-60 pab-120">
            <div class="container">
                <div class="row g-4 gx-5 align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="sectionItem__thumb">
                            <img src="<?php echo esc_url( $image ); ?>" alt="giftCard" loading="lazy">
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="sectionItem__wrap">
                            <div class="new_sectionTitle text-left">
                                <h2 class="title"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title'] ) ); ?>
                                    <span class="title__shapes title__color"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title_last'] ) ); ?>
                                    <svg width="197" height="12" viewBox="0 0 197 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 10C2.16744 8.72267 7.39426 7.77508 10.3811 7.12827C12.8808 6.58696 15.7385 6.30713 18.6218 6.01387C22.7444 5.59455 26.7328 5.0841 30.8657 4.66373C40.5947 3.67416 49.9751 3.10272 60.1528 2.73495C73.8774 2.23902 88.1355 1.85046 101.965 2.05631C114.352 2.2407 126.428 2.54549 138.486 3.47074C144.163 3.90636 149.652 4.53639 155.389 4.89946C160.326 5.21194 165.255 5.59872 170.114 6.01387C176.124 6.52734 181.461 7.24456 187.181 7.94264C188.21 8.06822 194.205 9.07088 195 8.58557"
                                            stroke="#A760FE" stroke-width="4" stroke-linecap="round" />
                                    </svg>
                                </span>
                                </h2>
                                <p class="section_para"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['description'] ) ); ?></p>
                            </div>
                            <div class="sectionItem__inner mt-4">
                                <ul class="sectionItem__list">
                                    <?php if ( $settings['gift_list'] ) : foreach ( $settings['gift_list'] as $item ) : ?>
                                    <li class="sectionItem__list__item"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['list_title'] ) ); ?></li>
                                    <?php endforeach; endif; ?>
                                </ul>
                                <?php if ( 'yes' == $settings['show_button'] ) : ?>
                                <div class="btn_wrapper mt-4 mt-xl-5">
                                    <a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="cmn_btn btn_bg_1 radius-5"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['button_text']) ); ?> <i
                                            class="las la-arrow-right"></i>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gift Card area end -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Gift_Area() );