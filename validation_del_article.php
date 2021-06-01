<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation Retrait Article</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  
<?php session_start(); ?>
<header>
    <nav>
      <ul class="group_menus">
        <li class="menus"><a href="./index.php">MyCave</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_article.php">Vins</a></li>
        <?php 
        if (isset($_SESSION['id']))
        echo '<li class="menus"><a href="./ajout_article.php">Ajout</a></li>';
      ?>
      </ul>
      <ul class="group_menus">
      <?php 
        if (isset($_SESSION['id'])) {
        echo '<li class="menus btn_deco"><a href="./deconnexion.php">Déconnexion</a></li>';
        } else {
        echo '<li class="menus btn_co"><a href="./connexion.php">Connexion</a></li>';
        }
      ?>
      </ul>
    </nav>
</header>

  <main>
    <div class="alert-container">
      
      <?php

      $id = htmlspecialchars($_POST['id']);

      echo "<h2 class=\"success\">Suppression réussie</h2>";
      
      $req = new PDO('mysql:host=localhost;dbname=mycave', 'root', '');
      $sth = $req->prepare('DELETE FROM articles WHERE id=:id');

      $sth->execute(array(
        'id' => $id
      ));

      ?>

    </div>
    <button><a href="./index.php">Retour à l'accueil</a></button>
  </main>

</body>
</html>