<?php
	/**
	 * This is a specific template with sidebar for static pages.
	 * 
	 * Template Name: Sidebar template
	 * Template Post Type: page
	 */

	__( 'Sidebar template', 'wpsp' );

	get_header();
?>

<main class="content">
	<section class="container">
		<h1><?php the_title(); ?></h1>

		<div class="row row_justify-space">
			<div class="inner-wrapper">
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
			</div>

			<?php
				get_sidebar();
			?>
		</div>
	</section>
</main>

<?php
	get_footer();