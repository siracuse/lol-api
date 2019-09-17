<?php


    $req = $bdd->query('SELECT id_1v1, carte, categorie, date, i.pseudo as joueur1, j.pseudo as joueur2, k.pseudo as auteur,
                                      i.id_joueur as id_joueur1, j.id_joueur as id_joueur2, l.id_joueur as id_winner
                                FROM 1v1 
                                INNER JOIN joueur i on `1v1`.id_joueur1 = i.id_joueur
                                INNER JOIN joueur j on `1v1`.id_joueur2 = j.id_joueur
                                INNER JOIN joueur k on `1v1`.auteur = k.id_joueur
                                INNER JOIN joueur l on `1v1`.win = l.id_joueur
                                WHERE win IS NOT NULL
                                ORDER BY id_1v1 DESC ');
    $req2 = $bdd->query('SELECT id_1v1 FROM 1v1 WHERE win IS NOT NULL ');


    echo '<div class="col-md-12 mg-bt-40">';
    echo '<h1 class="text-center mg-bt-40 h1-style">HISTORIQUE</h1>';
    echo '<div class="table-responsive"><table id="example" class="table table-bordered" style="width:100%">
                <thead>
                <tr class="tr-style">
                    <th>Date</th>
                    <th>N°Partie</th>
                    <th>Gagnant</th>
                    <th>Perdant</th>
                    <th>Carte</th>
                    <th>Champion</th>
                </tr>
                </thead>
                <tbody class="lb-style">';
    if ($req2->fetch()) {
        while ($donnees = $req->fetch()) {
            ?>


            <tr>
                <td><?php echo date('d-m-Y', strtotime($donnees['date'])) ?></td>
                <td><?php echo $donnees['id_1v1'] ?></td>

                    <?php
                    if ($donnees['id_winner'] === $donnees['id_joueur1']) {
                        echo '<td>'.$donnees['joueur1'].'</td>';
                        echo '<td>'.$donnees['joueur2'].'</td>';
                    } else {
                        echo '<td>'.$donnees['joueur2'].'</td>';
                        echo '<td>'.$donnees['joueur1'].'</td>';
                    }
                    ?>
                <td><?php echo $donnees['carte'] ?></td>
                <td><?php echo $donnees['categorie'] ?></td>
            </tr>


            <?php
        }
        echo '</tbody></table></div> ';
        $req->closeCursor();
        $req2->closeCursor();
    } else {
        ?>
        <p class="text-center"><i>Aucune partie réalisée ...</i></p>
        <?php
    }
    echo '</div>';
    echo '<script>
    $(document).ready(function() {
        let table = $("#example").DataTable( {
            "paging":   false,
            "info":     false,
            "searching":   false
            
        } );
        table .order([0, "desc"]) .draw();
    } );
</script>';
