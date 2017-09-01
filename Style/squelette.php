<!DOCTYPE html>
<html lang="FR">
  <head>
    <?php require_once('style/inclusions/head.php');  ?>
  </head>

  <body>
    <header>
        <?php require_once("style/inclusions/header.php"); ?>      
    </header>

    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="Style/images/alaska1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
             
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="Style/images/alaska2.jpg" alt="Second slide">
          
        </div>
        <div class="item">
          <img class="third-slide" src="Style/images/alaska3.jpg" alt="Third slide">
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"></a>
    </div>

    <div class="jumbotron">
      <div class="container">
        <p>Bienvenue sur le blog de mon nouveau roman " Billet simple pour l'Alaska". Au travers de ce blog je tente une expérience d'écriture collaborative, à savoir que je mettrai les chapitres en lignes au fur et à mesure et vous, mes fidèles lecteurs, pourrez y apporter vos commentaires et suggestions quant au contenu. Les meilleurs idées seront retenues et ajoutées à la mouture finale du roman.</p>
        <p>Vous trouverez mis en avant ci-dessous sur cette page les derniers chapitres produits, les autres sont toujours disponibles par le biais du menu de navigation. Bonne lecture :)</p>
      </div>
    </div>

    <div class="container marketing">
        <div class="row">
            <div id="contenu" ">
                <?= $contenu ?>
            </div>
        </div>
    </div>

  <footer>
    <?php require_once("style/inclusions/footer.php"); ?>      
  </footer>
    
  </body>
</html>
