<?php
session_start();
if (isset($_POST['submit'])) {
    include_once ('bdd.php');
    $identifiant = $_POST['identifiant'];
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];

    if ($mdp !== $mdp2) {
        $_SESSION['error'] = 'Erreur lors de la saisie des mdp';
        header('Location: index.html?profile');
    } else {
        $req2 = $bdd->prepare('UPDATE joueur SET username = :username, mdp = :mdp WHERE id_joueur = :id_joueur');
        $mdp = hash('sha256', $mdp);
        $req2->bindValue('username', $identifiant);
        $req2->bindValue('mdp', $mdp);
        $req2->bindValue('id_joueur', $_SESSION['id_joueur']);
        $req2->execute();
        $req2->closeCursor();
        $_SESSION['success'] = 'Votre profil a bien été enregistré';
        header('Location: index.html?profile');
    }
}