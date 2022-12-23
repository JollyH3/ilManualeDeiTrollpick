<?php
$data = file_get_contents("http://ddragon.leagueoflegends.com/cdn/12.23.1/data/it_IT/summoner.json");
$data = json_decode($data, true);

$pdo = new PDO("mysql:host=localhost;dbname=trollpick", "root", "");
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
$pdo->query('set profiling=1');

$version = $data['version'];
$data = $data['data'];

foreach ($data as $summoner) {


    $stmt = $pdo->prepare("INSERT IGNORE INTO summoner VALUES(:summoner_id, :name, :description, :cooldown, :image, :version);");
    $stmt->execute([
        'summoner_id' => $summoner['id'],
        'name' => $summoner['name'],
        'description' => $summoner['description'],
        'cooldown' => json_encode($summoner['cooldown']),
        'image' => "http://ddragon.leagueoflegends.com/cdn/12.23.1/img/spell/" . $summoner['image']['full'],
        'version' => $version,
    ]);

    echo $summoner['name'] . PHP_EOL;
}