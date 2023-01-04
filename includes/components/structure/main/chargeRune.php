<?php $data = getData("trollpick", "rune", "name, image, rune_id", "category, position");
$z = 0; $jolly = 0?>
    <div class="container text-center p-2">
        <div class="row bg-dark">
            <?php for ($a = 0; $a < 3; $a++): ?>
            <div class="col p-4">
                <?php for ($i = 0; $i < 4; $i++): ?>
                <div class="row p-4 justify-content-center">
                    <?php if ($z == 12){$jolly = 1;}elseif ($z == 16){$jolly = 0;}elseif ($z == 22){$jolly = 1;}elseif($z == 26){$jolly = 0;};
                    for ($j = 0; $j < (3 + $jolly); $j++, $z++): ?>
                        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4rem;">
                            <a id="<?='rune_' . $data[$z]["rune_id"]?>" onclick="catchRune('<?=$data[$z]["rune_id"]?>')">
                                <img src="<?=$data[$z]["image"]?>" class="card-img-top rounded" alt="<?=$data[$z]["name"]?>">
                                <div class="card-body bg-dark p-1">
                                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?=$data[$z]["name"]?></p>
                                </div>
                            </a>
                        </div>
                    <?php endfor;?>
                </div>
                <?php endfor?>
            </div>
            <?php endfor?>
            <div class="row bg-dark">
                <?php for ($a = 0; $a < 2; $a++): ?>
                <div class="col p-4">
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="row p-4 justify-content-center">
                            <?php if ($z == 38){$jolly = 1;}elseif($z == 42){$jolly = 0;};
                            for ($j = 0; $j < (3 + $jolly); $j++, $z++): ?>
                                <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4rem;">
                                    <a id="<?='rune_' . $data[$z]["rune_id"]?>" onclick="catchRune('<?=$data[$z]["rune_id"]?>')">
                                        <img src="<?=$data[$z]["image"]?>" class="card-img-top rounded" alt="<?=$data[$z]["name"]?>">
                                        <div class="card-body bg-dark p-1">
                                            <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?=$data[$z]["name"]?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endfor;?>
                        </div>
                    <?php endfor?>
                </div>
                <?php endfor?>
            </div>
            <select id="sBonus_0" class="form-select form-select-sm bg-dark text-muted mt-2" aria-label=".form-select-sm example">
                <option selected>Seleziona una statistica bonus:</option>
                <option value="Forza adattiva">Forza adattiva</option>
                <option value="Velocità d'attacco">Velocità d'attacco</option>
                <option value="Velocità abilità">Velocità abilità</option>
            </select>
            <select id="sBonus_1" class="form-select form-select-sm bg-dark text-muted mt-2" aria-label=".form-select-sm example">
                <option selected>Seleziona una statistica bonus:</option>
                <option value="Forza adattiva">Forza adattiva</option>
                <option value="Armatura">Armatura</option>
                <option value="Resistenza magica">Resistenza magica</option>
            </select>
            <select id="sBonus_2" class="form-select form-select-sm bg-dark text-muted mt-2" aria-label=".form-select-sm example">
                <option selected>Seleziona una statistica bonus:</option>
                <option value="Crescita salute">Crescita salute</option>
                <option value="Armatura">Armatura</option>
                <option value="Resistenza magica">Resistenza magica</option>
            </select>
        </div>
    </div>
