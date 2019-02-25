<?php
include_once('fonction/class/main.php');
$main=new main();

if(isset($_GET['idfacture'])){
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> INFORMATION CLIENT</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=">Accueil</li></a>
              <li><i class="fa fa-cube"></i><a href="#">Livraison</a> </li>
              <li><i class="fa fa-liste"></i><a href="?page=livraison">Listes des livraison</a> </li>
              <li><i class="fa fa-cube"></i><a href="#">Fiche indiv livre</a> </li>	
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">


<section class="container detail_corp">
		<div class="row">
			<div class="col-md-12">
				<h3>DETAIL CLIENT</h3>
			</div>
		</div>
		<div class="row detai_row">
			<div class="col-md-12">

			</div>
		</div>
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
		<div class="row detail_commande">
			<div class="col-md-12 ">
				<h3 class="client_name">Detail de commande</h3> <br>
				<table width="100%">
					<thead>
						<tr>
							<th style="text-align: center;">Date</th>
							<th style="text-align: center;">Produit</th>
							<th style="text-align: center;">Montant</th>
							<th style="text-align: center;">Lieu de livraison</th>
							<th style="text-align: center;">STATUS</th>
						</tr>
					</thead>
	
					<tbody>
						<tr class="ligne1">
							<td>
							<?php
	$sql="SELECT `datedefacture` FROM `facture` WHERE `NumFact` LIKE '".$_GET['idfacture']."'";
	$datefact=$main->fetch($sql);
	echo $datefact['datedefacture'];
							?></td>
							<td>
<?php
$sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$_GET['idfacture']."'";
$idcomande=$main->fetchALL($sql);
foreach ($idcomande as $idcomande){
	$sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand` LIKE '".$idcomande['idcomande']."'";
	$codeproduit=$main->fetch($sql);
	$sql="SELECT `designation` FROM `produit` WHERE `codeproduit` LIKE '".$codeproduit['codeproduit']."'";
	$produit=$main->fetch($sql);
	echo $codeproduit['quantite']." . ".$produit['designation']."<br/>";
}

?>

							</td>
							<td>
								
<?php
$prix=0;
$sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$_GET['idfacture']."'";
$idcomande=$main->fetchALL($sql);
foreach ($idcomande as $idcomande){
	$sql="SELECT `codeproduit` FROM `comande` WHERE `idcomand` LIKE '".$idcomande['idcomande']."'";
	$codeproduit=$main->fetch($sql);
	$sql="SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE '".$codeproduit['codeproduit']."'";
	$produit=$main->fetch($sql);
	$prix+=$produit['prix'];
}
echo $prix." Ar";
?>


							</td>
				<td>
					

<?php
$prix=0;
$sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$_GET['idfacture']."'";
$idcomande=$main->fetch($sql);
$sql="SELECT `ville`,`lieudelivraison`,`qartieur` FROM `livraison` WHERE `idcomand` ='".$idcomande['idcomande']."'";
$lieu=$main->fetch($sql);
echo $lieu['ville'].' , '.$lieu['qartieur'].' , '.$lieu['lieudelivraison'];

?>


				</td>
							<td>
								<?php
	$sql="SELECT `Statut` FROM `facture` WHERE `NumFact` LIKE '".$_GET['idfacture']."'";
	$datefact=$main->fetch($sql);
	echo $datefact['Statut'];
							?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>	
		</div>



		<div class="row">
			<div class="col-md-12">
		<fieldset><legend>Fréquence d'achat</legend>
			<canvas class="statClient" id="statClient">
				</canvas>
		</fieldset>		
				
			</div>
		</div>
		<div class="row tous_commande">

			<div class="col-md-12 ">
				<h3 class="client_name"> Toutes les Commandes</h3> <br>
				<table width="100%">
					<thead>
						<tr>
							<th>Date</th>
							<th>Produit</th>
							<th>Montant</th>
							<th>DMD Prix</th>
							<th>DMD INFOS</th>
							<th>RECLAMATION</th>
							<th>RELANCE</th>
							<th>AUTRES</th>
							<th>STATUS</th>
						</tr>
					</thead>
					<tbody>
						<tr class="ligne1">
							<td>2019-02-18</td>
							<td>Parfun</td>
							<td>12000Ar</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>Confirmé</td>
						</tr>

						<tr class="ligne2">
							<td>2019-02-18</td>
							<td>Parfun</td>
							<td>12000Ar</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>Confirmé</td>
						</tr>
						<tr class="ligne1">
							<td>2019-02-18</td>
							<td>Parfun</td>
							<td>12000Ar</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>Confirmé</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row pagina">
			<ul class="col-md-12  pagination">
				 	<li><a href="#">Next</a></li>
					  <li><a href="#">5</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">1</a></li>
			   		<li><a href="#">Prev</a></li>
			</ul>
		</div>
	</section>
	<?php
  }
	?>

	<script type="text/javascript">
		$(document).ready(function(){
			var ctx = document.getElementById('statClient').getContext('2d');
			var chart = new Chart(ctx, {
    		// The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "Fréquence d'achat",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});
		});
		    

	</script>
