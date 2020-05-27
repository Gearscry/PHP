<?php
setlocale(LC_ALL, fr_fr);
$base = 'pgsql:dbname=etudiants;host=127.0.0.1;port=5432';
$user = 'sebastien';
$password = '';
try {
    $bdd = new PDO($base, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

if(isset($_GET['func'])){
    if($_GET['func'] == 'ajoutUser'){
        ajoutUser($bdd);
    }else if($_GET['func'] == "readUser"){
        readUser($bdd);
    }else if($_GET['func'] == "ajoutStudent"){
        ajoutStudent($bdd);
    }else if($_GET['func'] == "editStudent"){
        editStudent($bdd);
    }else if($_GET['func'] == "deleteStudent"){
        deleteStudent($bdd);
    }else if($_GET['func'] == "finSession"){
        finSession();
    }
}
function ajoutUser($bdd)
{
    $idAlready = false;
    $reqId = $bdd->prepare('select id from utilisateur where id=:id;');
    $reqId->execute(array('id' => $_POST['id']));
    $reqFetchId = $reqId->fetch();
    if ($reqFetchId['id'] > 0) {
        $idAlready = true;
    }
    if (!$idAlready) {
        $reqUser = $bdd->prepare('INSERT INTO utilisateur(id,login,password,mail,nom,prenom) VALUES(:id,:login,:password,:mail,:nom,:prenom)');
        $password_crypte = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $reqUser->execute(array(
            'id' => $_POST['id'],
            'login' => $_POST['login'],
            'password' => $password_crypte,
            'mail' => $_POST['mail'],
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom']));
    } else {
        echo "Deja dans la base de donnée";
    }
    header('Location: index.php');
}

function readUser($bdd){
    session_start();
    $req = $bdd->prepare("select * from utilisateur where login = ?");
    $req->execute(array($_POST["login"]));
    $result = $req->fetch();
    if($result["login"] == $_POST["login"] and password_verify($_POST["password"],$result["password"])){
        $_SESSION["login"] = $result["login"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["prenom"] = $result["prenom"];
        $_SESSION["nom"] = $result["nom"];
        $_SESSION["id"] = $result["id"];
        echo "c'est bon <br>";
    }
    else {
        echo "Erreur de Login ou de Mot de Passe <br>";
    }
    header('Location: viewadmin.php');
}

function ajoutStudent($bdd){
    $idAlready = false;
    $reqId = $bdd->prepare('select id from etudiant where id=:id;');
    $reqId->execute(array('id' => $_POST['id']));
    $reqFetchId = $reqId->fetch();
    if ($reqFetchId['id'] > 0) {
        $idAlready = true;
    }

    if(!$idAlready){
        $reqStudent = $bdd->prepare("insert into etudiant(id,user_id,nom,prenom,note) values(:id,:user_id,:nom,:prenom,:note)");
        $reqStudent->execute(array(
            'id' => $_POST["id"],
            'user_id' => $_POST["user_id"],
            'nom' => $_POST["nom"],
            'prenom' => $_POST["prenom"],
            'note' => $_POST["note"]
        ));
    } else {
        echo "Deja dans la base de donnée";
    }

    header('Location: viewadmin.php');
}

function editStudent($bdd){
    $reqEditStudent = $bdd->prepare("update etudiant set user_id = :user_id,note = :note where id = :id");
    $reqEditStudent->execute(array('id' => $_POST["id"],
        'user_id'=>$_POST["user_id"],
        'note'=>$_POST["note"]));

    header('Location: viewadmin.php');
}

function deleteStudent($bdd){
    session_start();
    $req = $bdd->prepare("delete from etudiant where id = :id");
    $req->execute(array('id'=>$_SESSION["delete_id"]));
    header('Location: viewadmin.php');
}

function finSession(){
    session_start();
    session_destroy();
    header('Location: index.php');
}

?>