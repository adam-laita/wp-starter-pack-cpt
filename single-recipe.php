<?php
	/**
	 * This is the template for detail of a recipe from "recipe" CPT.
	 */

	get_header();
?>

<main class="content">
	<section class="container">
		<article <?php post_class(); ?>>
			<?php
				while ( have_posts() ) {
					the_post();
					?>
						<h1><?php single_post_title(); ?></h1>

						<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'd. m. Y' ); ?></time>

						<?php 
							the_author();
							
							$recipeCategories = get_the_terms( get_the_ID(), 'recipe_category' );

							if ( $recipeCategories ) {
								echo '<ul class="recipe-categories">';

								foreach ( $recipeCategories as $category ) {
									?>
										<li>
											<a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>" rel="category tag"><?php echo esc_html( $category->name ); ?></a>
										</li>
									<?php
								}

								echo '</ul>';
							}
								
							the_post_thumbnail( 'large' );

							the_content();

							wp_link_pages();
						?>
					<?php
				}
			?>
		</article>
	</section>
</main>

<?php
	get_footer();