<?php $data = getData("trollpick", "rune", "everything", "position, category");
$rune_image = [
    "Determinazione" => "https://static.bigbrain.gg/assets/lol/runes/8400.png",
    "Dominazione" => "https://static.bigbrain.gg/assets/lol/runes/8100.png",
    "Ispirazione" => "https://static.bigbrain.gg/assets/lol/runes/8300.png",
    "Precisione" => "https://static.bigbrain.gg/assets/lol/runes/8000.png",
    "Stregoneria" => "https://static.bigbrain.gg/assets/lol/runes/8200.png",
];

$rune_category = [
    0 => "Determinazione",
    1 => "Dominazione",
    2 => "Ispirazione",
    3 => "Precisione",
    4 => "Stregoneria",
];

$rune_color = [
    "Determinazione" => "success",
    "Dominazione" => "danger",
    "Ispirazione" => "info",
    "Precisione" => "warning",
    "Stregoneria" => "primary",
];
?>
<div class="container px-4 text-center">
    <div class="row gx-5">
        <h1 class="text-warning-emphasis">Rune per il primo campione</h1>
        <div class="col">
            <div class="p-3"><div class="dropdown">
                    <button class="btn btn-warning btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rune Primarie
                    </button>
                    <ul class="dropdown-menu bg-dark">
                        <?php for($i = 0; $i < 5; $i++): ?>
                            <li id="firstRune_<?= $rune_category[$i];?>_0">
                                <button class="dropdown-item" type="button" onclick="chargefirstRune_0('<?=$rune_category[$i];?>')">
                                    <div class="card border-0 bg-opacity-10 bg-<?=$rune_color[$rune_category[$i]];?> mb-2">
                                        <div class="card-body py-2">
                                            <div class="d-flex align-items-center">
                                                <img src="<?=$rune_image[$rune_category[$i]];?>" alt="" height="30"
                                                     class="bg-transparent rounded-3 me-3">
                                                <h3 class="text-<?=$rune_color[$rune_category[$i]];?> fw-bold m-0">
                                                    <?=$rune_category[$i];?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </button>   
                            </li>
                        <?php endfor;?>
                    </ul>
                </div></div>
        </div>
        <div class="col">
            <div class="p-3"><div class="dropdown">
                    <button class="btn btn-warning btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rune Secondarie
                    </button>
                    <ul class="dropdown-menu bg-dark">
                        <?php for($i = 0; $i < 5; $i++): ?>
                            <li id="secondRune_<?= $rune_category[$i];?>_0">
                                <button class="dropdown-item" type="button" onclick="chargeSecondRune_0('<?=$rune_category[$i];?>')">
                                    <div class="card border-0 bg-opacity-10 bg-<?=$rune_color[$rune_category[$i]];?> mb-2">
                                        <div class="card-body py-2">
                                            <div class="d-flex align-items-center">
                                                <img src="<?=$rune_image[$rune_category[$i]];?>" alt="" height="30"
                                                     class="bg-transparent rounded-3 me-3">
                                                <h3 class="text-<?=$rune_color[$rune_category[$i]];?> fw-bold m-0">
                                                    <?=$rune_category[$i];?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        <?php endfor;?>
                    </ul>
                </div></div>
        </div>
    </div>
    <div class="container px-4 text-center">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3" id="firstRune_0"></div>
            </div>
            <div class="col">
                <div class="p-3" id="secondRune_0"></div>
            </div>
        </div>
    </div>
    <div class="row gx-5">
        <h1 class="text-warning-emphasis">Rune per il secondo campione</h1>
        <div class="col">
            <div class="p-3"><div class="dropdown">
                    <button class="btn btn-warning btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rune Primarie
                    </button>
                    <ul class="dropdown-menu bg-dark">
                        <?php for($i = 0; $i < 5; $i++): ?>
                            <li>
                                <button class="dropdown-item" type="button" onclick="chargeFirstRune_1('<?=$rune_category[$i]?>')">
                                    <div class="card border-0 bg-opacity-10 bg-<?=$rune_color[$rune_category[$i]];?> mb-2">
                                        <div class="card-body py-2">
                                            <div class="d-flex align-items-center">
                                                <img src="<?=$rune_image[$rune_category[$i]];?>" alt="" height="30"
                                                     class="bg-transparent rounded-3 me-3">
                                                <h3 class="text-<?=$rune_color[$rune_category[$i]];?> fw-bold m-0">
                                                    <?=$rune_category[$i];?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        <?php endfor;?>
                    </ul>
                </div></div>
        </div>
        <div class="col">
            <div class="p-3"><div class="dropdown">
                    <button class="btn btn-warning btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rune Secondarie
                    </button>
                    <ul class="dropdown-menu bg-dark">
                        <?php for($i = 0; $i < 5; $i++): ?>
                            <li id="secondRune_<?= $rune_category[$i];?>_1">
                                <button class="dropdown-item" type="button" onclick="chargeSecondRune_1('<?=$rune_category[$i]?>')">
                                    <div class="card border-0 bg-opacity-10 bg-<?=$rune_color[$rune_category[$i]];?> mb-2">
                                        <div class="card-body py-2">
                                            <div class="d-flex align-items-center">
                                                <img src="<?=$rune_image[$rune_category[$i]];?>" alt="" height="30"
                                                     class="bg-transparent rounded-3 me-3">
                                                <h3 class="text-<?=$rune_color[$rune_category[$i]];?> fw-bold m-0">
                                                    <?=$rune_category[$i];?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        <?php endfor;?>
                    </ul>
                </div></div>
                </div>
    </div>
    <div class="container px-4 text-center">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3" id="firstRune_1"></div>
            </div>
            <div class="col">
                <div class="p-3" id="secondRune_1"></div>
            </div>
        </div>
    </div>
</div>