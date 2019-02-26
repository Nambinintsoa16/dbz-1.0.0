<?php
include_once('class/main.php');
$main=new main();
$sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'confirmer'";
$facturedouble=$main->fetchAll($sql);
foreach ($facturedouble as $facturedouble) {
$table[]=$facturedouble['NumFact'];
}
$facture=array_unique($table);
$nombre=count($facture);
for ($i=0; $i <$nombre ; $i++) { 
  $sql="SELECT `datelivre` FROM `facture` WHERE `NumFact` LIKE '".$facture[$i]."'"; 
   $livre=$main->fetch($sql);
  $json[$i]=$livre['datelivre'];
}
	echo json_encode(array(
	
		array(
			'id' => 111,
			'title' => "Livraison",
			'start' => "$json[0]",
			'url' => "?page="
		),
		
		array(
			'id' => 222,
			'title' => "Event2",
			'start' => "$json[0]",
			'url' => "http://yahoo.com/"
		)
	
	));
?>