<?php

$myData = json_decode(file_get_contents('php://input'), true);

if (empty($myData)) {
    exit;
}

$pdo = new PDO("mysql:host=localhost;dbname=trollpick", "root", "");
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
$pdo->query('set profiling=1');


$data = [
    "lane" => $myData['lane'],
    "rune" => $myData['rune'],
    "sBonus" => $myData['sBonus'],
    "summoner" => $myData['summoner'],
    "item" => $myData['item'],
    "spell" => $myData['spell'],
];

$stmt = $pdo->prepare("INSERT INTO trollpick VALUES(:trollpick_id, :champion_id, :author, :name, :data, :view_count, :is_archived);");
$stmt->execute([
    'trollpick_id' => hash_hmac("sha256", uniqid(), "trollpick_id"),
    'champion_id' => $myData['champion'],
    'author' => "Fierik",
    'name' => $myData['name'],
    'data' => json_encode($data),
    'view_count' => 0,
    'is_archived' => 0,
]);