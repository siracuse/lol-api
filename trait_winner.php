<?php
if (isset($_POST['submit'])) {
    include_once ('bdd.php');
    $id_winner = $_POST['win'];
    $id_1v1 = $_POST['id_1v1'];

    $req = $bdd->prepare('UPDATE 1v1 SET win = :win WHERE id_1v1 = :id_1v1');
    $req->bindValue('win', $id_winner);
    $req->bindValue('id_1v1', $id_1v1);
    $req->execute();
    $req->closeCursor();

    $req2 = $bdd->prepare('UPDATE joueur SET score = score + 5 WHERE id_joueur = :id_joueur');
    $req2->bindValue('id_joueur', $id_winner);
    $req2->execute();
    $req2->closeCursor();
}
header('Location: index.html?list');