<?php

namespace Yuannova\Excel\Format;

class TypeB extends FormatAbstract {
   
    public static function fieldRow() {
        return 1;
    }    
    
    protected static function numOfField() {
        return 2;
    }    
    
    public static function listOfField() {
        return [
            'A' => 'Field_A*',
            'B' => '#Field_B'
        ];
    }
    
    public static function startRowData() {
        return 2;
    }
}