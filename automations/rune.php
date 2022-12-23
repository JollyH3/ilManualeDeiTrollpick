<?php
$data = file_get_contents("http://ddragon.leagueoflegends.com/cdn/10.16.1/data/it_IT/runesReforged.json");
$data = json_decode($data, true);

$pdo = new PDO("mysql:host=localhost;dbname=trollpick", "root", "");
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
$pdo->query('set profiling=1');

$version = "12.23.1";

for ($i = 0; $i < count($data); $i++) {
    for ($j = 0; $j < count($data[$i]['slots']); $j++) {
        for ($k = 0; $k < count($data[$i]['slots'][$j]['runes']); $k++) {
            $stmt = $pdo->prepare("INSERT IGNORE INTO rune VALUES(:rune_id, :name, :image, :long_desc, :category, :position, :version);");
            $stmt->execute([
                'rune_id' => intval($data[$i]['slots'][$j]['runes'][$k]['id']),
                'name' => $data[$i]['slots'][$j]['runes'][$k]['name'],
                'image' => "https://ddragon.canisback.com/img/" . $data[$i]['slots'][$j]['runes'][$k]['icon'],
                'long_desc' => $data[$i]['slots'][$j]['runes'][$k]['longDesc'],
                'category' => $data[$i]['name'],
                'position' => $j,
                'version' => $version,
            ]);
            echo $data[$i]['slots'][$j]['runes'][$k]['name'] . PHP_EOL;
        }
    }
}