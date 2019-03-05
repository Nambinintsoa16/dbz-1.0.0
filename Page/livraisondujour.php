<section id="main-content">
      <section class="wrapper">
        <div class="row">
           <h3 class="page-header"><i class="fa fa-files-o"></i>Liste des livraisons</h3>
           </div>
           <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=">Accueil</a></li>
              <li><i class="fa fa-cube"></i><a href="?page=Livraisonmenu">Livraison</a></li>
              <li><i class="fa fa-list"></i>Liste des livraisons</li>
            </ol>
           </div> 
        </div>
<div class="table">

  <div>
    <script type="text/javascript">
      $(document).ready(function(){
        liste();
        function liste (){
          $.post('fonction/fonctionlivraisondujour.php',function(data){
            $('.table').empty().append(data);
          });
        }
      });
    </script>
