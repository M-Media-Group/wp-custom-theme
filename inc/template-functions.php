<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package M_Media_Custom_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function m_media_custom_theme_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'm_media_custom_theme_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function m_media_custom_theme_pingback_header()
{
    ?>
         <style type="text/css">
             :root {
              --primary: <?php echo get_theme_mod('primary_color', '#3800ff'); ?>;
              --secondary: <?php echo get_theme_mod('secondary_color', '#c8ff00'); ?>;
          }
         </style>
    <?php
if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'm_media_custom_theme_pingback_header');
