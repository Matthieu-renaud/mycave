<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation Édition</title>
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

    $prenom = htmlspecialchars($_POST['prenom']);
    $prenomLen = strlen($prenom);
    $prenomBool= false;
    if (strlen($prenom)<=4) {
      echo "<h3 class=\"error\">Le prénom est trop court : $prenomLen caractères(s)</h3>";
    } else {
      $prenomBool = true;
      echo "<h3 class=\"success\">Le prénom est valide</h3>";
    }

    $nom = htmlspecialchars($_POST['nom']);
    $nomLen = strlen($nom);
    $nomBool= false;
    if (strlen($nom)<=4) {
      echo "<h3 class=\"error\">Le nom est trop court : $nomLen caractères(s)</h3>";
    } else {
      $nomBool = true;
      echo "<h3 class=\"success\">Le nom est valide</h3>";
    }

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pseudoLen = strlen($pseudo);
    $pseudoBool= false;
    if (strlen($pseudo)<=4) {
      echo "<h3 class=\"error\">Le pseudo est trop court : $pseudoLen caractères(s)</h3>";
    } else {
      $pseudoBool = true;
      echo "<h3 class=\"success\">Le pseudo est valide</h3>";
    }

    $email = htmlspecialchars($_POST['email']);
    $emailLen = strlen($email);
    $emailBool= false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<h3 class=\"error\">L'email n'est pas valide</h3>";
    } else {
      $emailBool = true;
      echo "<h3 class=\"success\">L'email est valide</h3>";
    }

    if($nomBool && $prenomBool && $pseudoBool && $emailBool) {
      echo "<h2 class=\"success\">Tous les champs sont valides</h2>";
      
      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      $sth = $req->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname, pseudo = :pseudo, email = :email WHERE id=:id');

      $sth->execute(array(
        'firstname' => strip_tags($prenom),
        'lastname' => strip_tags($nom),
        'pseudo' => strip_tags($pseudo),
        'email' => strip_tags($email),
        'id' => $id
      ));
      
    } else {
      echo "<h2 class=\"error\">Tous les champs ne sont pas valides</h2>";
    }

    ?>
  </div>
  <button><a href="./aff_user.php">Retour à la liste</a></button>
</main>

</body>
</html>