<?php
/** single.php
 *
 * The Template for displaying all single posts.
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 05.02.2012
 */

get_header(); ?>

<div class="span9" data-role="page" id="page">
	
	<?php tha_content_before(); ?>
	
		<?php tha_content_top();

		while ( have_posts() ) {
			the_post();
			get_template_part( '/partials/content', 'single' );
			comments_template();
		} ?>
		
		<nav id="nav-single" class="">
			<h3 class="assistive-text"><?php _e( 'Navigeren door artikelen', 'the-bootstrap' ); ?></h3>
			<span class="next"><?php next_post_link( '%link', sprintf( '%1$s <span class="meta-nav">&rarr;</span>', __( 'Volgende artikel', 'the-bootstrap' ) ) ); ?></span>
			<span class="previous"><?php previous_post_link( '%link', sprintf( '<span class="meta-nav">&larr;</span> %1$s', __( 'Vorige artikel', 'the-bootstrap' ) ) ); ?></span>
		</nav><!-- #nav-single -->
		
		<?php tha_content_bottom(); ?>
	
	<?php tha_content_after(); ?>
</div>

<?php
get_sidebar();
get_footer();


/* End of file index.php */
/* Location: ./wp-content/themes/the-bootstrap/single.php */
