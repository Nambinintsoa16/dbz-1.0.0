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
       $json['prix']='<td>'.number_format($reponse['prix'],2,",",".").'</td>';
       $json['designation']='<td>'.$reponse['designation'].'</td>';
       $json['quantite']='<td>'.$reponse['quantite'].'</td>';
       $json['photoproduit']='<td><img style="width:50px;"src=../../img/produit/'.$reponse['photoproduit'].'></td>';
       $json['Message']='Produit trouver';
       $json['error']='false';
     }else{
      $json['Message']="Aucun resultat";
     }
}
echo json_encode($json);
?>
">
