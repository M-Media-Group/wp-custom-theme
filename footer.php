<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package M_Media_Custom_Theme
 */

?>

	<footer class="site-footer bg-primary text-white col-sm container-fluid p-5" style="fill:#fff;">
		<?php if (has_nav_menu('social')) {

    wp_nav_menu(array(
        'theme_location' => 'social',
        'container' => 'div',
        'container_id' => 'menu-social',
        'container_class' => 'menu',
        'menu_id' => 'menu-social-items',
        'menu_class' => 'd-flex list-unstyled',
        'depth' => 1,
        'fallback_cb' => '',
        'walker' => new Social_Walker_Nav_Menu(),
    )
    );
}?>
		<div class="site-info ">
			<?php
bloginfo('name');?>
<!-- 			<span class="sep"> | </span>
 -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();?>

</body>
</html>
