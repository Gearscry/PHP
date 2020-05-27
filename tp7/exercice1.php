<?php
    include "formulaire.php";
    class form2 extends formulaire{
        public function ajouterNewBouton($text,$name){
            echo $text."<input type= 'radio' name = '$name' value = '$text'/>";
        }
    }
    $form = new form2("exercice1.php","post");
    $form->ajouterzonetexte("Votre nom","Votre_nom");
    echo "<br>";
    $form->ajouterzonetexte("Votre code","Votre_code");
    echo "<br>";
    $form->ajouterNewBouton("Homme","genre");
    echo "<br>";
    $form->ajouterNewBouton("Femme","genre");
    echo "<br>";
    $form->ajouterNewBouton("Tennis","tennis");
    echo "<br>";
    $form->ajouterNewBouton("Karate","karate");
    echo "<br>";
    $form->ajouterbouton();
    $form->getform();

    echo "Votre nom : " .$_POST["Votre_nom"]."<br>";
    echo "Votre code : " .$_POST["Votre_code"]."<br>";
    echo "Votre genre : " .$_POST["genre"]."<br>";
    echo "Votre sport : ".$_POST["tennis"]." ".$_POST["karate"]."<br>";