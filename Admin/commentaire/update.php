<?php
    require '../database.php';
 
    $idcom = null;
    if ( !empty($_GET['idcom'])) {
        $idcom = $_REQUEST['idcom'];
    }
     
    if ( null==$idcom ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $auteurError = null;
        $contenuError = null;
         
        // keep track post values
        $auteur = $_POST['auteur'];
        $contenu = $_POST['contenu'];
         
        // validate input
        $valid = true;
        
        if (empty($auteur)) {
            $auteurError = 'Auteur du Commentaire';
            $valid = false;
        }
         
        if (empty($contenu)) {
            $contenuError = 'Contenu du Commentaire';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE commentaire  set auteur = ?, contenu =? WHERE idcom = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($auteur,$contenu,$idcom));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM commentaire where idcom = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($idcom));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $auteur = $data['auteur'];
        $contenu = $data['contenu'];
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
                <h3>Modérez un Commentaire</h3>
            </div>
     
            <form class="form-horizontal" action="update.php?idcom=<?php echo $idcom?>" method="post">

              <div class="control-group <?php echo !empty($auteurError)?'error':'';?>">
                <label class="control-label">Auteur</label>
                <div class="controls">
                    <input name="auteur" type="text" placeholder="Auteur du Commentaire" value="<?php echo !empty($auteur)?$auteur:'';?>">
                    <?php if (!empty($auteurError)): ?>
                        <span class="help-inline"><?php echo $auteurError;?></span>
                    <?php endif;?>
                </div>
              </div>
              
              <div class="control-group <?php echo !empty($contenuError)?'error':'';?>">
                <label class="control-label">Contenu</label>
                <div class="controls">
                    <input name="contenu" type="text"  placeholder="Contenu du Commentaire" value="<?php echo !empty($contenu)?$contenu:'';?>">
                    <?php if (!empty($contenuError)): ?>
                        <span class="help-inline"><?php echo $contenuError;?></span>
                    <?php endif;?>
                </div>
              </div>

              <div class="form-actions">
                  <button type="submit" class="btn btn-success">Update</button>
                  <a class="btn" href="index.php">Retour</a>
                </div>
            </form>
        </div>
                 
    </div>
  </body>
</html>