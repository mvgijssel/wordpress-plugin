<?php
/**
 * @package Test_Plugin
 * @version 0.1
 */
/*
Plugin Name: Test Plugin
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Plugin for testing the wordpress-plugin framework
Author: Maarten van Gijssel
Version: 0.1
Author URI: http://localhost*/

// require the composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

$t = new vg\Test();