<?php
$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SElECT * FROM rune ORDER BY category, position";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

$dataIn = json_decode(file_get_contents('php://input'), true);
$category = $dataIn['category'];
$champion = $dataIn['champion'];
$z = 0;
$jolly = 0;
?>
<?php if ($category == "Determinazione"): ?>
    <div class="col py-2">
        <?php for($i = 0; $i < 4; $i++): ?>
            <div class="row py-2 justify-content-center">
                <?php for($j = 0; $j < 3; $j++, $z++): ?>
                    <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoFirstRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" class="card-img-top rounded" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
                <?php endfor;?>
            </div>
        <?php endfor;?>
    </div>
<?php elseif ($category == "Dominazione"): $z = 12; $jolly = 1;?>
    <div class="col py-2">
        <?php for($i = 0; $i < 4; $i++): ?>
            <div class="row py-2 justify-content-center">
                <?php for($j = 0; $j < (3 + $jolly); $j++, $z++): ?>
                    <?php if($z == 16){$jolly = 0;}elseif ($z == 22){$jolly = 1;};?>
                    <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoFirstRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" class="card-img-top rounded" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
                <?php endfor;?>
            </div>
        <?php endfor;?>
    </div>
<?php elseif ($category == "Ispirazione"): $z = 26;?>
    <div class="col py-2">
        <?php for($i = 0; $i < 4; $i++): ?>
            <div class="row py-2 justify-content-center">
                <?php for($j = 0; $j < 3; $j++, $z++): ?>
                    <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoFirstRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" class="card-img-top rounded" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
                <?php endfor;?>
            </div>
        <?php endfor;?>
    </div>
<?php elseif ($category == "Precisione"): $z = 38; $jolly = 1?>
    <div class="col py-2">
        <?php for($i = 0; $i < 4; $i++): ?>
            <div class="row py-2 justify-content-center">
                <?php for($j = 0; $j < (3 + $jolly); $j++, $z++): ?>
                    <?php if($z == 42){$jolly = 0;}?>
                    <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoFirstRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" class="card-img-top rounded" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
                <?php endfor;?>
            </div>
        <?php endfor;?>
    </div>
<?php elseif ($category == "Stregoneria"): $z = 51;?>
    <div class="col py-2">
        <?php for($i = 0; $i < 4; $i++): ?>
            <div class="row py-2 justify-content-center">
                <?php for($j = 0; $j < 3; $j++, $z++): ?>
                    <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                    <a role="button" id="<?= 'rune_' . $data[$z]['rune_id'];?>" onclick="catchDuoFirstRune('<?= $data[$z]['rune_id'];?>'<?= ', ' . $champion . ', ' . $i;?>)">
                        <img src="<?= $data[$z]['image'];?>" class="card-img-top rounded" alt="Sorvegliante">
                        <div class="card-body bg-dark p-1">
                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?= $data[$z]['name'];?></p>
                        </div>
                    </a>
                    </div>
                <?php endfor;?>
            </div>
        <?php endfor;?>
    </div>
<?php endif; ?>
