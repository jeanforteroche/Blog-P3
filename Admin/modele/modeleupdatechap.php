<?php
    require '../database.php';
 
    $idchap = null;
    if ( !empty($_GET['idchap'])) {
        $idchap = $_REQUEST['idchap'];
    }
     
    if ( null==$idchap ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $titreError = null;
        $auteurError = null;
        $contenuError = null;
         
        // keep track post values
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $contenu = $_POST['contenu'];
         
        // validate input
        $valid = true;
        if (empty($titre)) {
            $titreError = 'Titre du chapitre';
            $valid = false;
        }
        
        if (empty($auteur)) {
            $auteurError = 'Auteur du Chapitre';
            $valid = false;
        }
         
        if (empty($contenu)) {
            $contenuError = 'Contenu du Chapitre';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE chapitre  set titre = ?, auteur = ?, contenu =? WHERE idchap = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($titre,$auteur,$contenu,$idchap));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM chapitre where idchap = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($idchap));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $titre = $data['titre'];
        $auteur = $data['auteur'];
        $contenu = $data['contenu'];
        Database::disconnect();
    }
?>