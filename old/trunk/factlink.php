<?php
/**
 * @package Factlink
 * @version 2.0
 */
/*
Plugin Name: Factlink for Wordpress
Plugin URI: https://factlink.com/
Description: Integrates the Factlink commenting & annotation tool in your Wordpress website
Author: Factlink
Version: 2.0
Author URI: https://factlink.com/
*/

// for protecting files from direct access
defined('ABSPATH') or die ('Cannot access pages directly.');

// load the wordpress plugin class using the wordpress url
include plugin_dir_path(__FILE__) . '/lib/wordpress_plugin_controller.php';

class Factlink extends WordpressPluginController
{
    // set the namespace used by the custom wordpress plugin
    public $namespace = 'factlink';

    // set prefix for the meta data models, gets prepended to database entries
    public $meta_prefix = 'factlink_';

    public function setup_capabilities()
    {
        // capability for displaying a notice when factlink isn't configured
        $this->add_capability('configuration_notice', 'admin_notices', array('manage_options'));

        // capability for adding a meta box to a blog or page edit page for enabling/disabling factlink
        $this->add_capability('meta_box', 'add_meta_boxes', array('manage_options'), 2);

        // create the factlink settings page
        $this->add_capability('admin_page', 'admin_menu', array('manage_options'));

        // add the actual factlink javascript code to wordpress
        $this->add_capability('include_factlink', 'wp_head');

        // disable the wordpress comment system
        $this->add_capability('disable_comments');
    }
}

// create and execute the factlink plugin
new Factlink();
