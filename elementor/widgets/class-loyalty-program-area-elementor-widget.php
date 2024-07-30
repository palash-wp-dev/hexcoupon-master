<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;

class HexCoupon_Loyalty_Program extends Widget_Base {
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
        return 'hexcoupon-loyalty-program-area-widget';
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
        return esc_html__( 'HexCoupon Loyalty Program Area', 'hexcoupon-master' );
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
            'loyalty_program_area_content',
            [
                'label' => esc_html__( 'Loyalty Program Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_first',
            [
                'label' => esc_html__( 'Title First', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Loyalty Program,', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'title_middle',
            [
                'label' => esc_html__( 'Title Middle', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Designed to', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'title_last',
            [
                'label' => esc_html__( 'Title Last', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Retain Customers', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'loyalty_list',
            [
                'label' => esc_html__( 'Loyalty List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__( 'List Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Point loyalties' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'list_subtitle',
                        'label' => esc_html__( 'List Sub-Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'You can set coupon starting date to manage your inventory, promotional planing' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
					
					[
						'name' => 'list_icon',
						'label' => esc_html__( 'Icon', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'far fa-calendar-alt',
							'library' => 'fa-solid',
						],
						'recommended' => [
							'fa-solid' => [
								'circle',
								'dot-circle',
								'square-full',
							],
							'fa-regular' => [
								'circle',
								'dot-circle',
								'square-full',
							],
						],
					],

                    [
                        'name' => 'list_image',
                        'label' => esc_html__( 'List Image', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
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
        ?>
        <!-- Loyalty area start -->
        <section class="loyalty__area scrollLoyaltyWrapper pab-60">
            <div class="container">
                <div class="new_sectionTitle">
                    <h2 class="title"><?php printf( esc_html__( '%s', 'hexcoupon-master'), esc_html( $settings['title_first'] ) ); ?>
                        <span class="title__break">
                        <?php printf( esc_html__( '%s', 'hexcoupon-master'), esc_html( $settings['title_middle'] ) ); ?>
                        <span class="title__shapes title__color">
                            <?php printf( esc_html__( '%s', 'hexcoupon-master'), esc_html( $settings['title_last'] ) ); ?>
                            <svg width="197" height="12" viewBox="0 0 197 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M2 10C2.16744 8.72267 7.39426 7.77508 10.3811 7.12827C12.8808 6.58696 15.7385 6.30713 18.6218 6.01387C22.7444 5.59455 26.7328 5.0841 30.8657 4.66373C40.5947 3.67416 49.9751 3.10272 60.1528 2.73495C73.8774 2.23902 88.1355 1.85046 101.965 2.05631C114.352 2.2407 126.428 2.54549 138.486 3.47074C144.163 3.90636 149.652 4.53639 155.389 4.89946C160.326 5.21194 165.255 5.59872 170.114 6.01387C176.124 6.52734 181.461 7.24456 187.181 7.94264C188.21 8.06822 194.205 9.07088 195 8.58557"
                                        stroke="#A760FE" stroke-width="4" stroke-linecap="round" />
                            </svg>
                        </span>
                    </span>
                    </h2>
                </div>
                <div class="row g-4 mt-2 align-items-center justify-content-between">
                    <div class="col-xxl-7 col-lg-6">
                        <div class="business__right works_blur_bg">
                            <?php if ( $settings['loyalty_list'] ) : $count = 1; foreach ( $settings['loyalty_list'] as $item ) : $image = ! empty( $item['list_image']['url'] ) ? $item['list_image']['url'] : []; ?>
                            <div class="business__right__item scrollLoyaltyWrapper__thumb <?php if( 1 == $count ) echo esc_attr( 'active' ); ?>">
                                <div class="works__thumb">
                                    <img src="<?php echo esc_url( $image ); ?>" alt="loyalty" loading="lazy">
                                </div>
                            </div>
                            <?php $count++; endforeach; endif; ?>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-lg-5">
                        <div class="business__wrap">
                            <div class="business__faq mt-4">
                                <div class="business__left">
                                    <?php if ( $settings['loyalty_list'] ) : $count = 1; foreach ( $settings['loyalty_list'] as $item ) : ?>
                                    <div class="business__left__item scrollLoyaltyWrapper__item <?php if( 1 == $count ) echo esc_attr( 'active' ); ?>">
                                        <div class="business__left__item__flex">
                                            <span class="business__left__item__number"></span>
                                            <div class="business__left__item__inner">
                                                <h6 class="business__left__item__title">
                                                    <?php \Elementor\Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                    <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['list_title'] ) );?>
                                                </h6>
                                                <div class="business__left__item__panel">
                                                    <p class="business__left__item__para"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['list_subtitle'] ) );?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count++; endforeach; endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Loyalty area end -->
        <?php
    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Loyalty_Program() );