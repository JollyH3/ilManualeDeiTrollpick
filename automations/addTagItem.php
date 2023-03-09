<?php
$conn = new mysqli("localhost", "root", "", "trollpick");

// Controllo connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "SELECT * FROM item_build";
$result = $conn->query($sql);

$item_parent = [];
$item_child = [];

while($item_build_db = $result->fetch_assoc()) {
    array_push($item_parent, $item_build_db['parent_item_id']);
    array_push($item_child, $item_build_db['child_item_id']);
}

$sql = "SELECT * FROM item";
$result = $conn->query($sql);

$roles = [
    'Tank' => ['Health', 'HealthRegen', 'Armor', 'Magic Resist', 'CrowdControl'],
    'Fighter' => ['AttackDamage', 'AttackSpeed', 'Health', 'Armor', 'MagicResist'],
    'Assassin' => ['AttackDamage', 'Lethality', 'Ability Haste'],
    'Mage' => ['AbilityPower', 'AbilityHaste', 'Mana', 'ManaRegen', 'MagicPenetration', 'SpellDamage', 'Active'],
    'Support' => ['Healing', 'Shielding', 'CrowdControl', 'Slow', 'NonbootsMovement', 'ManaRegeneration'],
    'Marksman' => ['AttackDamage', 'CriticalStrike', 'AttackSpeed', 'Range']
];

$champion_roles = ['Tank', 'Fighter', "Assassin", "Mage", "Support", "Marksman"];

while($item_db = $result->fetch_assoc()) {
    
    $item_tags = json_decode($item_db['tags'], true);
    $item_gold = json_decode($item_db['gold'], true);

    //aggiunto tipo
    for($i = 0; $i < count($champion_roles); $i++){
        $commonTags[$i] = array_intersect($roles[$champion_roles[$i]], $item_tags);
        if (count($commonTags[$i]) > 1){
            array_push($item_tags, $champion_roles[$i]);
        }
    }

    //aggiunta rarità
    if($item_gold['purchasable'] == true && json_decode($item_db['maps'], true)['11'] == true && $item_gold['base'] != 0) {
        if(in_array('Consumable', $item_tags) && !in_array('Vision', $item_tags)){
            array_push($item_tags, "Potions");
        }elseif((in_array('Lane', $item_tags) || in_array('Jungle', $item_tags)) && $item_gold['base'] > 250 && $item_db['item_id'] != 1040) {
            array_push($item_tags, "Start");
        }elseif(!in_array($item_db['item_id'], $item_parent) && in_array($item_db['item_id'], $item_child) && $item_db['item_id'] != 4638 && $item_db['item_id'] != 2421 && $item_db['item_id'] != 1001){
            array_push($item_tags, "Basic");
        }elseif(in_array(2, $item_tags) && in_array($item_db['item_id'], $item_child) || $item_db['item_id'] == 2420){
            array_push($item_tags, "Epic");
        }elseif(in_array(3, $item_tags) && !in_array($item_db['item_id'], $item_child) || $item_db['item_id'] == 3089){
            array_push($item_tags, "Legendary");
        }elseif(in_array(3, $item_tags) && in_array($item_db['item_id'], $item_child)){
            array_push($item_tags, "Mythic");
        }
    }

    $item_tags = array_values($item_tags);
    $item_tags = array_unique($item_tags);
    //print_r(json_encode($item_tags));
    // Aggiorna la colonna 'tags' dell'item corrente nel database
    $json_tags = $conn->real_escape_string(json_encode($item_tags));
    $sql_update = "UPDATE item SET tags='$json_tags' WHERE item_id=" . $item_db['item_id'];

    if ($conn->query($sql_update) === false) {
        echo "Errore nell'aggiornamento dei tag per l'item " . $item_db['name'] . ": " . $conn->error . "\n";
    }

    
}

