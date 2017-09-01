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
        <h3>Gestion des Commentaires</h3>
      </div>
      
      <div class="row">
        <p>
          <a href="../origin.php" class="btn btn-secondary">Retour Administration</a>
        </p>
        
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Auteur</th>
              <th>Contenu</th>
              <th>Concerne le chapitre : </th>
              <th>Opérations</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
            require '../database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM commentaire ORDER BY idcom DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              echo '<td>'. $row['auteur'] . '</td>';
              echo '<td>'. $row['contenu'] . '</td>';
              echo '<td>'. $row['idchap'] . '</td>';
              echo '<td width=300>';
              echo '<a class="btn btn-info" href="read.php?idcom='.$row['idcom'].'">Lire</a>';
              echo ' ';
              echo '<a class="btn btn-success" href="update.php?idcom='.$row['idcom'].'">Edition</a>';
              echo ' ';
              echo '<a class="btn btn-danger" href="delete.php?idcom='.$row['idcom'].'">Supprimer</a>';
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
        