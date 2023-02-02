<style>

    html {
        background-color: black;
    }

</style>
<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
include "getData.php";

if (!isset($_GET["key"]) || $_GET["key"] != "IaCarino") {
    die("<span style='color: red'>Accesso negato</span>");
}
if ($_GET["hash"] == "2") {
    include "includes/components/structure/admin/duoTrollpick.php";
} else {
    include "includes/components/structure/admin/soloTrollpick.php";
}
?>

