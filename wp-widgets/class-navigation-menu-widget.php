<?php
/**
 * hexcoupon recent post widget
 * @package HexCoupon
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit(); //exit if access directly
}

class HexCoupon_WP_Navigation_Menu_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'hexcoupon_wp_navigation_menu',
            esc_html__( 'HexCoupon: WP Footer Navigation Menu', 'hexcoupon-master' ),
            array( 'description' => esc_html__( 'Display your nav menus in the footer area.', 'hexcoupon-master' ) )
        );
    }

    public function widget( $args, $instance ) {

        $title = isset($instance['title']) && !empty($instance['title']) ? $instance['title'] : '';

        $menu = isset($instance['menu']) && !empty($instance['menu']) ? $instance['menu'] : '--';

        echo '<div class="col-lg-2 col-sm-6">';

        echo wp_kses_post( $args['before_widget'] );
        if ( ! empty( $title ) ) {
            echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
        }

        $nav_args = [
            'menu' => $menu,
            'container_class' => 'footer__link',
        ];

        echo wp_nav_menu($nav_args);

        ?>

        <?php
        echo wp_kses_post( $args['after_widget'] );

        echo '</div>';
    }

    public function form( $instance ) {
        //have to create form instance
        if ( ! empty( $instance ) && $instance['title'] ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
        } else {
            $title = esc_html__( 'Footer Nav Menu', 'hexcoupon-master' );
        }

        $menu       = ! empty( $instance ) && $instance['menu'] ? $instance['menu'] : 'Select A Menu';

        $all_menus = wp_get_nav_menus();

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'hexcoupon-master' ); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   value="<?php echo esc_attr( $title ) ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'menu' ) ) ?>"><?php esc_html_e( 'menu', 'hexcoupon-master' ); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'menu' ) ) ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'menu' ) ) ?>">
                <?php

                foreach( $all_menus as $nav_menu ) {
//                    $checked = ( $menu->name == $menu->slug ) ? 'selected' : '';


                    printf(
                        '<option value="%1$s" %2$s>%3$s</option>',
                        $nav_menu->slug,
                        selected( $menu, $nav_menu->slug, false ),
                        esc_html( $nav_menu->name )
                    );
                }
                ?>
            </select>

        </p>

        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance                = array();
        $instance['menu']       = ( ! empty( $new_instance['menu'] ) ? sanitize_text_field( $new_instance['menu'] ) : '' );
        $instance['title']       = ( ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '' );

        return $instance;
    }

} // end class

if ( ! function_exists( 'HexCoupon_WP_Navigation_Menu_Widget' ) ) {
    function HexCoupon_WP_Navigation_Menu_Widget() {
        register_widget( 'HexCoupon_WP_Navigation_Menu_Widget' );
    }

    add_action( 'widgets_init', 'HexCoupon_WP_Navigation_Menu_Widget' );
}