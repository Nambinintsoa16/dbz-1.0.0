<?php
include_once('class/main.php');
$main=new main();
$json=array("error"=>true);
if(isset($_POST['codeproduit'])){
    $sql="SELECT * FROM `produit` WHERE `codeproduit` LIKE '".$_POST['codeproduit']."'";
    $reponse=$main->fetch($sql);
    $json['sql']=$_POST['codeproduit'];
    if($reponse){
       $json['codeproduit']=$reponse['codeproduit'];
       $json['prix']=number_format($reponse['prix'],2,",",".");
       $json['designation']='<th>'.$reponse['designation'].'</th>';
       $json['quantite']='<th>'.$reponse['quantite'].'</th>';
       $json['photoproduit']='<th><img style="width:50px;"src=../img/produit/'.$reponse['photoproduit'].'></th>';
       $json['Message']='Produit trouver';
       $json['error']=false;
     }else{
     	$json['Message']="Aucun resultat";
     }
}
echo json_encode($json);
?>
