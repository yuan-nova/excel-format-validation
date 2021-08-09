<?php

namespace Yuannova\Excel\Format;

class TypeA extends FormatAbstract {
   
    public static function fieldRow() {
        return 1;
    }    
    
    protected static function numOfField() {
        return 5;
    }    
    
    public static function listOfField() {
        return [
            'A' => 'Field_A*',
            'B' => '#Field_B',
            'C' => 'Field_C',
            'D' => 'Field_D*',
            'E' => 'Field_E*'
        ];
    }
    
    public static function startRowData() {
        return 2;
    }
}