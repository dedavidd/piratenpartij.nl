<?php
/** footer.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */

				tha_footer_before(); ?>

		</div><!-- #page-row -->

				<footer id="real-footer" role="contentinfo" class="row-fluid centre">
					<?php tha_footer_top(); ?>
					
					<div class="centre footer-links">
						<div id="footer-menu-container" class="footer-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
						</div>
					</div>
					
					<div class="row-fluid footer-content">
						<div class="span6">
							<p>
								Piratenpartij<br />
								<a href="/privacybeleid">Privacybeleid</a> | <a href="/anbi">ANBI</a>
              </p>
              <p>
               Hosting gesponsord door <a href="http://www.seeas.nl/" target="_blank">Seeas BV</a><br/><a href="http://www.seeas.nl/" target="_blank"><img src="<?= static_url() ?>img/logo_seeaskl.png" style="height: 15px; border: 1px solid black;"/></a>
							</p>
						</div>
						<div class="span6">
							<p>
                CC0 1.0 Universal Public Domain Dedication
              </p>
              <p>
								<a href="https://creativecommons.org/publicdomain/zero/1.0/"><img src="<?= static_url() ?>img/cc80x15.png" alt="Voor zover wettelijk mogelijk, heeft de Piratenpartij alle auteursrecht en naburige rechten opgegeven op de inhoud van deze website. Dit werk is gepubliceerd vanuit: Nederland."></a>
							</p>
						</div>
					</div>

					<?php tha_footer_bottom(); ?>
				</footer><!-- #colophon -->
				<?php tha_footer_after(); ?>
	<!-- <?php printf( __( '%d queries. %s seconden.', 'the-bootstrap' ), get_num_queries(), timer_stop(0, 3) ); ?> -->


	<script type="text/javascript" src="<?= static_url() ?>js/vendor/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="<?= static_url() ?>vendor/bootstrap-2.3.1/js/bootstrap.min.js"></script>

	<?php wp_footer(); ?>

</body>
</html>

<?php


/* End of file footer.php */
/* Location: ./wp-content/themes/the-bootstrap/footer.php */
