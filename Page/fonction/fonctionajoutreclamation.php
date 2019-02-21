<?php
include_once('class/main.php');
$main=new main();
session_start();

if (isset($_POST['date'])AND isset($_POST['codeproduit'])AND isset($_POST['idclient'])AND isset($_POST['commentaire'])AND isset($_POST['nature']) AND isset($_GET['objet'])){
$sql='INSERT INTO `discutionfb`(`iddiscution`, `idclient`, `nature`, `commentaire`, `type`, `Date`, `user`, `idproduit`) VALUES (NULL,"'.$_POST['idclient'].'","'.$_POST['nature'].'","'.$_POST['commentaire'].'","'.$_GET['objet'].'","'.$_POST['date'].'","'.$_SESSION['login']['matricule'].'","'.$_POST['codeproduit'].'")';
	$reponse=$main->fetch($sql);    
}else if(isset($_POST['date'])AND isset($_POST['idclient'])AND isset($_POST['commentaire'])AND isset($_POST['nature']) AND isset($_GET['objet'])){
    $sql='INSERT INTO `discutionfb`(`iddiscution`, `idclient`, `nature`, `commentaire`, `type`, `Date`, `user`) VALUES (NULL,"'.$_POST['idclient'].'","'.$_POST['nature'].'","'.$_POST['commentaire'].'","'.$_GET['objet'].'","'.$_POST['date'].'","'.$_SESSION['login']['matricule'].'")';
    $reponse=$main->fetch($sql);
}

?>