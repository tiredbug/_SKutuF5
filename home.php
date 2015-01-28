<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _SKutu Foundation
 */

get_header(); ?>

<div class="site-branding">
	<div class="row"><!-- Foundation .row start -->
		<div class="small-12 medium-6 columns "><!-- Foundation .columns start -->
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/hero-image.svg" class="site-branding-img" />
		</div><!-- Foundation .columns end -->
		<div class="small-12 medium-6 columns medium-text-left"><!-- Foundation .columns start -->
			<h1 class="site-title white-text"><?php bloginfo( 'name' ); ?></h1>
			<h2 class="site-description white-text"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- Foundation .columns end -->
	</div><!-- Foundation .row end -->
</div>

<div class="row post-listing-padding" data-equalizer><!-- Foundation .row start -->
	<div class="medium-12 columns" data-equalizer-watch><!-- Foundation .medium-8 .columns start -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<ul class="large-block-grid-2"><!-- Foundation block grid start -->
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<li><!-- Foundation block grid item start -->

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

				</li><!-- Foundation block grid item end -->

			<?php endwhile; ?>

			</ul><!-- Foundation block grid end -->

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	</div><!-- Foundation .medium-8 .columns end -->
</div><!-- Foundation .row end -->

<?php get_footer(); ?>
