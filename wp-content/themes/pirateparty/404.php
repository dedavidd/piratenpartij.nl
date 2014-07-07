<?php
/** 404.php
 *
 * The template for displaying 404 pages (Not Found).
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */
// echo 'request uri: '.$_SERVER['REQUEST_URI'];
// echo 'origAuteur: '.$_GET['origAuteur'];

preg_match('/^\/blog\/([A-Za-z0-9-\.]+)\/([A-Za-z0-9-\.]+)/' , $_SERVER['REQUEST_URI'], $matches);
// echo 'matches: '.join(',', $matches);
if(count($matches) == 3) {
	header('HTTP/1.0 307 Temporary Redirect');
	header('Location: https://piratenpartij.nl/'.$matches[2].'?origAuteur='.$matches[1]);
	die();
}

preg_match('/^\/([A-Za-z0-9-\.]+)/' , $_SERVER['REQUEST_URI'], $matches);
// echo 'matches: '.join(',', $matches);
if (count($matches) == 2 && strlen($_GET['origAuteur'])>0) {
	header('HTTP/1.0 307 Temporary Redirect');
	header('Location: https://oud.piratenpartij.nl/blog/'.$_GET['origAuteur'].'/'.$matches[1]);
	die();
}

get_header(); ?>


<section id="page" class="span9" data-role="page">

	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top(); ?>
		
		<?php tha_entry_before(); ?>
		<article id="post-0" class="post error404 not-found">
			<?php tha_entry_top(); ?>
			<header class="page-header">
				<h1 class="entry-title"><?php _e( 'Oeps!', 'the-bootstrap' ); ?></h1>
			</header><!-- .page-header -->

			<div class="entry-content">
				<p><?php _e( 'We kunnen blijkbaar deze pagina niet vinden. Op dit moment wordt de website van de Piratenpartij verbouwd. Hierdoor kan het voorkomen dat bepaalde pagina\'s niet bereikbaar zijn. We doen er alles aan om de content die je zocht zo snel mogelijk weer beschikbaar te maken. Onze welgemeende excuses voor het ongemak! Probeer anders de zoekfunctie, of &eacute;&eacute;n van de links hieronder.', 'the-bootstrap' ); ?></p>

				<?php
				get_search_form();
				
				the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) );
				
				the_widget( 'WP_Widget_Categories', array(
					'title'	=>	__( 'Meest gebruikte categorie&euml;n', 'the-bootstrap' ),
				) );
				
				$archive_content = sprintf( _x( 'Probeer te zoeken in de maandelijkse archieven.', 'the-bootstrap' ));
				the_widget( 'WP_Widget_Archives', array(
					'count'		=>	0,
					'dropdown'	=>	1
				), array(
					'after_title'	=>	"</h2><p>{$archive_content}</p>"
				) );
				
				the_widget( 'WP_Widget_Tag_Cloud' ); ?>

			</div><!-- .entry-content -->
			<?php tha_entry_bottom(); ?>
		</article><!-- #post-0 .post .error404 .not-found -->
		<?php tha_entry_after(); ?>
		
		<?php tha_content_bottom(); ?>
		<script>
			var GOOG_FIXURL_LANG = 'NL';
			var GOOG_FIXURL_SITE = 'https://piratenpartij.nl';
		</script>
		<script src="<?= static_url() ?>vendor/fixurl/fixurl.js"></script>
	</div><!-- #content -->
	<?php tha_content_after(); ?>
</section><!-- #primary -->

<?php
get_sidebar();
get_footer();


/* End of file 404.php */
/* Location: ./wp-content/themes/the-bootstrap/404.php */
