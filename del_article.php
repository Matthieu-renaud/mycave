<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retrait Article</title>
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
      
      <div class="info">Vous avez sélectionné cette ligne :</div>
      
      <br>

      <table id="table_article">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Contenu</th>
            <th>Catégorie</th>
            <th>ID Catégorie</th>
          </tr>
        </thead>
        <tbody>

          <?php
          
          $id = htmlspecialchars($_GET['id']);

          $req = new PDO('mysql:host=localhost;dbname=mycave', 'root', '');
          
          $stmt = $req->prepare("SELECT  article.id, article.name, article.contenu_article, category.name, category.id AS categz FROM article LEFT JOIN category ON article.category_id = category.id WHERE article.id=:id ");
          $stmt->execute(array(
            'id' => $id
          ));
          
          $resultat = $stmt->fetchAll();

          for ($i=0; $i < count($resultat); $i++) { 
            echo "<tr>";
            for ($j=0; $j < count($resultat[$i])/2; $j++) { 
              echo "<td>{$resultat[$i][$j]}</td>";
            }
            echo "</tr>";
          }
          
          ?>

        </tbody>
      </table>

      <br>

      <form action="./validation_del_article.php" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
          <input type="submit" value="Valider la Suppression">
      </form>

    </div>
    <button><a href="./aff_article.php">Retour à la liste</a></button>
  </main>

</body>
</html>