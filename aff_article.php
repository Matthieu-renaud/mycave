<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste Article</title>
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

  <table id="table_article">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Contenu</th>
        <th>Catégorie</th>
        <th>Tag</th>
        <th class="modif">Modification</th>
        <th class="suppr">Suppression</th>
      </tr>
    </thead>
    <tbody>

      <?php

      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      
      $stmt = $req->prepare("SELECT article.id, article.name, article.contenu_article, category.name AS category, GROUP_CONCAT(tag.name SEPARATOR \", \") AS tag FROM article
      LEFT JOIN category ON article.category_id = category.id
      LEFT JOIN article_tags ON article.id = article_tags.article_id
      LEFT JOIN tag ON tag.id = article_tags.tag_id
      GROUP BY article.id
      ORDER BY article.id");
      $stmt->execute();
      
      $resultat = $stmt->fetchAll();

      for ($i=0; $i < count($resultat); $i++) { 
        echo "<tr>";
        for ($j=0; $j < count($resultat[$i])/2; $j++) { 
          echo "<td>{$resultat[$i][$j]}</td>";
        }
        print_r("<td class=\"modif\"><button id=\"modif{.$i}\"><a href=\"./edit_article.php?id={$resultat[$i][0]}\">Modifier</a></button></td>");
        print_r("<td class=\"suppr\"><button id=\"suppr{.$i}\"><a href=\"./del_article.php?id={$resultat[$i][0]}\">Supprimer</a></button></td>");
        echo "</tr>";
      }
      
      ?>

    </tbody>
  </table>

</body>
</html>