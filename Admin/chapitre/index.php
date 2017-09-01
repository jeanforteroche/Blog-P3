<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="../../style/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../style/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
      <div class="row">
        <h3>Gestion des Chapitres</h3>
      </div>
      
      <div class="row">
        <p>
          <a href="creation.php" class="btn btn-success">Rédaction</a> | <a href="../origin.php" class="btn btn-secondary">Retour Administration</a>
        </p>
        
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Titre</th>
              <th>Auteur</th>
              <th>Contenu</th>
              <th>Opérations</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
            require '../database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM chapitre ORDER BY idchap DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              echo '<td>'. $row['titre'] . '</td>';
              echo '<td>'. $row['auteur'] . '</td>';
              echo '<td>'. $row['contenu'] . '</td>';
              echo '<td width=300>';
              echo '<a class="btn btn-info" href="read.php?idchap='.$row['idchap'].'">Lire</a>';
              echo ' ';
              echo '<a class="btn btn-success" href="update.php?idchap='.$row['idchap'].'">Edition</a>';
              echo ' ';
              echo '<a class="btn btn-danger" href="delete.php?idchap='.$row['idchap'].'">Supprimer</a>';
              echo '</td>';
              echo '</tr>';
              }
              Database::disconnect();
              ?>
            </tbody>
        </table>
      </div>    
    </div>
  </body>
</html>
        