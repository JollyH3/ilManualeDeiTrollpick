<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
include "getData.php";

if ($_GET["key"] != "IaCarino") {
    die("Accesso negato");
}
if ($_GET["hash"] == "2") {
    include "includes/components/structure/admin/duoTrollpick.php";
} else {
    include "includes/components/structure/admin/soloTrollpick.php";
}


?>

