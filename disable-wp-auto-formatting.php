<?php
/**
 * Disable WP Auto Formatting
 *
 * @package    Disable_WP_Auto_Formatting
 * @author     Craig Simpson <csimps@gmail.com>
 * @license    GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Disable WP Auto Formatting
 * Plugin URI:        https://github.com/craigsimps/disable-wp-auto-formatting
 * Description:       A simple plugin which turns off the markdown-style auto formatting introduced in WP4.3.
 * Version:           1.0.0
 * Author:            Craig Simpson
 * Text Domain:	      disable-wp-auto-formatting
 * Domain Path	      /languages
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: craigsimps/disable-wp-auto-formatting
 * GitHub Plugin URI: https://github.com/craigsimps/disable-wp-auto-formatting
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'tiny_mce_before_init', 'disable_mce_wptextpattern' );
/**
 * Simple function to remove the 'wptextpattern' option from the $opt array.
 *
 * @param $opt
 * @return mixed
 */
function disable_mce_wptextpattern( $opt ) {

	if ( isset( $opt['plugins'] ) && $opt['plugins'] ) {
		$opt['plugins'] = explode( ',', $opt['plugins'] );
		$opt['plugins'] = array_diff( $opt['plugins'] , array( 'wptextpattern' ) );
		$opt['plugins'] = implode( ',', $opt['plugins'] );
	}

	return $opt;
}
