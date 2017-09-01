<?php

class vue {

    private $fichier;
    
    // affiche le titre
    private $titre;

    public function __construct($action) {
        $this->fichier = "Vue/vue" . $action . ".php";
    }

    // recupère et affiche la vue par rapport au squelette contenant l'ossature en PHP
    public function generer($donnees) {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('style/squelette.php', array('titre' => $this->titre, 'contenu' => $contenu));
        echo $vue;
    }

    // Renvoie le resultat
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

}