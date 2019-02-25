<?php 
include_once('class/main.php');
$main=new main();
            $sql="SELECT * FROM `livraison` where statut='Confirmer' ";
            $reponse=$main->fetchAll($sql);
            ?>  <table class="table table-striped table-advance table-hover" id="tableau">
              <thead>
                <tr>
                    <th>Nom Livreur</th>
                    <th>Lieu de livraison</th>
                    <th> Date de livraison</th>
                    <th>debut</th>
                    <th>Fin</th>
                    <th>ville</th>
                    <th>Quartier</th>
                    <th>Status</th>
                    <th>Id commande</th>
                    <th>Remarque </th>
                    <th> </th>
                  </tr>
              </thead>
                <tbody class="listLivraisonConfirmée">  
             <?php foreach ($reponse as $reponse):?> 
                  <tr>
                    <td><?php echo $reponse['Nomlivreur'];?> </td>
                    <td><?php echo $reponse['lieudelivraison'];?></td>
                    <td><?php echo $reponse['datedelivraison'];?></td>
                    <td><?php echo $reponse['debut'];?></td>
                    <td><?php echo $reponse['fin'];?></td>
                    <td><?php echo $reponse['ville'];?></td>
                    <td><?php echo $reponse['qartieur'];?></td>
                    <td><?php echo $reponse['statut'];?></td>
                    <td><?php echo $reponse['idcomand'];?></td>
                  </tr>
                <?php endforeach;?>  

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
         $('#tableau').DataTable();
        });
      </script>