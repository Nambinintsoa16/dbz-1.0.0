 <?php
 include_once('class/main.php');
 $main=new main();
 if(isset($_POST['idfacture'])):
 ?>
 <table class="table table-striped table-advance table-hover" style="margin-top: 60px;">
                <tbody>
                  <tr>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"> Nom du livreur</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">  Date de livraison</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Heure de livraison </th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"> Lieu de livraison</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"> Statue</th>
                    
                    
                  </tr>
                  <tr>
                    <td style="text-align: center;">
                      <?php
              $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`='".$_POST['idfacture']."'";
              $fact=$main->fetch($sql);
              $sql="SELECT * FROM `livraison` WHERE `idcomand`='". $fact['idcomande']."'";
              $livre=$main->fetch($sql);
               echo $livre['Nomlivreur'];
                      ?>
                    </td>
                    <td style="text-align: center;"><?php echo $livre['datediflivre'];?></td>
                    <td style="text-align: center;"><?php echo "Entre ".$livre['heurlivredifdebut']." et ".$livre['heurlivrediffin'];?></td>
                    
                   
                    <td style="text-align: center;">
                      <?php echo $livre['ville']." , ".$livre['qartieur']." , ".$livre['lieudelivraison'];?>
                    </td>
                    <td style="text-align: center;">
                      <?php echo $livre['statut'];?>
                        
                      </td>
                  </tr>
                 
                  
                </tbody>
              </table>
<?php 
endif;
?>