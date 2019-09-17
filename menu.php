<!-- Fixed navbar -->
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/lol">FFB</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--                <li><a href="/lol">Accueil</a></li>-->

                <!--                <li><a href="/lol/1v1.php">1v1</a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">DUEL <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?new" class="border-style">Nouveau duel</a></li>
                        <li><a href="index.php?list" class="border-style">Duels en cours</a></li>
                        <li><a href="index.php?historique_duel">Historique</a></li>
<!--                        <li><a href="index.php?classement">Classement</a></li>-->
                        <!--                        <li role="separator" class="divider"></li>-->
                        <!--                        <li class="dropdown-header">Nav header</li>-->
                        <!--                        <li><a href="#">Separated link</a></li>-->
                        <!--                        <li><a href="#">One more separated link</a></li>-->
                    </ul>
                </li>
                <li><a href="index.php?classement">CLASSEMENT</a></li>
                <li><a href="index.php?video">VIDEO</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();
                if (!empty($_SESSION['username'])) {
                    ?>
                    <li><a href="index.php?profile"><span class="glyphicon glyphicon-user icon-menu"></span><?php echo $_SESSION['pseudo'] ?></a></li>
                    <li><a href="/lol/deconnexion.php"><span class="glyphicon glyphicon-log-in icon-menu"></span> Déconnexion</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li><a href="#" data-target="#login" data-toggle="modal"><span
                                    class="glyphicon glyphicon-log-in icon-menu"></span> Connexion</a></li>
                    <?php
                }

                ?>

            </ul>
        </div>
    </div>
</nav>


<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h3 class="text-center mg-bt-40">Connectez-vous</h3>
                <form class="text-center" action="connexion.php" method="post">
                    <input type="text" name="username" class="form-control mg-bt-20" placeholder="nom d'utilisateur"
                           autofocus required/>
                    <input type="password" name="password" class="form-control mg-bt-20" placeholder="mot de passe"
                           required/>
                    <input class="btn login" type="submit" value="Se connecter"/>
                </form>
            </div>
        </div>
    </div>
</div>