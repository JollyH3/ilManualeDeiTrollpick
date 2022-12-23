<html>
<head>
    <?php include "includes/components/structure/head.php"; ?>
    <script src="includes/components/structure/main/script.js"></script>
</head>
<body class="bg-black">
<div class="container pt-3">
<div>
    <div class="input-group bg-dark text-muted mb-3">
    <input type="text" class="form-control bg-dark text-muted" aria-label="Text input with segmented dropdown button" placeholder="Nome Trollpick" id="title">
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
            <button class="accordion-button bg-dark text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Champion
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse bg-dark text-muted" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="d-flex flex-wrap justify-content-center" >
                    <?php $data = getData("trollpick", "champion", "name, image" , "name");
                    for ($i = 0; $i < count($data); $i++):
                        ?>
                        <a id="<?=$data[$i]["name"]?>" onclick="catchChampion('<?=$data[$i]["name"]?>')">
                            <div class="card border-0 m-1 mb-1 bg-transparent" style="width: 4rem;">
                                <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"]?>">
                                <div class="card-body bg-dark p-1">
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
            <button class="accordion-button collapsed bg-dark text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Role
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse bg-dark text-muted" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="m-2" id="top">
                        <img src="assets/img/top.png" alt="top" onclick="catchRole('top')">
                    </div>
                    <div class="m-2" id="jungle">
                        <img src="assets/img/jungle.png" alt="jungle" onclick="catchRole('jungle')">
                    </div>
                    <div class="m-2" id="mid">
                        <img src="assets/img/mid.png" alt="mid" onclick="catchRole('mid')">
                    </div>
                    <div class="m-2" id="bot">
                        <img src="assets/img/bot.png" alt="bot" onclick="catchRole('bot')">
                    </div>
                    <div class="m-2" id="support">
                        <img src="assets/img/support.png" alt="support" onclick="catchRole('support')">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed bg-dark text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Rune
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse bg-dark text-muted" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="d-flex flex-wrap justify-content-center" >
                    <?php $data = getData("trollpick", "rune", "name, image" , "category, position");
                    for ($i = 0; $i < count($data); $i++):
                        ?>
                        <a class="text-decoration-none" href="#<?php echo $i?>">
                            <div class="card border-0 m-1 mb-1 bg-transparent" style="width: 4rem;">
                                <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"]?>">
                                <div class="card-body bg-dark p-1">
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
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed bg-dark text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Summoner
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse bg-dark text-muted" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="d-flex flex-wrap justify-content-center" >
                    <?php
                    $data = getData("trollpick", "summoner", "name, image", "name");
                    for($i = 0; $i < count($data); $i++):
                        ?>
                        <a class="text-decoration-none" href="#<?php echo $i?>">
                            <div class="card border-0 m-1 mb-1 bg-transparent" style="width: 4rem;">
                                <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"]?>">
                                <div class="card-body bg-dark p-1">
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
        <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed bg-dark text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Item
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse bg-dark text-muted" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="d-flex flex-wrap justify-content-center" >
                    <?php $data = getData("trollpick", "item", "name, image", "item_id");
                    for($i = 0; $i < count($data); $i++):
                        ?>
                        <a class="text-decoration-none" href="#<?php echo $i?>">
                            <div class="card border-0 m-1 mb-1 bg-transparent" style="width: 4rem;">
                                <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"] ?>">
                                <div class="card-body bg-dark p-1">
                                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?php echo $data[$i]["name"] ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endfor;?>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed bg-dark text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Spell
            </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse bg-dark text-muted" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <select class="form-select form-select-sm bg-dark text-muted" aria-label=".form-select-sm example">
                    <option selected>Open this select menu</option>
                    <option value="1">Q</option>
                    <option value="2">W</option>
                    <option value="3">E</option>
                </select>
                <select class="form-select form-select-sm bg-dark text-muted mt-2" aria-label=".form-select-sm example">
                    <option selected>Open this select menu</option>
                    <option value="1">Q</option>
                    <option value="2">W</option>
                    <option value="3">E</option>
                </select>
                <select class="form-select form-select-sm bg-dark text-muted mt-2" aria-label=".form-select-sm example">
                    <option selected>Open this select menu</option>
                    <option value="1">Q</option>
                    <option value="2">W</option>
                    <option value="3">E</option>
                </select>
                <select class="form-select form-select-sm bg-dark text-muted mt-2" aria-label=".form-select-sm example">
                    <option selected>Open this select menu</option>
                    <option value="1">Q</option>
                    <option value="2">W</option>
                    <option value="3">E</option>
                </select>
                <select class="form-select form-select-sm bg-dark text-muted mt-2" aria-label=".form-select-sm example">
                    <option selected>Open this select menu</option>
                    <option value="1">Q</option>
                    <option value="2">W</option>
                    <option value="3">E</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="d-grid gap-2 mt-4">
    <button class="btn btn-primary bg-dark text-uppercase text-muted" type="button">Aggiungi</button>
    <a class="btn btn-primary bg-dark text-uppercase text-muted" type="button" href="index.php">Indietro</a>
</div>
</div>
    <script src="script.js"></script>
</body>
</html>
