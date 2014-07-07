<?php
/** header.php
 *
 * Displays all of the <head> section and everything up till </header>
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0 - 05.02.2012
 */

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<?php tha_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
	
	<script src="https://piratenpartij.nl/javascript/modernizr/modernizr.min.js"></script>
	<link rel="shortcut icon" href="<?= static_url() ?>favicon.ico"/>
	<link rel="image_src" href="<?= static_url() ?>img/logo.png"/>
	
	<?php tha_head_bottom(); ?>
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="row-fluid" id="header_real">
		<div class="span12">
			<header>
				<div id="header">
					<a id="logo" href="<?= esc_url( home_url( '/' ) ); ?>" rel="home" title="<?= get_bloginfo( 'name' ); ?>">
						<?php if ( get_header_image() ) : ?>
							<img src="<?= header_image(); ?>" width="<?= get_custom_header()->width; ?>" height="<?= get_custom_header()->height; ?>" alt="Logo <?= get_bloginfo( 'name' ); ?>">
						<?php else: ?>
							<img src="<?= static_url() ?>img/logo.png" width="125" height="124" alt="Logo <?= get_bloginfo( 'name' ); ?>">
						<?php endif; ?>
						<?php
							$title = explode(" ",get_bloginfo( 'name' ));
						?>
						<?= $title[0]; ?><span><?= (!empty($title[1]) ? $title[1] : ""); ?></span><br>
						<span class="oz">voor een vrije informatiesamenleving</span>
					</a>
					<div id="search" class="hidden-phone">
						<form id="id_search_form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="text" class="input-medium field-search notext" name="s" placeholder="Ik ben op zoek naar...">
							<input type="submit" class="btn" value="zoeken" name="submit">
						</form>
	
						<div id="social">
							<span>Volg ons:<br></span>
							<a href="<?= social_media_fb_uri() ?>" target="_blank" title="<?php bloginfo( 'name' ); ?> op Facebook"><img src="<?= static_url() ?>img/icons/social/facebook_32.png" alt="Facebook icon"></a>
 							<a href="<?= social_media_twitter_uri() ?>" target="_blank" title="<?php bloginfo( 'name' ); ?> op Twitter"><img src="<?= static_url() ?>img/icons/social/twitter_32.png" alt="Twitter icon"></a>
 							<a href="<?= social_media_youtube_uri() ?>" target="_blank" title="<?php bloginfo( 'name' ); ?> op Youtube"><img src="<?= static_url() ?>img/icons/social/youtube_32x32.png" alt="Youtube icon"></a>
 							<a href="/feed" target="_blank" title="RSS feed <?php bloginfo( 'name' ); ?>"><img src="<?= static_url() ?>img/icons/social/rss_32.png" alt="RSS icon"></a>
						</div>
					</div>
				</div>
			</header>
		</div>
	</div>

	<div class="navbar ppau-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<button id="responsive-menu-button" data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
					<i class="icon-th-list"></i> Menu
				</button>
				<a href="<?= donate_page_uri() ?>" class="hidden-desktop btn btn-danger pull-right mobile-menu-button" title="Doneren">Doneren</a>
				<a href="<?= join_page_uri() ?>" class="hidden-desktop btn btn-warning pull-right mobile-menu-button" title="Word lid">Word lid</a>

				<div class="nav-collapse collapse">
<?php

$defaults = array(
	'theme_location'  => 'primary_left',
	'menu'            => '',
	'container'       => 'ul',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'nav',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new twitter_bootstrap_nav_walker()
);
?>
						<?php wp_nav_menu($defaults); ?>
						
						<ul id="menu-action" class="sf-menu hidden-phone hidden-tablet">
							<li><a href="<?= join_page_uri() ?>" class="action left" title="Word Lid!">Word lid!</a></li>
							<li><a href="<?= help_us_page_uri() ?>" class="action right" title="Help mee!">Help mee!</a></li>
						</ul>

<?php

$defaults = array(
	'theme_location'  => 'primary_right',
	'menu'            => '',
	'container'       => 'ul',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'nav',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new twitter_bootstrap_nav_walker()
);
?>
					<?php wp_nav_menu($defaults); ?>
				</div>
			</div>
		</div>
	</div>




	<div id="page-row" class="row-fluid">
		


<?php
				tha_header_after();
				

/* End of file header.php */
/* Location: ./wp-content/themes/the-bootstrap/header.php */
