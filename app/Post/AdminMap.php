<?php
namespace SimpleLocator\Post;

use SimpleLocator\Repositories\SettingsRepository;

/**
* Display a map of locations in the admin listing above the table
*/
class AdminMap
{
	/**
	* Settings Repository
	*/
	private $settings;

	/**
	* The location post type
	*/
	private $post_type;

	public function __construct()
	{
		if ( !is_admin() ) return;
		$this->settings = new SettingsRepository;
		if ( !$this->settings->includeAdminListMap() ) return;
		$this->post_type = $this->settings->getLocationPostType();
		$location_columns = $this->post_type . '_columns';
		$location_custom_columns = $this->post_type . '_posts_custom_column';
		add_filter("manage_edit-$location_columns", [$this, 'addColumn']);
		add_action("manage_$location_custom_columns", [$this, 'setColumnData'], 10, 2);
	}

	/**
	* Add a hidden column to store the map data in for each post
	*/
	public function addColumn($columns)
	{
		$columns['wpsl-coordinates'] = 'Location';
		return $columns;
	}

	/**
	* Add the custom column data
	*/
	public function setColumnData($column, $post_id)
	{
		if ( $column !== 'wpsl-coordinates' ) return;
		$meta = get_post_meta($post_id);
		if ( !isset($meta['wpsl_latitude']) || !isset($meta['wpsl_longitude']) ) return;
		$latitude = $meta['wpsl_latitude'][0];
		$longitude = $meta['wpsl_longitude'][0];
		$edit_link = get_edit_post_link($post_id);
		$view_link = get_the_permalink($post_id);
		if ( $latitude == '' || $longitude == '' ) return;
		echo '<a href="#" data-wpsl-listing-post-id="' . $post_id . '" data-wpsl-post-title="' . get_the_title($post_id) . '" data-wpsl-edit-link="' . $edit_link . '" data-wpsl-view-link="' . $view_link . '" data-wpsl-listing-map-link="" data-wpsl-post-latitude="' . $latitude . '" data-wpsl-post-longitude="' . $longitude . '">' . __('View on Map', 'simple-locator') . '</a>';
	}
}