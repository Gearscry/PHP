<?php
include 'connexpdo.php';

$base = 'pgsql:dbname=citations;host=127.0.0.1;port=5432';
$user = 'sebastien';
$password = '';

$dbh = connextpdo($base,$user,$password);

$query_auteur = "SELECT * from auteur";

$requete = $dbh->query("SELECT * from auteur");
echo "<h2>Auteurs de la BD</h2>";
echo "Nom&nbsp&nbsp&nbsp&nbsp&nbspPrénom<br>";
while($data = $requete->fetch()){
    echo $data['nom']."&nbsp&nbsp&nbsp&nbsp&nbsp".$data['prenom']."<br>";
}

$query_citation = "SELECT * from citation";
$requete = $dbh->query($query_citation);
echo "<h2>Citations de la BD</h2>";
while($data = $requete->fetch()){
    echo $data['id']."<br>";
}

$query_siecle = "SELECT * from siecle";
$requete = $dbh->query($query_siecle);
echo "<h2>Siecles de la BD</h2>";
while($data = $requete->fetch()){
    echo $data['numero']."<br>";
}