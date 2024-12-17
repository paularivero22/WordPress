<?php
/**
 * Option Panel
 *
 * @package Blogrift
 */

function blogrift_customize_register($wp_customize) {

$wp_customize->remove_control('background_color'); 
$wp_customize->remove_control('blogus_global_comment_enable');
$wp_customize->remove_control('slider_tabs');
$wp_customize->remove_control('show_main_news_section');
$wp_customize->remove_control('slider_overlay_enable');
$wp_customize->remove_control('blogus_slider_overlay_color');
$wp_customize->remove_control('blogus_slider_overlay_text_color');
$wp_customize->remove_control('blogus_slider_title_font_size');


$wp_customize->add_setting('background_color',
array(
    'default' => '#fff',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_control('background_color',
array(
    'label' => esc_html__('Background Color', 'blogrift'),
    'section' => 'colors',
    'type' => 'color',
    'priority' => 3,
));

$wp_customize->add_setting('blogus_global_comment_enable',
array(
    'default' => false,
    'sanitize_callback' => 'blogus_sanitize_checkbox',
)
);
$wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogus_global_comment_enable', 
array(
    'label' => esc_html__('Comments', 'blogrift'),
    'type' => 'toggle',
    'section' => 'site_post_date_author_settings',
    'priority' => 10,
)
));

// Setting - show_main_news_section.
$wp_customize->add_setting('show_main_news_section',
    array(
        'default' => 1,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
);
$wp_customize->add_control('show_main_news_section',
    array(
        'label' => esc_html__('Hide / Show', 'blogrift'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 10,

    )
); 

}
add_action('customize_register', 'blogrift_customize_register');