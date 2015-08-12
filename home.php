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

			<div class="container" style="
    border-bottom: dashed 2px;
">
				<div class="row">
					<div class="col-md-8">
						<h3>
							h3. Lorem ipsum dolor sit amet.
						</h3>
						<p>
							Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
						</p> 
						<button type="button" class="btn btn-info btn-lg btn-block">
							Default
						</button>
					</div>
					<div class="col-md-4" style="padding: 15px;">
						<img alt="Bootstrap Image Preview" src="http://lorempixel.com/356/259/" />
					</div>
				</div>
			</div>

			<?php
				
				// get_template_part( 'content', 'large' );	

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
