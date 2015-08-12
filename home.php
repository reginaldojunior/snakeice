<?php
/**
 * Home template
 *
 * @package Moesia
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


<?php

get_footer(); 

?>
