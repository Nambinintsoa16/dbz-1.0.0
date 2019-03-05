<?php
include_once('fonction/class/main.php');
$main=new main();
 $soustout=0;
if(isset($_GET['idfacture'])):
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> INFORMATION CLIENT</h3>
            <div class="col-lg-10">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=">Accueil</li></a>
              <li><i class="fa fa-cube"></i><a href="#">Livraison</a> </li>
              <li><i class="fa fa-liste"></i><a href="?page=livraison">Listes des livraison</a> </li>
              <li><i class="fa fa-cube"></i><a href="#">Fiche indiv livre</a> </li>	
            </ol>
            </div>
            <div class="col-lg-2">
<?php echo '<a class="livre btn btn-danger" href="fonction/fonctionlivre.php?idfacture='.$_GET['idfacture'].'">Livre</a>';
 ?> 
            </div>
          </div>
        </div>
<div class="row">
 <div class="col-lg-12">
<?php
$sql="SELECT `idclient` FROM `facture` WHERE `NumFact` LIKE '".$_GET['idfacture']."'";
$idclient=$main->fetch($sql);
$sql="SELECT * FROM `client` WHERE `idclient` LIKE '".$idclient['idclient']."'";
$client=$main->fetch($sql);

?>    
    <div class="row detai_infoclient">
        <div class="col-md-4">

          <img src="../img/photoclient/<?php echo $client['photo'];?>" width="250">
          <img src="../img/QRcode/<?php echo $client['qrcode'].'.png';?>" class="img-circle qrcode_image" width="120">  
        </div>
        <div class="col-md-8 information_client">
          <div class="row">
            <div class="col-md-4 gauche">
              <ul>
                <li  class="client_name"><?php echo $client['Nom']?> </li>
                <li>Nom sur facebook</li>
                <li>Localisation</li>
                <li>Sexe</li>
                <li>Enregistré le </li>
                <li>Cadre socio-ptrofessionel</li>
                <li><img src="../img/fb.png" width="20"></li>
                <li><img src="../img/tel.png" width="18"></li>
              </ul>
            </div>
            <div class="col-md-6 droite">
              <ul>
                <li></li><br>
                <li><?php echo $client['identifientsurfacebook']?></li>
                <li><?php echo $client['ville']." , ".$client['quartier'];?></li>
                <li><?php echo $client['trancedage'];?></li>
                <li><?php echo $client['datedenregestrement'];?></li>
                <li><?php echo $client['occupation'];?></li>
                <li> <a href="<?php echo $client['liensurfacebook'];?>"> facebook</a></li>
                <li><?php echo $client['contact'];?></li>
              </ul>
            </div>
          </div>
        </div>  
    </div>
<!-- debut -->
<fieldset><legend>Detail livraison</legend>
<table class="table table-striped table-advance table-hover" style="margin-top: 60px;">
                <tbody>
                  <tr>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 250px;"> Nom du livreur</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff; width: 200px"> Date de livraison</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 267px;"> Heure de livraison </th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"> Lieu de livraison</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 142px;"> Statue</th>
                    
                    
                  </tr>
                  <tr>
                    <td style="text-align: center;">
                      <?php
              $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`='".$_GET['idfacture']."'";
              $fact=$main->fetch($sql);
              $sql="SELECT * FROM `livraison` WHERE `idcomand`='". $fact['idcomande']."'";
              $livre=$main->fetch($sql);
               echo $livre['Nomlivreur'];
                      ?>
                    </td>
                    <td style="text-align: center;"><?php echo $livre['datediflivre'];?></td>
                    <td style="text-align: center;"><?php echo "Entre ".$livre['heurlivredifdebut']." et ".$livre['heurlivrediffin'];?></td>
                    
                   
                    <td style="text-align: center;">
                      <?php echo $livre['ville']." , ".$livre['qartieur']." , ".$livre['lieudelivraison'];?>
                    </td>
                    <td style="text-align: center;">
                      <?php echo $livre['statut'];?>
                        
                      </td>
                  </tr>
                 
                  
                </tbody>
              </table>

   
        <?php
 $sql='SELECT `idcomande` FROM `facture` WHERE `NumFact`="'.$_GET['idfacture'].'"';
 $reponse=$main->fetchAll($sql);
        ?>
  <table class="table"  style="border-top:solid 1px #dbdbdb;border-bottom:solid 1px #dbdbdb; margin-top: 10px;">
                  <thead >


                    <tr>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 250px;">Produit</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Prix en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Quantite</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Total en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Aperçu</th>
                    </tr>
                  </thead>
                  <tbody class="tbody">
<?php 
 foreach ($reponse as $reponse):
  $sql="SELECT * FROM `comande` WHERE `idcomand`=".$reponse['idcomande'];
  $rep1=$main->fetch($sql);
 ?>                    
                    <tr>
                      <td style="text-align: center;"><?php
                      $sql="SELECT `designation`,`photoproduit`,`prix` FROM `produit` WHERE `codeproduit`='".$rep1['codeproduit']."'";
                      $produit=$main->fetch($sql);
                      echo $produit['designation'];
                      ?></td>
                      <td style="text-align: center;"><?php echo  number_format($produit['prix'], 2, ',', ' ');?></td>
                      <td style="text-align: center;"><?php echo $rep1['quantite'];?></td>
                      <td  style="text-align: center;" class="total"><?php $total=$produit['prix']*$rep1['quantite']; echo number_format($total, 2, ',', ' ');?></td>
                      <td ><?php 
                      echo '<img src="../img/produit/'. $produit['photoproduit'].'" class="img-thumbnail" style="width:60px;">';
                      ?></td>
                     
                      <?php             
                      $soustout+=$total;

                      ?>
                    </tr>
 <?php endforeach;?>

                   <tr>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Emetteur : <?php
                      $sql="SELECT `username` FROM `user` WHERE `matricule`='".$rep1['matriculeuser']."'";
                      $repuser=$main->fetch( $sql);
                      echo $repuser['username'];
                      ?></th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"></th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Sous total en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;" class="contTotal">
                        <?php
                        echo number_format($soustout, 2, ',', ' ');
                         ?>
                      </th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">
                        
                      </th>
                    </tr>                    
                  </tbody>
                </table>
      </div>
    </div>

</div>
        </div>

<!--fin-->
</fieldset>
<?php endif;?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.livre').on('click',function(event){
       event.preventDefault();
       $.get($(this).attr('href'),function(data){

       });
    });
  });
</script>