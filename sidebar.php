<?php
	/**
	 * This is the template for default Sidebar.
	 */

	if ( is_active_sidebar( 'sidebar' ) ) {
		?>
			<div class="sidebar">
				<?php
					dynamic_sidebar( 'sidebar' );
				?>
			</div>
		<?php
	}