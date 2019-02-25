
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          <div class="col-lg-12">  
          <h3 class="page-header"><i class="fa fa-files-o"></i>Liste des clients</h3>
          </div>
          <div class="col-lg-10"> 
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=">Accueil</a></li>
              <li><i class="fa fa-users"></i><a href="#">Client</a></li>
              <li><i class="fa fa-list"></i>Liste des clients</li> 
             
            </ol>
          </div>
          <div class="col-lg-2">
          <a class="btn btn-primary col-lg-12" href="?page=AjoutClient"><i class="fa fa-plus"></i></a>
          </div>
          </div>
        </div>
      <div class="row">
          <div class="col-lg-12">
            <section class="panel listProduit">
              
            </section>
          </div>
        </div>
      </section>
    </section>
    <script type="text/javascript">
      $(document).ready(function(){
        liste();
        function liste (){
          $.post('fonction/fonctionlisteclient.php',function(data){
            $('.listProduit').empty().append(data);
          });
        }


        
      });
    </script>