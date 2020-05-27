<?php
    $base = 'pgsql:dbname=graphenotes;host=127.0.0.1;port=5432';
    $user = 'sebastien';
    $password = '';
    try {
        $dbh = new PDO($base, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

    $moyenneE1 = 0;
    $moyenneE2 = 0;

    $requete = $dbh->query("select avg(note) from notes where etudiant = 'E1'");
    $result1 = $requete->fetch();
    $moyenneE1 = $result1[0];

    $requete = $dbh->query("select avg(note) from notes where etudiant = 'E2'");
    $result2 = $requete->fetch();
    $moyenneE2 = $result2[0];

    header("Content-type: image/png");
    $image = imagecreate(600,300);

    $gris = imagecolorallocate($image,128,128,128);
    $noir = imagecolorallocate($image,0,0,0);
    $bleu = imagecolorallocate($image, 0, 0, 255);
    $blanc = imagecolorallocate($image, 255, 255, 255);

    imagestring($image,3,210,20,"Notes des etudiants E1 et E2",$noir);
    imagestring($image,3,300,250,"Moyenne des notes de E1 : ".$moyenneE1,$noir);
    imagestring($image,3,300,270,"Moyenne des notes de E2 : ".$moyenneE2,$noir);
    imagestring($image,3,20,150,"E1",$blanc);
    imagestring($image,3,40,150,"E2",$bleu);

    $requete = $dbh->query("select note from notes where etudiant = 'E1'");
    $note_precedante = 0;
    $x = 0;
    $y = 100;
    while($data = $requete->fetch()){
        if($data["note"] > $note_precedante){
            imageline($image,$x,$y,$x + ($data["note"]*4),$y,$blanc);
            $x = $x + ($data["note"]*4);
            $y = $y - 1;
        }else {
            imageline($image,$x,$y,$x + ($data["note"]*4),$y,$blanc);
            $x = $x + ($data["note"]*4);
            $y = $y + 1;
        }
        $note_precedante = $data["note"];
    }
    $requetes = $dbh->query("select note from notes where etudiant = 'E2'");
    $note_precedante = 0;
    $x = 0;
    $y = 130;
    while($data = $requetes->fetch()){
      if($data["note"] > $note_precedante){
          imageline($image,$x,$y,$x + ($data["note"]*10),$y,$bleu);
          $x = $x + ($data["note"]*10);
          $y = $y - 1;
        }else {
         imageline($image,$x,$y,$x + ($data["note"]*10),$y,$bleu);
         $x = $x + ($data["note"]*10);
            $y = $y + 1;
     }
     $note_precedante = $data["note"];
    }
    imagepng($image);