<?php
    echo "<form action = 'Exercice3.php' method = 'post'>";
    echo "Nom : <input type ='text' name='nom'/><br>";
    echo "Prenom : <input type ='text' name='prenom'/><br>";
    echo "Mail : <input type ='text' name='mail'/><br>";
    echo "Age : <select name='age'><br>";
    echo "<option value=''>--Age--</option>";
    echo "<option value='0-20'>0-20</option>";
    echo "<option value='20-40'>20-40</option>";
    echo "<option value='40-60'>40-60</option>";
    echo "<option value='60-80'>60-80</option>";
    echo  "</select><br>";
    echo "Monsieur :  <input type='radio' name='genre' value='Monsieur'/>";
    echo "Madame :  <input type='radio' name='genre' value='Madame'/><br> ";
    echo "<input type='submit' value='Envoyer'/>";
    echo "</form>";
    class form{
        private $nom;
        private $prenom;
        private $mail;
        private $age;
        private $genre;
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function setPrenom($prenom){
            $this->prenom = $prenom;
        }
        public function setMail($mail){
            $this->mail = $mail;
        }
        public function setAge($age){
            $this->age = $age;
        }
        public function setGenre($genre){
            $this->genre = $genre;
        }
        function __construct()
        {
            /*$this->nom = $_POST['nom'];
            $this->prenom = $_POST['prenom'];
            $this->mail = $_POST['mail'];           //Question 2
            $this->age = $_POST['age'];
            $this->genre = $_POST['genre'];*/
            $this->setNom($_POST['nom']);
            $this->setPrenom($_POST['prenom']);
            $this->setAge($_POST['age']);           //Question 3
            $this->setGenre($_POST['genre']);
            $this->setMail($_POST['mail']);
        }
        function display(){
            echo "Nom : ".$this->nom."<br>";
            echo "Prenom : ".$this->prenom."<br>";
            echo "Mail : ".$this->mail."<br>";
            echo "Age : ".$this->age."<br>";
            echo "Genre : ".$this->genre."<br>";
        }
    }

    $form = new form();
    $form->display();