<?php
include_once('fonction/class/main.php');
$main=new main();
$dt=new dateTime();
$date=$dt->format("Y-m-d");
$sql="SELECT `idcomand`, `datedecomand`, `codeproduit`, `idclient`, `quantite`, `matriculeuser`, `observation` FROM `comande` ";
$reponse=$main->fetchAll($sql);
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-files-o"></i>Calandrier de Livraison</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="?page=">Accueil</a></li>
                    <li><i class="fa fa-cube"></i><a href="#">Livraison</a></li>
                    <li><i class="fa fa-list"></i>Calandrier de livraison </li>
                </ol>
            </div>
        </div>

        <div class="modal fade " tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title1 collapse">Detail Livraison Journalière </h4>
                        <h4 class="modal-title">Detail Livraison Journalière </h4>

                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Livraison Effectuée</a></li>
                            <li><a data-toggle="tab" href="#menu1">Livraison Confirmée</a></li>
                            <li><a data-toggle="tab" href="#menu2">Livraison Reportée</a></li>
                            <li><a data-toggle="tab" href="#menu3">Livraison Annulée</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                             <h3>Livraison</h3>
							<div class="home">
                                
                            </div>
								  
							 
                            </div>
                            <div id="menu1" class="tab-pane fade">
									<h3>Livraison  confirmé</h3>
                             <div class="menu1">
                                 
                            </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                            <h3>livraison reportée</h3>
                            <div class="menu2"></div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                            <h3>livraison annullée</h3>
                            <div class="menu3"></div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermé</button>
                        <button type="button" class="btn btn-primary" id="save-event">Enregistré</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script type='text/javascript'>
      

        $(document).ready(function() {
         var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

            $('#tableau').DataTable({
                "language": {
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
                        "sFirst": "Premier",
                        "sLast": "Dernier",
                        "sNext": "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending": ": Trier par ordre croissant",
                        "sSortDescending": ": Trier par ordre décroissant"
                    }
                }
            });

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2016-09-12',
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectHelper: true,
                dayClick: function(date) { 
                  $('.modal-title1').empty().append(date);

               },
           
                select: function(start, end) {
                    
                    var date=$('.modal-title1').html().split(":");
                    var date2=date[0].split(" ");
                    var dadefin=date2[2]+" "+date2[1]+ " "+date2[3]+" ";
                    $.post('fonction/foctionretourcalandar.php',{date:dadefin},function(data){
                       $('.menu1').empty().append(data);   
                    });
                    $.post('fonction/fonctionannulecalandar.php',{date:dadefin},function(data){
                       $('.menu3').empty().append(data);   
                    });
                    $.post('fonction/fonctionannulecalandar.php',{date:dadefin},function(data){
                       $('.home').empty().append(data);   
                    });
                    $('.modal').modal('show');

                },
                eventClick: function(event, element) {
                    // Display the modal and set the values to the event values.
                    $('.modal').modal('show');
                    $('.modal').find('#title').val(event.title);
                    $('.modal').find('#starts-at').val(event.start);
                    $('.modal').find('#ends-at').val(event.end);

                },
                editable: true,
                events: "fonction/fonctioncalandrierdelivre.php",
                events: [
                <?php
                $dt=new dateTime();
                $date=$dt->format("Y-m-d"); 
     $sql="SELECT `datelivre` FROM `facture` ";
                $facturedouble=$main->fetchAll($sql);
                if($facturedouble):
                foreach ($facturedouble as $facturedouble) {
                 $facturetab[]=$facturedouble['datelivre'];
                }
                $facture=array_unique($facturetab);
                foreach ($facture as $facture):
                $sql="SELECT `NumFact` FROM `facture` WHERE `Statut` LIKE 'confirmer' AND `datelivre` LIKE '".$facture ."'";
                $NumFactconf=$main->fetchAll($sql);
                foreach ($NumFactconf as $NumFactconf) {
                  $NumFactconfdouble[]=$NumFactconf['NumFact'];
                } 
                  $factureconfirm=array_unique($NumFactconfdouble);
                  $coutlivre=count($factureconfirm);
                ?>
                {
                    title: '<?php echo "confirmer : ".$coutlivre;?>',
                    start: '<?php echo  $facture;?>'
                }
                <?php
                echo ","; endforeach;endif;?>
               
            ]
                ,eventLimit: true 

            });
            $("#starts-at, #ends-at").datetimepicker();

            $('#save-event').on('click', function() {
                var title = $('#title').val();
                if (title) {
                    var eventData = {
                        title: title,
                        start: $('#starts-at').val(),
                        end: $('#ends-at').val()
                    };
                    $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                }
                $('#calendar').fullCalendar('unselect');

                // Clear modal inputs
                $('.modal').find('input').val('');

                // hide modal
                $('.modal').modal('hide');
            });
        });
        </script>
        <style type='text/css'>
        body {
            margin-top: 40px;
            text-align: center;
            font-size: 13px;
            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
        }

        #calendar {
            width: 900px;
            margin: 0 auto;
        }

        #loading {
            position: absolute;
            top: 5px;
            right: 5px;
        }
        </style>
        <div id='loading' style='display:none'>Chargement...</div>
        <div id='calendar'></div>