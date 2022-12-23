<?php

function getData($database, $table, $data){
    $dataOut = [];
    $i= 0;
    $conn = new mysqli("localhost", "root", "", $database);
    if ($data != "everything"){
        $sql = "SELECT $data FROM $table";
        foreach ($conn->query($sql) as $row) {
            $dataOut[$i] = $row[$data];
            $i++;
    }
    return $dataOut;
    }else{
        $columns = getColumns($database, $table);
       $sql = "SElECT * FROM $table";
         foreach ($conn->query($sql) as $row) {
            foreach ($columns as $key => $value) {
                $dataOut[$row[$value]] = $row[$value];
            }
         }
            return $dataOut;
    }
}

function getColumns($database, $table){
    $dataOut = [];
    $conn = new mysqli("localhost", "root", "", "trollpick");
    $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'trollpick' AND TABLE_NAME = '$table'";
    foreach ($conn->query($sql) as $row) {
        $dataOut[$i] = $row['COLUMN_NAME'];
        $i++;
    }
    return $dataOut;
}



