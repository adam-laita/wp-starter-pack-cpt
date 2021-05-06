<?php
	/**
	 * This is a default template for static pages.
	 */

	get_header();
?>

<main class="content">
	<section class="container">
		<h1><?php the_title(); ?></h1>

		<?php
			while ( have_posts() ) {
				the_post();

				the_content();

				wp_link_pages();
			}

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?>
	</section>
</main>

<?php
	get_footer();
