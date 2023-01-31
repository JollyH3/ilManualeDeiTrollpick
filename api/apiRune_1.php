<?php

set_include_path($_SERVER['DOCUMENT_ROOT']);

$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SElECT * FROM rune ORDER BY category, position";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

$category = $_POST['search'];
?>

<?php if ($category == "Determinazione"): ?>
<div class="col py-2">
    <div class="row py-2 justify-content-center">
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8463" onclick="catchRune('8463')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/FontOfLife/FontOfLife.png" class="card-img-top rounded" alt="Fonte vitale">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Fonte vitale</p>
                </div>
            </a>
        </div>
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8401" onclick="catchRune('8401')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/MirrorShell/MirrorShell.png" class="card-img-top rounded" alt="Colpo di scudo">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Colpo di scudo</p>
                </div>
            </a>
        </div>
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8446" onclick="catchRune('8446')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/Demolish/Demolish.png" class="card-img-top rounded" alt="Demolire">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Demolire</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row py-2 justify-content-center">
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8473" onclick="catchRune('8473')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/BonePlating/BonePlating.png" class="card-img-top rounded" alt="Corazza ossea">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Corazza ossea</p>
                </div>
            </a>
        </div>
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8429" onclick="catchRune('8429')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/Conditioning/Conditioning.png" class="card-img-top rounded" alt="Preparazione fisica">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Preparazione fisica</p>
                </div>
            </a>
        </div>
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8444" onclick="catchRune('8444')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/SecondWind/SecondWind.png" class="card-img-top rounded" alt="Secondo fiato">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Secondo fiato</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row py-2 justify-content-center">
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8451" onclick="catchRune('8451')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/Overgrowth/Overgrowth.png" class="card-img-top rounded" alt="Crescita eccessiva">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Crescita eccessiva</p>
                </div>
            </a>
        </div>
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8453" onclick="catchRune('8453')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/Revitalize/Revitalize.png" class="card-img-top rounded" alt="Rivitalizzare">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Rivitalizzare</p>
                </div>
            </a>
        </div>
        <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
            <a id="rune_8242" onclick="catchRune('8242')">
                <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/Unflinching/Unflinching.png" class="card-img-top rounded" alt="Risoluto">
                <div class="card-body bg-dark p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Risoluto</p>
                </div>
            </a>
        </div>
    </div>
    <?php include "includes/components/structure/main/sBonus.php" ?>
</div>
<?php elseif ($category == "Dominazione"): ?>
    <div class="col py-2">
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8126" onclick="catchRune('8126')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/CheapShot/CheapShot.png" class="card-img-top rounded" alt="Colpo basso">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Colpo basso</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8139" onclick="catchRune('8139')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/TasteOfBlood/GreenTerror_TasteOfBlood.png" class="card-img-top rounded" alt="Assaggio di sangue">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Assaggio di sangue</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8143" onclick="catchRune('8143')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/SuddenImpact/SuddenImpact.png" class="card-img-top rounded" alt="Impatto improvviso">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Impatto improvviso</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8120" onclick="catchRune('8120')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/GhostPoro/GhostPoro.png" class="card-img-top rounded" alt="Poro fantasma">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Poro fantasma</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8136" onclick="catchRune('8136')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/ZombieWard/ZombieWard.png" class="card-img-top rounded" alt="Lume zombi">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Lume zombi</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8138" onclick="catchRune('8138')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/EyeballCollection/EyeballCollection.png" class="card-img-top rounded" alt="Collezione di Bulbi">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Collezione di Bulbi</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8105" onclick="catchRune('8105')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/RelentlessHunter/RelentlessHunter.png" class="card-img-top rounded" alt="Cacciatore implacabile">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Cacciatore implacabile</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8106" onclick="catchRune('8106')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/UltimateHunter/UltimateHunter.png" class="card-img-top rounded" alt="Cacciatore supremo">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Cacciatore supremo</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8134" onclick="catchRune('8134')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/IngeniousHunter/IngeniousHunter.png" class="card-img-top rounded" alt="Cacciatore ingegnoso">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Cacciatore ingegnoso</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8135" onclick="catchRune('8135')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Domination/TreasureHunter/TreasureHunter.png" class="card-img-top rounded" alt="Cacciatore di tesori">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Cacciatore di tesori</p>
                    </div>
                </a>
            </div>
        </div>
        <?php include "includes/components/structure/main/sBonus.php" ?>
    </div>
<?php elseif ($category == "Ispirazione"): ?>
    <div class="col py-2">
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8304" onclick="catchRune('8304')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Inspiration/MagicalFootwear/MagicalFootwear.png" class="card-img-top rounded" alt="Calzature magiche">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Calzature magiche</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8306" onclick="catchRune('8306')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Inspiration/HextechFlashtraption/HextechFlashtraption.png" class="card-img-top rounded" alt="Marchingegno Hexflash">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Marchingegno Hexflash</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8313" onclick="catchRune('8313')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Inspiration/PerfectTiming/PerfectTiming.png" class="card-img-top rounded" alt="Tempismo perfetto">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Tempismo perfetto</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8316" onclick="catchRune('8316')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Inspiration/MinionDematerializer/MinionDematerializer.png" class="card-img-top rounded" alt="Smaterializzatore">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Smaterializzatore</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8321" onclick="catchRune('8321')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Inspiration/FuturesMarket/FuturesMarket.png" class="card-img-top rounded" alt="Mercato del futuro">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Mercato del futuro</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8345" onclick="catchRune('8345')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Inspiration/BiscuitDelivery/BiscuitDelivery.png" class="card-img-top rounded" alt="Consegna biscotti">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Consegna biscotti</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8347" onclick="catchRune('8347')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Inspiration/CosmicInsight/CosmicInsight.png" class="card-img-top rounded" alt="Intuito cosmico">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Intuito cosmico</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8352" onclick="catchRune('8352')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Inspiration/TimeWarpTonic/TimeWarpTonic.png" class="card-img-top rounded" alt="Tonico temporale">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Tonico temporale</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8410" onclick="catchRune('8410')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Resolve/ApproachVelocity/ApproachVelocity.png" class="card-img-top rounded" alt="Velocità di avvicinamento">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Velocità di avvicinamento</p>
                    </div>
                </a>
            </div>
        </div>
        <?php include "includes/components/structure/main/sBonus.php" ?>
    </div>
<?php elseif ($category == "Precisione"): ?>
    <div class="col py-2">
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8009" onclick="catchRune('8009')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Precision/PresenceOfMind/PresenceOfMind.png" class="card-img-top rounded" alt="Presenza di spirito">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Presenza di spirito</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_9101" onclick="catchRune('9101')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Precision/Overheal.png" class="card-img-top rounded" alt="Sovraguarigione">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Sovraguarigione</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_9111" onclick="catchRune('9111')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Precision/Triumph.png" class="card-img-top rounded" alt="Trionfo">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Trionfo</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_9103" onclick="catchRune('9103')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Precision/LegendBloodline/LegendBloodline.png" class="card-img-top rounded" alt="Leggenda: Stirpe">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Leggenda: Stirpe</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_9104" onclick="catchRune('9104')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Precision/LegendAlacrity/LegendAlacrity.png" class="card-img-top rounded" alt="Leggenda: Alacrità">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Leggenda: Alacrità</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_9105" onclick="catchRune('9105')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Precision/LegendTenacity/LegendTenacity.png" class="card-img-top rounded" alt="Leggenda: Tenacia">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Leggenda: Tenacia</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8014" onclick="catchRune('8014')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Precision/CoupDeGrace/CoupDeGrace.png" class="card-img-top rounded" alt="Colpo di grazia">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Colpo di grazia</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8017" onclick="catchRune('8017')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Precision/CutDown/CutDown.png" class="card-img-top rounded" alt="Taglio profondo">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Taglio profondo</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8299" onclick="catchRune('8299')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/LastStand/LastStand.png" class="card-img-top rounded" alt="L'ultima sfida">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">L'ultima sfida</p>
                    </div>
                </a>
            </div>
        </div>
        <?php include "includes/components/structure/main/sBonus.php" ?>
    </div>
<?php elseif ($category == "Stregoneria"): ?>
    <div class="col py-2">
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8224" onclick="catchRune('8224')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/NullifyingOrb/Pokeshield.png" class="card-img-top rounded" alt="Sfera dell'annullamento">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Sfera dell'annullamento</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8226" onclick="catchRune('8226')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/ManaflowBand/ManaflowBand.png" class="card-img-top rounded" alt="Fascia del Flusso">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Fascia del Flusso</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8275" onclick="catchRune('8275')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/NimbusCloak/6361.png" class="card-img-top rounded" alt="Cappa della nuvola">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Cappa della nuvola</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8210" onclick="catchRune('8210')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/Transcendence/Transcendence.png" class="card-img-top rounded" alt="Trascendenza">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Trascendenza</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8233" onclick="catchRune('8233')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/AbsoluteFocus/AbsoluteFocus.png" class="card-img-top rounded" alt="Concentrazione assoluta">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Concentrazione assoluta</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8234" onclick="catchRune('8234')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/Celerity/CelerityTemp.png" class="card-img-top rounded" alt="Celerità">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Celerità</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row py-2 justify-content-center">
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8232" onclick="catchRune('8232')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/Waterwalking/Waterwalking.png" class="card-img-top rounded" alt="Camminare sull'acqua">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Camminare sull'acqua</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8236" onclick="catchRune('8236')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/GatheringStorm/GatheringStorm.png" class="card-img-top rounded" alt="Tempesta incombente">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Tempesta incombente</p>
                    </div>
                </a>
            </div>
            <div class="card border-0 m-1 mb-1 bg-transparent p-0" style="width: 4.5rem;">
                <a id="rune_8237" onclick="catchRune('8237')">
                    <img src="https://ddragon.canisback.com/img/perk-images/Styles/Sorcery/Scorch/Scorch.png" class="card-img-top rounded" alt="Bruciare">
                    <div class="card-body bg-dark p-1">
                        <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px">Bruciare</p>
                    </div>
                </a>
            </div>
        </div>
        <?php include "includes/components/structure/main/sBonus.php" ?>
    </div>
<?php endif; ?>
