<?php
    class football{
        //public $name;
        //public $titres;
        private $name;
        private $titres;
        const nb_equipe = "Nombre d'équipe : ";
        static $nb_equipe = 0;
       function __construct($name,$titres)
        {
            $this->name = $name;
            $this->titres = $titres;
            self::$nb_equipe++;
        }

        function display(){
            echo "L'équipe ".$this->name." a ".$this->titres." titres.<br>";
        }
        static function displayNbEquipe(){
          echo self::nb_equipe.self::$nb_equipe."<br>";
        }
        public function setName($name){
            $this->name = $name;
        }
        public function setTitres($titres){
            $this->titres = $titres;
        }
        function __destruct()
        {
            echo "Destructor<br>";
            self::$nb_equipe--;
        }
    }


    //$f = new football("", "");
    //$f->name = "Paris";
    //$f->titres = 4;
    //echo "question 2 : ";
   //echo $f->display();
    $f2 = new football("","");
    $f2->setName("Paris");
    $f2->setTitres("5");
    echo "Question 5 : ";
    echo $f2->display();
    $f3 = new football("Lyon", 6);
    echo "Question 7 : ";
    echo $f3->display();
    echo $f3::displayNbEquipe();
