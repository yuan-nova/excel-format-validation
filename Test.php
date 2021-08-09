<?php
require_once __DIR__ .'/vendor/autoload.php';

use Yuannova\Excel\Validator;
use Yuannova\Excel\Format\TypeA;
use Yuannova\Excel\Format\TypeB;

if (!Validator::validate('excel/Type_A.xlsx', TypeA::class)) {
    $errors = Validator::errors();
    foreach ($errors as $row => $error) {
        $rowMessage = [];        
        foreach ($error as $key => $messages) {
            $rowMessage = array_merge($rowMessage, $messages['messages']);
        }
        echo 'Row '.$row.' : '.implode(', ', $rowMessage).'<br>';
    }
}


if (!Validator::validate('excel/Type_B.xlsx', TypeB::class)) {
    $errors = Validator::errors();
    foreach ($errors as $row => $error) {
        $rowMessage = [];        
        foreach ($error as $key => $messages) {
            $rowMessage = array_merge($rowMessage, $messages['messages']);
        }
        echo 'Row '.$row.' : '.implode(', ', $rowMessage).'<br>';
    }
}