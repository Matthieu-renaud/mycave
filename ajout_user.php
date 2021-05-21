<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <link rel="stylesheet" href="style.css">
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

  <!-- <form action="./validation_ajout_user.php" method="post" enctype="multipart/form-data"> -->
  <form>
    <h1>Ce n'est pas un formulaire, c'est une inscription,<br> je valide et je patiente</h1>
    <div class="form-container">
      <label for="prenom">Prénom</label>
      <input class="input" type="text" name="prenom" id="prenom">
    </div>
    <div class="form-container">
      <label for="nom">Nom</label>
      <input class="input" type="text" name="nom" id="nom">
    </div>
    <div class="form-container">
      <label for="pseudo">Pseudo</label>
      <input class="input" type="text" name="pseudo" id="pseudo">
    </div>
    <div class="form-container">
      <label for="email">Email</label>
      <input class="input" type="email" name="email" id="email">
    </div>
    <div class="form-container">
      <label for="mdp">Mot de passe</label>
      <input class="input" type="password" name="mdp" id="mdp">
    </div>
    <div class="form-container">
      <label for="confmdp">Confirmez votre mot de passe</label>
      <input class="input" type="password" name="confmdp" id="confmdp">
    </div>
    <div class="form-container">
      <label for="fichier" id="avatar-label">Avatar</label>
      <input class="file" id="fichier" name="fichier" type="file" accept="image/png, image/jpeg">
    </div>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input class="btn" type="submit" value="Validation avec Inscription">
  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
  <script src="./inscription.js"></script>
</body>

</html>