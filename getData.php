<?php

function getData($database, $table, $data, $order){
    $dataOut = [];
    $i= 0;
    $conn = new mysqli("localhost", "root", "", $database);
    if ($data != "everything"){
        $sql = "SELECT $data FROM $table ORDER BY $order";
        $result = $conn->query($sql);
        $dataOut = $result->fetch_all(MYSQLI_ASSOC);
        /*
        foreach ($conn->query($sql) as $row) {
            $dataOut[$i] = $row[$data];
            $i++;
        }
        */
        return $dataOut;
    }else{
        $columns = getColumns($database, $table);
        $sql = "SElECT * FROM $table ORDER BY $order";
        $result = $conn->query($sql);
        $dataOut = $result->fetch_all(MYSQLI_ASSOC);
        /*
        foreach ($conn->query($sql) as $row) {
            foreach ($columns as $key => $value) {
                $dataOut[$row[$value]] = $row[$value];
            }
        }*/
        return $dataOut;
    }
}

function getColumns($database, $table){
    $dataOut = [];
    $i = 0;
    $conn = new mysqli("localhost", "root", "", "trollpick");
    $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'trollpick' AND TABLE_NAME = '$table'";
    foreach ($conn->query($sql) as $row) {
        $dataOut[$i] = $row['COLUMN_NAME'];
        $i++;
    }
    return $dataOut;
}

function getImage($data, $table, $id,  $summoner_id){
    $conn = new mysqli("localhost", "root", "", "trollpick");
    $sql = "SELECT $data FROM `$table` WHERE $id = '$summoner_id'";
    $result = $conn->query($sql);
    $image = $result->fetch_all(MYSQLI_ASSOC);
    return $image[0]["$data"];

}

/*
$myData = getData("trollpick", "trollpick", "everything", "name");
print_r($myData);
*/
/*
$myImage = getImage("passive", "champion", "champion_id", 1);
print_r($myImage);
*/
