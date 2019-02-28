<?php
include_once('class/main.php');
$main=new main();
if(isset($_POST['date'])){
$date=date("Y-m-d",strtotime($_POST['date']));
$sql="SELECT `NumFact` FROM `facture` WHERE `datelivre` LIKE '".$date."'";
?>
 <table class="table table-striped table-advance table-hover" id="tableau">
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
   <?php endforeach; }?>  

 </tbody>
              </table>  

      <script type="text/javascript">
        $(document).ready(function(){
           $('.btn-danger').on('click',function(event){
            event.preventDefault();
          $.get($(this).attr('href'),function(data){
            $.post('fonction/fonctionlisteLivraisonConfirmée.php',function(data){
            $('.listLivraisonConfirmée').empty().append(data);
                });
             });
         });
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
      </script>