<?php

set_include_path($_SERVER['DOCUMENT_ROOT']);

$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SElECT * FROM rune ORDER BY category, position";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

$dataIn = json_decode(file_get_contents('php://input'), true);
$category = $dataIn['category'];
$champion = $dataIn['champion'];
$z = 0;
?>
<div class="col py-2">
<?php if ($category == "Determinazione"): ?>
    <?php for($i = 0; $i < 3; $i++): ?>
        <div class="row py-2 justify-content-center">
            <?php for($j = 0; $j < 3; $j++, $z++): ?>
                <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoSecondRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" id="<?= 'rune_image_' . $data[$z]['rune_id'];?>" style="filter: grayscale(100%)" class="card-img-top border border-<?=$rune_color[$category];?> rounded-circle" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
            <?php endfor;?>
    <?php endfor;?>
    <?php include "includes/components/structure/main/sBonus.php" ?>
</div>
<?php elseif ($category == "Dominazione"): $z = 16?>
    <?php for($i = 0; $i < 3; $i++): ?>
        <div class="row py-2 justify-content-center">
            <?php if($i == 2): ?>
                <?php for($j = 0; $j < 4; $j++, $z++): ?>
                    <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoSecondRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" id="<?= 'rune_image_' . $data[$z]['rune_id'];?>" style="filter: grayscale(100%)" class="card-img-top border border-<?=$rune_color[$category];?> rounded-circle" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
                <?php endfor;?>
            <?php else: ?>
                <?php for($j = 0; $j < 3; $j++, $z++): ?>
                    <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoSecondRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" id="<?= 'rune_image_' . $data[$z]['rune_id'];?>" style="filter: grayscale(100%)" class="card-img-top border border-<?=$rune_color[$category];?> rounded-circle" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
                <?php endfor;?>
            <?php endif;?>
        </div> 
    <?php endfor;?>
        <?php include "includes/components/structure/main/sBonus.php" ?>
    </div>
<?php elseif ($category == "Ispirazione"): $z = 29;?>
    <?php for($i = 0; $i < 3; $i++): ?>
        <div class="row py-2 justify-content-center">
            <?php for($j = 0; $j < 3; $j++, $z++): ?>
                <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoSecondRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" id="<?= 'rune_image_' . $data[$z]['rune_id'];?>" style="filter: grayscale(100%)" class="card-img-top border border-<?=$rune_color[$category];?> rounded-circle" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
            <?php endfor;?>
    <?php endfor;?>
        <?php include "includes/components/structure/main/sBonus.php" ?>
    </div>
<?php elseif ($category == "Precisione"): $z = 42;?>
    <div class="col py-2">
    <?php for($i = 0; $i < 3; $i++): ?>
        <div class="row py-2 justify-content-center">
            <?php for($j = 0; $j < 3; $j++, $z++): ?>
                <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoSecondRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" id="<?= 'rune_image_' . $data[$z]['rune_id'];?>" style="filter: grayscale(100%)" class="card-img-top border border-<?=$rune_color[$category];?> rounded-circle" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
            <?php endfor;?>
    <?php endfor;?>
        <?php include "includes/components/structure/main/sBonus.php" ?>
    </div>
<?php elseif ($category == "Stregoneria"): $z = 54;?>
    <?php for($i = 0; $i < 3; $i++): ?>
        <div class="row py-2 justify-content-center">
            <?php for($j = 0; $j < 3; $j++, $z++): ?>
                <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoSecondRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" id="<?= 'rune_image_' . $data[$z]['rune_id'];?>" style="filter: grayscale(100%)" class="card-img-top border border-<?=$rune_color[$category];?> rounded-circle" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
            <?php endfor;?>
    <?php endfor;?>
        <?php include "includes/components/structure/main/sBonus.php" ?>
    </div>
<?php endif; ?>
