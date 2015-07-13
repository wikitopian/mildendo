<div data-role="header">
	<h1><?php wp_title(); ?></h1>
	<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ui-btn-left">
		<a
			name="home"
			id="home"
			href="<?php echo home_url(); ?>"
			data-icon="home"
			data-role="button"
			rel="external"
			>
			Home
		</a>
	</div>

	<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ui-btn-right">
		
		<a
			class="mildendo-desktop-buttons"
			rel="external"
			href="<?php echo apply_filters( 'mildendo_dashboard_url' , home_url() . '/wp-admin' ); ?>"
			data-icon="gear"
			data-role="button"
			>
			<?php echo apply_filters( 'mildendo_dashboard_title', 'Dashboard' ); ?>
		</a>
		<?php if( is_user_logged_in() ) { ?>
			<a
				class="mildendo-desktop-buttons"
				href="<?php echo wp_logout_url( get_permalink() ); ?>"
				data-icon="delete"
				data-role="button" >
				Log Out
			</a>
		<?php } ?>
	</div>
</div>
