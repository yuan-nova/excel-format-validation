<?php

namespace Yuan\Excel\Format\Validation;

use PhpOffice\PhpSpreadsheet\IOFactory;

class Validator {
    
    public static function test() {
        $spreadsheet = IOFactory::load(base_path('excel/Type_A.xlsx'));
        $worksheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        var_dump($worksheet);
    }
}