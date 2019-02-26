<?php
include_once('fonction/class/main.php');
$main=new main();
$dt=new dateTime();
$date=$dt->format("Y-m-d");
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-files-o"></i>Menu Livraison</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="?page=">Accueil</a></li>
                    <li><i class="fa fa-cube"></i><a href="#">Menu Livraison</a></li>                
                </ol>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="?page=livraison">
            <div class="info-box blue-bg">
              <i class="fa fa-shopping-cart"></i>
              <div>Livraison en attente</div>
               <div style="font-size: 28px; color: #fff;font-weight: bold;">
               <?php
               $sql="SELECT `NumFact` FROM `facture` WHERE `datelivre`='".$date."'";
               $resultfact=$main->fetchAll($sql);
               if($resultfact){
               foreach ($resultfact as $resultfact){
                $factdouble[]=$resultfact['NumFact'];
               }
               $facture=array_unique($factdouble);
               $nbfacture=count($facture);
               echo $nbfacture;
              }else{
                $nbfacture=0;
                echo $nbfacture;
              }
               ?>
               </div>
            </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
           <a href="?page=LivraisonAnnulle">
            <div class="info-box brown-bg">
              <i class="fa fa-cubes"></i>
              <div>Annulée</div>
              <div style="font-size: 28px; color: #fff;font-weight: bold;">
              <?php
              $sql="SELECT * FROM `produit` ";
              $count=$main->test($sql);
              echo $count;
              ?>
              </div>
            </div>
            <a>
          
          </div>
       

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="?page=LivraisonEffectuée">
            <div class="info-box dark-bg">
              <i class="fa fa fa-users"></i>
              <div >Livrée</div>
               <div style="font-size: 28px; color: #fff;font-weight: bold;">
               <?PHP
                  $sql="SELECT `id` FROM `client`";
                  $countClient=$main->test($sql);
                  echo  $countClient;

               ?>
               </div>
            </div>
            <a>
          </div>
          

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="?page=Livresondujour">
            <div class="info-box green-bg">
              <i class="fa fa-calendar"></i>
              <div>Calendrier</div>
              
            </div>
          </div>
        
           </a>
        </div> 
<div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="?page=livraison">
            <div class="info-box blue-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count" >Livraison</div>
               <div style="font-size: 28px; color: #fff;font-weight: bold;">
               <?php
               $sql="SELECT `NumFact` FROM `facture` WHERE `datelivre`='".$date."'";
               $resultfact=$main->fetchAll($sql);
               if($resultfact){
               foreach ($resultfact as $resultfact){
                $factdouble[]=$resultfact['NumFact'];
               }
               $facture=array_unique($factdouble);
               $nbfacture=count($facture);
               echo $nbfacture;
              }else{
                $nbfacture=0;
                echo $nbfacture;
              }
               ?>
               </div>
            </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
           <a href="?page=listedesproduit"> 
            <div class="info-box brown-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">Produit</div>
              <div style="font-size: 28px; color: #fff;font-weight: bold;">
              <?php
              $sql="SELECT * FROM `produit` ";
              $count=$main->test($sql);
              echo $count;
              ?>
              </div>
            </div>
            <a>
          
          </div>
       

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="?page=listedesclient"> 
            <div class="info-box dark-bg">
              <i class="fa fa fa-users"></i>
              <div class="count">Client</div>
               <div style="font-size: 28px; color: #fff;font-weight: bold;">
               <?PHP
                  $sql="SELECT `id` FROM `client`";
                  $countClient=$main->test($sql);
                  echo  $countClient;

               ?>
               </div>
            </div>
            <a>
          </div>
          

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="?page=Livresondujour">
            <div class="info-box green-bg" style="height: 230px;">
              <i class="fa fa-calendar"></i>
              <div class="count">Calendrier</div>
              
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
           </a>
        </div> 
