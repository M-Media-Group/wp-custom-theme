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

	<footer class="site-footer bg-primary text-white col-sm container-fluid p-5">
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
