<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"> <i class=" fa fa-eur"></i>Vente</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>vente</li>
            </ol>
          </div>
        </div>
  <div id="vente" class="tab-pane">   
    <div class="form">
      <form class="form-validate form-horizontal" id="feedback_form" >
        <fieldset class="border p-2">
           <legend  class="w-auto">Client</legend> 
          <div class="form-group">
  <label class="control-label col-lg-2" for="inputSuccess">Nom du client<span class="required">*</span></label>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-7">
                  <input type="text" class="form-control cherche client select-client" id="client" style="width: 350px;">
                </div>
                <div class="col-lg-4" style="text-align: right;">
                  <div class="image img-thumbnail" style="width: 150px;height: 150px;text-align:center;padding: auto auto;">
                    <h5 style="margin-top:45%; ">Photo client</h5> 
                  </div>
                  <span class="idclient"></span>
                </div>
                 
            </div>
        </div>
   </div>
   <fieldset class="border p-2">
     <legend  class="w-auto">Livraison</legend> 
        
   <div class="form-group">
      <label class="control-label col-lg-2" for="inputSuccess">Dade de livrason<span class="required"> *</span></label>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-3">
                    <input type="date" class="form-control datelivre"/>
                </div>
                 <label class="control-label col-lg-2" for="inputSuccess">Debut<span class="required"> *</span></label>
                <div class="col-lg-2">
                    <input type="time" class="form-control Debut"  min="09:00" max="17:00"/>
                </div>
                 <label class="control-label col-lg-2" for="inputSuccess">Fin<span class="required"> *</span></label>
                <div class="col-lg-2">
                    <input type="time"  min="09:00" max="17:00" class="form-control Fin"/>
                </div>
            </div>
        </div>
   </div>
  <div >
      <div class="form-group ">
        <label for="cemail" class="control-label col-lg-2">Ville<span class="required"> *</span>
        </label>
          <div class="col-lg-10">
            <input class="form-control ville" id="ville" type="text" name="livraison"  />
          </div>
      </div>
      <div class="form-group ">
        <label for="cemail" class="control-label col-lg-2">Quartier<span class="required"> *</span>
        </label>
          <div class="col-lg-10">
            <input class="form-control quartier" id="quartier" type="text" name="quartier"  />
          </div>
      </div>
      <div class="form-group ">
        <label for="cemail" class="control-label col-lg-2">Lieu de livraison<span class="required"> *</span>
        </label>
          <div class="col-lg-10">
            <input class="form-control lieulivre" id="lieulivre" type="text" name="lieulivre"/>
          </div>
      </div>
      <div class="form-group ">
        <label for="cname" class="control-label col-lg-2">Remarque<span class="required">*</span></label>
        <div class="col-lg-10">
            <textarea class="form-control comment" id="comment" name="comment" ></textarea>
        </div>
      </div>
</div>   
</fieldset>
<fieldset class="border p-2">
   <legend  class="w-auto">Produit</legend>   
      <div class="form-group">
        <label for="ccomment" class="control-label col-lg-2">Choix du produit</label>
      <div class="col-lg-3">
        
        <select class="form-control famille" name="famille" placeholder="Cathegory" >
                     <option>AUTRES</option>
                     <option>BEAUTE</option>
                     <option>BOISSON</option>
                     <option>DEO & PARFUM</option>
                     <option>HYGIENE BUCO-DENTAIRE</option>
                     <option>HYGIENE CORPORELLE</option>
                     <option>LESSIVE</option>
                     <option>SOINS CAPILLAIRE</option>
                     <option>SOINS VISAGE</option>  
          </select> 

        </div>


        <div class="col-lg-3 ">
        
       <select name="codeproduit" class="form-control groupe">
        
        </select>

        </div>

        <div class="col-lg-3">
        <input type="cherche" name="" id="recherche" class="form-control">
        </div>

        <div class="col-lg-1">
        <button class="btn btn-primary validproduit" style="display: inline;"><i class="fa fa-plus"></i></button>
        </div>

      </div>   
              
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
        <header class="panel-heading">Detait produit </header>
            <section class="panel">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                      <th style="border-left: solid #fff 1; text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:100px;">Code produit</th>
                      <th style="border-left: solid #fff 1; text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:400px;">Désignation</th>
                      <th style="border-left: solid #fff 1; text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:100px; ">Prix Unitaire</th>
                      <th style="border-left: solid #fff 1; text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:80px;">Quantite</th>
                      <th style="border-left: solid #fff 1; text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:100px">Total en Ar </th>
                      <th style="border-left: solid #fff 1; text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:100px;">Aperçu</th>
                      <th style="border-left: solid #fff 1; text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width:60px"></th>


                </tr>   
              </thead>
               <tbody class="tbody">  
              </tbody>
               <tfoot>                                  
                <th>
                      <td></td>
                      <td></td>
                </th>
                <th>
                  <label>Sous total :<span class="sous"></span></label>
                </th>
                <th>
                  <label class="total">00 MGA</label>
                </th>
                      <th colspan="2"style="text-align: right;">
                      <button type="submit" class="btn btn-primary btn-test">Valider</button>
                     
                      </th>
                </tr>
          </tfoot>
         </table>
        </div> 
      </fieldset>        
      </div>
     </div>
    </div>  
  </form>   
  </section>
 </section> 
    

<script type="text/javascript">
$(document).ready(function(){


  var cat;
  list();
    $('.famille').on('change',function(){
         list();
    });
    function list(){
      var famille=$('.famille').val();
      $.post('fonction/cat.php',{famille:famille},function(data){
           $('.groupe').empty().append(data);
      });
    }

  $('.groupe').on('change',function(){
       cat=$('.groupe').val();
  });
     
 

  $('#recherche').autocomplete({
    source : function(request, response) {
      var groupe=$('.groupe').val();
      var famille=$('.famille').val();
      
      $.get('fonction/fonctionliste.php',{term:request.term,groupe:groupe,famille:famille},function(data){
          response(data);
       },'json');
    }  
  });
  $('#client').on('focus',function(){
      if($(this).val()!=""){
        $(this).val("");
        $('.image').empty().append();
      }
  });
  $('#client').autocomplete({
       source : 'fonction/fonctionlisteclien.php',
    select : function(event, ui){ 
      $.post('fonction/image.php',{image:ui.item},function(data){
         $('.image').empty().append('<img style="width:100%;height:100%;" src="../img/photoclient/'+data.image+'">');
      },'json'); 
    }
  });
});
 
 </script>  
 <script type="text/javascript" src="../js/fonctionenregistrementvent.js"></scrip>