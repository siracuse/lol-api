<?php
session_start();
if (isset($_POST['submit'])) {

    $auteur = $_SESSION['id_joueur'];
    $carte = $_POST['carte'];
    $categorie = $_POST['categorie'];
    $myDate = date('Y-m-d H:i:s');
    $invocateur1 = $_POST['invocateur1'];
    $invocateur2 = $_POST['invocateur2'];

    if ($invocateur1 !== $invocateur2) {
        include_once ('bdd.php');
        $req = $bdd->prepare('INSERT INTO 1v1(auteur, carte, categorie, date, id_joueur1, id_joueur2)
                                        VALUES (:auteur, :carte, :categorie, :myDate, :id_joueur1, :id_joueur2)');
        $req->bindValue('auteur', $auteur);
        $req->bindValue('carte', $carte);
        $req->bindValue('categorie', $categorie);
        $req->bindValue('myDate', $myDate);
        $req->bindValue('id_joueur1', $invocateur1);
        $req->bindValue('id_joueur2', $invocateur2);
        $req->execute();
        $req->closeCursor();
        header('Location: index.html?list');
    } else {
        $_SESSION['error'] = 'Les 2 invocateurs sont les mêmes !!';
        header('Location: index.html?new');
    }
}

