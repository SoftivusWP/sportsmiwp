<?php
class TpEventPost
{
	function __construct()
	{
		add_action('init', array($this, 'register_custom_post_type'));
		add_action('init', array($this, 'create_cat'));
		add_filter('template_include', array($this, 'event_template_include'));
	}

	public function event_template_include($template)
	{
		if (is_singular('event')) {
			return $this->get_template('single-event.php');
		}
		return $template;
	}

	public function get_template($template)
	{
		if ($theme_file = locate_template(array($template))) {
			$file = $theme_file;
		} else {
			$file = TPCORE_ADDONS_DIR . '/include/template/' . $template;
		}
		return apply_filters(__FUNCTION__, $file, $template);
	}


	public function register_custom_post_type()
	{
		$event_slug = get_theme_mod('event_slug', __('event', 'sportsmi'));
		$labels = array(
			'name'                  => esc_html_x($event_slug, ' Post Type General Name', 'sportsmi'),
			'singular_name'         => esc_html_x('Service', 'Post Type Singular Name', 'sportsmi'),
			'menu_name'             => esc_html__($event_slug, 'sportsmi'),
			'name_admin_bar'        => esc_html__('Event', 'sportsmi'),
			'archives'              => esc_html__('Item Archives', 'sportsmi'),
			'parent_item_colon'     => esc_html__('Parent Item:', 'sportsmi'),
			'all_items'             => esc_html__('All Items', 'sportsmi'),
			'add_new_item'          => esc_html__('Add New Event', 'sportsmi'),
			'add_new'               => esc_html__('Add New', 'sportsmi'),
			'new_item'              => esc_html__('New Item', 'sportsmi'),
			'edit_item'             => esc_html__('Edit Item', 'sportsmi'),
			'update_item'           => esc_html__('Update Item', 'sportsmi'),
			'view_item'             => esc_html__('View Item', 'sportsmi'),
			'search_items'          => esc_html__('Search Item', 'sportsmi'),
			'not_found'             => esc_html__('Not found', 'sportsmi'),
			'not_found_in_trash'    => esc_html__('Not found in Trash', 'sportsmi'),
			'featured_image'        => esc_html__('Featured Image', 'sportsmi'),
			'set_featured_image'    => esc_html__('Set featured image', 'sportsmi'),
			'remove_featured_image' => esc_html__('Remove featured image', 'sportsmi'),
			'use_featured_image'    => esc_html__('Use as featured image', 'sportsmi'),
			'inserbt_into_item'     => esc_html__('Insert into item', 'sportsmi'),
			'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'sportsmi'),
			'items_list'            => esc_html__('Items list', 'sportsmi'),
			'items_list_navigation' => esc_html__('Items list navigation', 'sportsmi'),
			'filter_items_list'     => esc_html__('Filter items list', 'sportsmi'),
		);

		$args   = array(
			'label'                 => esc_html__('Event', 'tpcore'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-shield',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite' => array(
				'slug' => $event_slug,
				'with_front' => false
			),
		);

		register_post_type('event', $args);
	}

	public function create_cat()
	{
		$event_slug = get_theme_mod('event_slug', __('event', 'sportsmi'));
		$taxonomy_slug = $event_slug . '-cat';
		$labels = array(
			'name'                       => esc_html_x($event_slug . 'Categories', 'Taxonomy General Name', 'sportsmi'),
			'singular_name'              => esc_html_x('Category', 'Taxonomy Singular Name', 'sportsmi'),
			'menu_name'                  => esc_html__('Categories', 'sportsmi'),
			'all_items'                  => esc_html__('All ' . $event_slug . ' Categories', 'sportsmi'),
			'parent_item'                => esc_html__('Parent ' . $event_slug . ' Category', 'sportsmi'),
			'parent_item_colon'          => esc_html__('Parent ' . $event_slug . ' Category:', 'sportsmi'),
			'new_item_name'              => esc_html__('New ' . $event_slug . ' Category Name', 'sportsmi'),
			'add_new_item'               => esc_html__('Add New ' . $event_slug . ' Category', 'sportsmi'),
			'edit_item'                  => esc_html__('Edit ' . $event_slug . ' Category', 'sportsmi'),
			'update_item'                => esc_html__('Update ' . $event_slug . ' Category', 'sportsmi'),
			'view_item'                  => esc_html__('View ' . $event_slug . ' Category', 'sportsmi'),
			'separate_items_with_commas' => esc_html__('Separate ' . $event_slug . ' categories with commas', 'sportsmi'),
			'add_or_remove_items'        => esc_html__('Add or remove ' . $event_slug . ' categories', 'sportsmi'),
			'choose_from_most_used'      => esc_html__('Choose from the most used ' . $event_slug . ' categories', 'sportsmi'),
			'popular_items'              => esc_html__('Popular ' . $event_slug . ' Categories', 'sportsmi'),
			'search_items'               => esc_html__('Search ' . $event_slug . ' Categories', 'sportsmi'),
			'not_found'                  => esc_html__('Not Found', 'sportsmi'),
			'no_terms'                   => esc_html__('No ' . $event_slug . ' categories', 'sportsmi'),
			'items_list'                 => esc_html__($event_slug . ' categories list', 'sportsmi'),
			'items_list_navigation'      => esc_html__($event_slug . ' categories list navigation', 'sportsmi'),
		);


		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'           => array(
				'slug'       => $taxonomy_slug,
				'with_front' => false,
			),
		);

		register_taxonomy('event-cat', 'event', $args);
	}
}

new TpEventPost();
