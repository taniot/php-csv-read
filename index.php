<?php

$file_stream = __DIR__.'/houses.csv';

$labels = [];
$result = [];

$row = 1;
if (($handle = fopen($file_stream , "r")) !== FALSE) {

    while (($data = fgetcsv($handle)) !== FALSE) {

        $current_row = [];
        if($row === 1){
            foreach($data as $label){
                $labels[] = trim(strtolower($label));
            } 
        } else {
            foreach($data as $key => $value){
                $current_key = $labels[$key];
                $current_row[$current_key] = $value;
            }
            array_push($result, $current_row);
        }

        $row++;
    }

    var_dump($result);

    fclose($handle);
}