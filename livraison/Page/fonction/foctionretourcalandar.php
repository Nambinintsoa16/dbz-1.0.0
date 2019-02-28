<?php
include_once('class/main.php');
$main=new main();
if(isset($_POST['date'])){
$date=date("Y-m-d",strtotime($_POST['date']));
$sql="SELECT `NumFact` FROM `facture` WHERE `datelivre` LIKE '".$date."'";
?>
 <div id="home" class="tab-pane fade in active">
    <div class="home">
 <table class="table table-striped table-advance table-hover" >
              <thead>
                <tr>
                	<th>Client</th>
                    <th>Nom Livreur</th>
                    <th>Lieu de livraison</th>
                    <th>Heure</th>
                    <th> </th>
                  </tr>
              </thead>
 <tbody class="listLivraisonConfirmée"> 
<?php
$facturedouble=$main->fetchAll($sql);
if($facturedouble){
	foreach ( $facturedouble as $facturedouble) {
		$facturetab[]=$facturedouble['NumFact'];
	}
     $facture=array_unique($facturetab);
    }
}
if (isset($facture)) {

 foreach ($facture as $facture):?> 
                  <tr>
                  	<td>
                   <?php
                  $sql="SELECT `idclient` FROM `facture` WHERE `NumFact` LIKE '".$facture."'"; 	
                  $idclient=$main->fetch( $sql);
                  $sql="SELECT `Nom` FROM `client` WHERE `idclient` LIKE '".$idclient['idclient']."'";
                  $nom=$main->fetch($sql);
                  echo $nom['Nom'];
                   	?>
                    </td>
                    <td>
                <?php
                 $sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$facture."'";
                 $idcomandeall=$main->fetchAll($sql);
                 $idcomande=$main->fetch($sql);
                 $sql="SELECT `Nomlivreur`,`heurlivredifdebut`,`heurlivrediffin`,`ville`,`qartieur` FROM `livraison` WHERE `idcomand` LIKE '". $idcomande['idcomande']."'";
                 $Livreur=$main->fetch($sql);
                 echo $Livreur['Nomlivreur'];
                 ?></td>
                    <td>
                   <?php 
                   	echo $Livreur['ville']." , ". $Livreur['qartieur'];
                    ?>	
                    </td>
                    <td>
                   <?php 
                      echo $Livreur['heurlivredifdebut']." - ".$Livreur['heurlivrediffin'];
                    ?> 	
                    </td>
                    
                    <td><a class="btn btn-info" href="#"><i class="fa fa-info"></i></a></td>
                    
                  </tr>
   <?php endforeach;?>

 </tbody>
              </table>  

    </div>
</div>
        <div id="menu1" class="tab-pane fade">    
<table class="table table-striped table-advance table-hover" >
              <thead>
                <tr>
                	<th>Client</th>
                    <th>Nom Livreur</th>
                    <th>Lieu de livraison</th>
                    <th>Heure</th>
                    <th> </th>
                  </tr>
              </thead>
 <tbody class="listLivraisonConfirmée"> 
<?php
$sql1="SELECT `NumFact` FROM `facture` WHERE `Statut`LIKE 'livre' AND `datelivre` LIKE '".$date."'";
$facturedoublelivre=$main->fetchAll($sql1);
if($facturedoublelivre){
	foreach ( $facturedoublelivre as $facturedoublelivre) {
		$facturetablivre[]=$facturedoublelivre['NumFact'];
	}
     $facturelivre=array_unique($facturetablivre);
    }
}
if (isset($facturelivre)) {

 foreach ($facturelivre as $facturelivre):?> 
                  <tr>
                  	<td>
                   <?php
                  $sql1="SELECT `idclient` FROM `facture` WHERE `NumFact` LIKE '".$facturelivre."'"; 	
                  $idclientlivre=$main->fetch( $sql1);
                  $sql1="SELECT `Nom` FROM `client` WHERE `idclient` LIKE '".$idclientlivre['idclient']."'";
                  $nomlivre=$main->fetch($sql1);
                  echo $nomlivre['Nom'];
                   	?>
                    </td>
                    <td>
                <?php
                 $sql1="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$facturelivre."'";
                 $idcomandealllivre=$main->fetchAll($sql1);
                 $idcomandelivre=$main->fetch($sql1);
                 $sql1="SELECT `Nomlivreur`,`heurlivredifdebut`,`heurlivrediffin`,`ville`,`qartieur` FROM `livraison` WHERE `idcomand` LIKE '".$idcomandelivre['idcomande']."'";
                 $Livreurlivre=$main->fetch($sql1);
                 echo $Livreurlivre['Nomlivreur'];
                 ?></td>
                    <td>
                   <?php 
                   	echo $Livreurlivre['ville']." , ". $Livreurlivre['qartieur'];
                    ?>	
                    </td>
                    <td>
                   <?php 
                      echo $Livreurlivre['heurlivredifdebut']." - ".$Livreurlivre['heurlivrediffin'];
                    ?> 	
                    </td>
                    
                    <td><a class="btn btn-info" href="#"><i class="fa fa-info"></i></a></td>
                    
                  </tr>
   <?php endforeach; ?>
  </tbody>
              </table>  

    </div>
</div>
        
					 </div>
                       <div id="menu2" class="tab-pane fade">
                            <h3>livraison reportée</h3>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                       
                             <div class="menu3">
                             	
 	<table class="table table-striped table-advance table-hover" >
              <thead>
                <tr>
                	<th>Client</th>
                    <th>Nom Livreur</th>
                    <th>Lieu de livraison</th>
                    <th>Heure</th>
                    <th> </th>
                  </tr>
              </thead>
 <tbody class="listLivraisonConfirmée"> 
<?php
$sql2="SELECT `NumFact` FROM `facture` WHERE `Statut`LIKE 'annule' AND `datelivre` LIKE '".$date."'";
$facturedoubleannule=$main->fetchAll($sql2);
if($facturedoubleannule){
	foreach ( $facturedoubleannule as $facturedoubleannule) {
		$facturetabannule[]=$facturedoubleannule['NumFact'];
	}
     $factureannule=array_unique($facturetabannule);
    }
}
if (isset($factureannule)) {

 foreach ($factureannule as $factureannule):?> 
                  <tr>
                  	<td>
                   <?php
                  $sql2="SELECT `idclient` FROM `facture` WHERE `NumFact` LIKE '".$facturelivre."'"; 	
                  $idclientannule=$main->fetch( $sql2);
                  $sql2="SELECT `Nom` FROM `client` WHERE `idclient` LIKE '".$idclientannule['idclient']."'";
                  $nomannule=$main->fetch($sql2);
                  echo $nomannule['Nom'];
                   	?>
                    </td>
                    <td>
                <?php
                 $sql2="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$factureannule."'";
                 $idcomandealannule=$main->fetchAll($sql2);
                 $idcomandeannule=$main->fetch($sql2);
                 $sql2="SELECT `Nomlivreur`,`heurlivredifdebut`,`heurlivrediffin`,`ville`,`qartieur` FROM `livraison` WHERE `idcomand` LIKE '".$idcomandeannule['idcomande']."'";
                 $Livreurannule=$main->fetch($sql2);
                 echo $Livreurannule['Nomlivreur'];
                 ?></td>
                    <td>
                   <?php 
                   	echo $Livreurannule['ville']." , ". $Livreurannule['qartieur'];
                    ?>	
                    </td>
                    <td>
                   <?php 
                      echo $Livreurannule['heurlivredifdebut']." - ".$Livreurannule['heurlivrediffin'];
                    ?> 	
                    </td>
                    
                    <td><a class="btn btn-info" href="#"><i class="fa fa-info"></i></a></td>
                    
                  </tr>
   <?php endforeach; }?>
  </tbody>
              </table>  

 

                             </div> 
                            </div>

<script type="text/javascript">
 $(document).ready(function() {
         

            $('.table').DataTable({
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


</script>




      