<?php 
/**
 * Generate options page
 */
function fbc_settings_page_render() {
	$feeds = get_option('fbc_feeds');
	?>
<style>
<!--
#fbc_form input[type=text]{
	width: 45em;
}
-->
</style>
<div id="fbc_form" class="wrap">
	<h2><?php _e('Feedburner converter configuration')?></h2>
	
	<form method="post" action="options.php">
		<?php if (!is_plugin_active('qtranslate/qtranslate.php')) :?>
		<p>
			<label><?php _e('Main feed RSS2') ?>: <i><?php echo fbc_get_feed_rss2(); ?></i><br />
			<input name="fbc_feeds[<?php echo fbc_get_feed_rss2(); ?>]" type="text" value="<?php echo $feeds[fbc_get_feed_rss2()]; ?>" />
			</label>
		</p>
		
		<p>
			<label><?php _e('Main feed Atom') ?>: <i><?php echo fbc_get_feed_atom(); ?></i><br />
			<input name="fbc_feeds[<?php echo fbc_get_feed_atom(); ?>]" type="text" value="<?php echo $feeds[fbc_get_feed_atom()]; ?>" />
			</label>
		</p>
		
		<p>
			<label><?php _e('Comments feed RSS2') ?>: <i><?php echo fbc_get_feed_comments_rss2(); ?></i><br />
			<input name="fbc_feeds[<?php echo fbc_get_feed_comments_rss2(); ?>]" type="text" value="<?php echo $feeds[fbc_get_feed_comments_rss2()]; ?>" />
			</label>
		</p>
		
		<p>
			<label><?php _e('Comments feed Atom') ?>: <i><?php echo fbc_get_feed_comments_atom(); ?></i><br />
			<input name="fbc_feeds[<?php echo fbc_get_feed_comments_atom(); ?>]" type="text" value="<?php echo $feeds[fbc_get_feed_comments_atom()]; ?>" />
			</label>
		</p>
		<?php else: ?>
		
			<?php 
			$qtlangs = qtrans_getSortedLanguages();
			foreach ($qtlangs as $lang): ?>
			
			<h3><?php echo qtrans_getLanguageName($lang); ?></h3>
			
			<p>
				<?php $feed = qtrans_convertURL(fbc_get_feed_rss2(), $lang, true); ?>
				<label><?php _e('Main feed RSS2') ?>: <i><?php echo $feed; ?></i><br />
				<input name="fbc_feeds[<?php echo $feed; ?>]" type="text" value="<?php echo $feeds[$feed]; ?>" />
				</label>
			</p>
			
			<p>
				<?php $feed = qtrans_convertURL(fbc_get_feed_atom(), $lang, true); ?>
				<label><?php _e('Main feed Atom') ?>: <i><?php echo $feed; ?></i><br />
				<input name="fbc_feeds[<?php echo $feed; ?>]" type="text" value="<?php echo $feeds[$feed]; ?>" />
				</label>
			</p>
			
			<p>
				<?php $feed = qtrans_convertURL(fbc_get_feed_comments_rss2(), $lang, true); ?>
				<label><?php _e('Comments feed RSS2') ?>: <i><?php echo $feed; ?></i><br />
				<input name="fbc_feeds[<?php echo $feed; ?>]" type="text" value="<?php echo $feeds[$feed]; ?>" />
				</label>
			</p>
			
			<p>
				<?php $feed = qtrans_convertURL(fbc_get_feed_comments_atom(), $lang, true); ?>
				<label><?php _e('Comments feed Atom') ?>: <i><?php echo $feed; ?></i><br />
				<input name="fbc_feeds[<?php echo $feed; ?>]" type="text" value="<?php echo $feeds[$feed]; ?>" />
				</label>
			</p>
			
			
			<?php endforeach; ?>
		
		<?php endif; ?>
	
		<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			<?php settings_fields( 'fbc_settings' )?>
		</p>
	</form>
	
	
	<p>
	<?php _e('If you think this plugin is useful for you. You can donate and contribute for the future maintenance works. Thank you.'); ?>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
	</form>
	</p>
	
</div>
<?php 
}

/**
 * Register form elements.
 */
function fbc_register_settings() {
	register_setting( 'fbc_settings', 'fbc_feeds' );
}

/**
 * Add to options menu.
 */
function fbc_manage_options_menu() {
	add_options_page('Feedburner converter', 'Feedburner converter', 'manage_options', __FILE__, 'fbc_settings_page_render');

	add_action( 'admin_init', 'fbc_register_settings' );
}



function fbc_plugin_action_links($links, $file){ // copied from aTranslate
	//Static so we don't call plugin_basename on every plugin row.
	static $this_plugin;
	if (!$this_plugin) $this_plugin = plugin_basename(dirname(__FILE__).'/feedburner-converter.php');

	if ($file == $this_plugin){
		$settings_link = '<a href="options-general.php?page=feedburner-converter/feedburner-converter-options-page.php">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}