$(document).ready(function () {

  let prenom;
  let nom;
  let pseudo;
  let email;
  let mdp;
  let confmdp;
  let object;

  $(".btn").on("click", (e) => {
    e.preventDefault();

    prenom = $("#prenom").val();
    nom = $("#nom").val();
    pseudo = $("#pseudo").val();
    email = $("#email").val();
    mdp = $("#mdp").val();
    confmdp = $("#confmdp").val();

    var object = {};
    object["prenom"] = prenom;
    object["nom"] = nom;
    object["pseudo"] = pseudo;
    object["email"] = email;
    object["mdp"] = mdp;
    object["confmdp"] = confmdp;

    // console.log(prenom + "/" + nom + "/" + pseudo + "/" + email + "/" + mdp + "/" + confmdp);

    // console.log(prenom.length > 4);
    // console.log(mdp == confmdp);

    if (prenom.length > 3 && nom.length > 3 && pseudo.length > 3 && mdp.length > 5 && mdp == confmdp) {

      console.log("ça passe");
      console.log(object);

      $.ajax({
        url: "validation_ajout_user.php",
        type: "POST",
        data: object,
        dataType: "json",

        success: function (json) {
          if (json.reponse === "ok") {
            alert("Connexion OK");
            window.location.href = "index.php";
          } else {
            alert("Erreur : " + json.reponse);
          }
        },

        // error: function (result, statut, error) { },

        // complete: function (result, statut) { },
      })
    }

  })

})