<?php
if (isset($_POST['submit'])) {
    include_once ('bdd.php');
    $id_1v1 = $_POST['id_1v1'];
    $req = $bdd->prepare('DELETE FROM 1v1 WHERE id_1v1 = :id_1v1');
    $req->bindValue('id_1v1', $id_1v1);
    $req->execute();
    $req->closeCursor();
}
header('Location: index.html?list');