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


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="../../style/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../style/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../style/tinymcedev/JS/tinymce.js"></script>
    <script type="text/javascript">
    !--
    tinyMCE.init({
    mode : "textareas",
    valid_elements : "em/i,strike,u,strong/b,div[align],br,#p[align],-ol[type|compact],-ul[type|compact],-li"
    });
    //-->
    </script>    
</head>
 
<body>
    <div class="container">
     
        <div class="span10 offset1">
            <div class="row">
                <h3>Editez un Chapitre</h3>
            </div>
     
            <form class="form-horizontal" action="update.php?idchap=<?php echo $idchap?>" method="post">

              <div <?php echo !empty($titreError)?'error':'';?>">
                <label>Titre</label>
                    <textarea name="titre" type="text"  placeholder="Titre"><?php echo !empty($titre)?$titre:'';?></textarea>
                    <?php if (!empty($titreError)): ?>
                        <span class="help-inline"><?php echo $titreError;?></span>
                    <?php endif; ?>
              </div>

              <div <?php echo !empty($auteurError)?'error':'';?>">
                <label>Auteur</label>
                    <textarea name="auteur" type="text"  placeholder="Auteur"><?php echo !empty($auteur)?$auteur:'';?></textarea>
                    <?php if (!empty($auteurError)): ?>
                        <span class="help-inline"><?php echo $auteurError;?></span>
                    <?php endif;?>

              </div>
              
              <div <?php echo !empty($contenuError)?'error':'';?>">
                <label>Contenu</label>
                    <textarea name="contenu" type="text"  placeholder="Contenu"><?php echo !empty($contenu)?$contenu:'';?></textarea>
                    <?php if (!empty($contenuError)): ?>
                        <span class="help-inline"><?php echo $contenuError;?></span>
                    <?php endif;?>
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