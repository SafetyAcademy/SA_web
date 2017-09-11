<?php

namespace App\Models;

class APIModel {
    private function createProperty($name, $value) {
        $this->{$name} = $value;
    }

    public function deserialize($response, $fields) {
        $func_or_value = function($var) {
            return is_callable($var) ? $var() : $var;
        };

        foreach ($fields as $rKey => $mKey) {
            // TODO add checks
            $value = null;
            $default = null;

            if (is_array($mKey)) {
                $key = $mKey['field'];
                $key_name = isset($mKey['value']) ? 'value' : 'default';
                $value = $func_or_value($mKey[$key_name]);
            } else {
                $key = $mKey;
                $value = isset($response->{$rKey}) ? $response->{$rKey} : $default;
            }

            $this->createProperty($key, $value);
        }
    }
}
