<?php

namespace vg\wordpress_plugin\validator;

class Validator
{
    public function error_message($value)
    {
        throw new \Exception("Validator: error_message method should be overridden.");
    }

    public function validate($value)
    {
        throw new \Exception("Validator: is_valid method should be overridden.");
    }
}
