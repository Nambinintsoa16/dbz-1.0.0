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
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
            </ol>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="?page=Livresondujour">
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
            <a href="#">
            <div class="info-box green-bg" style="height: 230px;">
              <i class="fa fa-calandar"></i>
              <div class="count">Calendrier</div>
              
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
           </a>
        </div> 

    <div class="col-lg-9">    

                 <?php if(isset($facture)){$nbfact=count($facture);}else{$nbfact=0;}?>
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                
                      <th style="width:250px;">Etat de livraison</th>
                    
                      <th style="text-align:center;">Progression</th>
                      
                     
                    </tr>
                  </thead>
                  <tbody>
                   
                    <tr>
                      <th >Livre</th>
                      <th>
                        
                          <?php 
                          $sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'livre' AND `datelivre` LIKE '".$date."'";
                          $facturedouble= $main->fetchAll($sql);
                          if($facturedouble){
                          foreach ($facturedouble as $facturedouble){
                             $facturetab[]=$facturedouble['NumFact'];
                          }
                           $facturelivre=array_unique($facturetab);
                          
                          $nbfacturelivre=count($facturelivre);
                        
                        }else{
                          $nbfacturelivre=0;
                        }
                        if(isset($nbfacture)){
               if ($nbfacture==0){$Ptlivre=0;}else{$Ptlivre=($nbfacturelivre*100)/$nbfacture;}
                             
                           }else{
                            $Ptlivre=0;
                           }
                          ?>
                         <div class="progress thin" style="background-color: #fff;">
                          <div class="progress-bar progress-bar-succes" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $Ptlivre."%"; ?>">
                           <?php echo  number_format($Ptlivre)."%";?>
                          </div>
                          
                        </div>
                        <span class="sr-only"><?php echo  $Ptlivre." %";?></span>
                        
                      </th>
                    </tr>
                    <tr>
                      <th>En Attente de livraison</th>
                      <th>
                      <?php 
                          $sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'confirmer' AND`datelivre`='".$date."'";
                          $facturedoublee= $main->fetchAll($sql);
                          if($facturedoublee){
                          foreach ($facturedoublee as $facturedoublee){
                             $facturetabAtt[]=$facturedoublee['NumFact'];
                          }
                           $factureAtt=array_unique($facturetabAtt);                          
                           $nbfactureAtt=count($factureAtt);

                        
                        }else{
                          $nbfactureAtt=0;
                        }
                        if(isset($nbfacture)){
                          if($nbfacture==0){$nbfactureAtt=0;}else{$nbfactureAtt=($nbfactureAtt*100)/$nbfacture;}
                      }else{$nbfactureAtt=0;}
                          ?>
                        <div class="progress thin" style="background-color: #fff;">
                          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $nbfactureAtt."%";?>">
                            <?php echo number_format($nbfactureAtt)."%";?>
                          </div>
                           
                          </div>
                        </div>
                        <span class="sr-only"><?php echo $nbfactureAtt." %";?> </span>
                      </th>
                    </tr>
                    
                    <tr>
                      <th>Annule</th>
                      <th>
                        <?php 
                          $sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'annule' AND `datelivre` LIKE '".$date."'";
                          $facturedoublea= $main->fetchAll($sql);
                          if($facturedoublea){
                          foreach ($facturedoublea as $facturedoublea){
                             $facturetabAnnule[]=$facturedoublea['NumFact'];
                          }
                           $factureannule=array_unique($facturetabAnnule);
                          
                          $nbannule=count($factureannule);

                        
                        }else{
                          $nbannule=0;
                        }
                        if(isset($nbfacture)){
                          if($nbfacture==0){$annule=0;}else{ $annule=($nbannule*100)/$nbfacture;}
                      }else{$annule=0;}
                          ?>
                        <div class="progress thin" style="background-color: #fff;">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $annule."%";?>">
                          <?php echo number_format($annule)."%";?>
                          </div>
                        </div>
                        <span class="sr-only"><?php echo $annule;?> %</span>
                      </th>
                    </tr>
                  </tbody>
                </table> 
</div>      
<div class="col-lg-3" style="margin: 0px;padding: 0px;">
    <div class="col-lg-12" style="margin: 0px;padding: 0px;"> 
       
<a href="#">     <div class="social-box facebook" style="height: 200px;">
              <i class="fa fa-facebook" style="font-size: 30px;"></i>
              <ul>
                <li style="text-align: center;padding-left:85px;">
                  <span><img src="../img/logo.ico"></span>
                </li>
                
              </ul>
            </div> 

  </div>
</div> </a>
<div class="col-lg-12">
<div class="conttable"> 
</div></div>      
              
             

        
      

               
             
         
        <!-- page end-->
<script type="text/javascript">
  $(document).ready(function(){
    $.post('fonction/fonctionAccuiel.php',function(data){
      $('.conttable').empty().append(data);
      $('#tableau').DataTable({
        "language":{
        "sProcessing": "Traitement en cours ...",
    "sLengthMenu": "Afficher _MENU_ lignes",
    "sZeroRecords": "Aucun résultat trouvé",
    "sEmptyTable": "Aucune donnée disponible",
    "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
    "sInfoEmpty": "Aucune ligne affichée",
    "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
    "sInfoPostFix": "",
    "sSearch": "Chercher:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Chargement...",
    "oPaginate": {
      "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
    },
    "oAria": {
      "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
    }
    }
      });
    }); 

  });
</script> 