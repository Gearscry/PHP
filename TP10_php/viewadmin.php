<?php
session_start();
    $base = 'pgsql:dbname=etudiants;host=127.0.0.1;port=5432';
$user = 'sebastien';
$password = '';
try {
    $bdd = new PDO($base, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

    $requete = $bdd->prepare('select e.id,e.nom,e.prenom,e.note from etudiant e, utilisateur u where e.user_id = ? and u.id = e.user_id');
    $requete->execute(array($_SESSION["id"]));
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Bienvenue !</title>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous">
</head>
<body>
<header class="container">
    <br>
    <h1>Admin</h1>
    <hr>
</header>
<div class="container">
   <p><?php if(isset($_SESSION["prenom"],$_SESSION["nom"])){
            echo "Bonjour ".$_SESSION["prenom"]."&nbsp".$_SESSION["nom"]."<br>";
       }else{
       echo "Error !!";
       }?></p>

   <div class="card">
       <div class="card-header">
           <label>Liste de vos élèves : </label>
       </div>
       <div class="card-body">
           <table class="table table-striped">
               <tr>
                   <th scope="col">ID</th>
                   <th scope="col">Nom</th>
                   <th scope="col">Prenom</th>
                   <th scope="col">Note</th>
                   <th scope="col"></th>
                   <th scope="col"></th>
               </tr>
               <tbody>
               <?php
                while($données = $requete->fetch()){
                    $_SESSION["delete_id"] = $données["id"];
                    echo "<tr><th scope='row'>".$données["id"]."</th>";
                    echo "<td>".$données["nom"]."</td>";
                    echo "<td>".$données["prenom"]."</td>";
                    echo "<td>".$données["note"]."</td>";
                    echo "<td> <a class=\"btn btn-outline-dark\" href=\"view-editetudiant.php\" role=\"button\">Modifier</a></td>";
                    echo "<td><a class=\"btn btn-outline-dark\" href=\"controller.php?func=deleteStudent\" role=\"button\" name=\"suppr\">Supprimer</a></td></tr>";
                }
               ?>
               </tbody>
           </table>
           <a class="btn btn-outline-dark btn-lg" href="view-newetudiant.php" role="button">Ajouter un nouvel etudiant</a><br><br>
           <a class="btn btn-outline-dark btn-lg" href="controller.php?func=finSession" role="button">Deconnexion</a>
       </div>
   </div>
</div>
</body>
</html>