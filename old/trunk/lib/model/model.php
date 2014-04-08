<?php

namespace vg\wordpress_plugin\model;

class Model
{
    public $plugin;
    public $meta_prefix;

    public function __construct()
    {
        $this->options = array();
    }

    // stub methods
    public function activate()
    {
        // can be overridden by the child class
    }
    public function deactivate()
    {
        // can be overridden by the child class
    }
    public function initialize()
    {

        throw new \Exception("Model: initialize method should be overridden.");
    }

    // create a new post meta model which interacts with the metadata of the wordpress post database table
    protected function create_post_meta($meta_type, $meta_field_name, $default_value, $validators)
    {
        $meta = new meta\Post($meta_field_name, $meta_type, $default_value, $validators, $this);
        return $meta;
    }

    // create a new option meta model which interacts with the metadata of the wordpress options database table
    protected function create_option_meta($option_name, $option_group, $default_value, $validators)
    {
        $option = new meta\Option($option_name, $option_group, $default_value, $validators, $this);
        return $option;
    }

    // validate a value using the passed validators
    // returns true on success
    // returns $messages array on fail
    public function validate($value, $validators)
    {
        $messages = array();

        for ($i = 0; $i < count($validators); $i++) {

            $validator = $this->get_validator($validators[$i]);

            if ($validator->validate($value) === false) {

                $messages[] = $validator->error_message($value);
            }
        }

        if (count($messages)) {
            return $messages;
        } else {
            return true;
        }
    }

    private static $loaded_validators = array();

    // get a validator instance by name
    private function get_validator($validator_name)
    {
        if (array_key_exists($validator_name, Model::$loaded_validators)) {
            return Model::$loaded_validators[$validator_name];
        } else {

            $validator = $this->plugin->instantiate_validator($validator_name);

            Model::$loaded_validators[$validator_name] = $validator;

            return $validator;
        }
    }
}
