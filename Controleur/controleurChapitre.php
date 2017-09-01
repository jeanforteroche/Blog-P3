<?php

// appelle les fichiers ooncernés
require_once 'autoloader.php';
Autoloader::register(); 

class controleurChapitre {

    private $chapitre;
    private $commentaire;

    public function __construct() {
        $this->chapitre = new Chapitre();
        $this->commentaire = new Commentaire();
    }

    // affiche les details du chapitre
    public function chapitre($idchapChapitre) {
        $chapitre = $this->chapitre->getChapitre($idchapChapitre);
        $commentaires = $this->commentaire->getCommentaires($idchapChapitre);
        $vue = new Vue("Chapitre");
        $vue->generer(array('chapitre' => $chapitre, 'commentaires' => $commentaires));
    }

    public function commenter($auteur, $contenu, $idchapChapitre) {
        // Enregistre le commentaire dans la base
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idchapChapitre);
        // actualise la vue du chapitre.
        $this->chapitre($idchapChapitre);
    }

}

