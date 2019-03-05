
<?php
include_once("fonction/class/main.php");
$main=new main();
$sql="SELECT `matricule` FROM `user` WHERE  `matricule` <> '".$_SESSION['login']['matricule']."'";
$matricule=$main->fetchAll($sql); 
 ?>
<section id="main-content">
      <section class="wrapper">
       
           <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=">Accueil</a></li>
              <li><i class="fa fa-cube"></i><a href="?page=menulivre">Message</a></li>     
            </ol>
           </div> 
        </div>
<div class="container">
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>utilisateurs</h4>
            </div>  
          </div>
   <div class="inbox_chat">       
   <?php 
     if ($matricule) {
          foreach ($matricule as $matricule) {
          
   ?>       
          
            <a href="fonction/fonctionmessage.php?envoy=<?php echo $matricule['matricule'];?>" class="lien">
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img">   
     <?php 
    $sql="SELECT `photo`,`Prenom`,`onligne` FROM `user` WHERE `matricule` LIKE '".$matricule['matricule']."'";
    $photo=$main->fetch($sql);
    ?>
    <img src="../img/Profil/<?php echo $photo['photo'];?>">
    
  </div>
                <div class="chat_ib">
                  <h5><?php echo $photo['Prenom'];?> <span class="chat_date">
                    <?php if ($photo['onligne']=='on'){?>
                        <i class="green fa fa-circle" aria-hidden="true"></i>
                    <?php }else { ?>
                        <i class="red fa fa-circle" aria-hidden="true"></i>
                    <?php  }?>
                </span></h5>
                  <p>
              <?php
           $sql="SELECT `message` FROM `message` WHERE `iduserenvoye` LIKE '".$matricule['matricule']."' OR `iduserrecu` LIKE '".$matricule['matricule']."'  ORDER BY `id` DESC";
           $message=$main->fetch($sql);
           if ($message) {
               echo $message['message'];
           }else{
               echo "aucun message";
           }
           
           
              ?></p>
                </div>
              </div>
          </a>
            </div>
   <?php
   }
}
   ?>         
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
               
              

          </div>
 
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
  
    </div></div>
<script type="text/javascript">
$(document).ready(function(){
    $('.lien').on('click',function(event){
        event.preventDefault();
       $.post($(this).attr('href'),function(data){
          $('.msg_history').empty().append(data);
        }); 
    });
   
});
</script>