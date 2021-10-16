<?php require_once("../database/db.php"); ?>

    <?php 
    
    if(isset($_POST['envoyer'])){

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = md5( $_POST['password']);
        $passconf = md5($_POST['passconf']);

        $req = $bdd->prepare("INSERT INTO membre(nom, prenom, email, password, passconf) VALUES(?,?,?,?,?)");
        $req->execute(array($nom, $prenom, $email, $password, $passconf));

    }
    if(isset($req)){
        $success= "inscription réussie connectez-vous";
    }
    
    ?>

<!doctype html>
<html lang="fr">
  <head>
    <title>Insertion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="bg-dark">
         <nav class="navbar navbar-expand-sm navbar-light text-light font-weight-bold mt-2 ml-5  ">
           <h2 class="ml-5 mt-3">Geek Shop</h2>
         </nav>
         <?php
            if(isset($success)){
             echo '<div class="alert alert-danger ">'   .$success.  "</div>";  }            
         ?>    
 <div class="container mt-5 shadow bg-light">
     <div class="row py-5 mt-4 align-items-center">
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0 ml-5">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Créez votre compte</h1>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="#" method="POST">
                <div class="row">

                    <!-- Nom -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="firstName" type="text" name="nom" placeholder="Nom" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Prenom -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="lastName" type="text" name="prenom" placeholder="Prénom" class="form-control bg-white border-left-0 border-md"  required>
                    </div>

                    <!-- Email  -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email" class="form-control bg-white border-left-0 border-md"  required>
                    </div>

                  

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Mot de passe" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="password" name="passconf" placeholder="Confirmation " class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                    <button name="envoyer" id="btn" class="btn btn-primary  btn-block py-2" type="submit" value="">ENVOI</button>

                  
                    <!-- Divider Text -->
                    
                    <div class="p col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100  ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OU</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>


                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Avez-vous déjà un compte <a href="login.php" class="text-primary ml-2">connectez-vous</a></p>
    </div>         </div>      
  </body>
</html>