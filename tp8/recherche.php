<!DOCTYPE html>
<html>
    <head>
        <title>Recherche dans la BDD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="citation.php">Informations <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="recherche.php">Recherche</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="modification.php">Modification</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Rechercher une citation</h1>
    <hr/>
    <form action="recherche.php" method="post">
        <div class="form-group">
            <label for="auteur">Auteur</label>
            <select name="auteur" id="auteur" class="custom-select custom-select-sm">
                <?php
                include 'connexpdo.php';

                $base = 'pgsql:dbname=citations;host=127.0.0.1;port=5432';
                $user = 'sebastien';
                $password = '';

                $bdd = connextpdo($base,$user,$password);
                $requeteAuteur = $bdd->query("select id,nom from auteur;");


                while($auteur = $requeteAuteur->fetch()){
                    echo "<option value='".$auteur['nom']."'>".$auteur['nom']."</option>";
                }
                $requeteAuteur->closeCursor();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="siecle">Siècle</label>
            <select  name="siecle" id="siecle" class="custom-select custom-select-sm">
                <?php
                $requeteSiecle = $bdd->query("select id,numero from siecle;");

                while($siecle = $requeteSiecle->fetch()){
                    echo "<option value='".$siecle['numero']."'>".$siecle['numero']."</option>";
                }
                $requeteSiecle->closeCursor();
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
    <br>

    <?php
    if(isset($_POST['siecle']) && isset($_POST['auteur'])){
        echo "<table class=\"table\">
                <thead><tr><th scope=\"col\">Citation</th><th scope=\"col\">Auteur</th><th scope=\"col\">Siècle</th></tr></thead>
                <tbody>";
        $requeteRecherche = $bdd->prepare("select c.phrase, a.nom, s.numero from citation c, auteur a, siecle s 
                where auteurid=(select id from auteur a where a.nom =:nomAuteur)
                  and siecleid=(select id from siecle a where numero =:siecle)
                  and s.id = siecleid and a.id= auteurid");
        $requeteRecherche->execute(array("nomAuteur"=>$_POST["auteur"], "siecle"=>$_POST['siecle']));

        while($recherche = $requeteRecherche->fetch()){
            echo "<tr><td>".$recherche['phrase']."</td><td>".$recherche['nom']."</td><td>".$recherche['numero']."</td>";
        }
        echo "</tbody></table>";
        $requeteRecherche->closeCursor();
    }
    ?>
    </body>
</html>
