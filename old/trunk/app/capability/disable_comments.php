<?php

namespace factlink\capability;

class DisableComments extends \vg\wordpress_plugin\capability\Capability
{
    /***
     * inject:
     * @var \factlink\model\Settings
     */
    public $settings;

    public function initialize()
    {
        if ($this->settings->disable_global_comments->get() == 1) {
            // add a filter for when wordpress asks if comments are open for the current post
            add_filter('comments_open', array($this, 'disable_comments_filter'));
        }
    }

    // the return value determines if the comment is enabled / disabled for the current page
    public function disable_comments_filter()
    {
        return false;
    }
}
