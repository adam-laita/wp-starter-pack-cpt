<?php
	/**
	 * This is the template for terms Archive from "recipe_category" Taxonomy.
	 */

	get_header();

	$recipeObject = get_post_type_object( 'recipe' );
?>

<main class="content">
	<section class="container">
		<h1><?php echo esc_html( $recipeObject->label ) . single_term_title( ': ', false ); ?></h1>

		<div class="loop-wrapper">
			<div class="row row_justify-space">
				<?php
					while ( have_posts() ) {
						the_post();

						get_template_part( 'components/loop', 'recipe' );
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
	</section>
</main>

<?php
	get_footer();