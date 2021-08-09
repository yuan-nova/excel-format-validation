<?php

namespace Yuannova\Excel;

class Rules {
    
    protected static function message() {
        return [
            'required' => 'mising value in %s',
            'noSpace' => '%s should not contain any space'
        ];        
    }
    
    public static function getMessage($rule, $field) {
        $message = self::message();
        if (isset($rule)) {
            return sprintf($message[$rule], $field);
        } else {
            return 'Undefined message for '.$rule;
        }
    }
    
    public static function required($value) {
        if ($value == '') {
            return false;
        }
        return true;
    }
    
    public static function noSpace($value) {
        if (strpos($value, ' ') !== false) {
            return false;
        }
        return true;
    }
}