<?php
/** sidebar.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */

tha_sidebars_before(); ?>

<div class="span3" id="column">
	<section id="secondary" class="widget-area" role="complementary">

				<div id="join-donate" style="padding-bottom: 0px;" class="hidden-phone hidden-tablet">
					<a href="<?php echo join_page_uri() ?>" class="button-orange sidebar-action-item" title="Word lid">
						<i class="is2-group"></i>
						Word lid
					</a>
						
					<a href="<?php echo donate_page_uri() ?>" class="button-red sidebar-action-item pig" title="Doneren">
						<i class="is2-donate"></i>
						Doneren
					</a>
						
				</div>
				
				
				<aside class="we-are hidden-phone">
					<span>Wij zijn</span> een politieke beweging met de kernpunten:
					<ul>
						<li>vrijheid van informatie en cultuur</li>
						<li>burgerrechten en digitale vrijheden</li>
						<li>privacy en anonimiteit</li>
						<li>overheidstransparantie</li>
						<li>directere democratie</li>
					</ul>
				</aside>

				<!---<aside>
					<header>Pirate Party Webcasts</header>
					
					<p>
						Our weekly show talking pirate politics from the Australian perspective. Hosted by Sam Kearns.
						<a href="<?php echo get_category_link(get_category_by_slug('webcasts')->term_id) ?>">Previous episodes and downloads.</a>
					</p>
					
					<?php /*
					<div id="next-broadcast">
						<p class="centre next"><strong>Next broadcast</strong></p>
						<p class="centre time">Sunday 9pm AEDT</p>
					</div>
					*/ ?>
					
				</aside>-->

		<?php tha_sidebar_top();
		
		dynamic_sidebar( 'main' );
		
		tha_sidebar_bottom(); ?>
	</section><!-- #secondary .widget-area -->
</div>
<?php tha_sidebars_after();


/* End of file sidebar.php */
/* Location: ./wp-content/themes/the-bootstrap/sidebar.php */
