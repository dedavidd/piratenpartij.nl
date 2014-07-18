<?php
/** author.php
 *
 * The template for displaying Author Archive pages.
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */

get_header(); ?>

	<?php tha_content_before(); ?>
	<div class="span9" data-role="page" id="page">
		<?php tha_content_top();
		
		if ( have_posts() ) :
			the_post(); ?>

			<header class="page-header">
				<h1 class="page-title author"><?php printf( __( 'Archieven van auteur: %s', 'the-bootstrap' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
			</header><!-- .page-header -->
	
			<?php
			rewind_posts();
			
			while ( have_posts() ) {
				the_post();
				get_template_part( '/partials/content', get_post_format() );
			}
			the_bootstrap_content_nav();
		else :
			get_template_part( '/partials/content', 'not-found' );
		endif;
		
		tha_content_bottom(); ?>
	</div><!-- #content -->
	<?php tha_content_after(); ?>


<?php
get_sidebar();
get_footer();


/* End of file author.php */
/* Location: ./wp-content/themes/the-bootstrap/author.php */
