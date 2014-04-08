<?php

namespace vg\wordpress_plugin\capability;

class Capability
{
    protected $wordpress_plugin;
    protected $name;

    public function __construct($wordpress_plugin, $name)
    {
        $this->wordpress_plugin = $wordpress_plugin;
        $this->name = $name;
    }

    public function render($view_name = null)
    {
        if ($view_name === null || $view_name === "" || $view_name === false) {
            $view_name = $this->name;
        }

        // rendering the view is just including the file
        $file_path = $this->wordpress_plugin->view_path . "$view_name.php";
        include $file_path;
    }
}
