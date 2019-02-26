	<?php 
$mois = array(
	"Jan"=>"01","02"=>"Feb","Mar"=>"03","Apr"=>"04","May"=>"05","Jun"=>"06","Jul"=>"07","Aug"=>"08","Sep"=>"09","Oct"=>"10","Nov"=>"11","Dec"=>"12");

if(isset($_POST['date'])){
	$date = explode(" ", $_POST['date']);
foreach ($mois as $mois=>$key) {
	if ($mois==$date[1]) {
		$dateconv=$mois[$mois];
		var_dump($dateconv);

	}
}

	 ?>
	<table class="table table-dark" id="" >
									<thead>
										<tr>
											<th><?php?></th>
											<th>Code de Produit</th>
											<th> Client</th>
											<th>Quantité</th>
											<th>Matricule Utilisateur</th>
											<th>observation</th>	
										</tr>
									</thead>
							   <tbody>
                              
							  
                                </tbody>
								<?php  } ;?>
                                </table>