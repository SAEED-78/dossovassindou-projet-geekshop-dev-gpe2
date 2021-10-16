<?php require_once("../database/db.php"); ?>

    <?php 
    
    if(isset($_POST['valider'])){

        $libelle = $_POST['libelle'];
        $quantite_minimale = $_POST['quantite_minimale'];
        $quantite_en_stock = $_POST['quantite_en_stock'];


        $req = $bdd->prepare("INSERT INTO produit(libelle, quantite_minimale, quantite_en_stock) VALUES(?,?,?)");
        $req->execute(array($libelle, $quantite_minimale, $quantite_en_stock));
        header("location:admin.php");

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
             <h2 class="">Geek Shop</h2>
         </nav>
        
     <div class="container d-flex  justify-content-sm-center align-items-center bg-light  w-50 mt-5 py-5">
       
        <form action="" method="POST">
          
            <h2 class="text-dark mr-5">Ajout de produit</h2>
            <div class="form-group w-100 ">
                 <label for=""></label>
                 <input type="text"
                class="form-control" name="libelle" id=""  placeholder="Libellé">
             </div>

             <div class="form-group w-100">
                 <label for=""></label>
                 <input type="text"
                class="form-control" name="quantite_minimale" id=""  placeholder="Quantite_minimale">
             </div>

             <div class="form-group w-100">
                 <label for=""></label>
                 <input type="text"
                class="form-control" name="quantite_en_stock" id=""  placeholder="Quantite_en_stock">
             </div>
            <button name="valider" class="btn btn-primary  rounded" type="submit">Ajouter</button>
            <a name="" id="" class="btn btn-danger ml-5" href="index.php" role="button">Retour</a>


        </form>
        
     </div>

  </body>
</html>