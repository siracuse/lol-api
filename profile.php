<?php
if (!empty($_SESSION['username'])) {

    $req = $bdd->prepare('SELECT username, id_joueur FROM joueur 
                                WHERE id_joueur = :id_joueur');
    $req->bindValue('id_joueur', $_SESSION['id_joueur']);
    $req->execute();
    $donnees = $req->fetch();
    ?>
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center mg-bt-40 h1-style">AUTHENTIFIANT</h1>
        <?php
        if (!empty($_SESSION['error'])) {
            ?>
                <div class="alert alert-danger fade in alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Attention!</strong> <?php echo $_SESSION['error'] ?>
                </div>
            <?php
            $_SESSION['error'] = '';
        } elseif (!empty($_SESSION['success'])) {
            ?>
            <div class="alert alert-success fade in alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Bravo !</strong> <?php echo $_SESSION['success'] ?>
            </div>
            <?php
            $_SESSION['success'] = '';
        }
        ?>
        <form class="form-horizontal" action="trait_profile.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-4 lb-style" for="identifiant">Identifiant:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="identifiant" placeholder="Votre identifiant"
                           name="identifiant" value="<?php echo $donnees['username'] ?>" required>
                </div>
            </div>

            <div class="form-group">

                <label class="control-label col-sm-4 lb-style" for="pwd">Nouveau mot de passe:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="pwd" placeholder="Votre mot de passe" name="mdp" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4 lb-style" for="pwd2">Confirmation du mdp:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="pwd2" placeholder="Votre mot de passe" name="mdp2" required>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-default mg-tp-20 new-modif" name="submit">Modifier</button>
                </div>
            </div>
        </form>
    </div>
    <?php
    $req->closeCursor();
} else {
    ?>
    <script language="javascript">
        document.write(document.getElementById('login').innerHTML);
    </script>
    <?php
}