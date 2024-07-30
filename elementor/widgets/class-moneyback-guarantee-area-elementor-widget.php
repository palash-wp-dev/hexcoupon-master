<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;
class HexCoupon_Moneyback_Guarantee_Area extends Widget_Base {

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
        return 'hexcoupon-moneyback-area-widget';
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
        return esc_html__( 'Money-back Guarantee Area', 'hexcoupon-master' );
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
            'moneyback_guarantee_area_content',
            [
                'label' => esc_html__( 'Moneyback Guarantee Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Not satisfied? We guarantee 14 days unconditional refund', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__( 'Check Refund Policy', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
		
		$this->add_control(
            'signature_img',
            [
                'label' => esc_html__( 'Choose Image', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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
        $img = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : [];
        $btn_url = ! empty( $settings['btn_link']['url'] ) ? $settings['btn_link']['url'] : '';
		$signature_img = ! empty( $settings['signature_img']['url'] ) ? $settings['signature_img']['url'] : '';
        ?>
        <!-- Refund Guarantee area start -->
        <div class="refundWrap">
            <div class="refundWrap__flex">
                <div class="refundWrap__icon"><img src="<?php echo esc_url( $img ); ?>" alt="refund_badge"></div>
                <div class="refundWrap__contents">
                    <h2 class="refundWrap__title"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), str_replace( '{b}', '<span class="d-block">', esc_html( $settings['title'] ) ) ); ?></h2>
                    <div class="btn_wrapper mt-5">
						<div>
							<div class="cmn_btn gradient_1 radius-5">
								<a href="<?php echo esc_url( $btn_url ); ?>"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['btn_text'] ) ); ?> <i
											class="las la-arrow-right"></i>
								</a>
							</div>
						</div>
						<div class="signature">
                            <img src="<?php echo esc_url( $signature_img ); ?>" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Refund Guarantee area ends -->
        <?php
    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Moneyback_Guarantee_Area() );