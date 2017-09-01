<?php

abstract class modele {

    private $bdd;

   // connexion a la base de données
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); 
        }
        else {
            $resultat = $this->getBdd()->prepare($sql);  
            $resultat->execute($params);
        }
        return $resultat;
    }
   
    // chemin vers la base de données en PDO avec la fonctionnalité permettant d'affocher les erreurs.
    private function getBdd() {
        if ($this->bdd == null) {
            $this->bdd = new PDO('mysql:host=localhost;dbname=blog-p3;charset=utf8', 'root', '',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}