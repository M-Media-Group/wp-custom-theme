<?php
/**
 * M Media Custom Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package M_Media_Custom_Theme
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('m_media_custom_theme_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function m_media_custom_theme_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on M Media Custom Theme, use a find and replace
         * to change 'm-media-custom-theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('m-media-custom-theme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        // register_nav_menus(
        //     array(
        //         'menu-1' => esc_html__('Primary', 'm-media-custom-theme'),
        //     )
        // );

        register_nav_menus(array(
            'primary' => __('Primary Menu', 'm-media-custom-theme'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'm_media_custom_theme_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
        // Disable Custom Colors
        add_theme_support('disable-custom-colors');
        add_theme_support('disable-custom-font-sizes');
        add_theme_support('disable-custom-line-height');
        add_theme_support('editor-font-sizes');
        add_theme_support('disable-custom-gradients');
        // add_theme_support('editor-styles');
        add_theme_support('align-wide');

        add_theme_support('align-full');

        // Editor Color Palette
        add_theme_support('editor-color-palette', array(
            array(
                'name' => __('Primary', 'm-media-custom-theme'),
                'slug' => 'primary',
                'color' => get_theme_mod('primary_color', '#3800ff'),
            ),
            array(
                'name' => __('Secondary', 'm-media-custom-theme'),
                'slug' => 'secondary',
                'color' => get_theme_mod('secondary_color', '#c8ff00'),
            ),
            // array(
            //     'name' => __('Orange', 'm-media-custom-theme'),
            //     'slug' => 'orange',
            //     'color' => '#FFBC49',
            // ),
            // array(
            //     'name' => __('Red', 'm-media-custom-theme'),
            //     'slug' => 'red',
            //     'color' => '#E2574C',
            // ),
            array(
                'name' => __('White', 'm-media-custom-theme'),
                'slug' => 'white',
                'color' => '#fff',
            ),
            array(
                'name' => __('Black', 'm-media-custom-theme'),
                'slug' => 'black',
                'color' => '#1E1E1E',
            ),
        ));
    }
endif;
add_action('after_setup_theme', 'm_media_custom_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function m_media_custom_theme_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('m_media_custom_theme_content_width', 640);
}
add_action('after_setup_theme', 'm_media_custom_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function m_media_custom_theme_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'm-media-custom-theme'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'm-media-custom-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'm_media_custom_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function m_media_custom_theme_scripts()
{

    wp_enqueue_style('m-media-custom-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('m-media-custom-theme-style', 'rtl', 'replace');

    wp_enqueue_script('m-media-custom-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    wp_enqueue_script('m-media-custom-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true);

    // all scripts
    // wp_enqueue_script('jquery-3-js', get_template_directory_uri() . '/js/jquery-3.4.1.min.js');
    wp_enqueue_script('m-media-custom-theme-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'm_media_custom_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

/**
 * Jetpack remove temporarily share buttons to place manually in template
 */
function jptweak_remove_share()
{
    remove_filter('the_content', 'sharing_display', 19);
    remove_filter('the_excerpt', 'sharing_display', 19);
    if (class_exists('Jetpack_Likes')) {
        remove_filter('the_content', array(Jetpack_Likes::init(), 'post_likes'), 30, 1);
    }
}

add_action('loop_start', 'jptweak_remove_share');
