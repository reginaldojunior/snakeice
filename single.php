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

<div class="container" style="margin-top: 15px;">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-9 col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?php the_title( '<h3 class="panel-title">', '</h3>' ); ?>
						</div>
						<div class="panel-body">
							<?php
							if (have_posts()) :
							   	while (have_posts()) :
							      	the_post();
							 		
							 		the_content();
							 	endwhile;
							endif;
							?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'moesia' ),
									'after'  => '</div>',
								) );
							?>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Comentarios</h3>
						</div>
						<div class="panel-body">							
							<div id="comments" class="comments-area">
								<?php if ( have_comments() ) : ?>
									<h2 class="comments-title">
										<?php
											printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'moesia' ),
												number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
										?>
									</h2>

									<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
									<nav id="comment-nav-above" class="comment-navigation" role="navigation">
										<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'moesia' ); ?></h1>
										<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'moesia' ) ); ?></div>
										<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'moesia' ) ); ?></div>
									</nav><!-- #comment-nav-above -->
									<?php endif; // check for comment navigation ?>

									<ol class="comment-list">
										<?php
											wp_list_comments( array(
												'style'      => 'ol',
												'short_ping' => true,
												'avatar_size'=> 60,
											) );
										?>
									</ol><!-- .comment-list -->

									<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
									<nav id="comment-nav-below" class="comment-navigation" role="navigation">
										<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'moesia' ); ?></h1>
										<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'moesia' ) ); ?></div>
										<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'moesia' ) ); ?></div>
									</nav><!-- #comment-nav-below -->
									<?php endif; // check for comment navigation ?>

								<?php endif; // have_comments() ?>

								<?php
									// If comments are closed and there are comments, let's leave a little note, shall we?
									if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
								?>
									<p class="no-comments"><?php _e( 'Comments are closed.', 'moesia' ); ?></p>
								<?php endif; ?>

								<?php 
									$args = array(
										'comment_notes_after'  => '',
									);
									comment_form($args);
								?>

							</div><!-- #comments -->
						</div>
					</div>
				</div>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.alignnone {
  max-width: 100%;
}
form textarea {
	margin-left: 0px;
	}

	.submit {
		  margin: 0px;
	}
</style>
<?php get_footer(); ?>
