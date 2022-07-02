<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dcs_widgets_init()
{
    register_sidebar(
        [
            'name' => esc_html__('Sidebar', 'dcs'),
            'id' => 'sidebar-primary',
            'description' => esc_html__('Add widgets here.', 'dcs'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ]
    );
}
add_action('widgets_init', 'dcs_widgets_init');
