<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class HexCoupon_Doc_Widget extends Widget_Base
{

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
    public function get_name()
    {
        return 'wedoc-settings';
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
    public function get_title()
    {
        return esc_html__('We Doc Grid', 'xgenious-master');
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
    public function get_icon()
    {
        return 'eicon-document-file';
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
    public function get_categories()
    {
        return ['wphex_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('total_number', [
            'label' => esc_html__('Total Number', 'xgenious-master'),
            'type' => Controls_Manager::NUMBER,
            'description' => esc_html__('enter how many doc you want to show , enter -1 for unlimited post.')
        ]);
        $this->add_control('column', [
            'label' => esc_html__('Column', 'xgenious-master'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                '6' => esc_html__('02 Column', 'xgenious-master'),
                '4' => esc_html__('03 Column', 'xgenious-master'),
                '3' => esc_html__('04 Column', 'xgenious-master'),
            ],
            'default' => '4',
            'description' => esc_html__('select column')
        ]);
        $this->add_control('total', [
            'label' => esc_html__('Total Sections', 'xgenious-master'),
            'type' => Controls_Manager::NUMBER,
            'default' => 10,
            'description' => esc_html__('enter how many doc section you want in list , enter -1 for unlimited post.')
        ]);
        $this->add_control('read_more', [
            'label' => esc_html__('Read More Text', 'xgenious-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__("Read More", 'xgenious-master'),
            'description' => esc_html__('read more button text')
        ]);
        $this->end_controls_section();


    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //query settings

        $parent_args = [
            'post_type' => 'docs',
            'parent' => 0,
            'sort_column' => 'menu_order',
            'number' => $settings['total_number']
        ];
        // have to work for paginate  it

        $parent_docs = get_pages($parent_args);
        $docs = [];
        // arrange the docs
        if ($parent_docs) {
            foreach ($parent_docs as $root) {
                $sections = get_children([
                    'post_parent' => $root->ID,
                    'post_type' => 'docs',
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'numberposts' => (int)$settings['total'],
                ]);

                $arranged[] = [
                    'doc' => $root,
                    'sections' => $sections,
                ];
            }
            $docs = $arranged;
        }
        wp_reset_query();
        ?>
        <section class="settings__area pat-60 pab-60">
            <div class="container container__one">
                <div class="row g-4 justify-content-center">
                    <?php
                    if ($docs) :
                        $a = 1;

                        foreach ($docs as $main_doc):
                            $xgenious_wedocs_area_options = get_post_meta($main_doc['doc']->ID,'xgenious_wedocs_area_options',true);
                            ?>
                            <div class="col-xl-3 col-lg-<?php echo esc_attr($settings['column']) ?> col-sm-6">
                                <div class="settings__item">
                                    <div class="settings__item__header">
                                        <div class="settings__item__header__flex">
                                            <div class="settings__item__header__icon"><i class="las la-coins"></i></div>
                                            <h6 class="settings__item__header__title"><a href="<?php echo get_permalink($main_doc['doc']->ID)?>"><?php echo esc_html($main_doc['doc']->post_title);?></a></h6>
                                        </div>
                                    </div>
                                    <?php if ( $main_doc['sections'] ) : $count = 0; foreach ( $main_doc['sections'] as $section ) : $count++; if ( $count > 4 ) break; ?>
                                    <div class="settings__item__inner">
                                        <div class="settings__item__list">
                                            <span class="settings__item__list__single">
                                                <a href="<?php echo esc_url( get_permalink($section->ID) ); ?>"><i class="las la-file-alt"></i><?php printf( esc_html__( '%s', 'hexcoupon-theme' ), esc_html( $section->post_title ) )?></a>
                                            </span>
                                        </div>
                                    </div>
                                    <?php endforeach; endif; ?>
                                    <div class="btn_wrapper">
                                        <a href="<?php echo get_permalink($main_doc['doc']->ID)?>" class="settings__item__btn"><?php printf( esc_html__( '%s', 'hexcoupon-theme' ), $settings['read_more'] ); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($a == 6){$a = 1;}else{$a++;}
                        endforeach;
                    endif; ?>

                </div>
            </div>
        </section>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new HexCoupon_Doc_Widget());