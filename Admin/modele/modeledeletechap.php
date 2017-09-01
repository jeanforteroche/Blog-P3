<?php
    require '../database.php';
    $idchap = 0;
     
    if ( !empty($_GET['idchap'])) {
        $idchap = $_REQUEST['idchap'];
    }
     
    if ( !empty($_POST)) {
        // les valeurs tirées de la base
        $idchap = $_POST['idchap'];
         
        // supprime de la base de données
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM chapitre  WHERE idchap = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($idchap));
        Database::disconnect();
        header("Location: index.php");
         
    }
?>