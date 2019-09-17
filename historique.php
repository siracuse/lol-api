<?php
if (isset($_POST['envoyer'])) {
    include ('function.php');
    $name = $_POST['summoner'];
    $id = getSummonerIdByName($_POST['summoner']);
    $encryptedId = getEncryptedSummonerIdByName($_POST['summoner']);
    $html = getHistoryById($id, $encryptedId, $name);
    echo $html;
}
