<?php
if (!empty($_SESSION['username'])) {
?>
    <div class="col-md-12">
        <form name="new" method="post" action="trait_new_partie.php">
            <h1 class="text-center mg-bt-40 h1-style">NOUVEAU DUEL</h1>
            <?php
                if (!empty($_SESSION['error'])) {
                ?>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="alert alert-danger fade in alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Attention!</strong> <?php echo $_SESSION['error'] ?>
                        </div>
                    </div>
                <?php
                $_SESSION['error'] = '';
                }
            ?>
            <div class="col-md-3 col-md-offset-2 new-inv">
                <label class="lb-style">Invocateur 1</label>
                <select name="invocateur1">
                    <?php

                    $req = $bdd->query('SELECT id_joueur, pseudo FROM joueur ORDER BY pseudo ');
                    while ($donnees = $req->fetch()) {
                        echo '<option value="' . $donnees['id_joueur'] . '">' . $donnees['pseudo'] . '</option> ';
                    }
                    $req->closeCursor();
                    ?>
                </select>


            </div>
            <div class="col-md-3 col-md-offset-2 new-inv">
                <label class="lb-style">Invocateur 2</label>
                <select name="invocateur2">
                    <?php
                    $req = $bdd->query('SELECT id_joueur, pseudo FROM joueur ORDER BY pseudo');
                    while ($donnees = $req->fetch()) {
                        echo '<option value="' . $donnees['id_joueur'] . '">' . $donnees['pseudo'] . '</option> ';
                    }
                    $req->closeCursor();
                    ?>
                </select>
            </div>
            <div class="col-md-12 mg-bt-40 text-center ">
                <p class="new-title mg-bt-20 lb-style">Choix de la carte</p>
                <div class="cc-selector">
                    <input id="faille" type="radio" name="carte" value="faille de l'invocateur" checked/>
                    <label class="drinkcard-cc faille" for="faille"></label>
                    <input id="aram" type="radio" name="carte" value="aram" required/>
                    <label class="drinkcard-cc aram" for="aram"></label>
                </div>
            </div>
            <div class="col-md-12 text-center mg-bt-40 ">
                <p class="new-title mg-bt-20 lb-style">Catégorie de champion</p>
                <div class="cc-selector">
                    <input id="top" type="radio" name="categorie" value="top" required/>
                    <label class="drinkcard-cc-2 top" for="top"></label>

                    <input id="jungle" type="radio" name="categorie" value="jungle"/>
                    <label class="drinkcard-cc-2 jungle" for="jungle"></label>

                    <input id="mid" type="radio" name="categorie" value="mid" checked/>
                    <label class="drinkcard-cc-2 mid" for="mid"></label>

                    <input id="adc" type="radio" name="categorie" value="adc"/>
                    <label class="drinkcard-cc-2 adc" for="adc"></label>

                    <input id="support" type="radio" name="categorie" value="support"/>
                    <label class="drinkcard-cc-2 support" for="support"></label>

                    <input id="random" type="radio" name="categorie" value="random"/>
                    <label class="drinkcard-cc-2 random" for="random"></label>

                </div>
            </div>

            <div class="col-md-12 text-center mg-bt-40">
                <p class="new-title mg-bt-20 lb-style">Condition de win</p>
                <i class="lb-style">First Blood</i><br>
                <i class="lb-style">100 cs</i><br>
                <i class="lb-style">First Tower</i>
            </div>
            <div class="col-md-12 text-center mg-bt-40">
                <input type="submit" value="Valider" name="submit" class="new-input">
            </div>
        </form>
    </div>
    <?php
} else {
    ?>
    <script language="javascript">
        document.write(document.getElementById('login').innerHTML);
    </script>
    <?php
}



