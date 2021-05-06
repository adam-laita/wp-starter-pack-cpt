<?php
	/**
	 * This is the template for recipes Archive from "recipe" CPT.
	 */

	get_header();
?>

<main class="content">
	<section class="container">
		<h1><?php post_type_archive_title(); ?></h1>

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