<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _SKutu Foundation
 */

get_header(); ?>

<div class="row post-listing-padding" data-equalizer><!-- Foundation .row start -->
	<div class="medium-8 columns" data-equalizer-watch><!-- Foundation .medium-8 .columns start -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	</div><!-- Foundation .medium-8 .columns end -->

<?php get_sidebar(); ?>

</div><!-- Foundation .row end -->

<?php get_footer(); ?>
