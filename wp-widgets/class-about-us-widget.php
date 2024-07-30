<?php
/**
 * hexcoupon about us widget
 * @package HexCoupon
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); //exit if access directly
}
class HexCoupn_About_Us_Widget extends WP_Widget{

	public function __construct() {
		parent::__construct(
			'hexcoupon_about_us',
			esc_html__('Hexcoupon: About Us','hexcoupon-master'),
			array('description' => esc_html__('Display about us widget, with an image and social links','hexcoupon-master'))
		);
	}

	public function form($instance) {
		if ( ! isset( $instance['bf_description'] ) ) {
			$instance['bf_description'] = '';
		}

        if ( ! isset( $instance['bf_address'] ) ) {
            $instance['bf_address'] = '';
        }

        if ( ! isset( $instance['bf_phone'] ) ) {
            $instance['bf_phone'] = '';
        }
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_name('bf_description'))?>"><?php esc_html_e('About Widget Description','hexcoupon-master')?></label>

			<textarea name="<?php echo esc_attr($this->get_field_name('bf_description'))?>" id="<?php echo esc_attr($this->get_field_id('bf_description'))?>" cols="30" class="wphex-form-control widefat" rows="5"><?php echo esc_html($instance['bf_description'])?></textarea>
		</p>
        <p>
			<label for="<?php echo esc_attr($this->get_field_name('bf_address'))?>"><?php esc_html_e('About Widget Description','hexcoupon-master')?></label>

			<textarea name="<?php echo esc_attr($this->get_field_name('bf_address'))?>" id="<?php echo esc_attr($this->get_field_id('bf_address'))?>" cols="30" class="wphex-form-control widefat" rows="5"><?php echo esc_html($instance['bf_address'])?></textarea>
		</p>
        <p>
			<label for="<?php echo esc_attr($this->get_field_name('bf_phone'))?>"><?php esc_html_e('About Widget Description','hexcoupon-master')?></label>

			<textarea name="<?php echo esc_attr($this->get_field_name('bf_phone'))?>" id="<?php echo esc_attr($this->get_field_id('bf_phone'))?>" cols="30" class="wphex-form-control widefat" rows="5"><?php echo esc_html($instance['bf_phone'])?></textarea>
		</p>

		<?php
	}

	public function widget($args,$instance){
        $instance['bf_description'] = ! empty( $instance['bf_description'] ) ? $instance['bf_description'] : '';
        $instance['bf_address'] = ! empty( $instance['bf_address'] ) ? $instance['bf_address'] : '';
        $instance['bf_phone'] = ! empty( $instance['bf_phone'] ) ? $instance['bf_phone'] : '';

        echo '<div class="col-lg-4 col-sm-6">';

		echo wp_kses_post($args['before_widget']);

		?>
            <p class="footer__para"><?php printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $instance['bf_description'] ) ); ?></p>
            <div class="footer__contact mt-4">
                <div class="footer__contact__item">
                                        <span class="footer__contact__icon">
                                            <i class="las la-map-marker-alt"></i>
                                        </span>
                    <div class="footer__contact__contents">
                        <p class="footer__contact__para"><?php printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $instance['bf_address'] ) ); ?></p>
                    </div>
                </div>
                <a href="tel:<?php esc_html( $instance['bf_phone'] ); ?>" class="footer__contact__item">
                                        <?php if ( ! empty( $instance['bf_phone'] ) ) : ?>
                                        <span class="footer__contact__icon">
                                            <i class="las la-phone"></i>
                                        </span>
                                        <?php endif; ?>
                    <div class="footer__contact__contents">
                        <p class="footer__contact__para"><?php printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $instance['bf_phone'] ) ); ?></p>
                    </div>
                </a>
            </div>

		<?php

		echo wp_kses_post($args['after_widget']);

        echo '</div>';
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['bf_description'] = sanitize_text_field($new_instance['bf_description']);

		$instance['bf_address'] = sanitize_text_field($new_instance['bf_address']);

		$instance['bf_phone'] = sanitize_text_field($new_instance['bf_phone']);

		return $instance;
	}

}

if ( ! function_exists( 'HexCoupn_About_Us_Widget' ) ) {
	function HexCoupn_About_Us_Widget() {
		register_widget('HexCoupn_About_Us_Widget');
	}

	add_action('widgets_init','HexCoupn_About_Us_Widget');
}