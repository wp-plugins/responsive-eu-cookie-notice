<?php
if (!is_admin()) {
    die();
}
?><div class="wrap">
<h2><?php _e('Responsive EU Cookie Notice','responsive_notice'); ?></h2>
<form method="post" action="options.php">
<?php
echo settings_fields( 'responsive_notice' );
?>
<table class="form-table">
    <tr valign="top">
            <th scope="row"><label for="id_rn_enabled"><?php _e('Enabled','responsive_notice'); ?>: 
            </label></th>
	    <td><input type="checkbox" id="id_rn_enabled" name="rn_enabled" value="1" <?php if( "1" == get_option('rn_enabled')) echo 'checked="checked"'; ?>>
	</tr>
	<tr valign="top">
            <th scope="row"><label for="id_rn_content"><?php _e('Contents (HTML Allowed)','responsive_notice'); ?>: 
            </label></th>
	    <td><textarea id="id_rn_content" name="rn_content"><?php 
	        if (strlen(get_option('rn_content')) > 0) {
    	        echo get_option('rn_content'); 
    	    } else {
    	        echo "<div style=\"text-align: center;\"><p>".__('This website uses cookies to ensure that you get the best possible experience.','responsive_notice').sprintf(" <a href=\"%s\">".__('More Info','responsive_notice')."</a>", get_bloginfo ('url').'/privacy-terms')."</p></div>";
    	    }
	    ?></textarea>
	</tr>
	<tr valign="top">
            <th scope="row"><label for="id_rn_bgcolor"><?php _e('Background Color','responsive_notice'); ?>: 
            </label></th>
	    <td><input id="id_rn_bgcolor" name="rn_bgcolor" value="<?php echo get_option('rn_bgcolor'); ?>">
	</tr>
	<tr valign="top">
            <th scope="row"><label for="id_rn_textcolor"><?php _e('Text Color','responsive_notice'); ?>: 
            </label></th>
	    <td><input id="id_rn_textcolor" name="rn_textcolor" value="<?php echo get_option('rn_textcolor'); ?>">
	</tr>
    </table>
	<input id="id_rn_hide_days" type="hidden" name="rn_hide_days" value="<?php echo get_option('rn_hide_days'); ?>">
    <?php submit_button(); ?>
</form>
</div>
