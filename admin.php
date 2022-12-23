<?php
if ($_GET["key"] != "IaCarino") {
    die("Accesso negato");
}


set_include_path($_SERVER['DOCUMENT_ROOT']);
include "getData.php";
?>
<html>
<head>
    <?php include "includes/components/structure/head.php"; ?>
    <script src="includes/components/structure/main/script.js"></script>
</head>
<body class="bg-black">
    <?php if($_GET["hash"] ?? "" == 2){
        include "includes/components/structure/admin/duoTrollpick.php";
    } else {
        include "includes/components/structure/admin/soloTrollpick.php";
    }?>
</body>
</html>
