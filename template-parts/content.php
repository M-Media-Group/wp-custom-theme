<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package M_Media_Custom_Theme
 */

/* translators: used between list items, there is a space after the comma */
$categories_list = get_the_category_list(esc_html__(', ', 'm-media-custom-theme'));

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<header class="entry-header row bg-primary text-white alignfull">
		<div class="col-sm-5 align-self-center" style="overflow: visible;z-index: 1;">
		<?php
if (is_singular()):
    if ($categories_list) {
        /* translators: 1: list of categories. */
        printf('<div class="cat-links text-white mb-1 small">' . esc_html__('%1$s', 'm-media-custom-theme') . '</div>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
    the_title('<h1 class="entry-title mr-sm-n5"><mark>', '</mark></h1>');
else:
    the_title('<h2 class="entry-title"><a class="text-white" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
endif;

if ('post' === get_post_type()):
?>
			<div class="entry-meta text-white">
				<?php
m_media_custom_theme_posted_on();

?>
			</div><!-- .entry-meta -->
		<?php endif;?>
	</div>
			<div class="col-sm-7 p-0">

	<?php m_media_custom_theme_post_thumbnail();?>
</div>
	</header><!-- .entry-header -->


		<?php
if (is_singular()): ?>
		<div class="entry-content mt-5">
<?php
the_content(
    sprintf(
        wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'm-media-custom-theme'),
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        ),
        wp_kses_post(get_the_title())
    )
);
wp_link_pages(
    array(
        'before' => '<div class="page-links mt-5 mb-5">' . esc_html__('Pages:', 'm-media-custom-theme'),
        'after' => '</div>',
    )
);
?>	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
m_media_custom_theme_entry_footer();
?>
	</footer><!-- .entry-footer -->
<?php
else:
    echo "<br/>";
endif;

?>

</article><!-- #post-<?php the_ID();?> -->
