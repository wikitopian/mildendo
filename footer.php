		</div>
		<div data-role="footer" data-position="fixed">
		<h4><?php bloginfo( 'description' ); ?></h4>

		<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ui-btn-left">
			<a href="" data-icon="arrow-u" data-role="button" >Top</a>
		</div>
		<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ui-btn-right">

			<?php wp_nav_menu(
				array(
					'theme_location' => 'footer-menu',
					'container' => '',
					'items_wrap' => '%3$s',
					'walker' => new Mildendo_Walker_Nav_Menu
				)
			); ?>
			
		</div>


		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>
