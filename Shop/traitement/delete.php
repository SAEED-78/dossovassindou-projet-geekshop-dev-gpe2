<?php require_once("../database/db.php"); ?>
<?php
 error_reporting(~E_NOTICE);

$reference = $_GET['reference'];

$req = $bdd->prepare('DELETE FROM produit WHERE reference='.$reference);
$req->execute(compact('reference'));
header('location:admin.php');

?>