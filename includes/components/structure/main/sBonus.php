<?php

    $sBonus = ["Forza Adattiva", "Velocità d'Attacco", "Velocità Abilità", "Forza Adattiva", "Armatura", "Resistenza Magica", "Salute Bonus", "Armatura", "Resistenza Magica"];
    $sBonus_image = ["https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsAdaptiveForceIcon.webp",
                     "https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsAttackSpeedIcon.webp",
                     "https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsCDRScalingIcon.webp",
                     "https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsAdaptiveForceIcon.webp",
                     "https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsArmorIcon.webp",
                     "https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsMagicResIcon.MagicResist_Fix.webp",
                     "https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsHealthScalingIcon.webp",
                     "https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsArmorIcon.webp",
                     "https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsMagicResIcon.MagicResist_Fix.webp"];
    $z = 0;                     
?>
<br>
<?php for($i = 0; $i < 3; $i++): ?>
<div class="row py-2 justify-content-center">
    <?php for($j = 0; $j < 3; $j++, $z++): ?>
    <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
        <a id="Forza adattiva" class="sBonus_0 text-decoration-none">
        <img src="<?= $sBonus_image[$z];?>" alt="" class="rounded-circle bg-body me-2">
            <span class="fw-semibold">
                <?= $sBonus[$z];?>
            </span>
        </a>
    </div>
    <?php endfor;?>
</div>
<?php endfor;?>