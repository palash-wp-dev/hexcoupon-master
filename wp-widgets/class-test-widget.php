<?php
/**
 *  xgenious about us widget
 * @package Xgenious
 * @since 1.0.0
 */
if ( !defined('ABSPATH') ){
    exit(); //exit if access directly
}
class Xgenious_Contact_Social_Widget extends WP_Widget{
    public function __construct() {
        parent::__construct(
            'xgenious_contact_social',
            esc_html__('Xgenious: Contact Social','xgenious-master'),
            array('description' => esc_html__('Display about us widget, with an image and social links','xgenious-master'))
        );
    }
    public function form($instance){
        if ( ! isset( $instance['bf_title'] ) ) {
            $instance['bf_title'] = '';
        } else {
            $instance['bf_title'] = esc_html__( 'Footer Navigation Menu', 'xgenious-master' );
        }
        if (!isset($instance['bf_contact_para'])){
            $instance['bf_contact_para'] = '';
        }
        $social_icons = array(
            'facebook',
            'twitter',
            'linkedin',
            "instagram",
            "google-plus",
            "youtube",
        );
        foreach ( $social_icons as $sc ) {
            if ( ! isset( $instance[ $sc ] ) ) {
                $instance[ $sc ] = "";
            }
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name('bf_title'))?>"><?php esc_html_e('Title','hexcoupon-master')?></label>

            <textarea name="<?php echo esc_attr($this->get_field_name('bf_title'))?>" id="<?php echo esc_attr($this->get_field_id('bf_title'))?>" cols="30" class="wphex-form-control widefat" rows="2"><?php echo esc_html($instance['bf_title'])?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name('bf_contact_para'))?>"><?php esc_html_e('Contact Para:','xgenious-master')?></label>
            </br>
            <textarea name="<?php echo esc_attr($this->get_field_name('bf_contact_para'))?>" id="<?php echo esc_attr($this->get_field_id('bf_contact_para'))?>" cols="30" class="xgenious-form-control w-100" rows="5"><?php echo esc_html($instance['bf_contact_para'])?></textarea>
        </p>
        <?php foreach ( $social_icons as $sci ) : ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( $sci ) ); ?>"><?php echo esc_html( ucfirst( $sci ) . " " . esc_html__( 'URL', 'xgenious-master' ) ); ?>
                    : </label>
                <br/>
                <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( $sci ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( $sci ) ); ?>"
                       value="<?php echo esc_attr( $instance[ $sci ] ); ?>"/>
                <small><?php echo esc_html__('Leave it blank if you don\'t want this social icon','xgenious-master')?></small>
            </p>
        <?php
        endforeach;
    }
    public function widget($args,$instance){
        $instance['bf_title'] = ! empty( $instance['bf_title'] ) ? $instance['bf_title'] : '';
        echo wp_kses_post($args['before_widget']);
        ?>
        <?php
        $social_icons = array(
            'facebook',
            'twitter',
            'linkedin',
            "instagram",
            "google-plus",
            "youtube",
        );
        // echo wp_kses_post($args['before_widget']);
        ?>
        <h2><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $instance['bf_title'] ) ); ?> </h2>
        <p class="footerWidget__para"><?php echo esc_html($instance['bf_contact_para'])?></p>
        <?php
        if ( !empty($instance['facebook']) || !empty($instance['twitter']) || !empty($instance['linkedin']) || !empty($instance['instagram']) || !empty($instance['google-plus']) || !empty($instance['youtube'])):
            printf('<div class="footerWidget__social mt-4"> <ul class="footerWidget__social__list list-style-none">');
            foreach ( $social_icons as $social ):
                $url = trim( $instance[ $social ] );
                if ( ! empty( $url ) ) {
                    printf( '<li class="footerWidget__social__list__item"><a class="footerWidget__social__list__link" href="%1$s"><i class="fa fa-%2$s" aria-hidden="true"></i></a></li>',esc_url( $url ) , esc_attr( $social ));
                }
            endforeach;
            echo wp_kses_post('</ul></div>')    ;
        endif;
        echo wp_kses_post($args['after_widget']);
    }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['bf_title'] = sanitize_text_field($new_instance['bf_title']);
        $instance['bf_contact_para'] = sanitize_text_field($new_instance['bf_contact_para']);
        $instance['facebook']    = esc_url_raw( $new_instance['facebook'] );
        $instance['twitter']     = esc_url_raw( $new_instance['twitter'] );
        $instance['linkedin']    = esc_url_raw( $new_instance['linkedin'] );
        $instance['instagram']   = esc_url_raw( $new_instance['instagram'] );
        $instance['google-plus'] = esc_url_raw( $new_instance['google-plus'] );
        $instance['youtube']     = esc_url_raw( $new_instance['youtube'] );
        return $instance;
    }
}
if (!function_exists('Xgenious_Contact_Social_Widget')){
    function Xgenious_Contact_Social_Widget(){
        register_widget('Xgenious_Contact_Social_Widget');
    }
    add_action('widgets_init','Xgenious_Contact_Social_Widget');
}