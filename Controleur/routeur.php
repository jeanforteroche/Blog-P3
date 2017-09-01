<?php

// appelle les fichiers ooncernés
require_once 'autoloader.php';
Autoloader::register(); 

class routeur {

    private $ctrlAccueil;
    private $ctrlChapitre;

    public function __construct() {
        $this->ctrlAccueil = new controleurAccueil();
        $this->ctrlChapitre = new controleurChapitre();
    }

    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'chapitre') {
                    $idchapChapitre = intval($this->getParametre($_GET, 'idchap'));
                    if ($idchapChapitre != 0) {
                        $this->ctrlChapitre->chapitre($idchapChapitre);
                    }
                    else
                        throw new Exception("Mauvais identifiant de chapitre");
                }


                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idchapChapitre = $this->getParametre($_POST, 'idchap');
                    $this->ctrlChapitre->commenter($auteur, $contenu, $idchapChapitre); //commenter un chapitre
                }
                else
                    throw new Exception("Action non valide");
            }
            else {  // page d'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
