<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
           <div class="col-lg-12">
           <h3 class="page-header"><i class="fa fa-files-o"></i>Liste des produit</h3>
           </div>
           <div class="col-lg-10"> 
           <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=">Accueil</a></li>
              <li><i class="fa fa-cube"></i><a href="#">Produit</a></li>
              <li><i class="fa fa-list"></i>Liste des produits</li>
            </ol>
           </div> 
           <div class="col-lg-2">
          <a class="btn btn-primary col-lg-12" href="?page=Ajoutproduit"><i class="fa fa-plus"></i></a>
          </div>
          </div>
        </div>



        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <tbody class="listProduit">

           
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
          $.post('fonction/fonctionlisteProduit.php',function(data){
            $('.listProduit').empty().append(data);
          });
        }
      });
    </script>