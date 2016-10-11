<?php namespace BSU\Staff;


class StaffPlugin {
	private $view;
	private $data;

	public function __construct() {
		$this->view = new View();
		$this->data = new Data();

		// Initialize plugin
		add_action( 'init', array($this, 'init') );
		// Create our fields
		add_action( 'add_meta_boxes', array( $this, 'createMetaBox' ) );
		// Save our fields on post save
		add_filter( 'save_post', array( $this, 'saveMetaBox' ));
	}

	public function createMetaBox() {
		add_meta_box(
			'staff_info_meta_box',
			__( 'Staff Details', $this->data->shortcodeName ),
			array( $this->view, 'printMetaBox' ),
			$this->data->shortcodeName,
			'normal'
		);
	}

	public function saveMetaBox( $post_id) {
		// Don't auto-save, check if values are empty
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return null;
		if( empty( $_POST['meta_box_ids'] ) ) return null;

		foreach( $_POST['meta_box_ids'] as $metabox_id ){
			// Verify and check if anything needs saved
			if( ! wp_verify_nonce( $_POST[ $metabox_id . '_nonce' ], 'save_' . $metabox_id ) ) continue;
			if( count( $_POST[ $metabox_id . '_fields' ] ) == 0 ) continue;

			// Save each value
			foreach( $_POST[ $metabox_id . '_fields' ] as $field_id ){
				update_post_meta($post_id, $field_id, $_POST[ $field_id ]);
			}
		}
	}

	public function init() {
		$labels = array(
			'name' => _x( 'Staff Manager', $this->data->shortcodeName ),
			'singular_name' => _x( 'Staff', $this->data->shortcodeName ),
			'add_new' => _x( 'Add New', $this->data->shortcodeName ),
			'add_new_item' => _x( 'Add New Staff', $this->data->shortcodeName ),
			'edit_item' => _x( 'Edit Staff', $this->data->shortcodeName ),
			'new_item' => _x( 'New Staff', $this->data->shortcodeName ),
			'view_item' => _x( 'View Staff', $this->data->shortcodeName ),
			'search_items' => _x( 'Search Staff', $this->data->shortcodeName ),
			'not_found' => _x( 'No staff found', $this->data->shortcodeName ),
			'not_found_in_trash' => _x( 'No staff found in Trash', $this->data->shortcodeName ),
			'menu_name' => _x( 'Staff', $this->data->shortcodeName ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'List staff with details',
			'supports' => array( 'title', 'thumbnail', 'revisions', 'page-attributes' ),
			'taxonomies' => array(),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_icon' => 'dashicons-businessman',
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'has_archive' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post'
		);

		register_post_type( $this->data->shortcodeName, $args );
	}
}