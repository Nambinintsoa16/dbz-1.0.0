<?php
include_once('fonction/class/main.php');
$main=new main();
session_start();
if (!isset($_SESSION['login'])){
 header('location:../Index.php');
 }else{
  $sql="SELECT * FROM `user` WHERE `matricule` LIKE ?";
  $login=$main->fetch($sql,array($_SESSION['login']['matricule']));
 } 
 $page=scandir('../page');
 if(isset($_GET['page']) AND in_array( $_GET['page'].'.php',$page)){
       $pages=$_GET['page'];
 }else{
      $pages='recap';
 }
 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icons/logo.ico">
    <title>Gestion de vente sur Facebook</title>

    <link href="../css/dataTables.jqueryui.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../css/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='../css/fullcalendar.print.css' media='print' />
    <link rel='stylesheet' type='text/css' href='../css/theme.css'>
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/Chart.min.js"></script>
</head>
<body>
    <section id="container" class="">
        <header class="header " style="background:#fff;border-bottom:white 1px solid;z-index:1">
            <div
                style="position:absolute;width:35px;height:35px;border-radius:50%;background:white;z-index:3456;margin-top:13px;padding-top:2px;padding-left:2px;">
                <img src="../img/logo.png" width="30" alt="">
            </div>
            <div style="position:absolute;z-index:124;margin-left:50px;color:white;padding-top:20px">
          
            </div>
            <div class="top-nav notification-row">

                <ul class="nav pull-right top-menu">
                          
                  <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important"></span>
                        </a>
                        <ul class="dropdown-menu extended notification relancedrop">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p>Vous aviez <span></span>Message</p>
                            </li>
                            <li>
                                <a href="?page=message">Voir tous</a>
                            </li>
                        </ul>
                    </li>

                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="orange fa fa-paper-plane circle" aria-hidden="true"></i>
                            <span class="badge bg-important"></span>
                        </a>
                        <ul class="dropdown-menu extended notification relancedrop">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p>Vous aviez <span></span>relance</p>
                            </li>
                            <li>
                                <a href="#">Voir tous</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <?php echo '<img style="height:40;width:40px" alt="" src="../img/Profil/'.$login['photo'].'">'; ?>
                            </span>
                            <span class="username"><?php  echo $login['Prenom'];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="?page=profile"><i class="icon_profile"></i>Profile</a>
                            </li>
                            <li>
                                <a href="fonction/deconnection.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                    Se deconnecter</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <aside>
            <div id="sidebar" class="nav-collapse " style="background-color: #054d63;z-index:1;backround-image:url('../livraison/')">
                <ul class="sidebar-menu" style="color:#fff;z-index:234">
                <div style="z-index:3456;background:#fff;width:100%;height:180px;margin-top:-60px">
                        <img src="../img/comm.png" alt=""
                            style="width:100%;height:100%;object-fit: cover;overflow: hidden;padding-right:0px;">
                        <div
                            style="position:absolute;width:100%;height:30px;background:#000;margin-top:-30px;margin-right:2px;opacity:0.7">
                            <h3 style="text-align:center;font-size:16px;margin-top:4px">Service Commerciale</h3>
                        </div>
                    </div>
                    <li>
                        <a class="" href="?page=recap">
                            <i class="icon_house_alt"></i>
                            <span>Accuiel</span>
                        </a>
                    </li>


                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-users"></i>
                            <span>Client</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="?page=AjoutClient">Ajout client </a></li>
                            <li><a class="" href="?page=listedesclient">Liste des clients </a></li>

                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-cubes"></i>
                            <span>Produit</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="?page=Ajoutproduit">Ajout produit </a></li>
                            <li><a class="" href="?page=listedesproduit">Liste des produit </a>
                            <li><a class="" href="?page=cathegoryproduit">Cathegory des produits</a>
                        </ul>
                    </li>

                    <li class="sub-menu">
                    <a class="" href="?page=infoetreclamation">  <i class="fa fa-play"></i>Autre</a>
                    </li>
                    <li class="sub">
                        <a href="?page=vente" class="">
                            <i class="fa fa-edit"></i>
                            <span>Commande</span>
                           
                        </a>

                    </li>
                    <li class="sub">
                        <a href="?page=menulivre" class="">
                            <i class="fa fa-truck"></i>
                            <span>Livraison</span>
                            
                        </a>

                    </li>




                </ul>

            </div>
        </aside>
        <?php 
          include_once $pages.'.php';
        ?>




        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-ui-1.10.4.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/function.js"></script>
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="../js/gritter.js" type="text/javascript"></script>
        <script src="../js/dataTables.min.js"></script>
        <script src="../js/dataTablesmin.js"></script>
        <script type='text/javascript' src='../js/fullcalendar.min.js'></script>
        <script src="../js/scripts.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $.post('fonction/fonctiondropdown.php', function(data) {
                $('.relancedrop li:last-child').prev().append(data);

            });
            $.post('fonction/fonctionbadgerelance.php', function(data) {
                $('.bg-important').empty().append(data.badge);
            }, 'json');



        });
        </script>
</body>

</html>