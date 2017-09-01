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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="../../style/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../style/js/bootstrap.min.js"></script>
    <script src="../../style/tinymcedev/js/tinymce.js" type="text/javascript"></script>
    <script src="../../style/tinymcedev/js/tinymce.min.js" type="text/javascript"></script>
    <script src="../../style/tinymcedev/js/jquery.tinymce.min.js" type="text/javascript"></script>
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
                        <h3>Rédiger un Chapitre</h3>
                    </div>
             
                    <form class="form-horizontal" action="creation.php" method="post">

                      <div <?php echo !empty($titreError)?'error':'';?>">
                        <label>Titre</label>
                            <textarea name="titre" type="text"  placeholder="Titre" value="<?php echo !empty($titre)?$titre:'';?>" required></textarea>
                            <?php if (!empty($titreError)): ?>
                                <span class="help-inline"><?php echo $titreError;?></span>
                            <?php endif; ?>
                      </div>

                      <div  <?php echo !empty($auteurError)?'error':'';?>">
                        <label>Auteur</label>
                            <textarea name="auteur" type="text" placeholder="Auteur" value="<?php echo !empty($auteur)?$auteur:'';?>" required></textarea>
                            <?php if (!empty($auteurError)): ?>
                                <span class="help-inline"><?php echo $auteurError;?></span>
                            <?php endif;?>
                      </div>

                      <div <?php echo !empty($contenuError)?'error':'';?>">
                        <label>Contenu</label>
                            <textarea name="contenu" type="text"  placeholder="Contenu" value="<?php echo !empty($contenu)?$contenu:'';?>" required></textarea>
                            <?php if (!empty($contenuError)): ?>
                                <span class="help-inline"><?php echo $contenuError;?></span>
                            <?php endif;?>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Creation</button>
                          <a class="btn" href="index.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> 
  </body>
</html>
