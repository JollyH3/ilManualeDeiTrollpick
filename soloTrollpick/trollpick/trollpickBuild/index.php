<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
include "getData.php";
$id = $_GET["id"];
$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SELECT * FROM trollpick WHERE trollpick_id = '$id'";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
$rune = getData("trollpick", "rune", "image", "rune_id");
?>
<html>
<head>
    <?php include "../../../includes/components/structure/head.php"; ?>
</head>
<body class="bg-dark text-white" >
    <div class="fixed-top bg-black">
        <?php include "../../../includes/components/structure/main/header.php"; ?>
    </div>
    <div class="container ml-5 mr-5">
        <div class="parallax-window mt-5" data-parallax="scroll">
            <div class="d-flex flex-column justify-content-center" style="height: 50vh;">
                <div class="py-5 w-100 text-center">
                    <h1 class="display-1 fw-bold text-white text-uppercase mt-5"><?=getImage("name", "champion", "champion_id", "" . $data[0]['champion_id']) . " " . $data[0]["name"]?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container text-center">
            <div class="row justify-content-md-center p-5">
                <div class="col-md-auto text-uppercase">
                    Ruolo e summoner
                </div>
                <div class="col-md-auto">
                    <img src="<?="/assets/img/" . json_decode($data[0]["data"], true)["lane"] . ".png"?>" alt="">
                </div>
                <div class="col-md-auto">
                    <img src="<?=getImage("image", "summoner", "summoner_id", "" . json_decode($data[0]["data"], true)["summoner"]["one"]) . ""?>" alt="<?=json_decode($data[0]["data"], true)["summoner"]["one"]?>">
                </div>
                <div class="col-md-auto">
                    <img class="" src="<?=getImage("image", "summoner", "summoner_id", "" . json_decode($data[0]["data"], true)["summoner"]["two"]) . ""?>" alt="<?=json_decode($data[0]["data"], true)["summoner"]["two"]?>">
                </div>
            </div>
            <div class="row justify-content-md-center p-5">
                <div class="col-md-auto text-uppercase">
                    Rune e statistiche bonus
                </div>
                <?php for($i = 0; $i < 6; $i++): ?>
                    <div class="col-md-auto">
                        <img src="<?=getImage("image","rune", 'rune_id', "" . json_decode($data[0]["data"], true)["rune"][$i])?>" alt="">
                    </div>
                <?php endfor;?>
                <div class="col-md-auto">
                    <p><?=json_decode($data[0]["data"], true)["sBonus"][0]?></p>
                    <p><?=json_decode($data[0]["data"], true)["sBonus"][1]?></p>
                    <p><?=json_decode($data[0]["data"], true)["sBonus"][2]?></p>
                </div>
            </div>
            <div class="row justify-content-md-center p-5">
                <div class="col-md-auto text-uppercase">
                    Build Consigliata
                </div>
                <div class="col-md-auto">
                    <p>Start Item</p>
                    <img src="<?=getImage("image","item", 'item_id', "" . json_decode($data[0]["data"], true)["item"][0])?>" alt="">
                    <img src="<?=getImage("image","item", 'item_id', "" . json_decode($data[0]["data"], true)["item"][1])?>" alt="">
                </div>
                <div class="col-md-auto">
                    <p>Stivali</p>
                    <img src="<?=getImage("image","item", 'item_id', "" . json_decode($data[0]["data"], true)["item"][2])?>" alt="">
                </div>
                <div class="col-md-auto">
                    <p>Mitico</p>
                    <img src="<?=getImage("image","item", 'item_id', "" . json_decode($data[0]["data"], true)["item"][3])?>" alt="">
                </div>
                <div class="col-md-auto">
                    <p>Build</p>
                    <?php for($i = 4; $i < 8; $i++): ?>
                        <img src="<?=getImage("image","item", 'item_id', "" . json_decode($data[0]["data"], true)["item"][$i])?>" alt="">
                    <?php endfor;?>
                </div>
            </div>
            <div class="row justify-content-md-center p-5">
                <div class="col-md-auto text-uppercase">
                    Ordine abilità
                </div>
                <?php for($i = 0; $i < 5; $i++): ?>
                    <div class="col-md-auto">
                        <p><?=json_decode($data[0]["data"], true)["spell"][$i]?></p>
                    </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
</body>
</html>