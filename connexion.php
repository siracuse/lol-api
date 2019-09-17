<?php
include('bdd.php');
$username = $_POST['username'];
$mdp = hash('sha256', $_POST['password']);

$req = $bdd->prepare('SELECT * FROM joueur WHERE username = :username and mdp = :mdp');
$req->bindValue('username', $username);
$req->bindValue('mdp', $mdp);
$req->execute();
$donnees = $req->fetch();
$req->closeCursor();

if (!empty($donnees)) {
    session_start();
    $_SESSION['id_joueur'] = $donnees['id_joueur'];
    $_SESSION['username'] = $donnees['username'];
    $_SESSION['mdp'] = $donnees['mdp'];
    $_SESSION['pseudo'] = $donnees['pseudo'];
//    header ('Location: /lol');
    header ("Location: $_SERVER[HTTP_REFERER]" );
} else { ?>
    <script>
        alert('Username ou mot de passe incorrecte');
        window.location.replace("index.php");
    </script>
<?php }

