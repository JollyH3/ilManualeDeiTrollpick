<?php

$data = file_get_contents("http://ddragon.leagueoflegends.com/cdn/13.3.1/data/it_IT/item.json");
$data = json_decode($data, true);

$pdo = new PDO("mysql:host=localhost;dbname=trollpick", "root", "");
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
$pdo->query('set profiling=1');

$version = $data['version'];
$data = $data['data'];

foreach ($data as $item_id => $item) {

	$stmt = $pdo->prepare("INSERT IGNORE INTO item VALUES(:item_id, :name, :image, :gold, :description, :stats, :tags, :maps, :version);");
	$stmt->execute([
		'item_id' => intval($item_id),
		'name' => strip_tags($item['name']),
		'image' => "http://ddragon.leagueoflegends.com/cdn/13.3.1/img/item/" . $item['image']['full'],
		'gold' => json_encode($item['gold']),
		'description' => $item['description'],
		'stats' => json_encode($item['stats']),
		'tags' => json_encode($item['tags']),
		'maps' => json_encode($item['maps']),
		'version' => $version,
	]);


	if (!empty($item['into'])) {
		for ($i = 0; $i < count($item['into']); $i++) {
			$stmt = $pdo->prepare("INSERT IGNORE INTO item_build VALUES(:parent_item_id, :child_item_id);");
			$stmt->execute([
				'parent_item_id' => intval($item['into'][$i]),
				'child_item_id' => intval($item_id),
			]);
		}
	}

	echo $item['name'] . PHP_EOL;
}
