<?php 
include_once('class/main.php');
$main=new main();
$dt=new dateTime();
$date=$dt->format("y-m-d");   
?>
              <table class="table table-striped table-advance table-hover" id="tableau">
              <thead>
                <tr>
                    <th>Nom Livreur</th>
                    <th>Client</th>
                    <th>Lieu de livraison</th>
                    <th> Date de livraison</th>
                    <th>debut</th>
                    <th>Fin</th>
                    <th>Remarque </th>
                    <th> </th>
                  </tr>
              </thead>
                <tbody class="listLivraisonAnnullee">  
         <?php 
     $sql="SELECT `NumFact` FROM `facture` WHERE `datelivre`='".$date."'";
          $resultfact=$main->fetchAll($sql);
           if($resultfact){
               foreach ($resultfact as $resultfact){
                $factdouble[]=$resultfact['NumFact'];
               }
               $facture=array_unique($factdouble);
               $nb=count($facture);
               foreach ($facture as $facture){
                
              ?>

                  <tr>
                    <td>
                      <?php 
             $sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$facture."'";
              $idcomande=$main->fetch($sql);
             $sql="SELECT * FROM `livraison` WHERE `idcomand` LIKE '".$idcomande['idcomande']."'";
             $Nomlivreur=$main->fetch($sql);
             echo $Nomlivreur['Nomlivreur'];
                    ?></td>
              <td>
                <?php
                $sql="SELECT `idclient` FROM `facture` WHERE `NumFact` LIKE '".$facture."'";
                $idclient=$main->fetch($sql);
                $sql="SELECT `Nom` FROM `client` WHERE `idclient` LIKE '".$idclient['idclient']."'";
                $Nom=$main->fetch($sql);
                echo $Nom['Nom'];
                ?>
              </td>

                    <td><?php    echo $Nomlivreur['ville'].",".$Nomlivreur['qartieur']." , ".$Nomlivreur['lieudelivraison']; ?></td>
                    <td>
                <?php
                if ($Nomlivreur['datediflivre']===NULL) {
                  echo $Nomlivreur['datedelivraison'];
                }else{              
                  echo $Nomlivreur['datediflivre'];
                }
                 
                 ?></td>
                    <td>
                      
               <?php
             
                if ($Nomlivreur['heurlivredifdebut']===NULL) {
                  echo $Nomlivreur['debut'];
                }else{              
                  echo $Nomlivreur['heurlivredifdebut'];
                }
                 
                 ?>

                    </td>
                    <td>
                   <?php
  
                if ($Nomlivreur['heurlivrediffin']===NULL) {
                  echo $Nomlivreur['fin'];
                }else{              
                  echo $Nomlivreur['heurlivrediffin'];
                }
                 
                 ?>    
                    </td>
                    <td></td>
                    <td>
                 <a class="btn btn-info" href="?page=commandeclient&idfacture=<?php echo $facture;?>"> <i class="fa fa-info"></i>   

                    </td>
                  
                    
                  </tr>
                <?php } 
              }?>  

 </tbody>
              </table>  

      <script type="text/javascript">
        $(document).ready(function(){
         $('#tableau').DataTable({ "language":{
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
    }});
        });
      </script>