<?php
	/**
	 * This is the template for 404 error page.
	 */

	get_header();
?>

<main class="content">
	<section class="container">
		<h1><?php _e( 'Page Not Found', 'wpsp' ); ?></h1>

		<p><?php _e( 'It looks like you\'ve visited an invalid link. Please try another page from the main site navigation.', 'wpsp' ); ?></p>
	</section>
</main>

<?php
	get_footer();