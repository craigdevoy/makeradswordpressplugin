<?php
   /*
   Plugin Name: MakerAds
   Plugin URI: https://makerads.xyz/
   description: Unobtrusive adverts for makers. Together we can reach more users. Use [makerads] to show ads.
   Version: 0.1
   Author: Craig Devoy, for James & Danielle
   Author URI: https://craigdevoy.com/
   License: GPL2
   */


	function makerads() {

		return '<iframe style="border:0;width:320px;height:144px;" src="https://makerads.xyz/ad"></iframe>';

	}
	add_shortcode( 'makerads', 'makerads' );
?>
