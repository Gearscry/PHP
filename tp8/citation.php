<?php
include 'connexpdo.php';

$base = 'pgsql:dbname=citations;host=127.0.0.1;port=5432';
$user = 'sebastien';
$password = '';

$dbh = connextpdo($base,$user,$password);

$query = $dbh->query("select * from citation");
while($data = $query->fetch()) {
    $nb_citation = $data["id"];
}
$query2 = $dbh->query("select a.nom,a.prenom,c.id,c.phrase,s.numero from auteur a, citation c, siecle s where a.id = c.auteurid and c.siecleid = s.id");
$id = rand(1,$nb_citation);
while($data  = $query2->fetch()){
    if($data["id"] == $id){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Informations</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="recherche.php">Recherche</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="modification.php">Modification</a>
            </li>
        </ul>
    </div>
</nav>
<br>
<h2>La citation du jour</h2><hr>
<p>Il y a <?php echo $nb_citation; ?> citations répertoriées</p>
<p>Et voici l'une d'entre elle générée aléatoirement : </p>
<p><b><?php echo $data["phrase"];  ?></b></p>
<p><?php echo $data["prenom"]." ".$data["nom"]." (".$data["numero"]." ème siècle)<br>";}} $id = $id+1 ?></p>
</body>
</html>