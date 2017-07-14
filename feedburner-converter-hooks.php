<?php 

if (!is_admin()) {
	add_filter('author_feed_link',			'fbc_convert', 11);
	add_filter('category_feed_link',		'fbc_convert', 11);
	add_filter('feed_link',					'fbc_convert', 11);
	add_filter('post_comments_feed_link',	'fbc_convert', 11);
	add_filter('tag_feed_link',				'fbc_convert', 11);
}


if (is_admin()) {
	add_action('admin_menu', 			'fbc_manage_options_menu');
	add_filter('plugin_action_links', 	'fbc_plugin_action_links', 10, 2);
}