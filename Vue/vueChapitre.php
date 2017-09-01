<?php $this->titre = "Billet simple pour l'Alaska - " . $chapitre['titre']; ?>

<article>
    <header>
        <h1 class="titreChapitre"><?= $chapitre['titre'] ?></h1>
        <time><?= $chapitre['horodatage'] ?></time>
        <h4>de <?=$chapitre['auteur'] ?></h4>

    </header>
    <p><?= $chapitre['contenu'] ?></p>
</article>
<hr />
<header>
    <h1 idchap="titreReponses">Réponses à <?= $chapitre['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="6" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="idchap" value="<?= $chapitre['idchap'] ?>" />
    <input type="submit" value="Commenter" />
</form>

