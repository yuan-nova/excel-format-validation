<?php

namespace Yuannova\Excel;

use PhpOffice\PhpSpreadsheet\IOFactory;

class Validator {
    
    protected static $errors = [];
    protected static $rules = [];
    
    public static function validate($path, $format) {
        try {            
            self::$errors = [];
            self::$rules = [];
            $spreadsheet = IOFactory::load($path);
            $worksheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);            
            if ($format::isValidFormat($worksheet)) {
                $startRowData = $format::startRowData();
                $endRowData = count($worksheet);
                $listOfField = $format::listOfField();
                self::setRules($listOfField);
                for ($i = $startRowData; $i <= $endRowData; $i++) {
                    foreach($listOfField as $key => $field) {
                        $value = isset($worksheet[$i][$key]) ? $worksheet[$i][$key] : null;
                        $rules = isset(self::$rules[$key]) ? self::$rules[$key] : [];                                                
                        foreach ($rules as $rule) {
                            if (method_exists(Rules::class, $rule)) {
                                if (!Rules::$rule($value)) {
                                    self::$errors[$i][$key]['field'] = $field;
                                    self::$errors[$i][$key]['messages'][] = Rules::getMessage($rule, $field);
                                }
                            } else {
                                throw new \Exception('Unknown rule '.$rule);
                            }
                        }
                    }
                }
            }
            if (count(self::$errors) > 0) {
                return false;
            } else {
                return true;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public static function setRules($listOfField) {
        foreach ($listOfField as $key => $field) {            
            if (substr($field, 0, 1) == '#') {                
                self::$rules[$key][] = 'noSpace';
            }
            if (substr($field, -1) == '*') {
                self::$rules[$key][] = 'required';
            }
        }        
    }
    
    public static function errors() {
        return self::$errors;
    }
}