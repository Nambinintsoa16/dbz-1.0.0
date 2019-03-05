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
        <div class="row wow fadeInUp">

            <img src="../img/banniere.jpg" alt="" height="400px" width="100%"
                style="object-fit: cover;top:-2Opx !important">

        </div>
        <div class="row" style="margin-top:5px">
            <div class="col-lg-2  col-md-2   col-sm-2  col-xs-12">
                <a href="?page=livraison">
                    <div
                        style="position:relative;border-radius:50%;margin:auto;margin-top:-25px;width:50px;height:50px;background:white;z-index:111;border:solid 5px #04a5cc">
                        <i class="fa fa-truck"
                            style="z-index:1111;position:absolute;font-size:26px;padding-top:5px;padding-left:5px;color:#04a5cc"></i>
                    </div>
                    <div class="" style="background:#04a5cc;height:120px;color:white;z-index:1;margin-top:-25px;">
                        <div style="text-align:center;padding-top:20px;font-size:24px">Livraison</div>
                        <div style="text-align:center;font-size:24px">
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
                        <div style="height:30px;background:#038cae;margin-top:5px;padding-top:6px;text-align:center">
                            Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2   col-md-2   col-sm-2   col-xs-12">
                <a href="?page=listedesproduit">
                    <div
                        style="position:relative;border-radius:50%;margin:auto;margin-top:-25px;width:50px;height:50px;background:white;z-index:111;border:solid 5px #00a65a">
                        <i class="fa fa-gift"
                            style="z-index:1111;position:absolute;font-size:26px;padding-top:5px;padding-left:8px;color:#00a65a"></i>
                    </div>

                    <div class="" style="background:#00a65a;min-height:120px;color:white;margin-top:-25px;">
                        <div class="count" style="text-align:center;padding-top:20px;font-size:24px">Produit</div>
                        <div style="text-align:center;font-size:24px">
                            <?php
                            $sql="SELECT * FROM `produit` ";
                            $count=$main->test($sql);
                            echo $count;
                            ?>

                        </div>
                        <div style="height:30px;background:#018d4e;margin-top:5px;padding-top:6px;text-align:center">
                            Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></div>

                    </div>

                </a>

            </div>


            <div class="col-lg-2   col-md-2   col-sm-2   col-xs-12 ">
                <a href="?page=listedesclient">
                    <div
                        style="position:relative;border-radius:50%;margin:auto;margin-top:-25px;width:50px;height:50px;background:white;z-index:111;border:solid 5px #f39c11">
                        <i class="fa fa-user"
                            style="z-index:1111;position:absolute;font-size:26px;padding-top:5px;padding-left:9px;color:#f39c11"></i>
                    </div>

                    <div class="" style="background:#f39c11;min-height:120px;color:white;margin-top:-25px">
                        <div class="count" style="text-align:center;padding-top:20px;font-size:24px">Client</div>
                        <div style="text-align:center;font-size:24px">
                            <?PHP
                            $sql="SELECT `id` FROM `client`";
                            $countClient=$main->test($sql);
                            echo  $countClient;

                        ?>
                        </div>
                        <div style="height:30px;background:#d08510;margin-top:5px;padding-top:6px;text-align:center">
                            Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></div>

                    </div>
                    <a>
            </div>
            <div class="col-lg-2   col-md-2   col-sm-2   col-xs-12 ">
                <a href="?page=vente">
                    <div
                        style="position:relative;border-radius:50%;margin:auto;margin-top:-25px;width:50px;height:50px;background:white;z-index:111;border:solid 5px #f39c11">
                        <i class="fa fa-user"
                            style="z-index:1111;position:absolute;font-size:26px;padding-top:5px;padding-left:9px;color:#f39c11"></i>
                    </div>

                    <div class="" style="background:#f39c11;min-height:120px;color:white;margin-top:-25px">
                        <div class="count" style="text-align:center;padding-top:20px;font-size:24px">Comande</div>
                        <div style="text-align:center;font-size:24px">
                            <?PHP
                            $sql="SELECT `id` FROM `client`";
                            $countClient=$main->test($sql);
                            echo  $countClient;

                        ?>
                        </div>
                        <div style="height:30px;background:#d08510;margin-top:5px;padding-top:6px;text-align:center">
                            Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></div>

                    </div>
                    <a>
            </div>
            <div class="col-lg-2   col-md-2   col-sm-2   col-xs-12">
                <a href="?page=Livresondujour">
                    <div
                        style="position:relative;border-radius:50%;margin:auto;margin-top:-25px;width:50px;height:50px;background:white;z-index:111;border:solid 5px #dd4b39">
                        <i class="fa fa-calendar"
                            style="z-index:1111;position:absolute;font-size:26px;padding-top:5px;padding-left:8px;color:#dd4b39"></i>
                    </div>
                    <div class="" style="background:#dd4b39;min-height:120px;color:white;margin-top:-25px">

                        <div class="count" style="text-align:center;padding-top:20px;font-size:24px">Calendrier</div>
                        <div style="height:30px;background:#bb4031;margin-top:40px;padding-top:6px;text-align:center">
                            Plus d'info &nbsp; <i class="fa fa-arrow-circle-right"></i></div>

                    </div>
                </a>
            </div>

            <div class="col-lg-2   col-md-2   col-sm-2   col-xs-12">
                <a href="?page=infoetreclamation" target="_blanc">
                    <div
                        style="position:relative;border-radius:50%;margin:auto;margin-top:-25px;width:50px;height:50px;background:white;z-index:111;border:solid 5px #3b5998">
                        <i class="fa fa-facebook"
                            style="z-index:1111;position:absolute;font-size:26px;padding-top:7px;padding-left:10px;color:#3b5998"></i>
                    </div>

                    <div class="" style="background:#3b5998;min-height:120px;color:white;margin-top:-25px">

                        <div class="count" style="text-align:center;padding-top:20px;font-size:24px">Autres</div>
                        <div style="height:30px;background:#324b81;margin-top:40px;padding-top:6px;text-align:center">
                        </div>

                    </div>
                </a>
            </div>

        </div>

        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-truck"></i><a href="index.html">Etat de Livraison</a></li>
                </ol>
            </div>
        </div>
<?php
$sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'confirmer' AND`datelivre`='".$date."'";
$facturedoublee= $main->fetchAll($sql);
if($facturedoublee){
foreach ($facturedoublee as $facturedoublee){
$facturetabAtt[]=$facturedoublee['NumFact'];}
$factureAtt=array_unique($facturetabAtt);                          
$nbfactureAtt=count($factureAtt);}else{$nbfactureAtt=0;}
if(isset($nbfacture)){
if($nbfacture==0){$nbfactureAtt=0;}else{$nbfactureAtt=($nbfactureAtt*100)/$nbfacture;}
}else{$nbfactureAtt=0;}
?>                        
<div class="row" style="margin-right:0px;margin-left:0px;color:#fff">
            <div class="col-md-4">
                <div class="row" style="margin-right:0px;margin-left:0px;border:solid 5px #fff">
                    <div class="col-md-4" style="background:#34495e;min-height:120px;">
                        <canvas style="width:100%;height: 115px;" id="att">
                        
                        </canvas>
                    </div>
                    <div class="col-md-8" style="background:#34495e;min-height:120px;">
                        <div style="padding-top:10px">
                            <span>Livré</span><br>
                            <span style="font-size:30px"><?php echo $nbfactureAtt;?>%</span><br>
                <div class="progress thin" style="background-color: #91b5cd;height:2px;margin-top: 10px!important;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $nbfactureAtt."%";?>;background-color:#fff;">
                           
                          </div></div>
                            <span style="color: white;position: absolute;margin-top: -13px;">Progression</span>
                        </div>

                    </div>
                </div>
            </div>
<?php 
$sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'livre' AND `datelivre` LIKE '".$date."'";
 $facturedouble= $main->fetchAll($sql);
 if($facturedouble){
  foreach ($facturedouble as $facturedouble){
   $facturetab[]=$facturedouble['NumFact'];}
   $facturelivre=array_unique($facturetab);
   $nbfacturelivre=count($facturelivre);
 }else{$nbfacturelivre=0; }
 if(isset($nbfacture)){if ($nbfacture==0){$Ptlivre=0;}else{$Ptlivre=($nbfacturelivre*100)/$nbfacture;} }else{ $Ptlivre=0; }
 ?>
            <div class="col-md-4">
                <div class="row" style="margin-right:0px;margin-left:0px;border:solid 5px #fff">
                    <div class="col-md-4" style="background:#236d9e;min-height:120px;">
                    <canvas style="width:100%;height: 115px;" id="livre">
                            
                        </canvas>
                    </div>

                    <div class="col-md-8" style="background:#2a80b9;min-height:120px;">
                    <div style="padding-top:10px">
                            <span>Livré</span><br>
                            <span style="font-size:30px"><?php echo $Ptlivre;?>%</span><br>
            <div class="progress thin" style="background-color:#97a0a9;height: 2px;margin-top: 10px!important;">
                 <div class="progress-bar progress-bar-succes" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $Ptlivre."%"; ?>;background-color:#fff;">
                          </div>
                          
                        </div>
                            <span style="color: white;position: absolute;margin-top: -13px;">Progression</span>
                        </div>
                    </div>
                </div>

            </div>
<?php 
$sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'annule' AND `datelivre` LIKE '".$date."'";
$facturedoublea= $main->fetchAll($sql);
if($facturedoublea){
foreach ($facturedoublea as $facturedoublea){$facturetabAnnule[]=$facturedoublea['NumFact'];} $factureannule=array_unique($facturetabAnnule); $nbannule=count($factureannule);
}else{$nbannule=0; }
 if(isset($nbfacture)){if($nbfacture==0){$annule=0;}else{ $annule=($nbannule*100)/$nbfacture;}}else{$annule=0;}  ?>                           
            <div class="col-md-4">
                <div class="row" style="margin-right:0px;margin-left:0px;border:solid 5px #fff"">
                    <div class="col-md-4" style="background:#c0062b;min-height:120px;">
                    <canvas style="width:100%;height: 115px;" id="Annul">
                            
                        </canvas>
                    </div>

                    <div class="col-md-8" style="background:#e30832;min-height:120px;">
                    <div style="padding-top:10px">
                      <span>Livré</span><br>
                      <span style="font-size:30px"><?php echo $annule;?>%</span><br>
                      <div class="progress thin" style="background-color:#e08396;height: 1px;color: white;margin-top: 10px!important;">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="93" aria-valuemin="0"  aria-valuemax="100" style="position: absolute;margin-top: -20px;width:<?php echo $annule."%";?>;background-color:#fff;">    
                </div></div> 
             <span style="color: white;position: absolute;margin-top: -13px;">Progression</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $.post('fonction/fonctionAccuiel.php', function(data) {
                $('.conttable').empty().append(data);
                $('#tableau').DataTable({
                    "language": {
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
                            "sFirst": "Premier",
                            "sLast": "Dernier",
                            "sNext": "Suivant",
                            "sPrevious": "Précédent"
                        },
                        "oAria": {
                            "sSortAscending": ": Trier par ordre croissant",
                            "sSortDescending": ": Trier par ordre décroissant"
                        }
                    }
                });
            });

        });
  var data_livre =[<?php echo $Ptlivre; ?>,<?php echo 100-$Ptlivre;?>];
  var data_annule =[<?php echo $annule; ?>,<?php echo 100-$annule;?>];
  var data =[<?php echo $nbfactureAtt; ?>,<?php echo 100-$nbfactureAtt;?>];
  bar('att',data,'#fff','#91b5cd');
  bar('livre',data_livre,'#fff','#97a0a9');
  bar('Annul',data_annule,'#fff','#e08396');
  function bar(id,data,colorA,colorB){ 
    var ctx = document.getElementById(id).getContext('2d');
    var chart = new Chart(ctx, {
    type: 'doughnut',
   
    data: {
        datasets: [{
        data: data,
        backgroundColor: [colorA],
        borderWidth: 0
        
    }],

    },

    options: {
      cutoutPercentage: 80,
        legend: {
            display: false,
            
        }

    }
});
     
}  
            

    </script>