<?php

// appelle les fichiers modeles
require_once '../autoloader.php';
Autoloader::register();
require_once '../origin.php';


class adminChapitre {

    public function __construct() {
        $this->chapitre = new Chapitre();
    }

    public function accueil() {
        $chapitres = $this->chapitre->getChapitres();
        $vue = new Vue("Accueil");
        $vue->generer(array('chapitres' => $chapitres));
    }

}

