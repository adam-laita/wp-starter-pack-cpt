<?php
	/**
	 * Functions and definitions.
	 */

	/* ------------------------------ LANGUAGES ------------------------------ */

	// Load the theme’s translated strings.
	load_theme_textdomain( 'wpsp', get_template_directory() . '/languages' );

	/* ------------------------------ MENUS ------------------------------ */

	// Registers navigation menu locations for a theme (Appearance -> Menu).
	register_nav_menus( array(
		'main-menu' => __( 'Main navigation', 'wpsp' )
	) );

	/* ------------------------------ SIDEBARS ------------------------------ */

	// Builds the definition for a single sidebar and returns the ID.
	register_sidebar(
		array(
			'name' => __( 'Sidebar', 'wpsp' ),
			'description' => __( 'Default sidebar', 'wpsp' ),
			'id' => 'sidebar',
			'before_widget' => '<section id="%1$s" class="%2$s">',
			'after_widget' => '</section>'
		)
	);

	/* ------------------------------ ASSETS ------------------------------ */

	// Sets/queues styles and scripts.
	add_action( 'wp_enqueue_scripts', 'wpsp_assets' );

	function wpsp_assets()
	{
		
		//-------------------------------------------------------------------
		// CSS
		//-------------------------------------------------------------------

		// CSS Normalize library for consistent styles in all modern browsers (https://necolas.github.io/normalize.css/).
		wp_enqueue_style( 'wpsp_normalize', get_template_directory_uri() . '/assets/css/normalize.css', null, null, 'all' );

		// Main CSS file.
		wp_enqueue_style( 'wpsp_main', get_template_directory_uri() . '/assets/css/main.css', null, null, 'all' );

		//-------------------------------------------------------------------
		// JS
		//-------------------------------------------------------------------

		// Main JS file.
		wp_enqueue_script( 'wpsp_main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null, true );
	}

	/* ------------------------------ FEATURES ------------------------------ */

	// Allows theme to add document title tag to HTML <head>.
	add_theme_support( 'title-tag' );

	// Registers theme support for post thumbnails.
	add_theme_support( 'post-thumbnails', array( 'post', 'recipe' ) );

	// Registers theme support for excerpt feature in pages.
	//add_post_type_support( 'page', 'excerpt' );

	// Updates the default image sizes after theme is switched.
	add_action( 'after_switch_theme', 'wpsp_images_default_sizes' );

	function wpsp_images_default_sizes() {
		// Sets the thumbnail size and cropping.
		update_option( 'thumbnail_size_w', 300 );
		update_option( 'thumbnail_size_h', 300 );
		update_option( 'thumbnail_crop', 1 );
		// Sets the medium size.
		update_option( 'medium_size_w', 600 );
		update_option( 'medium_size_h', 600 );
		// Sets the large size.
		update_option( 'large_size_w', 1200 );
		update_option( 'large_size_h', 1200 );
	}

	// Removes archives labels from the_archive_title() function.
	add_filter( 'get_the_archive_title', 'wpsp_archives_titles' );

	function wpsp_archives_titles( $title ) {

		if ( is_author() ) {
			$title = get_the_author();
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} elseif ( is_year() ) {
			$title = get_the_date( 'Y' );
		} elseif ( is_month() ) {
			$title = get_the_date( 'F Y' );
		} elseif ( is_day() ) {
			$title = get_the_date( 'j. F, Y' );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} else {
			$title = __( 'Archive', 'wpsp' );
		}

		return $title;
	}

	/* ------------------------------ CPT & TAXONOMIES ------------------------------ */

	// Register Recipe Post Type.
	add_action( 'init', 'wpsp_cpt_recipe', 0 );

	function wpsp_cpt_recipe() {

		$labels = array(
			'name'                  => __( 'Recipes', 'wpsp' ),
			'singular_name'         => __( 'Recipe', 'wpsp' ),
			'menu_name'             => __( 'Recipes', 'wpsp' ),
			'name_admin_bar'        => __( 'Recipe', 'wpsp' ),
			'archives'              => __( 'Recipe Archives', 'wpsp' ),
			'attributes'            => __( 'Recipe Attributes', 'wpsp' ),
			'parent_item_colon'     => __( 'Parent Recipe:', 'wpsp' ),
			'all_items'             => __( 'All Recipes', 'wpsp' ),
			'add_new_item'          => __( 'Add New Recipe', 'wpsp' ),
			'add_new'               => __( 'Add New', 'wpsp' ),
			'new_item'              => __( 'New Recipe', 'wpsp' ),
			'edit_item'             => __( 'Edit Recipe', 'wpsp' ),
			'update_item'           => __( 'Update Recipe', 'wpsp' ),
			'view_item'             => __( 'View Recipe', 'wpsp' ),
			'view_items'            => __( 'View Recipes', 'wpsp' ),
			'search_items'          => __( 'Search Recipe', 'wpsp' ),
			'not_found'             => __( 'Not found', 'wpsp' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wpsp' ),
			'featured_image'        => __( 'Featured Image', 'wpsp' ),
			'set_featured_image'    => __( 'Set featured image', 'wpsp' ),
			'remove_featured_image' => __( 'Remove featured image', 'wpsp' ),
			'use_featured_image'    => __( 'Use as featured image', 'wpsp' ),
			'insert_into_item'      => __( 'Insert into recipe', 'wpsp' ),
			'uploaded_to_this_item' => __( 'Uploaded to this recipe', 'wpsp' ),
			'items_list'            => __( 'Recipes list', 'wpsp' ),
			'items_list_navigation' => __( 'Recipes list navigation', 'wpsp' ),
			'filter_items_list'     => __( 'Filter recipes list', 'wpsp' ),
		);

		$args = array(
			'labels'                => $labels,
			'description'           => __( 'New post type called Recipes.', 'wpsp' ),
			'public'                => true,
			'show_in_rest'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-carrot',
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			'taxonomies'            => array( 'recipe_category' ),
			'has_archive'           => true,
			'rewrite'               => array( 'slug' => 'recepty' ),
		);

		register_post_type( 'recipe', $args );
	}

	// Register Recipe Category Taxonomy.
	add_action( 'init', 'wpsp_taxonomy_recipe_category', 0 );

	function wpsp_taxonomy_recipe_category() {

		$labels = array(
			'name'                       => __( 'Categories', 'wpsp' ),
			'singular_name'              => __( 'Category', 'wpsp' ),
			'menu_name'                  => __( 'Categories', 'wpsp' ),
			'all_items'                  => __( 'All Categories', 'wpsp' ),
			'parent_item'                => __( 'Parent Category', 'wpsp' ),
			'parent_item_colon'          => __( 'Parent Category:', 'wpsp' ),
			'new_item_name'              => __( 'New Category Name', 'wpsp' ),
			'add_new_item'               => __( 'Add New Category', 'wpsp' ),
			'edit_item'                  => __( 'Edit Category', 'wpsp' ),
			'update_item'                => __( 'Update Category', 'wpsp' ),
			'view_item'                  => __( 'View Category', 'wpsp' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'wpsp' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'wpsp' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'wpsp' ),
			'popular_items'              => __( 'Popular Categories', 'wpsp' ),
			'search_items'               => __( 'Search Categories', 'wpsp' ),
			'not_found'                  => __( 'Not Found', 'wpsp' ),
			'no_terms'                   => __( 'No categories', 'wpsp' ),
			'items_list'                 => __( 'Categories list', 'wpsp' ),
			'items_list_navigation'      => __( 'Categories list navigation', 'wpsp' ),
		);

		$args = array(
			'labels'                     => $labels,
			'description'                => __( 'New taxonomy for Recipes.', 'wpsp' ),
			'public'                     => true,
			'hierarchical'               => true,
			'show_in_rest'               => true,
			'show_tagcloud'              => false,
			'show_admin_column'          => true,
			'rewrite'                    => array( 'slug' => 'recepty-kategorie' ),
		);

		register_taxonomy( 'recipe_category', array( 'recipe' ), $args );

	}

	/* ------------------------------ SHORTCODES ------------------------------ */

	// Adds a shortcode for displaying personal information about the author.
	add_shortcode( 'author_bio', 'wpsp_shortcode_author_bio' );

	function wpsp_shortcode_author_bio() {
		ob_start();
		?>
			<p>
				<?php
					echo esc_html( get_the_author_meta( 'description' ) );
				?>
			</p>
		<?php
		return ob_get_clean();
	}
