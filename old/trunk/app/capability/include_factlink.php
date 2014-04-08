<?php

namespace factlink\capability;

class IncludeFactlink extends \vg\wordpress_plugin\capability\Capability
{
    /***
     * inject the model:
     * @var \factlink\model\Settings
     */
    public $settings;

    public function initialize()
    {
        $id = get_queried_object_id();

        if ($this->settings->is_enabled_for_post($id))
        {
            $this->render();
        }
    }
}
