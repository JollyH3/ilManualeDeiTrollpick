<?php
    $lane = [
        "top",
        "jungle",
        "mid",
        "bot",
        "support"
    ];
?>
<html data-bs-theme = "dark">
<head>
    <?php include "includes/components/structure/head.php"; ?>
    <script src="includes/components/structure/main/script.js"></script>
</head>
<body class="bg-black">
<div class="container pt-3">
    <div>
        <div class="input-group   mb-3">
            <input type="text" class="form-control  " aria-label="Text input with segmented dropdown button" placeholder="Nome Trollpick" id="title">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="<?= "?key=" . $_GET['key'] . '&hash=1' ?>">Solo</a></li>
                <li><a class="dropdown-item" href="<?= "?key=" . $_GET['key'] . '&hash=2' ?>">Duo</a></li>
            </ul>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Champion
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse  " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex flex-wrap justify-content-center" >
                            <?php $data = getData("trollpick", "champion", "name, image, champion_id" , "name");
                            for ($i = 0; $i < count($data); $i++):
                                ?>
                                <a id="<?="champion_" . $data[$i]["champion_id"]?>" onclick="catchDuoChampion('<?=$data[$i]["champion_id"]?>')">
                                    <div class="card border-0 m-1 mb-1 bg-transparent" style="width: 4rem;">
                                        <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"]?>">
                                        <div id="<?= 'badge_champion_' . $data[$i]['champion_id'];?>">
                                        </div>
                                        <div class="card-body  p-1">
                                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?=$data[$i]["name"]?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php endfor;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Lane
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse  " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex flex-wrap justify-content-center">
                            <?php for($i = 0; $i < 5; $i++): ?>
                            <div id="<?= $lane[$i];?>" class="card border-0 m-2 p-1" style="width: 7 rem;" onclick="catchDuoLane('<?= $lane[$i]?>')">
                                <img src="<?= 'assets/img/' . $lane[$i] . '.png';?>" class="card-img-top" alt="<?= $lane[$i];?>">
                                <div id="<?= 'badge_lane_' . $lane[$i];?>"></div>
                            </div>
                            <?php endfor;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Rune
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse  " aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "includes/components/structure/main/newChargeRune.php"?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Summoner
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse  " aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex flex-wrap justify-content-center" >
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select a Champion
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button" onclick="chargeSummoner('Champion 1')">Champion 1</button></li>
                                    <li><button class="dropdown-item" type="button" onclick="chargeSummoner('Champion 2')">Champion 2</button></li>
                                </ul>
                                <div class="d-flex flex-wrap justify-content-center" id="summoner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" onclick="chargeDefaultItemInterface()">
                        Item
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="container text-center m-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Spell
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse  " aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                        <div class="d-flex flex-wrap justify-content-center">
                        <div class="container text-center m-4">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-primary btn-lg btn-warning" onclick="chargeSpell('champion_0')">Champion 1</button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-secondary btn-lg btn-warning" onclick="chargeSpell('champion_1')">Champion 2</button>
                                </div>
                            </div>
                            </div>
                            <div id="spell">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 mt-4">
            <button class="btn btn-warning  text-uppercase " type="submit" onclick="saveData()">Aggiungi</button>
            <a class="btn btn-warning text-uppercase " type="button" href="index.php">Indietro</a>
        </div>
        <p class="text-danger mt-2 text.uppercase fs-4" id="error"></p>
    </div>
    <?php $data = getData('trollpick', 'rune', 'everything', "category, position"); ?>
    <script src="script.js"></script>
    <script src="/includes/components/structure/scripts/script4duo.js"></script>
</body>
</html>
