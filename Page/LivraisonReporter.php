<?php
include_once('fonction/class/main.php');
$main=new main();?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Liste des Livraisons Reportées</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=">Accueil</a></li>
              <li><i class="fa fa-cube"></i><a href="#">Produit</a></li>
              <li><i class="fa fa-list"></i>Liste des produits</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
            <table class="table table-striped table-advance table-hover" id="tableau">
                <tbody class="LivraisonReporter">

           
                </tbody>
              </table> 
            </section>
          </div>
        </div>
      </section>
    </section>
    <script type="text/javascript">
      $(document).ready(function(){
        liste();
        function liste (){
          $.post('fonction/fonctionlisteLivraisonReporter.php',function(data){
            $('.LivraisonReporter').empty().append(data); 
           
          });
        }
      });
    </script>