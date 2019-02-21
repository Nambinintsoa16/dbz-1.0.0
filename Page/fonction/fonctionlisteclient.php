<?php 
include_once('class/main.php');
session_start();
$main=new main();
            $sql="SELECT * FROM `client`";
            $reponse=$main->fetchAll($sql);
            ?>       
                
                <table class="table table-striped table-advance table-hover" id="table">
                <thead>
                  <tr>
                    <th>Code client </th>
                    <th>Nom et Prénom</th>
                    <th>Identifient sur facebook</th>
                    <th>Lien sur facebook</th>
                    <th>Photo</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody class="listProduit" >

           
               
             <?php foreach ($reponse as $reponse):?> 
                  <tr>
                    <td><?php echo $reponse['idclient'];?> </td>
                    <td><?php echo $reponse['Nom'];?></td>
                    <td><?php echo $reponse['identifientsurfacebook'];?></td>
                    <td><?php echo '<a target="_blank" href="'.$reponse['liensurfacebook'].'"><i class="fa fa-facebook ">'." ".'facebook</i></a>';?>
                    </td>
                    <td>
                     <?php 
                    echo  '<a href="#'.$reponse['idclient'].'" data-toggle="modal" class="img thumbnail">';
                    echo '<img style="height:100%; width:100%;" src="../img/photoclient/'.$reponse['photo'].'"></a>';
                    echo '<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="'.$reponse['idclient'].'" class="modal fade">';
                    ?> 
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="text-align: center;font-family:50px; ">
                       <span><?php echo $reponse['identifientsurfacebook'];?></span> 
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      </div>
                      <div class="modal-body" style="text-align: center;">   
                  <?php echo '<img style="height:500px;width:500px;" src="../img/photoclient/'.$reponse['photo'].'">';?>
                  </script>
                        
                      </div>
                      <div class="modal-footer" style="text-align: center">
                    <?php echo '<a href="?page=ficheclient&client='.$reponse['idclient'].'">Information</a>';?>
                    </div>

                    </div>
                  </div>
                </div>
                     


                    </td>
                  <td>
                      <div class="btn-group">
                       <!-- <a class="btn btn-primary" href="?page=AjoutClient"><i class="icon_plus_alt2"></i></a>-->
             <?php echo '<a class="btn btn-info" href="?page=ficheclient&client='.$reponse['idclient'].'"><i class="fa fa-info"></i></a>';?>          
           
       
                      </div>
                    </td>
                  </tr>
                <?php endforeach;?>  


 </tbody>
              </table>
    <script type="text/javascript">
        $(document).ready(function(){
           $('.btn-danger').on('click',function(event){
            event.preventDefault();
          $.get($(this).attr('href'),function(data){
            $.post('fonction/fonctionlisteclient.php',function(data){
            $('.listProduit').empty().append(data);
                });

             });
         });
           
        });
      </script>