<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://juzhax.com
 * @since             1.0.0
 * @package           Wp_Updater
 *
 * @wordpress-plugin
 * Plugin Name:       WP Updater
 * Plugin URI:        https://juzhax.com
 * Description:       A plugin for Wordpress to update from GitHub with personal access token
 * Version:           1.0.2
 * Author:            juzhax
 * Author URI:        https://juzhax.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-updater
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( is_admin() ) {
    $settings = get_option( 'wp_juzhax_update' );
    // $this->username = $settings['username'];
    // $this->repo = $settings['git'];
    // $this->access_token = $settings['password'];
    if (isset($settings['password']) && $settings['password']) {
        require_once plugin_dir_path( __FILE__ ) . 'updater.php';
        $updater = new Wp_Updater(__FILE__);
        $updater->set_username( 'juzhax' );
        $updater->set_repository( 'wp-updater' );
        $updater->set_settings();
        $updater->authorize($settings['password']);
        $updater->initialize();
    } 
}