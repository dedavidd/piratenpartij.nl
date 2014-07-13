<?php
/** page.php
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */

get_header(); ?>
<div class="span9" data-role="page" id="page">
<style>
.woocommerce-result-count {
display: none;
}
.woocommerce-ordering {
display: none;
}
.products {
margin-top: 10px !important;
}
</style>
	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top();
		
		woocommerce_content();
		//get_template_part( '/partials/content', 'page' );

		tha_content_bottom(); ?>
	</div><!-- #content -->


</div><!-- #primary -->
<?php
get_sidebar();
get_footer();


/* End of file page.php */
/* Location: ./wp-content/themes/the-bootstrap/page.php */