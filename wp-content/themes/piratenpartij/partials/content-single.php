<?php
/** content-single.php
 *
 * The template for displaying content in the single.php template
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */


tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php tha_entry_top();
	$postId = get_the_ID(); ?>
	
	<header class="page-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		
		<div class="muted"><?php the_bootstrap_posted_on(); ?></div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
	<?php	$imageMargin = array(
	'style'	=> 'margin-left: 7px');?>
		<p style="float: right;"> <?php echo get_the_post_thumbnail($postId, 'medium', $imageMargin); ?> </p>  
		<?php
		the_content();
		the_bootstrap_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		$categories_list = get_the_category_list( _x( ', ', 'used between list items, there is a space after the comma', 'the-bootstrap' ) );
		$tags_list = get_the_tag_list( '', _x( ', ', 'used between list items, there is a space after the comma', 'the-bootstrap' ) );
		
		if ( $categories_list )
			printf( '<span class="cat-links block">' . __( 'Posted in %1$s.', 'the-bootstrap' ) . '</span>', $categories_list );
		if ( $tags_list )
			printf( '<span class="tag-links block">' . __( 'Tagged %1$s.', 'the-bootstrap' ) . '</span>', $tags_list );
		?>
	</footer><!-- .entry-footer -->
	
	<?php tha_entry_bottom(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php tha_entry_after();

/* End of file content-single.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-single.php */
