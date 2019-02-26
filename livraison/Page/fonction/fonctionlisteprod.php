<?php
include_once('class/main.php');
$main=new main();
$term = $_GET['term'];
$sql="SELECT `codeproduit`,`designation` FROM `produit` WHERE `designation` LIKE '%".$term."%'";
$reponse=$main->fetchAll($sql);
$array = array();
foreach ($reponse as $reponse) {
array_push($array, $reponse['codeproduit']."/".$reponse['designation']); 
}
echo json_encode($array); 
?>