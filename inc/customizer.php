<?php
/**
 * M Media Custom Theme Theme Customizer
 *
 * @package M_Media_Custom_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function m_media_custom_theme_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    // $wp_customize->get_setting('header_cta')->transport = 'postMessage';

    $setting_primary_color = $wp_customize->add_setting('primary_color', array(
        'default' => '#3800ff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary color', 'm_media_custom_theme'),
        'section' => 'colors',
        'settings' => $setting_primary_color->id,
    )));

    $setting_secondary_color = $wp_customize->add_setting('secondary_color', array(
        'default' => '#c8ff00',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => __('Secondary color', 'm_media_custom_theme'),
        'section' => 'colors',
        'settings' => $setting_secondary_color->id,
    )));

    $setting_cta_link = $wp_customize->add_setting('cta_link', array(
        'default' => '/contact',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'cta_link',
            array(
                'label' => __('Call to action link', 'm_media_custom_theme'),
                'section' => 'title_tagline',
                'settings' => $setting_cta_link->id,
                'type' => 'text',
            )
        )
    );

    $setting_cta_text = $wp_customize->add_setting('cta_text', array(
        'default' => 'Contact us',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'cta_text',
            array(
                'label' => __('Call to action text', 'm_media_custom_theme'),
                'section' => 'title_tagline',
                'settings' => $setting_cta_text->id,
                'type' => 'text',
            )
        )
    );

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector' => '.site-title a',
                'render_callback' => 'm_media_custom_theme_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector' => '.site-description',
                'render_callback' => 'm_media_custom_theme_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'm_media_custom_theme_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function m_media_custom_theme_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function m_media_custom_theme_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function m_media_custom_theme_customize_preview_js()
{
    wp_enqueue_script('m-media-custom-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'm_media_custom_theme_customize_preview_js');
