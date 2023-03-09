<?php
// Connessione al database
$conn = new mysqli("localhost", "root", "", "trollpick");

// Controllo connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per selezionare tutti gli item
$sql = "SELECT * FROM item";
$result = $conn->query($sql);

// Loop attraverso tutti gli item
while ($row = $result->fetch_assoc()) {
    // Crea un array vuoto per i nuovi tag
    $new_tags = array();

    // Aggiungi il tag per il tipo di campione
    if (strpos($row["description"], "tank") !== false) {
        $new_tags[] = "Tank";
    } elseif (strpos($row["description"], "fighter") !== false) {
        $new_tags[] = "Fighter";
    } elseif (strpos($row["description"], "mago") !== false) {
        $new_tags[] = "Mage";
    } elseif (strpos($row["description"], "assassino") !== false) {
        $new_tags[] = "Assassin";
    } elseif (strpos($row["description"], "tiratore") !== false) {
        $new_tags[] = "Marksman";
    } elseif (strpos($row["description"], "supporto") !== false) {
        $new_tags[] = "Support";
    }

    // Aggiungi il tag per la rarità
    if (strpos($row["description"], "consumabile") !== false) {
        $new_tags[] = "Potions";
    } elseif (strpos($row["description"], "epico") !== false) {
        $new_tags[] = "Epic";
    } elseif (strpos($row["description"], "leggendario") !== false) {
        $new_tags[] = "Legendary";
    } elseif (strpos($row["description"], "mitico") !== false) {
        $new_tags[] = "Mythic";
    } elseif (json_decode($row["gold"], true)["purchasable"] === true) {
        $new_tags[] = "Start";
    } else {
        $new_tags[] = "Base";
    }

    // Aggiungi i tag dell'item
    $tags = json_decode($row["tags"], true);
    if (is_array($tags)) {
        foreach ($tags as $tag) {
            $new_tags[] = $tag;
        }
    }

    // Rimuovi eventuali tag duplicati e rimuovi il carattere di escape "\\" dall'array
    $new_tags = array_values(array_unique($new_tags));
    foreach ($new_tags as &$tag) {
        $tag = stripslashes($tag);
    }

    // Codifica l'array come una stringa JSON e aggiorna il campo "tags" dell'item
    $json_tags = json_encode($new_tags);
    $sql_update = "UPDATE item SET tags='" . $conn->real_escape_string($json_tags) . "' WHERE item_id=" . $row["item_id"];

    if ($conn->query($sql_update) === false) {
        echo "Errore nell'aggiornamento dei tag per l'item " . $row["name"] . ": " . $conn->error . "\n";
    }
}

// Chiudi la connessione
$conn->close();
?>
