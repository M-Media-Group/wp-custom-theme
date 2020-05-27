<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package M_Media_Custom_Theme
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<?php
while (have_posts()):
    the_post();

    get_template_part('template-parts/content', get_post_type());

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()):
        comments_template();
    endif;

    echo "<div class='row bg-primary pt-4 text-white alignfull'><div class='col-sm'>";
    the_post_navigation(
        array(
            'prev_text' => '<span class="nav-subtitle text-muted">' . esc_html__('← ', 'm-media-custom-theme') . '</span> <span class="nav-title text-white">%title</span>',
            'next_text' => '<span class="nav-title text-white">%title</span>' . '<span class="nav-subtitle text-muted">' . esc_html__(' →', 'm-media-custom-theme') . '</span>',
        )
    );
    echo "</div></div>";
endwhile; // End of the loop.
?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
