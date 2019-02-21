<?php
include_once('fonction/class/main.php');
$main=new main();
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
            </ol>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count" >Livraison</div>
               <div style="font-size: 28px; color: #fff;font-weight: bold;">50</div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
           <a href="?page=listedesproduit"> 
            <div class="info-box brown-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">Produit</div>
              <div style="font-size: 28px; color: #fff;font-weight: bold;">
              <?php
              $sql="SELECT * FROM `produit` ";
              $count=$main->test($sql);
              echo $count;
              ?>
              </div>
            </div>
            <a>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <a href="?page=listedesclient"> 
            <div class="info-box dark-bg">
              <i class="fa fa fa-users"></i>
              <div class="count">Client</div>
               <div style="font-size: 28px; color: #fff;font-weight: bold;">
               <?PHP
                  $sql="SELECT `id` FROM `client`";
                  $countClient=$main->test($sql);
                  echo  $countClient;

               ?>
               </div>
            </div>
            <a>
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cloud-download"></i>
              <div class="count">Stock</div>
              <div style="font-size: 28px; color: #fff;font-weight: bold;">50</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>

<div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-map-marker red"></i><strong>Countries</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body-map">
                <div id="map" style="height:380px;"></div>
              </div>

            </div>
          </div>




        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading" style="height: 40px;">
               <div class="form-group">
                <div class="col-lg-10">
                    <div class="row"> 
                    <label class="control-label col-lg-2" for="date" style="margin-right: -95px;"><strong>Vente du : </strong></label>
                    
                    </div>
                  </div>

                </form>
              </div>
            </section>
          </div>
        </div>
              </header>
               <div class="conttable">
                 
               </div>
             
            </section>
          </div>
        </div>
        <!-- page end-->
<script type="text/javascript">
  $(document).ready(function(){
    $.post('fonction/fonctionAccuiel.php',function(data){
      $('.conttable').empty().append(data);
      $('#tableau').DataTable();
    }); 

  });
</script> 