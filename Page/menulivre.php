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
          <div class="col-md-12">
               <img src="../img/livraison910.jpg" alt="" height="400" width="100%" style="background-size:cover;object-fit: cover;">
          </div>
            
        </div>
        <div class="row" style="margin-top:30px;">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="?page=livraison">
            <div class="menubox" style="background-color:#03a5cc;min-height:150px; color: #fff">
            <i class="fa fa-truck" style="z-index:3;position:absolute;font-size:50px;margin-top:30px;margin-left:150px;opacity:0.4"></i>
               <div style="font-size: 28px; color: #fff;font-weight: bold;padding-top:30px;padding-left:20px">
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
               <div style="padding-left:20px;margin-bottom:30px">Livraison en attente </div>
               <div style="z-index:#fff;height:30px;background:#038cae">
                <span style="position:absolute;padding-top:5px !important;padding-left:20px;text-align:center">Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></span>
              </div>
            </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
           <a href="?page=LivraisonAnnulle">
            <div class="" style="background-color:#00a65a;min-height:150px; color: #fff" >
              
            <i class="fa fa-truck" style="z-index:3;position:absolute;font-size:50px;margin-top:30px;margin-left:150px;opacity:0.4"></i>
        
              <div style="font-size: 28px; color: #fff;font-weight: bold;padding-top:30px;padding-left:20px">
             
              <?php
              $sql="SELECT * FROM `produit` ";
              $count=$main->test($sql);
              echo $count;
              ?>
              </div>
              <div style="padding-left:20px;margin-bottom:30px">Annulée</div>
              <div style="z-index:#fff;height:30px;background:#018d4e">
                <span style="position:absolute;padding-top:5px !important;padding-left:20px;text-align:center">Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></span>
              </div>
            </div>
            <a>
          
          </div>
       

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="?page=LivraisonEffectuée">
            <div style="background-color:#f39c11;min-height:150px; color: #fff">
            <i class="fa fa-truck" style="z-index:3;position:absolute;font-size:50px;margin-top:30px;margin-left:150px;opacity:0.4"></i>
        
               <div style="font-size: 28px; color: #fff;font-weight: bold;padding-top:30px;padding-left:20px">
              
               <?PHP
                  $sql="SELECT `id` FROM `client`";
                  $countClient=$main->test($sql);
                  echo  $countClient;

               ?>
               </div>
               <div  style="padding-left:20px;margin-bottom:30px">Livrée</div>
               <div style="z-index:#fff;height:30px;background:#d08510">
                <span style="position:absolute;padding-top:5px !important;padding-left:20px;text-align:center">Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></span>
              </div>
            </div>
            <a>
          </div>
          

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a  href="?page=livraison">
            <div style="background-color:#de4b39;min-height:150px; color: #fff">
            <i class="fa fa-truck" style="z-index:3;position:absolute;font-size:50px;margin-top:30px;margin-left:150px;opacity:0.4"></i>
        
             
            <div  style="font-size: 28px; color: #fff;font-weight: bold;padding-top:30px;padding-left:20px">
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
            <div  style="padding-left:20px;margin-bottom:30px">Confirmer livraison</div>
               <div style="z-index:#fff;height:30px;background:#bb4031">
                <span style="position:absolute;padding-top:5px !important;padding-left:20px;text-align:center">Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></span>
              </div>
              
            </div>
          </div>
        
           </a>
        </div> 
            </div>
<div class="row" style="margin-top:30px">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
          <a href="?page=Livresondujour">
            <div style="background-color:#3c6980;min-height:150px; color: #fff">
            <i class="fa fa-calendar" style="z-index:3;position:absolute;font-size:50px;margin-top:30px;margin-left:400px;opacity:0.4"></i>
         
               <div style="font-size: 28px; color: #fff;font-weight: bold;padding-top:30px;padding-left:20px">
                  5
               </div>
               <div style="padding-left:20px;margin-bottom:50px">Calendrier</div>
               <div style="z-index:#fff;height:30px;background:#33596c">
                <span style="position:absolute;padding-top:5px !important;padding-left:20px;text-align:center">Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></span>
              </div>
            </div>
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
           <a href="?page=listedesproduit"> 
            <div style="background-color:#00a38e;min-height:150px; color: #fff">
            <i class="fa fa-calendar" style="z-index:3;position:absolute;font-size:50px;margin-top:30px;margin-left:400px;opacity:0.4"></i>
         
              <div style="font-size: 28px; color: #fff;font-weight: bold;padding-top:30px;padding-left:20px">
              <?php
              $sql="SELECT * FROM `produit` ";
              $count=$main->test($sql);
              echo $count;
              ?>
              </div>
              <div class="count"  style="padding-left:20px;margin-bottom:50px">Produit</div>
              <div style="z-index:#fff;height:30px;background:#008a7a">
                <span style="position:absolute;padding-top:5px !important;padding-left:20px;text-align:center">Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></span>
              </div>
            </div>
            <a>
          
          </div>
            </div>
