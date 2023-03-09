<?php $data = file_get_contents("http://ddragon.leagueoflegends.com/cdn/12.23.1/data/it_IT/champion.json");
$data = json_decode($data, true);

$pdo = new PDO("mysql:host=localhost;dbname=trollpick", "root", "");
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);

$data = $data['data'];

foreach ($data as $champion) {
    $champion_data = json_decode(file_get_contents("http://ddragon.leagueoflegends.com/cdn/12.23.1/data/it_IT/champion/" . $champion['id'] . ".json"), true);
    $champion_data = $champion_data['data'][$champion['id']];
    $tags = json_encode($champion_data['tags']);;

    $stmt = $pdo->prepare("UPDATE champion SET tags=:tags WHERE champion_id=:champion_id;");
    $stmt->execute([
        'tags' => $tags,
        'champion_id' => intval($champion['key'])
    ]);
}
