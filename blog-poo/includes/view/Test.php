<?php

class Test 
{
    static function afficherHeure ()
    {
        $heure = date("H:i:s");
        echo "<h2>il est $heure</h2>";
    }
}