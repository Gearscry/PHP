<?php
    trait un{
        function small($text){
            echo "<small>$text</small><br>";
        }
        function big($text){
            echo "<h4>$text</h4><br>";
        }
    }

    trait deux{
        function small($text){
            echo "<i>$text</i><br>";
        }
        function big($text){
            echo "<h2>$text</h2><br>";
        }
    }

    class text{
        use un,deux{
            un::big insteadof deux;
            deux::big as gros;
            un::small insteadof deux;
            deux::small as petit;
        }
    }

    $text = new text();
    $text->small("Contenu lambda");
    $text->big("Contenu lambda");
    $text->gros("Contenu lambda");
    $text->petit("Contenu lambda");