<?php
	/**
	 * The template for displaying the footer.
	 */
?>
		
		<footer>
			<div class="container">
				<div class="copyright">
					<span>&copy; <?php echo wp_date( 'Y' ); ?></span>

					<a href="<?php bloginfo( 'url' ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a>
				</div>
			</div>
		</footer>

		<?php
			wp_footer();
		?>
	</body>
</html>