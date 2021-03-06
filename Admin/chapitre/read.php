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
                <h3>Lire un Chapitre</h3>
            </div>
             
            <div class="form-horizontal" >
              <div class="control-group">
                <label class="control-label">Titre</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['titre'];?>
                    </label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Auteur</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['auteur'];?>
                    </label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Contenu</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['contenu'];?>
                    </label>
                </div>
              </div>
                <div class="form-actions">
                  <a class="btn" href="index.php">Retour</a>
               </div>
            </div>
        </div>
    </div>
  </body>
</html>