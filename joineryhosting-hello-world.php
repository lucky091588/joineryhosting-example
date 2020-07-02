<?php
/**
 * Joineryhosting Hello World Plugin is the simplest WordPress plugin for beginner.
 * Take this as a base plugin and modify as per your need.
 *
 * @package Joineryhosting Hello World Plugin
 * @author Joineryhosting
 * @license GPL-2.0+
 * @link 
 * @copyright 2017 Joineryhosting, LLC. All rights reserved.
 *
 *            @wordpress-plugin
 *            Plugin Name: Joineryhosting Hello World Plugin
 *            Plugin URI: 
 *            Description: Joineryhosting Hello World Plugin is the simplest WordPress plugin for beginner. Take this as a base plugin and modify as per your need.
 *            Version: 3.0
 *            Author: Joineryhosting
 *            Author URI: 
 *            Text Domain: joineryhosting-hello-world
 *            Contributors: Joineryhosting
 *            License: GPL-2.0+
 *            License URI: 
 */

/**
 * Enqueue Admin Css in Plugin Settings Page
 *
 * @since 1.0
 */
function enqueue_admin_style($hook_suffix) {
  if($hook_suffix === 'settings_page_joineryhosting-hello-world') {
    wp_register_style('joineryhosting-css', plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('joineryhosting-css');
  }
}
add_action( 'admin_enqueue_scripts','enqueue_admin_style');
 
/**
 * Adding Submenu under Settings Tab
 *
 * @since 1.0
 */
function joineryhosting_add_menu() {
  add_submenu_page ( "options-general.php", "Joineryhosting Plugin", "Joineryhosting Plugin", "manage_options", "joineryhosting-hello-world", "joineryhosting_hello_world_page" );
}
add_action ( "admin_menu", "joineryhosting_add_menu" );
 
/**
 * Setting Page Options
 * - add setting page
 * - save setting page
 *
 * @since 1.0
 */
function joineryhosting_hello_world_page() {
  include 'templates/page.php';
}
 
/**
 * Init setting section, Init setting field and register settings page
 *
 * @since 1.0
 */
function joineryhosting_hello_world_settings() {
  add_settings_section ( "joineryhosting_hello_world_config", "", null, "joineryhosting-hello-world" );
  add_settings_field ( "joineryhosting-hello-world-text", "This is sample Textbox", "joineryhosting_hello_world_options", "joineryhosting-hello-world", "joineryhosting_hello_world_config" );
  register_setting ( "joineryhosting_hello_world_config", "joineryhosting-hello-world-text" );
}
add_action ( "admin_init", "joineryhosting_hello_world_settings" );
 
/**
 * Add simple textfield value to setting page
 *
 * @since 1.0
 */
function joineryhosting_hello_world_options() {
  include 'templates/options.php';
}
 
/**
 * Append saved textfield value to each post
 *
 * @since 1.0
 */
add_filter ( 'wp_footer', 'joineryhosting_com_content' );
function joineryhosting_com_content() {
  echo '<div class="joineryhosting">'.get_option( 'joineryhosting-hello-world-text' ).'</div>';
}