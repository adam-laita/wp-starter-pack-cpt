<?php
	/**
	 * The template for displaying the header.
	 * 
	 * Contains <head> section. 
	 */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, viewport-fit=cover">
		<meta name="author" content="<?php bloginfo( 'name' ); ?>">

		<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">

		<?php
			wp_head();
		?>
	</head>

	<body <?php body_class(); ?>>
		<?php
			wp_body_open();
		?>

		<header>
			<div class="container">
				<div class="row row_justify-space row_align-center">
					<a href="<?php bloginfo( 'url' ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a>

					<?php
						wp_nav_menu( 
							array(
								'theme_location' => 'main-menu', 
								'container' => 'nav', 
								'container_class' => 'navigation',
								'menu_class' => 'main-menu row',
								'fallback_cb' => false
							) 
						);
					?>
				</div>
			</div>
		</header>