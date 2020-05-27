<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package M_Media_Custom_Theme
 */

?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<!-- 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php wp_body_open();?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'm-media-custom-theme');?></a>

<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
  <div class="container-fluid">
    <!-- navbar-brand -->
     <?php the_custom_logo();?>
    <div>
        <a class="btn btn-primary text-white d-md-none" href="<?php echo get_theme_mod('cta_link', '/contact'); ?>" rel="home" ><?php echo get_theme_mod('cta_text', 'Contact us'); ?></a>
         <!-- Brand and toggle get grouped for better mobile display -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
        <?php
wp_nav_menu(array(
    'theme_location' => 'primary',
    'depth' => 2,
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id' => 'bs-example-navbar-collapse-1',
    'menu_class' => 'navbar-nav ml-auto mr-5',
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
));
if (get_theme_mod('cta_link')) {

    ?>
<a class="btn btn-primary text-white d-none d-md-block" href="<?php echo get_theme_mod('cta_link', '/contact'); ?>" rel="home" ><?php echo get_theme_mod('cta_text', 'Contact us'); ?></a>
<?php
}
?>
    </div>
</nav>