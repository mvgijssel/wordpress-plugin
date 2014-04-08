<?php

namespace vg\wordpress_plugin\model\meta;

class Option extends Meta
{
    public $name;
    public $group;

    public function __construct($name, $group, $default_value, $validators, $model)
    {
        parent::__construct($name, $default_value, $validators, $model);
        $this->group = $group;
    }

    public function register()
    {
        // register the setting within wordpress, otherwise the setting cannot be saved to the wordpress database
        register_setting($this->group, $this->name(), array($this, 'sanitize'));
    }

    public function sanitize($value)
    {
        if (!is_array($this->validators)) {
            $message = "The validators for '$this->name'' isn't an array.";
            $html_id = 'html_id_1';
            $type = 'error'; // or updated

            add_settings_error($this->name(true), $html_id, $message, $type);
        }

        if (!count($this->validators)) {
            $message = "You didn't define any validators for '$this->name''";
            $html_id = 'html_id_1';
            $type = 'error'; // or updated

            add_settings_error($this->name(true), $html_id, $message, $type);
        }

        // validate the value with the validators, returns true OR array with error messages
        $messages = $this->model->validate($value, $this->validators);

        if (is_array($messages)) {
            $html_id = 'validation_error_';
            $type = 'error';

            for ($i = 0; $i < count($messages); $i++) {
                add_settings_error($this->name(true), $html_id . $i, $messages[$i], $type);
            }
        }

        // if there are any errors return the previous value, because the value gets always updated
        if (count(get_settings_errors())) {
            return $this->get();
        } else {
            return $value;
        }
    }

    protected function get_value()
    {
        return get_option($this->name());
    }

    protected function set_value($value)
    {
        return update_option($this->name(true), $value);
    }
}
