<?php
namespace App\Services;

class SVMService {
    public function TrainingData($data_db){
        $result = [];
        foreach($data_db as $data){
             $result = [$data];
        }

        return $result;
    }
}
