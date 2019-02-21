<?php
include_once('fonction/class/main.php');
$main=new main();
$dt=new dateTime();
$date=$dt->format("Y-m-d");
$sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'confirmer' AND`datelivre`='".$date."'";
$resultfact=$main->fetchAll($sql);
foreach ($resultfact as $resultfact){
 $factdouble[]=$resultfact['NumFact'];
}
$facture=array_unique($factdouble);

?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Livraison du jour</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=">Accueil</a></li>
              <li><i class="fa fa-bus"></i><a href="#">Livraison</a></li>
              <li><i class="fa fa-list"></i>Livraison du jour </li>
            </ol>
          </div>
        </div>
<table class="table" id="table">
  <thead>
	<tr>
	  <th>BL Envoyé</th>
		<th>Client</th>
		<th>Quantite et  Désignation Produit</th>
		<th>Heure de livraison</th>
		<th>lieu de vraison</th>
		<th></th>
	</tr>
	</thead>
	<tbody class="tbodd">
	
	<?php
	foreach ($facture as $facture){
	?>
	<tr>
	  <th><?php echo $facture;?></th>
		<th>
		<?php
		$sqlidclient="SELECT `idclient` FROM `facture` WHERE `NumFact` LIKE '".$facture."'";
		$idclient=$main->fetch($sqlidclient);
		$sql="SELECT `Nom` FROM `client` WHERE `idclient` LIKE '".$idclient['idclient']."'";
		$client=$main->fetch($sql);
		echo  $client['Nom'];
		?>
		</th>
		<th>
			<?php
			$sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$facture."'";
			$idcomand=$main->fetchAll($sql);
			foreach ($idcomand as $idcomand){
				$sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand` LIKE '".$idcomand['idcomande']."'";
				$idproduit=$main->fetchAll($sql);	
				foreach ($idproduit as $idproduit) {
					$sql="SELECT `designation` FROM `produit` WHERE `codeproduit` LIKE '".$idproduit['codeproduit']."'";
					$produit=$main->fetch($sql);
					echo $idproduit['quantite'].".".$produit['designation'].'<br/>';
				}
			}
			
			?>
		 </th>
		<th>
		<?php
		$sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$facture."'";
		$idcomand=$main->fetch($sql);
		$sql="SELECT `heurlivrediffin`,`heurlivredifdebut`,`ville`,`qartieur`,`lieudelivraison` FROM `livraison` WHERE `idcomand` LIKE '".	$idcomand['idcomande']."'";
		$datelivre=$main->fetch($sql);
	
			echo $datelivre['heurlivredifdebut']." <br/> ".$datelivre['heurlivrediffin'];
		
		?></th>
		<th><?php echo  $datelivre['ville'].",".$datelivre['qartieur'].",".$datelivre['lieudelivraison']; ?></th>
		<th><?php echo '<a class="btn btn-info" href="?page=commandeclient&idfacture='.$facture.'"> <i class="fa fa-info"></i></a>';?></th>
	
	</tr>	
	<?php }?>
	
	</tbody>
</table>

