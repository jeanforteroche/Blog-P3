<?php
require '../database.php';

if ( !empty($_POST)) {
    // keep track validation errors
    $titreError = null;
    $auteurError = null;
    $contenuError = null;
     
    // les valeurs tirées de la base
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $contenu = $_POST['contenu'];
     
    // validate input
    $valid = true;
    if (empty($titre)) {
        $titreError = 'Titre du Chapitre';
        $valid = false;
    }
     
    if (empty($auteur)) {
        $titreError = 'Auteur du Chapitre';
        $valid = false;
    }
             
    if (empty($contenu)) {
        $contenuError = 'Contenu du Chapitre';
        $valid = false;
    }
     
    // ecrit dans la base de données
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO chapitre (titre,auteur,contenu) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($titre,$auteur,$contenu));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>