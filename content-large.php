<?php
/**
 * @package snakeice
 */
?>

<article id="post-<?php the_ID(); ?>">
	<div class="container" style="border-bottom: dashed 2px;">
		<div class="row">
			<div class="col-md-8">
				<h3>
					<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
					<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</h3>
				<p>
					<?php if ( (get_theme_mod('full_content') == 1) && is_home() ) : ?>
						<?php the_content(); ?>
					<?php else : ?>
						<?php the_excerpt(); ?>
					<?php endif; ?>
				</p> 
				<button type="button" class="btn btn-info btn-lg btn-block">
					Default
				</button>
			</div>
			<div class="col-md-4" style="padding: 15px;">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-thumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
						<?php the_post_thumbnail(); ?>
					</a>			
				</div>	
			<?php endif; ?>
			</div>
		</div>
	</div>
</article>