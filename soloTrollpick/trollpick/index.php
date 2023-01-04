<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
include "getData.php";
$id = $_GET["id"];
$champions = getData("trollpick", "champion", "everything", "name");
$data = $champions[$id];
$trollpick = getData("trollpick", "trollpick", "everything", "champion_id, name");
?>

<html>
<head>
    <?php include "../../includes/components/structure/head.php"; ?>
</head>
<body class="bg-dark">
    <div class="fixed-top bg-black">
        <?php include "../../includes/components/structure/main/header.php"; ?>
    </div>
    <div class="container ml-5 mr-5">
        <div class="parallax-window mt-5" data-parallax="scroll">
            <div class="d-flex flex-column justify-content-center" style="height: 50vh;">
                <div class="py-5 w-100 text-center">
                    <h1 class="display-1 fw-bold text-white text-uppercase mt-5"><?=$data['name']?></h1>
                    <h5 class="fw-bold text-white my-3"><?=$data['version']?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 text-white bg-dark">
        <div class="d-flex flex-wrap justify-content-center">
            <?php for ($i = 0; $i < count($trollpick); $i++):?>
                <?php if ($trollpick[$i]['champion_id'] == $data['champion_id']): ?>
                <div class="p-5">
                    <a href="trollpickBuild/index.php?id=<?=$trollpick[$i]['trollpick_id']?>">
                        <p><?=$trollpick[$i]['name']?></p>
                    </a>
                </div>
                <?php endif ?>
            <?php endfor?>
        </div>

        <div class="container">
            <table class="table text-white">
                <thead>
                <tr>
                    <p class="text-center fs-2">Statistiche base</p>
                    <?php $stats = json_decode($data["stats"], true)?>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"></th>
                    <td>
                        <p>Salute</p>
                        <p><?=$stats['hp']?></p>
                    </td>
                    <td>
                        <p>Rigenerazione salute</p>
                        <p><?=$stats['hpregen']?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>
                        <p>Mana</p>
                        <p><?php if ($stats['mp'] == 0){echo "Non disponibile";} else{echo $stats['mp'];};?></p>
                    </td>
                    <td>
                        <p>Rigenerazione mana</p>
                        <p><?php if ($stats['mpregen'] == 0){echo "Non disponibile";} else{echo $stats['mpregen'];};?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>
                        <p>Armatura</p>
                        <p><?=$stats["armor"]?></p>
                    </td>
                    <td>
                        <p>Danno fisico</p>
                        <p><?=$stats["attackdamage"]?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>
                        <p>Resistenza magica</p>
                        <p><?=$stats["spellblock"]?></p>
                    </td>
                    <td>
                        <p>danno critico</p>
                        <p><?='175%'?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>
                        <p>Velocita di movimento</p>
                        <p><?=$stats["movespeed"]?></p>
                    </td>
                    <td>
                        <p>Range di attacco</p>
                        <p><?=$stats['attackrange']?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                    <td>
                        <p>Velocita d'attacco base</p>
                        <p><?=$stats['attackspeed']?></p>
                    </td>
                    </th>
                </tr>
                </tbody>
            </table>
            <br>
            <hr>
            <br>
            <h4 class="text-uppercase">Abilità</h4>
            <div class="passive mt-4">
                <h5><?=json_decode($data['passive'], true)['name']?></h5>
                <img src="<?="http://ddragon.leagueoflegends.com/cdn/12.23.1/img/passive/" . json_decode($data['passive'], true)["image"]['full']?>" alt="">
                <p><?=json_decode($data["passive"], true)['description']?></p>
            </div>
            <div class="Q">
                <h5><?=json_decode($data['spells'], true)[0]['id']?></h5>
                <img src="<?="http://ddragon.leagueoflegends.com/cdn/12.23.1/img/spell/" . json_decode($data['spells'], true)[0]['image']['full']?>" alt="<?=json_decode($data['spells'], true)[0]['image']['full']?>">
                <p><?=json_decode($data["passive"], true)['description']?></p>
            </div>
        </div>

        <?php include "../../includes/components/structure/main/bottom.php"; ?>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
        <script>
            $('.parallax-window').parallax({imageSrc: '<?=$data["splash"]?>' +
                    '', speed: 0.4});
        </script>
</body>
</html>
