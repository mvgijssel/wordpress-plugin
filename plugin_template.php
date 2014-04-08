<?php
/*
Plugin Name: Plugin Template
Plugin URI:
Description: Plugin tempate from the vg/wordpress-plugin-framework
Author: Maarten van Gijssel
Version: 0.1
Author URI: http://localhost/
*/

namespace vg\wordpress_framework_plugin;

// require the composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

class Controller
{
    function __construct()
    {
        // TODO: Implement __construct() method.
    }
}

function test_it()
{
    echo "<div class='updated'><p>You haven't configured Factlink yet! <a href='#'>Configure Factlink</a></p></div>";
}

$plugin = new Controller();

$plugin['configuration_notice'] = function(){ test_it(); };