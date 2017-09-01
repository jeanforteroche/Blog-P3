<?php
    require '../database.php';
    
    $idchap = null;
    if ( !empty($_GET['idchap'])) {
        $idchap = $_REQUEST['idchap'];
    }
     
    if ( null==$idchap ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM chapitre where idchap = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($idchap));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
