<?php

namespace vg\wordpress_plugin\validator;

class Int extends Validator
{
    public function error_message($value)
    {
        return "The value '$value' should be an int";
    }

    public function validate($value)
    {
        $ival = intval($value);

        return ('' . $ival === '' . $value);
    }
}
