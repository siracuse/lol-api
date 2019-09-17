<?php
if (!empty($_SESSION['username'])) {

    $req = $bdd->query('SELECT id_1v1, carte, categorie, date, i.pseudo as joueur1, j.pseudo as joueur2, k.pseudo as organisateur,
                                      i.id_joueur as id_joueur1, j.id_joueur as id_joueur2, auteur
                                FROM 1v1 
                                INNER JOIN joueur i on `1v1`.id_joueur1 = i.id_joueur
                                INNER JOIN joueur j on `1v1`.id_joueur2 = j.id_joueur
                                INNER JOIN joueur k on `1v1`.auteur = k.id_joueur
                                WHERE win IS NULL
                                ORDER BY id_1v1 DESC ');
    $req2 = $bdd->query('SELECT id_1v1 FROM 1v1 WHERE win IS NULL');

    echo '<div class="col-md-12">';
    echo '<h1 class="text-center mg-bt-40 h1-style">DUELS EN COURS</h1>';
    if ($req2->fetch()) {
        while ($donnees = $req->fetch()) {
            ?>
            <div class="col-md-12 mg-bt-40 list-bg">


                <div class="col-md-8 list-vs">
                    <div class="col-md-5 text-center list-vs-player first-player"><?php echo $donnees['joueur1'] ?></div>
                    <div class="col-md-2 text-center"><img src="img/ver.png" style="width: 40px;"></div>
                    <div class="col-md-5 text-center list-vs-player second-player"><?php echo $donnees['joueur2'] ?></div>
                </div>

                <div class="col-md-4 mg-bt-10">
                    <div class="col-md-12 list-panel">
                        <?php
                        if ($donnees['auteur'] === $_SESSION['id_joueur']) {
                        ?>
                        <div class="col-md-12 list-action mg-bt-10">
                            <a href="#" data-target="#win<?php echo $donnees['id_1v1'] ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
                            </a>
                            <form action="trait_suppression_partie.php" method="post" class="form-list-panel">
                                <input type="hidden" value="<?php echo $donnees['id_1v1'] ?>" name="id_1v1">
                                <button type="submit" name="submit" class="list-submit"
                                        onclick="return confirDelete();">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </div>
<!--                         <div class="col-md-1">
                            
                        </div> -->
                        <div class="col-md-12 list-carte">
                            <p>
                                <i class="fas fa-map-marker-alt" style="font-size:15px; margin-right:10px; margin-bottom:8px;"></i>
                                <?php echo $donnees['carte'] ?></p><p>
                                <i class="fas fa-map-signs" style="font-size:15px; margin-right:10px; margin-bottom:8px;"></i>
                                <?php echo $donnees['categorie'] ?></p><p>
                                <i class="fas fa-calendar-alt" style="font-size:15px; margin-right:10px; margin-bottom:8px;"></i>
                                <?php echo date('d-m-Y', strtotime($donnees['date'])) ?></p><p>
                                <i class="fas fa-user-tie" style="font-size:15px; margin-right:10px; margin-bottom:8px;"></i>
                                <?php echo $donnees['organisateur'] ?></p>
                        </div>
                        <!-- <div class="col-md-6 list-cat">
                        </div>
                        <div class="col-md-6 list-date">
                        </div>
                        <div class="col-md-6 list-auteur">
                        </div> -->

                    <?php
                    }
                        else {
                    ?>
                        <div class="col-md-6 list-carte"><i class="fas fa-map-marker-alt"
                                                            style="font-size:15px; margin-right:10px; margin-bottom:8px; margin-top: 20px;"></i><?php echo $donnees['carte'] ?>
                        </div>
                        <div class="col-md-6 list-cat"><i class="fas fa-map-signs"
                                                          style="font-size:15px; margin-right:10px; margin-bottom:8px; margin-top: 20px;"></i><?php echo $donnees['categorie'] ?>
                        </div>
                        <div class="col-md-6 list-date"><i class="fas fa-calendar-alt"
                                                           style="font-size:15px; margin-right:10px; margin-bottom:8px;"></i><?php echo date('d-m-Y', strtotime($donnees['date'])) ?>
                        </div>
                        <div class="col-md-6 list-auteur"><i class="fas fa-user-tie"
                                                             style="font-size:15px; margin-right:10px; margin-bottom:8px;"></i><?php echo $donnees['organisateur'] ?>
                        </div>
                <?php
                }
                        echo '</div></div>';
                ?>

                <!--                    <div class="col-md-1">-->
                <!--                        <a href=""><span class="glyphicon glyphicon-eur" aria-hidden="true"></span></a>-->
                <!--                    </div>-->
                <!--                    <div class="col-md-1">-->
                <!--                        <a href=""><span class="glyphicon glyphicon-edit"></span></a>-->
                <!--                    </div>-->


                <div id="win<?php echo $donnees['id_1v1'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button data-dismiss="modal" class="close">&times;</button>
                                <h3 class="text-center mg-bt-20">The WINNER</h3>
                                <hr class="mg-bt-20">
                                <form class="text-center" action="trait_winner.php" method="post">
                                    <input type="hidden" name="id_1v1" value="<?php echo $donnees['id_1v1'] ?>">
                                    <div class="list-modal-content">
                                        <div class="list-modal-radio">
                                            <label><?php echo $donnees ['joueur1'] ?></label>
                                            <input type="radio" name="win" class="form-control mg-bt-20"
                                                   value=" <?php echo $donnees ['id_joueur1'] ?> "/>
                                        </div>
                                        <div class="list-modal-radio">
                                            <label><?php echo $donnees ['joueur2'] ?></label>
                                            <input type="radio" name="win" class="form-control mg-bt-40"
                                                   value=" <?php echo $donnees ['id_joueur2'] ?> "/>
                                        </div>
                                    </div>
                                    <hr>
                                    <input class="btn login mg-tp-20" type="submit" value="Valider" name="submit"/>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        $req->closeCursor();
        $req2->closeCursor();
    } else {
        ?>
        <p class="text-center"><i>Aucun duel en cours ...</i></p>
        <?php
    }
    echo '</div>';

} else {
    ?>
    <script language="javascript">
        document.write(document.getElementById('login').innerHTML);
    </script>
    <?php
}