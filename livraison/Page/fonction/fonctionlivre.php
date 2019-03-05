<?php
include_once('class/main.php');
$main=new main();
if (isset($_GET['idfacture'])){

	$sql="SELECT `idcomande` FROM `facture` WHERE `NumFact`='".$_GET['idfacture']."'";
	$comand=$main->fetchAll($sql);
	var_dump($comand);
if($comand){	
	$sql='UPDATE `gestiondevente`.`facture` SET `Statut` = "livre" WHERE `facture`.`NumFact` ="'.$_GET['idfacture'].'"';
	$main->fetch($sql);
	foreach ($comand as $comand){
		$sql="UPDATE `gestiondevente`.`livraison` SET `statut` = 'livre' WHERE `livraison`.`idcomand`='".$comand['idcomande']."'";
		$main->fetch($sql);
		var_dump($sql);
	}
  }
}else {
	echo 'ko';
}
?>