<?php namespace BSU\Staff;

use WP_Query;

class View {

	private $data;

	public function __construct()
	{
		$this->data = new Data();
		add_shortcode( $this->data->shortcodeName, array($this, 'listStaff') );
	}

	public function listStaff()
	{
		$query = new WP_Query( array(
			'post_type' => $this->data->shortcodeName,
			'post_status' => 'publish',
			'orderby' => array(
				'menu_order' => 'DESC',
				'post_title' => 'ASC',
			),
			'order' => 'ASC',
			'posts_per_page' => -1
		) );
		return $this->getParsedTemplate('display.php', array(
			'css' => $this->getResource('staff.css'),
			'script' => $this->getResource('staff.js'),
			'allStaff' => $query->posts
		));
	}

	public function printMetaBox( $post, $metabox )
	{
		$css = $this->getResource('staff.css');
		echo $this->getParsedTemplate('form.php', array(
			'css' => $css,
			'post' => $post,
			'metabox' => $metabox,
			'status' => get_post_meta($post->ID, 'status', true)
		));
	}

	private function getParsedTemplate( $filename, $data = array() )
	{
		ob_start();
		extract( $data );
		include( $this->data->templateDirectory . $filename );
		$file = ob_get_contents();
		ob_end_clean();

		return $file;
	}

	private function getResource($fileName)
	{
		return network_site_url() . '/wp-content/plugins/bsu_staff_wp/resources/' . $fileName . '?v=' .
		       $this->data->version;
	}

}