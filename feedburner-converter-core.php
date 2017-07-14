<?php 
/**
 * Get default feed and convert to user defined value.
 * @param string $val feed url
 */
function fbc_convert( $url ) {
	// get defined values
	$urls = fbc_get_values();

	// search is current are defined
	if (!isset($urls[$url]) || empty($urls[$url])) {
		return $url;
	}

	// convert
	return $urls[$url];
}



/**
 * Get saved feed values.
 * @return string
 */
function fbc_get_values() {
	$urls = get_option('fbc_feeds');

	return $urls;
}

function fbc_get_feed_rss2() {
	$feed = get_bloginfo('rss2_url');
	
	return $feed;
}

function fbc_get_feed_atom() {
	$feed = get_bloginfo('atom_url');

	return $feed;
}

function fbc_get_feed_comments_rss2() {
	$feed = get_bloginfo('comments_rss2_url');
	
	return $feed;
}

function fbc_get_feed_comments_atom() {
	$feed = get_bloginfo('comments_atom_url');

	return $feed;
}