<?php
    include 'formulaire.php';
    $form = new formulaire("testformulaire.php","post");
    $form->ajouterzonetexte("Votre nom","Votre_nom");
    echo "<br>";
    $form->ajouterzonetexte("Votre code","Votre_code");
    echo "<br>";
    $form->ajouterbouton();
    $form->getform();

        echo "Votre nom : " . $_POST['Votre_nom'] . "<br>";
        echo "Votre code : " . $_POST['Votre_code'] . "<br>";