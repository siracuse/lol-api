<div class="col-md-6 col-md-offset-3 text-center form-accueil">
    <img src="img/fond/<?php echo ltrim(date('d'), '0'); ?>.png" class="img-responsive img-accueil">
    <form action="index.php?historique" method="post">
        <div class="form-group">
            <input name="summoner" type="text" class="form-control" placeholder="Nom ..." list="pseudo" required>
            <datalist id="pseudo">
                <option value="FFB Katamooundi">
                <option value="FFB Cédric ß">
                <option value="FFB Harichandra">
                <option value="igouf974">
                <option value="LordFoulPixel">
            </datalist>
        </div>
        <button type="submit" class="btn btn-default new-modif" name="envoyer">Valider</button>
    </form>
</div>