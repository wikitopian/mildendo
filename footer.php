<div data-role="footer" data-position="fixed">
	<h4><?php bloginfo( 'description' ); ?></h4>

	<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ui-btn-left">
		<a href="#home" data-icon="arrow-u" data-role="button" rel="external">Top</a>
	</div>

	<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ui-btn-right">

		<nav>
			<?php wp_nav_menu(
				array(
					'theme_location' => 'footer-menu',
					'container' => '',
					'items_wrap' => '%3$s',
				)
			); ?>
		</nav>
		
	</div>
</div>
