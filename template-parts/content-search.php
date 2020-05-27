<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package M_Media_Custom_Theme
 */

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<div class="media mb-5">
	    <img class="mr-3 img-fluid rounded" width="55" height="55" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Generic placeholder image">

		<div class="media-body">
			<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');?>

			<?php if ('post' === get_post_type()): ?>
						<?php the_excerpt();?>

			<div class="entry-meta text-muted">
				<?php
m_media_custom_theme_posted_on();
?>
			</div><!-- .entry-meta -->
			<?php endif;?>
		</div><!-- .entry-header -->
	</div>
</article><!-- #post-<?php the_ID();?> -->
