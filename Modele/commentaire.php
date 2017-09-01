<?php

require_once 'modele.php';

class commentaire extends modele {

	// affiche le contenu et les composantes du chapitre, le titre, l'auteur etc...
    public function getCommentaires($idchapChapitre) {
        $sql = 'SELECT idcom, horodatage, auteur, contenu from commentaire where idchap=?';
        $commentaires = $this->executerRequete($sql, array($idchapChapitre));
        return $commentaires;
    }

    // permets l'ajout de commentaire au chapitre en récupérant l'identifiant du chapitre.
    public function ajouterCommentaire($auteur, $contenu, $idchapChapitre) {
        $sql = 'INSERT into commentaire(auteur, contenu, idchap) values(?, ?, ?)';
        $this->executerRequete($sql, array($auteur, $contenu, $idchapChapitre));
    }
}