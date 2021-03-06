<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package M_Media_Custom_Theme
 */

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <?php if (get_theme_mod('show_headers', true)) {?>
	<header class="entry-header bg-primary text-white row alignfull" style="min-height:300px; background-image: url('<?php echo get_the_post_thumbnail_url(); ?> ')">
		<div class="col-sm align-self-center">
		<?php the_title('<h1 class="entry-title text-center"><mark>', '</mark></h1>');?>
		</div>
	</header><!-- .entry-header -->
	<div class="entry-content mt-5">

<?php } else {
    ?>
    <div class="entry-content mt-0">
		<?php
}
the_content();

wp_link_pages(
    array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'm-media-custom-theme'),
        'after' => '</div>',
    )
);
?>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link()): ?>
		<footer class="entry-footer">
			<?php
edit_post_link(
    sprintf(
        wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __('Edit <span class="screen-reader-text">%s</span>', 'm-media-custom-theme'),
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        ),
        wp_kses_post(get_the_title())
    ),
    '<span class="edit-link">',
    '</span>'
);
?>
		</footer><!-- .entry-footer -->
	<?php endif;?>
</article><!-- #post-<?php the_ID();?> -->
