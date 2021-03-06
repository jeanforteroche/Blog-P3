<?php
    require '../database.php';
    $idcom = 0;
     
    if ( !empty($_GET['idcom'])) {
        $idchap = $_REQUEST['idcom'];
    }
     
    if ( !empty($_POST)) {
        // les valeurs tirées de la base
        $idcom = $_POST['idcom'];
         
        // supprime de la base de données
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM commentaire  WHERE idcom = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($idcom));
        Database::disconnect();
        header("Location: index.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="../../style/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../style/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Supprimer un Commentaire</h3>
            </div>
             
            <form class="form-horizontal" action="delete.php" method="post">
              <input type="hidden" name="idcom" value="<?php echo $idcom;?>"/>
              <p class="alert alert-error">Etes vous certain de vouloir effacer ?</p>
              <div class="form-actions">
                  <button type="submit" class="btn btn-danger">Oui</button>
                  <a class="btn" href="index.php">Non</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>