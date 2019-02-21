$(document).ready(function(){
	listcat();
	function listcat(){
	$.post('../Page/fonction/fonctionCathegory.php',function(data){
        $('.tableCat').empty().append(data);
	});
    }
    $('#cathegory').on('click',function(event){
         event.preventDefault();
         var famille=$('.famille').val();
         var groupe=$('.groupe').val();
        var designation=$('#designation').val();
  $.post('../Page/fonction/fonctionAjoutCathegory.php',{groupe:groupe,famille:famille},function(data){
          listcat();
         alert(data.message);      
     },'json');
   });
   
$('#table').dataTable({
        "language":{
                "sProcessing": "Traitement en cours ...",
            "sLengthMenu": "Afficher _MENU_ lignes",
            "sZeroRecords": "Aucun résultat trouvé",
            "sEmptyTable": "Aucune donnée disponible",
            "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
            "sInfoEmpty": "Aucune ligne affichée",
            "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
            "sInfoPostFix": "",
            "sSearch": "Chercher:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Chargement...",
            "oPaginate": {
              "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
            },
            "oAria": {
              "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
            }
        }
   });
});