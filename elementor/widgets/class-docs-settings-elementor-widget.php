<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */
namespace Elementor;

class HexCoupon_Docs_Settings extends Widget_Base {

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
        return 'hexcoupon-docs-settings-widget';
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
        return esc_html__( 'HexCoupon Docs Settings', 'hexcoupon-master' );
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
        return [ 'wphex_widgets' ];
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
        $this->start_controls_section( 'docs_settings_area',
            [
                'label' => esc_html__( 'Docs Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Coupon Settings', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'icon_code',
            [
                'label' => esc_html__( 'Icon Code', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__( 'las la-ticket-alt', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type icon code here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Read More', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type button text here', 'hexcoupon-master' ),
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
            ]
        );

        $this->add_control(
            'docs_list',
            [
                'label' => esc_html__( 'Docs List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__( 'List Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Setup a loyalty program' , 'hexcoupon-master' ),
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
        $button_link = ! empty( $settings['button_link']['url'] ) ? $settings['button_link']['url'] : '';
        ?>
        <!-- Settings area starts -->
        <section class="settings__area pat-60 pab-60">
            <div class="container container__one">
                <div class="row g-4 justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="settings__item">
                            <div class="settings__item__header">
                                <div class="settings__item__header__flex">
                                    <div class="settings__item__header__icon"><i class="<?php echo esc_attr( $settings['icon_code'] ); ?>"></i></div>
                                    <h6 class="settings__item__header__title"><?php echo printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $settings['title'] ) ); ?></h6>
                                </div>
                            </div>
                            <div class="settings__item__inner">
                                <div class="settings__item__list">
                                    <?php if ( $settings['docs_list'] ) : foreach ( $settings['docs_list'] as $item ) : ?>
                                        <a href="afas">
                                             <span class="settings__item__list__single">
                                                 <i class="las la-file-alt"></i>
                                                <?php echo 'hi '; printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $item['list_title'] ) )?>
                                            </span>
                                        </a>
                                    <?php endforeach; endif; ?>
                                </div>
                            </div>
                            <div class="btn_wrapper">
                                <a href="<?php echo esc_url( $button_link ); ?>" class="settings__item__btn"><?php printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $settings['button_text'] ) )?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Settings area ends -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Docs_Settings() );