<?php require_once("../database/db.php"); ?>

<?php 

  $req = $bdd->query("SELECT * FROM produit");
  $reqs = $req->fetchAll();

?>

<?php 
    $stmt = $bdd->query('SELECT * FROM produit ORDER BY reference DESC '); 
    if(isset($_GET['s'])){
      $recherche = htmlspecialchars($_GET['s']);
      $stmt = $bdd->query('SELECT * FROM produit WHERE libelle LIKE "%'.$recherche.'%" ORDER BY reference DESC ');
      $user = $stmt->fetch();
      
    }

     

?>

<!doctype html>
<html lang="fr">
  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bg-dark">
    <nav class="navbar navbar-expand-sm navbar-light text-light font-weight-bold mt-2 ml-5  ">
      <h2 class="">Geek Shop</h2>
      
    </nav>
      <div class="container mt-5 d-flex justify-content-sm-center align-items-sm-center ">
         
          <div class="row jumbotron rounded">
              <form method="GET" class="input-group mb-3 w-25 ">
    
                  <input name="s" type="search" class="form-control" placeholder="Recherche...">
                   <div class="input-group-append ">
                  <button name="envoi" class="btn btn-primary bg-primary text-light" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                  
              </form>
                
              
              <div class="ajout input-group"> <a name="" id="" class="btn btn-primary  " href="insert.php" role="button">Ajouter produits <i class="fa fa-plus"></i></a></div>
            <table class="table table-striped table-bordered mt-4">
              <thead>
                <tr>
                  <th>Réference</th>
                  <th>Libellé</th>
                  <th>Quantité_minimale</th>
                  <th>Quantité_en_stock</th>
                  <th>Actions</th>
                </tr>
            
              </thead>
              <tbody>
              <?php
               if($stmt->rowCount() > 0){
                while($user = $stmt->fetch()){
                ?>
                <td><?= $user['libelle']; ?></td>
                <?php
              }
            }else{
                  ?>
                  <p>Aucun produit trouvé</p>
                  <?php
            }

          ?>


            
                <?php foreach($reqs as $req) : ?>
                <tr>
                              
                  <td><?php echo $req['reference']?></td>
                  <td><?php echo $req['libelle']?></td>
                  <td><?php echo $req['quantite_minimale']?></td>
                  <td><?php echo $req['quantite_en_stock']?></td>
                  <td width="250">
                    <a onclick="return confirm('Voulez-vous modifier ce produit ?')" class="btn btn-success" href="update.php?reference=<?= $req['reference']?>">Modifier <i class="fa fa-pencil"></i></a>
                    <a onclick="return confirm('Voulez-vous supprimer ce produit ?')" class="btn btn-danger" href="delete.php?reference=<?= $req['reference']?>">Supprimer <i class="fa fa-remove"></i></a>
                  </td>
                </tr>
               <?php endforeach ?>
              </tbody>
            </table>
          </div>
      
      </div>
     
  

  </body>
</html>