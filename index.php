<!DOCTYPE html>
<html lang="fr">
<head>
    <title>FFB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body <?php echo "class='bg-".getenv("QUERY_STRING")."'" ?> >
<?php include('menu.php'); ?>
    <div class="container">
        <div class="row">

            <?php
//            var_dump (getenv("QUERY_STRING"));
            include ('bdd.php');
            //Appel de la page index.html
            $page= getenv("QUERY_STRING");
            if($page=="")
                $page="accueil";
            include $page.".php";
            ?>


        </div>
    </div>
</body>
<script>
    function confirDelete() {
        if(!confirm("Voulez-vous vraiment supprimer cette partie ?"))
            event.preventDefault();
    }
</script>


</html>