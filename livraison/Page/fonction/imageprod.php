<?php
include_once('class/main.php');
$main=new main();
$image=$_POST['image']['value'];
$lien=explode("/", $image);
$json= array();
$sql='SELECT `photoproduit`,`codeproduit` FROM `produit` WHERE `codeproduit` LIKE"'.$lien[0].'"';
$reponse=$main->fetch($sql);
$json['image']=$reponse['photoproduit'];
$json['codeproduit']=$reponse['codeproduit'];
echo json_encode($json); 
?>