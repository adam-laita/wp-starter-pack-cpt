<?php
	/**
	 * This is the default template for detail of a post. 
	 */

	get_header();
?>

<main class="content">
	<section class="container">
		<h1><?php single_post_title(); ?></h1>

		<div class="row row_justify-space">
			<article <?php post_class(); ?>>
				<?php
					while ( have_posts() ) {
						the_post();
						?>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'd. m. Y' ); ?></time>

							<?php 
								the_author_posts_link(); 
								
								the_category();
									
								the_post_thumbnail( 'large' );

								the_content();

								wp_link_pages();

								the_tags();
							?>
						<?php
					}

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>
			</article>

			<?php
				get_sidebar();
			?>
		</div>
	</section>
</main>

<?php
	get_footer();