<?php
	/**
	 * This is the template for all Archives and Blog posts page.
	 */

	get_header();
?>

<main class="content">
	<section class="container">
		<?php
			if ( is_archive() ) {
				// If it's Author, Category, Taxonomy, Date or Tag Archive or CPT Archive itself use the_archive_title() for main title of the page.
				?>
					<h1><?php the_archive_title(); ?></h1>
				<?php
			} elseif ( is_search() ) {
				// If it's page with Search results use custom string with search term as a main title.
				?>
					<h1><?php _e( 'Search' ); ?> - &quot;<?php echo get_search_query(); ?>&quot;</h1>
				<?php
			} elseif ( is_home() && !is_front_page() ) {
				// If it's Blog posts page use name of the page for posts as a main title.
				?>
					<h1><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
				<?php
			}
		?>

		<div class="row row_justify-space">
			<div class="loop-wrapper loop-post">
				<div class="row row_justify-space">
					<?php
						while ( have_posts() ) {
							the_post();

							get_template_part( 'components/loop', get_post_type() );
						}
					?>
				</div>

				<?php
					the_posts_pagination(
						array(
							'prev_text' => '&laquo;',
							'next_text' => '&raquo;'
						)
					);
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