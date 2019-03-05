<?php
include_once('class/main.php');
$main=new main();
session_start();
if (isset($_GET['envoy'])) {
    $sql="SELECT `id` FROM `message` WHERE (`iduserenvoye` LIKE '".$_GET['envoy']."' OR `iduserrecu` LIKE '".$_GET['envoy']."') AND  (`iduserenvoye` LIKE '".$_SESSION['login']['matricule']."' OR `iduserrecu` LIKE '".$_SESSION['login']['matricule']."')";
    $idmessage=$main->fetchAll($sql);
    if($idmessage){
    foreach ($idmessage as $idmessage) {
      $sql="SELECT * FROM `message` WHERE `id`='".$idmessage['id']."'";
        $message=$main->fetch($sql);
              if ($message['iduserenvoye']==$_SESSION['login']['matricule']) {

     ?> 

            <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?php echo $message['message'];?></p>
                <span class="time_date"> <?php echo $message['heure'];?>    |    <?php echo $message['date']?></span> </div>
            </div>
           <?php }else{?>

            <div class="incoming_msg">
              <div class="incoming_msg_img"> 
               <?php 
                 $sql="SELECT `photo` FROM `user` WHERE `matricule` LIKE '".$_GET['envoy']."'";
                 $photo=$main->fetch($sql);
              
               ?>
                <img src="../img/Profil/<?php echo $photo['photo'];?>"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?php echo $message['message'];?>.</p>
                  <span class="time_date"> <?php echo $message['heure'];?>    |    <?php echo $message['date']?></span></div>
              </div>
            </div>
   <?php } 
             
                }  
                    } else{
                        echo "Aucun message";
                       }
                       }
                       ?>     