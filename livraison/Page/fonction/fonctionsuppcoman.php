<?php
include_once('class/main.php');
$main=new main();
$json=array();
if(isset($_GET['idcomande'])){
	if (!empty($_GET['idcomande'])) {
		$sql="DELETE FROM `comande` WHERE `idcomand` LIKE '".$_GET['idcomande']."'";
		$del=$main->fetch($sql);
		if ($del){
			$json['message']='true';
		}

	}else{
	 $json['message']="erreur empty";	
	}
  
}else{
	$json['message']="erreur isset";	
}
echo json_encode($json);
?>