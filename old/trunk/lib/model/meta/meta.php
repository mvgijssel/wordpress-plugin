<?php

namespace vg\wordpress_plugin\model\meta;

class Meta
{
    public $name;
    public $default_value;
    public $validators;
    public $prefix = '';

    protected $model;

    public function __construct($name, $default_value, $validators, $model)
    {
        $this->name = $name;
        $this->default_value = $default_value;
        $this->validators = $validators;
        $this->model = $model;
        $this->prefix = $this->model->meta_prefix;
    }

    public function get()
    {
        $args = func_get_args();

        // call the overridden method with all the passed arguments
        $value = call_user_func_array(array($this, 'get_value'), $args);

        // if the value validates, return the value, otherwise return the default value
        if ($this->validates($value) === true) {
            return $value;
        }
        else {

            $default = $this->default_value();

            // add the default value to the beginning of the to be called arguments on the setter
            array_unshift($args, $default);

            // try to set the default value
            $value = call_user_func_array(array($this, 'set'), $args);

            if ($value === false) {
                throw new \Exception("Meta: unable to set the default value '$default' of field '$this->name'");
            }

            return $default;
        }
    }

    public function set($value)
    {
        if ($this->validates($value) === true) {
            // call the child class method, which determines if setting is succesfull or fails
            $value = call_user_func_array(array($this, 'set_value'), func_get_args());
            return $value;
        } else {
            return false;
        }
    }

    public function name($with_prefix = true)
    {
        if ($with_prefix) {
            return $this->prefix . $this->name;
        } else {
            return $this->name;
        }
    }

    protected function default_value()
    {
        return $this->default_value;
    }

    protected function validates($value)
    {
        return $this->model->validate($value, $this->validators);
    }
}
