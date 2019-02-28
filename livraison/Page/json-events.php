<?php
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
   
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
} 
include_once("fonction/class/main.php");
$main=new main();
$i=0;
$sql="SELECT `datelivre` FROM `facture`";
$datelivre=$main->fetchAll($sql);
foreach ($datelivre as $datelivre) {
	$datelivretab[]=$datelivre['datelivre'];
}
$date=array_unique($datelivretab);
foreach ($date as $date){
	$facturetab=array("");
$sql="SELECT `NumFact` FROM `facture` WHERE `datelivre` LIKE '".$date."'";
$factureAll=$main->fetchAll($sql);
foreach ($factureAll as $factureAll) {
	$facturetab[]=$factureAll['NumFact'];

}

$facture=array_unique($facturetab);
$cout=count($facture);
$count=$cout-1;
$tab[$i]=array(
			'id' => $i,
			'title' => "Livraison : $count",
			'start' => "$date",
			
	);	
 $i++;
}


echo json_encode($tab);

?>
