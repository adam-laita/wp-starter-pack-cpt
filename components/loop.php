<?php
	/**
	 * This is the template for posts in Archives and Blog posts page.
	 */
?>

<article <?php post_class( 'loop-wrapper__item' ); ?>>
	<?php
		if ( has_post_thumbnail() ) {
			?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'medium' ); ?>
				</a>
			<?php
		}
	?>

	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<h2><?php the_title(); ?></h2>
	</a>

	<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'd. m. Y' ); ?></time>

	<?php
		the_author_posts_link();

		the_category();

		the_excerpt();
	?>

	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'More...', 'wpsp' ); ?></a>
</article>
