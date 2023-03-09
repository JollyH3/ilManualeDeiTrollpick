<?php

$data = file_get_contents("http://ddragon.leagueoflegends.com/cdn/12.23.1/data/it_IT/champion.json");
$data = json_decode($data, true);

$pdo = new PDO("mysql:host=localhost;dbname=trollpick", "root", "");
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
$pdo->query('set profiling=1');

$data = $data['data'];


foreach ($data as $champion) {
	
	$champion_data = json_decode(file_get_contents("http://ddragon.leagueoflegends.com/cdn/12.23.1/data/it_IT/champion/" . $champion['id'] . ".json"), true);
	
	$version = $champion_data['version'];
	$champion_data = $champion_data['data'][$champion['id']];

	$stmt = $pdo->prepare("INSERT IGNORE INTO champion VALUES(:champion_id, :name, :image, :splash, :info, :stats, :tags, :spells, :passive, :version);");
	$stmt->execute([
		'champion_id' => intval($champion['key']),
		'name' => $champion['name'],
		'image' => "http://ddragon.leagueoflegends.com/cdn/12.23.1/img/champion/" . $champion['image']['full'],
		'splash' => "http://ddragon.leagueoflegends.com/cdn/img/champion/splash/" . $champion['id'] . "_0.jpg",
		'info' => json_encode($champion['info']),
		'stats' => json_encode($champion['stats']),
		'tags' => json_encode($champion['tags']),
		'spells' => json_encode($champion_data['spells']),
		'passive' => json_encode($champion_data['passive']),
		'version' => $version,
	]);

	echo $champion['name'] . PHP_EOL;
}