
<?php require_once("../database/db.php"); ?>

<?php 
    $stmt = $bdd->query('SELECT * FROM users ORDER BY id DESC '); 
    if(isset($_GET['s'])){
      $recherche = htmlspecialchars($_GET['s']);
      $stmt = $bdd->query('SELECT nom FROM users WHERE nom LIKE "%'.$recherche.'%" ORDER BY id DESC ');
    }

     

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Recherche</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
       <div class="container-fluid">
       <form action="" method="GET">
            <input type="search" name="s" id="">
            <input type="submit" name="envoyer" id="">
        
        </form>

       </div>
       <section class="affichage">
          <?php
            if($stmt->rowCount() > 0){
              while($user = $stmt->fetch()){
                ?>
                <p><?= $user['nom']; ?></p>
                <?php
              }
            }else{
                  ?>
                  <p>Aucun utilisateur trouvé</p>
                  <?php
            }

          ?>
       </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>