<?php
/*
Plugin Name: Simple Countdown button
Plugin URI: https://github.com/ashikishere
Description: A plugin to show a countdown before open any file or link with full customization 
Version: 1.0
Author: Az Ashik
Author URI: https://github.com/ashikishere
*/

class Countdown_Download_Plugin {
  public function __construct() {
    add_shortcode('countdown_download', [$this, 'shortcode']);
    add_action('admin_menu', [$this, 'add_options_page']);
    add_action('admin_init', [$this, 'register_settings']);
  }

  public function shortcode($atts) {
    $atts = shortcode_atts([
      'link' => '',
    ], $atts);

    wp_enqueue_style('countdown-download', plugins_url('css/countdown-download.css', __FILE__));
    wp_enqueue_script('countdown-download', plugins_url('js/countdown-download.js', __FILE__), ['jquery']);
    wp_localize_script('countdown-download', 'countdown_download', [
      'countdown' => get_option('countdown_download_countdown', 10),
    ]);

    return '<button id="countdown-download-button" class="countdown-download-button-style" data-link="' . esc_url($atts['link']) . '">Download</button>';
  }

  public function add_options_page() {
    add_options_page(
      'Countdown Download',
      'Countdown Download',
      'manage_options',
      'countdown-download',
      [$this, 'options_page']
    );
  }

  public function options_page() {
    if (!current_user_can('manage_options')) {
      wp_die('You do not have sufficient permissions to access this page.');
    }
    include 'countdown-download-options.php';
  }

  public function register_settings() {
    register_setting('countdown_download_options', 'countdown_download_countdown');
  }
}

new Countdown_Download_Plugin();
