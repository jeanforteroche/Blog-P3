<?php

// appelle les fichiers modeles
require_once 'autoloader.php';
Autoloader::register(); 


class controleurAccueil {

    private $chapitre;

    public function __construct() {
        $this->chapitre = new Chapitre();
    }

// Affiche les chapitres sur la page d'accueil du blog.
    public function accueil() {
        $chapitres = $this->chapitre->getChapitres();
        $vue = new Vue("Accueil");
        $vue->generer(array('chapitres' => $chapitres));
    }

}

