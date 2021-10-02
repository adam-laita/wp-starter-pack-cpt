<?php
	/**
	 * This is the template for recipes in Recipe Archive.
	 */
?>

<div <?php post_class( 'loop-wrapper__item' ); ?>>
	<?php
		if ( has_post_thumbnail() ) {
			?>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'medium' ); ?>
				</a>
			<?php
		}
	?>

	<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
		<h2><?php the_title(); ?></h2>
	</a>

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

		the_excerpt();
	?>

	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'More...', 'wpsp' ); ?></a>
</div>