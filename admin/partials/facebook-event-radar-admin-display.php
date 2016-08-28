<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.facebook.com/mjavascript
 * @since      1.0.0
 *
 * @package    Facebook_Event_Radar
 * @subpackage Facebook_Event_Radar/admin/partials
 */
?>

<div class="wrap">

	<form method="post">

	<h2>Event Radar Settnigs</h2>

	<div class="card">
		<h3 class="title">Google Map</h3>
		<hr/>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="google_key">API Key</label>
				</th>
				<td>
					<input name="google_key" type="text" id="google_key" class="regular-text" value="<?php echo $settings['google_key']; ?>"/>
				</td>
			</tr>
		</table>
	</div>

	<div class="card">		
		<h3 class="title">Facebook</h3>
		<hr/>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="facebook_appId">App ID</label>
				</th>
				<td>
					<input name="facebook_appId" type="text" id="facebook_appId" class="regular-text" value="<?php echo $settings['facebook_appId']; ?>" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="facebook_secret">Secret Key</label>
				</th>
				<td>
					<input name="facebook_secret" type="text" id="facebook_secret" class="regular-text" value="<?php echo $settings['facebook_secret']; ?>"/>
				</td>
			</tr>
		</table>
	</div>

	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
	<input type="hidden" name="action" value="save_settings" />

	</form>










</div>