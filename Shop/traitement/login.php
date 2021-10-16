<?php require_once("../database/db.php"); ?>

<?php
session_start();

if(isset($_POST['envoyer'])){

  $email = htmlspecialchars($_POST['email']);
  $password = md5($_POST['password']);
  
  $requser = $bdd->prepare("SELECT * FROM membre WHERE email = ? AND password = ?");
  $requser->execute(array($email, $password));

  $userexist = $requser->rowCount();
  if($userexist == 1 ){

    $userinfo = $requser->fetch();
    $_SESSION['id'] = $userinfo['id'];
    $_SESSION['nom'] = $userinfo['nom'];
    $_SESSION['email'] = $userinfo['email'];
    header("location:admin.php");

  }else{
      $error = "Mauvais identifiant ou mot de passe !";
  }
    
   
}
    
?>




<!doctype html>
<html lang="fr">
  <head>
    <title>Connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="assets/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="bg-dark">
        <nav class="navbar navbar-expand-sm navbar-light text-light font-weight-bold mb-5 ml-5  ">
           <h2 class="ml-5 mt-3">Geek Shop</h2>
         </nav>
    
      <style>
          a:hover{
              text-decoration:none;

          }
          #btn{
              border-radius:20px;
          }
      </style>
     <div class="container d-flex  justify-content-center">
       <div class="jumbotron w-50 ">
       <?php
            if(isset($error)){
             echo '<div class="alert alert-danger ">'  .$error. "</div>";  }            
         ?>    
               
            <h1 class="display-4 font-weight-bold text-center text-dark">Login</h1>
            <hr class="my-5">
            <!--email-->
         <form action="" method="POST">
            <div class="form-group">
              <label for=""></label>
              <input type="text"
                class="form-control" name="email" id=""  placeholder="Entrez votre email...">
            </div>
            <!--password-->
            <div class="form-group ">
              <label for=""></label>
              <input type="password"
                class="form-control" name="password" id=""  placeholder="Entrez votre mot de passe...">
            </div>
            <!--bouton-->
            <input name="envoyer" id="btn" class="btn btn-primary btn-block" type="submit" value="ENVOI">
                <p class="mt-2 d-flex justify-content-end">
                     <span class="mr-1">Vous n'avez pas de compte?</span> <a  class="font-weight-bold text-primary justify-content-center " href="formulaire.php"> Créer</a>
                </p>
         </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
