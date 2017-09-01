<?php

require_once 'modele.php';

class chapitre extends modele {

    // récupére dans la base les élements du chapitre
    public function getChapitres() {
        $sql = 'SELECT idchap, titre, auteur, horodatage, contenu from chapitre ORDER by idchap desc';
        $chapitres = $this->executerRequete($sql);
        return $chapitres;
    }

    // permets d'afficher le resultat 
    public function getChapitre($idchapChapitre) {
        $sql = 'SELECT idchap, titre, auteur, horodatage, contenu from chapitre where idchap=?';
        $chapitre = $this->executerRequete($sql, array($idchapChapitre));
        if ($chapitre->rowCount() > 0)
            return $chapitre->fetch(); 
        else
            throw new Exception("Aucun Chapitre ne correspond à l'identifiant '$idchapChapitre'");
    }

}