<?php
/**
 * The template for displaying all single posts.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

	<div id="primary">
		<div class="row">
			<?php do_action( 'alienship_content_before' ); ?>
			<div id="content" role="main" class="<?php echo apply_filters( 'alienship_content_container_class', 'col-sm-9' ); ?>">

				<?php
				while ( have_posts() ) : the_post();

					alienship_content_nav( 'nav-above' ); // display content nav above posts?

					do_action( 'alienship_loop_before' );

					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( '/templates/parts/content', get_post_format() );

					do_action( 'alienship_loop_after' );

					alienship_content_nav( 'nav-below' ); // display content nav below posts?

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );

				endwhile; ?>

			</div><!-- #content -->
			<?php do_action( 'alienship_content_after' );

			get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- #primary -->
<?php get_footer(); ?>