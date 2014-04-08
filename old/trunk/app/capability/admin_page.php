<?php

namespace factlink\capability;

class AdminPage extends \vg\wordpress_plugin\capability\Capability
{
    /***
     * @var \factlink\model\Settings
     */
    public $settings;

    public function initialize()
    {
        $parent_slug = $this->settings->menu_parent_slug;
        $page_title = $this->settings->menu_page_title;
        $menu_title = $this->settings->menu_title;
        $capability = $this->settings->menu_capability;
        $menu_slug = $this->settings->menu_slug;

        $render_callback = array($this, 'admin_page_requested');

        // create a sub-level menu in the wordpress admin menu (wp-admin)
        // sub-level means below an existing menu item
        add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $render_callback);

        // register the options that can be updated through the view
        // needs to be called, otherwise the settings won't register and a strange page will be displayed
        $this->settings->enabled_for_pages->register();
        $this->settings->enabled_for_posts->register();
        $this->settings->disable_global_comments->register();
    }

    public function admin_page_requested()
    {
        // set the option group, doesn't really matter which setting is used
        $this->option_group = $this->settings->enabled_for_posts->group;
        $this->render();
    }
}
