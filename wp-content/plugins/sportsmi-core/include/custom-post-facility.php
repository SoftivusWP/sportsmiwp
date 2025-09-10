<?php
class TpFacilityPost
{
	function __construct()
	{
		add_action('init', array($this, 'register_custom_post_type'));
		add_action('init', array($this, 'create_cat'));
		add_filter('template_include', array($this, 'facility_template_include'));
	}

	public function facility_template_include($template)
	{
		if (is_singular('facility')) {
			return $this->get_template('single-facility.php');
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
		$facility_slug = get_theme_mod('facility_slug', __('facility', 'sportsmi'));
		$labels = array(
			'name'                  => esc_html_x($facility_slug, ' Post Type General Name', 'sportsmi'),
			'singular_name'         => esc_html_x('Service', 'Post Type Singular Name', 'sportsmi'),
			'menu_name'             => esc_html__($facility_slug, 'sportsmi'),
			'name_admin_bar'        => esc_html__('Facility', 'tpcore'),
			'archives'              => esc_html__('Item Archives', 'tpcore'),
			'parent_item_colon'     => esc_html__('Parent Item:', 'tpcore'),
			'all_items'             => esc_html__('All Items', 'tpcore'),
			'add_new_item'          => esc_html__('Add New Facility', 'tpcore'),
			'add_new'               => esc_html__('Add New', 'tpcore'),
			'new_item'              => esc_html__('New Item', 'tpcore'),
			'edit_item'             => esc_html__('Edit Item', 'tpcore'),
			'update_item'           => esc_html__('Update Item', 'tpcore'),
			'view_item'             => esc_html__('View Item', 'tpcore'),
			'search_items'          => esc_html__('Search Item', 'tpcore'),
			'not_found'             => esc_html__('Not found', 'tpcore'),
			'not_found_in_trash'    => esc_html__('Not found in Trash', 'tpcore'),
			'featured_image'        => esc_html__('Featured Image', 'tpcore'),
			'set_featured_image'    => esc_html__('Set featured image', 'tpcore'),
			'remove_featured_image' => esc_html__('Remove featured image', 'tpcore'),
			'use_featured_image'    => esc_html__('Use as featured image', 'tpcore'),
			'inserbt_into_item'     => esc_html__('Insert into item', 'tpcore'),
			'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'tpcore'),
			'items_list'            => esc_html__('Items list', 'tpcore'),
			'items_list_navigation' => esc_html__('Items list navigation', 'tpcore'),
			'filter_items_list'     => esc_html__('Filter items list', 'tpcore'),
		);

		$args   = array(
			'label'                 => esc_html__('Facility', 'tpcore'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-index-card',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite' => array(
				'slug' => $facility_slug,
				'with_front' => false
			),
		);

		register_post_type('facility', $args);
	}

	public function create_cat()
	{
		$facility_slug = get_theme_mod('facility_slug', __('facility', 'sportsmi'));
        $taxonomy_slug = $facility_slug . '-cat';
        $labels = array(
            'name'                       => esc_html_x($facility_slug . 'Categories', 'Taxonomy General Name', 'sportsmi'),
            'singular_name'              => esc_html_x('Category', 'Taxonomy Singular Name', 'sportsmi'),
            'menu_name'                  => esc_html__('Categories', 'sportsmi'),
            'all_items'                  => esc_html__('All ' . $facility_slug . ' Categories', 'sportsmi'),
            'parent_item'                => esc_html__('Parent ' . $facility_slug . ' Category', 'sportsmi'),
            'parent_item_colon'          => esc_html__('Parent ' . $facility_slug . ' Category:', 'sportsmi'),
            'new_item_name'              => esc_html__('New ' . $facility_slug . ' Category Name', 'sportsmi'),
            'add_new_item'               => esc_html__('Add New ' . $facility_slug . ' Category', 'sportsmi'),
            'edit_item'                  => esc_html__('Edit ' . $facility_slug . ' Category', 'sportsmi'),
            'update_item'                => esc_html__('Update ' . $facility_slug . ' Category', 'sportsmi'),
            'view_item'                  => esc_html__('View ' . $facility_slug . ' Category', 'sportsmi'),
            'separate_items_with_commas' => esc_html__('Separate ' . $facility_slug . ' categories with commas', 'sportsmi'),
            'add_or_remove_items'        => esc_html__('Add or remove ' . $facility_slug . ' categories', 'sportsmi'),
            'choose_from_most_used'      => esc_html__('Choose from the most used ' . $facility_slug . ' categories', 'sportsmi'),
            'popular_items'              => esc_html__('Popular ' . $facility_slug . ' Categories', 'sportsmi'),
            'search_items'               => esc_html__('Search ' . $facility_slug . ' Categories', 'sportsmi'),
            'not_found'                  => esc_html__('Not Found', 'sportsmi'),
            'no_terms'                   => esc_html__('No ' . $facility_slug . ' categories', 'sportsmi'),
            'items_list'                 => esc_html__($facility_slug . ' categories list', 'sportsmi'),
            'items_list_navigation'      => esc_html__($facility_slug . ' categories list navigation', 'sportsmi'),
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

		register_taxonomy('facility-cat', 'facility', $args);
	}
}

new TpFacilityPost();
