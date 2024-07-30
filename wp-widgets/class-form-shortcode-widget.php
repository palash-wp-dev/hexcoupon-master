<?php
/**
 * HexCoupon fluent shortcode
 * @package HexCoupon
 * @since 1.0.0
 */
if ( !defined('ABSPATH') ){
    exit(); //exit if access directly
}

class HexCoupon_Fluent_Shortcode extends WP_Widget{

    public function __construct() {
        parent::__construct(
            'hexcoupon_fluent_form',
            esc_html__('hexcoupon: Fluent Form','wphex-master'),
            array('description' => esc_html__('Display the Fluent Form','wphex-master'))
        );
    }

    public function form($instance){
        $title        = isset( $instance['title'] ) ? $instance['title'] : '';
        $image_url    = isset( $instance['image_url'] ) ? $instance['image_url'] : '';

        if (!isset($instance['bf_fluent_form_shortcode'])){
            $instance['bf_fluent_form_shortcode'] = '';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'wphex-master' ); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   value="<?php echo esc_attr( $title ) ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>"><?php esc_html_e( 'Upload Image:', 'wphex-master' ); ?></label><br/>
            <input type="text" class="widefat image-upload" id="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'image_url' ) ); ?>"
                   value="<?php echo esc_attr( $image_url ); ?>">
            <input type="button" class="button button-primary js-image-upload" value="<?php esc_attr_e( 'Upload Image', 'wphex-master' ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_name('bf_fluent_form_shortcode'))?>"><?php esc_html_e('Fluent Form Shortcode','wphex-master')?></label>
            <textarea name="<?php echo esc_attr($this->get_field_name('bf_fluent_form_shortcode'))?>" id="<?php echo esc_attr($this->get_field_id('bf_fluent_form_shortcode'))?>" cols="30" class="wphex-form-control" rows="5"><?php echo esc_html($instance['bf_fluent_form_shortcode'])?></textarea>
        </p>
        <?php

    }
    public function widget($args,$instance){
        $title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $image_url = isset( $instance['image_url'] ) ? $instance['image_url'] : '';

        echo '<div class="col-lg-4 col-sm-6">';
        echo wp_kses_post($args['before_widget']);

        $shortcode = $instance['bf_fluent_form_shortcode'];
        $output = do_shortcode($shortcode);

        ?>


        <p class="footer__para"><?php printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $title ) ); ?></p>
        <?php if ($image_url) { ?>
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="widget-image" />
        <?php } ?>
        <div class="footer__form mt-4">
            <div class="footer__form__item">
                <?php echo $output; ?>
            </div>
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
        echo '</div>';
    }

    public function update($new_instance, $old_instance){
        $instance = array();

        $instance['title']    = sanitize_text_field( $new_instance['title'] );
        $instance['bf_fluent_form_shortcode'] = sanitize_text_field($new_instance['bf_fluent_form_shortcode']);
        $instance['image_url'] = !empty( $new_instance['image_url'] ) ? esc_url_raw( $new_instance['image_url'] ) : '';

        return $instance;
    }
}

if (!function_exists('HexCoupon_Fluent_Shortcode')){
    function HexCoupon_Fluent_Shortcode(){
        register_widget('HexCoupon_Fluent_Shortcode');
    }
    add_action('widgets_init','HexCoupon_Fluent_Shortcode');
}
