<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;
class HexCoupon_MegaMenu extends Widget_Base {

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
        return 'hexcoupon-megamenu-widget';
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
        return esc_html__( 'HexCoupon Megamenu', 'hexcoupon-master' );
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
        <li class="menu-item-has-children megamenu-has-children">
            <a href="javascript:void(0)">features</a>
            <div class="sub-menu megamenu-wrap">
                <div class="megamenu-wrap--flex">
                    <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                    <a href="javascript:void(0)" class="megamenu-wrap--item color--green">
                        <div class="megamenu-wrap--item--icon"><i class="las la-gift"></i></div>
                        <div class="megamenu-wrap--item--contents">
                            <h5 class="megamenu-wrap--item--title">Loyalty Program</h5>
                            <p class="megamenu-wrap--item--para">This is the feature description</p>
                        </div>
                    </a>
                    <?php endforeach; endif; ?>
                </div>
                <div class="megamenu-wrap--footer">
                    <div class="megamenu-wrap--footer--left">
                        <p class="megamenu-wrap--footer--para">There are more features to explore</p>
                        <a href="javascript:void(0)" class="megamenu-wrap--exploreBtn">
                            Explore Now <i class="las la-arrow-right"></i>
                        </a>
                    </div>
                    <div class="megamenu-wrap--footer--right">
                        <a href="javscript:void(0)" class="megamenu-wrap--downloadBtn">
                            Get HexCoupon <i class="las la-cloud-download-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_MegaMenu() );