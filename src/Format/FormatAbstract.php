<?php

namespace Yuannova\Excel\Format;

abstract class FormatAbstract {
    
    abstract protected static function fieldRow(); 
    
    abstract protected static function numOfField();
    
    abstract public static function listOfField();
    
    abstract public static function startRowData();
    
    public static function isValidFormat($data) {     
        if (!isset($data[static::fieldRow()])) {
            throw new \Exception('Can\'t read field list');
        }
        $fieldList = $data[static::fieldRow()];                
        foreach ($fieldList as $key => $field) {
            if (!$field) {
                unset($fieldList[$key]);
            }
        }                    
        if (count($fieldList) <> static::numOfField()) {
            throw new \Exception('Invalid Num Of Field');
        }
        $listOfField = static::listOfField();        
        foreach ($fieldList as $key => $field) {
            if ($field) {
                if (!isset($listOfField[$key])) {
                    throw new \Exception('Invalid field format');
                }
                if ($listOfField[$key] <> $field) {
                    throw new \Exception('Unknown field '.$listOfField[$key]);
                }
            }
        }
        return true;
    }
}