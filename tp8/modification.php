<!DOCTYPE html>
<hmtl>
    <head>
        <title>Modification BDD</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="citation.php">Informations <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recherche.php">Recherche</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="modification.php">Modification</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Ajout</h1>
    <hr />

    <form method="post">
        <div class="form-group">
            <label for="id_auteur">ID de l'auteur</label>
            <input type="text" class="form-control" id="id_auteur" name="id_auteur" required>
        </div>

        <div class="form-group">
            <label for="nom_auteur">Nom de l'auteur</label>
            <input type="text" class="form-control" id="nom_auteur" name="nom_auteur" required>
        </div>

        <div class="form-group">
            <label for="id_auteur">Prénom de l'auteur</label>
            <input type="text" class="form-control" id="prenom_auteur" name="prenom_auteur" required>
        </div>

        <div class="form-group">
            <label for="id_siecle">ID du siècle</label>
            <input type="text" class="form-control" id="id_siecle" name="id_siecle" required>
        </div>

        <div class="form-group">
            <label for="num_siecle">Siècle</label>
            <input type="text" class="form-control" id="num_siecle" name="num_siecle" required>
        </div>

        <div class="form-group">
            <label for="citation">Citation</label>
            <input type="text" class="form-control" id="citation" name="citation" required>
        </div>

        <button type="submit" class="btn btn-secondary">Ajouter</button>
    </form>

    <br>
    <h1>Suppression</h1>
    <br>
    <form method="post">
        <div class="form-group">
            <select  name="suppr" id="id_suppr" class="custom-select custom-select-pm">
                <option selected>Selectionner l'ID d'une citation</option>
                <?php

                include 'connexpdo.php';

                $base = 'pgsql:dbname=citations;host=127.0.0.1;port=5432';
                $user = 'sebastien';
                $password = '';

                $bdd = connextpdo($base,$user,$password);

                $requeteIdCitation = $bdd->query("select id from citation;");

                while($idCitation = $requeteIdCitation->fetch()){
                    echo "<option value='".$idCitation['id']."'>".$idCitation['id']."</option>";
                }
                $requeteIdCitation->closeCursor();
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Supprimer</button>
    </form>

    <?php
    //insertion dans la BDD

    if(isset($_POST['id_auteur']) && isset($_POST['nom_auteur']) &&isset($_POST['prenom_auteur']) && isset($_POST['id_siecle']) && isset($_POST['num_siecle']) &&isset($_POST['citation'])){
        $idCitations = $_POST['id_siecle'] + $_POST['id_auteur'];
        $sielce = $_POST['id_siecle'];
        $ateruet = $_POST['id_auteur'];
        $phrase =$_POST['citation'];

        $idAlready = false;

        $reqId = $bdd->prepare('select id from citation where id=:id;');
        $reqId->execute(array('id'=>$idCitations));
        $reqFetchId = $reqId->fetch();

        $reqAutId = $bdd->prepare('select id from auteur where id=:id;');
        $reqAutId->execute(array('id'=>$_POST['id_auteur']));
        $reqAutFetchId = $reqAutId->fetch();

        $reqSiecleId = $bdd->prepare('select id from siecle where id=:id;');
        $reqSiecleId->execute(array('id'=>$_POST['id_siecle']));
        $reqSiecleFetchId = $reqSiecleId->fetch();

        if ($reqFetchId['id'] > 0){
            $idAlready = true;
        }

        if ($reqAutFetchId['id'] > 0){
            $idAlready = true;
        }

        if ($reqSiecleFetchId['id'] > 0){
            $idAlready = true;
        }



        if(!$idAlready){
            $reqAuteure = $bdd->prepare('INSERT INTO auteur(id, nom, prenom) VALUES(:id, :nom, :prenom)');
            $reqAuteure->execute(array(
                'id'=>$_POST['id_auteur'],
                'nom'=>$_POST['nom_auteur'],
                'prenom'=>$_POST['prenom_auteur']));


            $reqSiecles = $bdd->prepare('INSERT INTO siecle(id, numero) VALUES(:id, :num)');
            $reqSiecles->execute(array(
                'id'=>$_POST['id_siecle'],
                'num'=>$_POST['num_siecle']));

            $reqCitations = $bdd->prepare('INSERT INTO citation(id, phrase, auteurid, siecleid) VALUES(:id, :phrase, :idAuteur, :idSiecle)');
            $reqCitations->execute(array(
                'id'=>($_POST['id_siecle'] + $_POST['id_auteur']),
                'phrase'=>$_POST['citation'],
                'idAuteur'=>$_POST['id_auteur'],
                'idSiecle'=>$_POST['id_siecle']));
        }else{
            echo "Deja dans la base de données";
        }


    }

    if(isset($_POST['suppr'])){
        $requeteSupprCitation = $bdd->prepare('delete from citation where id=:id');
        $requeteSupprCitation->execute(array(
            'id'=>$_POST['suppr']));
    }
    ?>
    </body>
</hmtl>
