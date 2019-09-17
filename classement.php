<?php
//if (!empty($_SESSION['username'])) {

    $req = $bdd->query('SELECT * FROM joueur ORDER BY score DESC');


//    $req2 = $bdd->query('SELECT id_1v1 FROM 1v1 WHERE win IS NOT NULL ');

    echo '<div class="col-md-10 col-md-offset-1">';
    echo '<h1 class="text-center mg-bt-40 h1-style">CLASSEMENT</h1>';
    echo '        <table class="table">
            <thead>
            <tr class="tr-style">
                <th scope="col">#</th>
                <th scope="col">Invocateur</th>
                <th scope="col">Score</th>
            </tr>
            </thead>
            <tbody class="lb-style">';
    $i = 0;

    while ($donnees = $req->fetch()) {
        $i++;
//        ?>
<!--        <div class="col-md-8 col-md-offset-2  classement-bandeau">-->
<!--            <div class="col-md-2">-->
<!--                --><?php
//                switch($i){
//                    case 1: echo "<img src='img/or.png' style='width: 30px;'>"; break;
//                    case 2: echo "<img src='img/argent.png' style='width: 30px;'>"; break;
//                    case 3: echo "<img src='img/bronze.png' style='width: 30px;'>"; break;
//                    default: echo $i."th";
//                }
//                ?>
<!--            </div>-->
<!--            <div class="col-md-8">--><?php //echo $donnees['pseudo'] ?><!--</div>-->
<!--            <div class="col-md-2">-->
<!--                --><?php
//                $score = $donnees['score'].' point';
//                if($donnees['score'] > 0){$score.='s';}
//                echo $score;
//
//                ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!---->
<!---->
<!--        --><?php
        ?>

            <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $donnees['pseudo'] ?></td>
                <td><?php $score = $donnees['score'].' point';
                                 if($donnees['score'] > 0){$score.='s';}
                                   echo $score; ?></td>
            </tr>




    <?php
    }
    $req->closeCursor();
    echo '            </tbody>
        </table>';
//    $req2->closeCursor();

    echo '</div>';
//
//} else {
//    ?>
<!--    <script language="javascript">-->
<!--        document.write(document.getElementById('login').innerHTML);-->
<!--    </script>-->
<!--    --><?php
//}