<?php
//try
//{
//    $bdd = new PDO('mysql:host=localhost;dbname=lol;charset=utf8', 'root', '');
//}
//catch (Exception $e)
//{
//    die('Erreur : ' . $e->getMessage());
//}
try
{
    $bdd = new PDO('mysql:host=mysql-siracuseharichandra.alwaysdata.net;dbname=siracuseharichandra_lol;charset=utf8', '155686', 'wvkajk75a097');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}