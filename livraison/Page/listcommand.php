<?php
include_once('fonction/class/main.php');
$main=new main();
$soustout=0;
if (isset($_GET['idfacture'])){
$sql='SELECT `idcomande`,`idclient` FROM `facture` WHERE `NumFact` LIKE"'.$_GET['idfacture'].'"';
$facture=$main->fetch($sql);
}else{
  $idfacture="CTL/FB/2019-02-14/0001";
  $sql='SELECT `idcomande`,`idclient` FROM `facture` WHERE `NumFact` LIKE"'. $idfacture.'"';
  $facture=$main->fetch($sql);
  $_GET['idfacture']="CTL/FB/2019-02-14/0002";
}

?>

<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Command</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-users"></i>Commande</li>
              <li><i class="fa fa-plus"></i>Modifier commande</li>
            </ol>
          </div>
        </div>
       


  <div class="panel">
     
                         <?php
                         $sql="SELECT * FROM `client` WHERE `idclient`='".$facture['idclient']."'";
                         $reponse=$main->fetch($sql);
                          var_dump($facture);        
                          ?>
                           
      <div class="panel-body">
       
                <div class="row">
                        <div class="col-xs-5 col-sm-4 center">
                            <span class="profile-picture">
                              <?php
  echo '<img alt="'.$reponse['Nom'].'" class="simple" src="../../img/photoclient/'.$reponse['photo'].'"class="img-thumbnail" style="height:160px;width:160px;">';?> 
                            </span>

                            <div class="space space-4" ></div>
                            </a>

                        </div>

                        <div class="col-xs-3 col-sm-3">
                            <h4 class="blue">
                                <span class="middle"><?php  echo " ".$reponse['Nom']; ?></span>
                            </h4>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name" style="text-align: left;">
                                        <i class="middle ace-icon fa fa-phone-square bigger-150 green"></i> Contact :<?php echo '<b>'.$reponse['contact'].'</b>' ;?>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name" style="text-align: left;">Localisation : <i class="fa fa-map-marker light-orange bigger-110"></i>
                                        <span><?php echo $reponse['ville']." , ".$reponse['quartier'];?></span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> </div>

                                    <div class="profile-info-value">
                                        <span></span>
                                    </div>
                                </div>
                               
                             </div>
                <?php

              $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`='".$_GET['idfacture']."'";
              $fact=$main->fetch($sql);
              $sql="SELECT * FROM `livraison` WHERE `idcomand`='". $fact['idcomande']."'";
              $livre=$main->fetch($sql);
              
                          ?>     
                             </div>   <div class="col-xs-3 col-sm-3">
                             <div style="overflow:hidden;width: 350px;height: 400px;"><iframe width="350" height="400" src="https://maps.google.com/maps?width=350&amp;height=400&amp;hl=en&amp;q=%20%09<?php echo $livre['lieudelivraison'];?>%20%2C%20<?php echo $livre['qartieur'];?>%20%2C<?php echo $livre['ville'];?>%2Cmadagascar+(Titre)&amp;ie=UTF8&amp;t=k&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div><small><a href="https://embedgooglemaps.com/en/">embedgooglemaps FR</a></small></div><div><small><a href="https://newyorkhoponhopoffbus.nl">new york city freestyle pass: hop-on, hop-off tour en ferry</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />

                        </div ><!-- /.col -->
                    <div class="confirm">
                      
                    </div>
              
                        </div><!-- /.col -->
                    </div><!-- /.row -->

<fieldset  style="padding: 20px;margin-top: 10px;margin-bottom: 10px;">
   <legend  class="w-auto">Produit</legend>   
      <div class="form-group">
        <label for="ccomment" class="control-label col-lg-2">Choix du produit</label>
      <div class="col-lg-3">
        
        <select class="form-control famille" name="famille" placeholder="Cathegory" >
                     <option>AUTRES</option>
                     <option>BEAUTE</option>
                     <option>BOISSON</option>
                     <option>DEO & PARFUM</option>
                     <option>HYGIENE BUCO-DENTAIRE</option>
                     <option>HYGIENE CORPORELLE</option>
                     <option>LESSIVE</option>
                     <option>SOINS CAPILLAIRE</option>
                     <option>SOINS VISAGE</option>  
          </select> 

        </div>


        <div class="col-lg-3 ">
        
       <select name="codeproduit" class="form-control groupe">
        
        </select>

        </div>

        <div class="col-lg-3">
        <input type="cherche" name="" id="recherche" class="form-control">
        </div>

        <div class="col-lg-1">
        <button class="btn btn-primary validproduit" style="display: inline;"><i class="fa fa-plus"></i></button>
        </div>

      </div>  
   </fieldset>
   <fieldset><legend>Detail de command</legend>
        <?php
 $sql='SELECT `idcomande` FROM `facture` WHERE `NumFact`="'.$_GET['idfacture'].'"';
 $reponse=$main->fetchAll($sql);
        ?>
  <table class="table"  style="border-top:solid 1px #dbdbdb;border-bottom:solid 1px #dbdbdb; margin-top: 10px;">
                  <thead >


                    <tr>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 350px;">Produit</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 160px;">Prix en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:80px;">Quantite</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 160px;">Total en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:80px;">Aperçu</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:30px;"></th>
                    </tr>
                  </thead>
                  <tbody class="tbody">
<?php 
 foreach ($reponse as $reponse):
  $sql="SELECT * FROM `comande` WHERE `idcomand`=".$reponse['idcomande'];
  $rep1=$main->fetch($sql);
 ?>                    
                    <tr>
                      <td style="text-align: center;"><?php
                      $sql="SELECT `designation`,`photoproduit`,`prix` FROM `produit` WHERE `codeproduit`='".$rep1['codeproduit']."'";
                      $produit=$main->fetch($sql);
                      echo $produit['designation'];
                      ?></td>
                      <td style="text-align: center;"><?php echo  number_format($produit['prix'], 2, ',', ' ');?></td>
                      <td style="text-align: center;">
                 
                   <input type="number" style="text-align: center;" name="" class="form-control quartier" min="1" value="<?php echo $rep1['quantite'];?>">
                      	</td>

                      <td  style="text-align: center;" class="total"><?php $total=$produit['prix']*$rep1['quantite']; echo number_format($total, 2, ',', ' ');?></td>
                      <td ><?php 
                      echo '<img src="../../img/produit/'. $produit['photoproduit'].'" class="img-thumbnail" style="width:60px;">';
                      ?></td>

                      <td ><?php 
                      echo '<a class="btn btn-danger suppr" href="fonction/fonctionsuppcoman.php?idcomande='.$reponse['idcomande'].'"><i class="fa fa-remove"></i></a>';
                      ?></td>
                      <?php
                     $soustout+=$total;
                      ?>
                    </tr>
 <?php endforeach;?>

                   <tr>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Emetteur : <?php
                      if (isset($rep1)) {
                      $sql="SELECT `username` FROM `user` WHERE `matricule`='".$rep1['matriculeuser']."'";
                      $repuser=$main->fetch( $sql);
                      	echo $repuser['username'];
                      }
                      
                      ?></th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Sous total en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"></th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;" class="contTotal">
                        <?php
                        echo number_format($soustout, 2, ',', ' ');
                         ?>
                      </th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"></th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"></th>
                    </tr>                    
                  </tbody>
                </table>
      </div>
    </div>

</div>
        </div>


</fieldset>


	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $(".suppr").on('click',function(event){   
   	   event.preventDefault();
   	$.post($(this).attr('href'),function(data){
   		if (data.message=="true") {
   		$(this).parent().parent().remove();
   	      }else{
   	      	alert('Une erreur ces produit veuillez reessaier');
   	      }
        },'json');

   	});   



var cat;
  list();
    $('.famille').on('change',function(){
         list();
    });
    function list(){
      var famille=$('.famille').val();
      $.post('fonction/cat.php',{famille:famille},function(data){
           $('.groupe').empty().append(data);
      });
    }

  $('.groupe').on('change',function(){
       cat=$('.groupe').val();
  });
     
 

  $('#recherche').autocomplete({
    source : function(request, response) {
      var groupe=$('.groupe').val();
      var famille=$('.famille').val();
      
      $.get('fonction/fonctionliste.php',{term:request.term,groupe:groupe,famille:famille},function(data){
          response(data);
       },'json');
    }  
  });




   $('#recherche').autocomplete({
    source : function(request, response) {
      var groupe=$('.groupe').val();
      var famille=$('.famille').val();
      
      $.get('fonction/fonctionliste.php',{term:request.term,groupe:groupe,famille:famille},function(data){
          response(data);
       },'json');
    }  
  });
      
});
</script>
<script type="text/javascript" src="../js/fonctionenregistrementvent.js"></script>