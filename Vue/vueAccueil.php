<?php $this->titre = "Billet simple pour l'Alaska"; ?>

<?php foreach ($chapitres as $chapitre): ?>
    
        <div class="col-lg-4">

            <h2>
            <a href="<?= "index.php?action=chapitre&idchap=" . $chapitre['idchap'] ?>">
                <h1 class="titreChapitre"><?= $chapitre['titre'] ?></h1>
            </a>
            </h2>
            
            <h3><?=$chapitre['auteur'] ?></h3>

            <time><?= $chapitre['horodatage'] ?></time><br>
            <br>
            <p><?= $chapitre['contenu'] ?></p>

            <p><a class="btn btn-default" href="<?= "index.php?action=chapitre&idchap=" . $chapitre['idchap'] ?>" role="button">En lire plus &raquo;</a></p>
        </div>


<?php endforeach; ?>
