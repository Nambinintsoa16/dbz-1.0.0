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
            <h3 class="page-header"><i class="fa fa-files-o"></i>Commande Journalière</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-users"></i>Client</li>
              <li><i class="fa fa-plus"></i>Ajout Client</li>
            </ol>
          </div>
        </div>
<table class="table" id="tableau">
  <thead>
    <tr> 
       <th style="text-align: center;background-color: #7d8997;color: #000;">N° facture</th>
       <th style="text-align: center;background-color: #7d8997;color: #000;">Client</th>
       <th style="text-align: center;background-color: #7d8997;color: #000;">Produit</th> 
       <th style="text-align: center;background-color: #7d8997;color: #000;">Statue</th>    
       <th style="text-align: center;background-color: #7d8997;color: #000;"></th>
    </tr>	
  </thead>
<?php
$userlogin=$_SESSION['login']['matricule'];
 $numfacture[]=array();
 $sql="SELECT `NumFact` FROM `facture` WHERE `datedefacture`  LIKE '".$date."'";
 $reponse=$main->fetchAll($sql);

 if ($reponse) {
 	
 foreach ($reponse as $reponse){
 	$valeur[]=$reponse['NumFact'];
 }
 $rep=array_unique($valeur);

 $long=count($rep);
 for ($i=0; $i < $long; $i++){
 $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`='".$rep[$i]."'"; 
 $idcomandeAll=$main->fetchAll($sql);
 foreach ($idcomandeAll as $idcomandeAll){
 	$sql="SELECT `matriculeuser`,`idcomand` FROM `comande` WHERE `idcomand` LIKE '".$idcomandeAll['idcomande']."'";
    $user=$main->fetchAll($sql);
    foreach ($user as $user){
    	if(in_array($_SESSION['login']['matricule'], $user)){
    		$sql="SELECT `NumFact` FROM `facture` WHERE `idcomande` LIKE '".$user['idcomand']."'";
    		$reponseNumfact=$main->fetch($sql);
    	    $id[]=$reponseNumfact['NumFact'];
 			
           }   	
    }	
 }
}


$idfacture=array_unique($id);
$idcount=count($idfacture);
for ($i=0; $i < $idcount ; $i++) { 
	

 ?>
    <tr>
      <th><?php echo $idfacture[$i];?></th>
      <th><?php
     $sql="SELECT `idclient` FROM `facture` WHERE `NumFact` LIKE '".$idfacture[$i]."'";
     $idclient=$main->fetch($sql);
     $sql="SELECT `Nom` FROM `client` WHERE `idclient` LIKE '".$idclient['idclient']."'";
     $Nom=$main->fetch($sql);
     echo $Nom['Nom']; 
       ?></th>
      
      
      <th>
      <?php
         $sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$idfacture[$i]."'";
         $valeur=$main->fetchAll($sql);
         foreach ($valeur as $valeur) {
         	 $sql="SELECT `codeproduit` FROM `comande` WHERE `idcomand` LIKE '".$valeur['idcomande']."'";
         	 $sqlQ="SELECT `quantite` FROM `comande` WHERE `idcomand` LIKE '".$valeur['idcomande']."'";
         	 $codeproduit=$main->fetch($sql);
         	 $quantite=$main->fetch($sqlQ);
         	 
         	 $sql="SELECT `designation` FROM `produit` WHERE `codeproduit` LIKE '".$codeproduit['codeproduit']."'";
         	 $designation=$main->fetch($sql);
         	 echo $quantite['quantite']." . ".$designation['designation']."<br/>";
         }
      	?>
      </th> 
      <th>
     <?php
      $sql="SELECT `Statut` FROM `facture` WHERE `NumFact` LIKE '".$idfacture[$i]."'";
      $statut=$main->fetch($sql);
      echo $statut['Statut'];
      ?>	
      </th>
       <th><?php echo '<a class="btn btn-info" href="?page=commandeclient&idfacture='. $idfacture[$i].'"><i class="fa fa-info"></i></a>';?></th>
    </tr>
<?php
}

 }
?>
    
 
  <tbody>
  </tbody>
</table>
<script type="text/javascript">
        $(document).ready(function(){
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