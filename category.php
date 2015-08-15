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
 * @package snakeice
 */

get_header(); 

?>

<div id="primary" class="content-area <?php echo $layout; ?>">
	<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<div class="home-wrapper <?php echo $masonry; ?>">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				
				get_template_part( 'content', 'large' );	

			?>

		<?php endwhile; ?>
		</div>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
