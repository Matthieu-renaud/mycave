<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation Inscription</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  
<header>
    <nav>
      <ul class="group_menus">
        <li class="menus"><a href="./index.php">Accueil</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_article.php">Articles</a></li>
        <li class="menus"><a href="./ajout_article.php">Ajout</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_category.php">Catégories</a></li>
        <li class="menus"><a href="./ajout_category.php">Ajout</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_tag.php">Tags</a></li>
        <li class="menus"><a href="./ajout_tag.php">Ajout</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_user.php">Utilisateurs</a></li>
        <li class="menus"><a href="./ajout_user.php">Inscription</a></li>
      </ul>
    </nav>
    <div class="coco">
      <ul class="connect">
        <li class="sous_menus btn_co"><a href="./connexion.php">Connexion</a></li>
        <li class="sous_menus btn_deco"><a href="./deconnexion.php">Déconnexion</a></li>
      </ul>
    </div>
  </header>
  
<main>
  <div class="alert-container">
    <?php


    $id = htmlspecialchars($_POST['id']);
    $idLen = strlen($id);
    $idBool= false;
    if (strlen($id)<=4) {
      echo "<h3 class=\"error\">L'ID est trop court : $idLen caractères(s)</h3>";
    } else {
      $idBool = true;
      echo "<h3 class=\"success\">L'ID est valide</h3>";
    }

    $mdp = htmlspecialchars($_POST['mdp']);
    $mdpLen = strlen($mdp);
    $mdpBool= false;
    if (strlen($mdp)<=6) {
      echo "<h3 class=\"error\">Le mot de passe est trop court : $mdpLen caractères(s)</h3>";
    } else {
      $mdpBool = true;
      echo "<h3 class=\"success\">Le mot de passe est valide</h3>";
    }

    $confmdp = htmlspecialchars($_POST['confmdp']);
    $confmdpLen = strlen($confmdp);
    $confmdpBool= false;
    if ($confmdp!=$mdp) {
      echo "<h3 class=\"error\">Les mots de passe ne sont pas identiques</h3>";
    } else {
      $confmdpBool = true;
      echo "<h3 class=\"success\">Les mots de passe sont identiques</h3>";
    }






    if($idBool && $mdpBool && $confmdpBool ) {
      echo "<h2 class=\"success\">Tous les champs sont valides</h2>";
      $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
      
      $req = new PDO('mysql:host=localhost;dbname=mycave', 'root', '');
      $sth = $req->prepare('INSERT INTO users (identifiant, mdp) VALUES(:id, :pwd)');
      
      $sth->execute(array(
        'id' => strip_tags($id),
        'pwd' => strip_tags($mdpHash)
      ));
      
    } else {
      echo "<h2 class=\"error\">Tous les champs ne sont pas valides</h2>";
    }

    ?>
  </div>
  <button><a href="./ajout_user.php">Retour au formulaire</a></button>
</main>


</body>
</html>
