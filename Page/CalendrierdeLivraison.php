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

                                <table class="table table-dark" id="">
                                    <thead>
                                        <tr>
                                            <th>Date de Commande</th>
                                            <th>Code de Produit</th>
                                            <th>Client</th>
                                            <th>Quantité</th>
                                            <th>Matricule Utilisateur</th>
                                            <th>observation</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($reponse as $value) {?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $value["datedecomand"];?></td>
                                            <td><?php echo $value["codeproduit"];?></td>
                                            <td><?php echo $value["idclient"];?></td>
                                            <td><?php echo $value["quantite"];?></td>
                                            <td><?php echo $value["matriculeuser"];?></td>
                                            <td><?php echo $value["observation"];?></td>
                                        </tr>
                                    </tbody>
                                    <?php  } ;?>
                                </table>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Livraison confirmé</h3>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>livraison reportée</h3>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <h3>livraison annullée</h3>
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
                header:{
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2016-09-12',
                navLinks: true,
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('.modal').modal('show');
                },
                events: "fonction/fonctiongetlivraisondujour.php",
                displayEventTime: false,
            eventRender: function(event, element) {
                element.qtip({
                content: event.idcomand
                });
                alert (event.idcomand);
                },
                eventClick: function(event, element) {
                    $('.modal').modal('show');
                    $('.modal').find('#title').val(event.title);
                    $('.modal').find('#starts-at').val(event.start);
                    $('.modal').find('#ends-at').val(event.end);
                },
                dayClick: function(date, allDay, jsEvent, view) {
                    lastSelectedDate = date;
                },
                editable: true,
                events: "fonction/fonctioncalandrierdelivre.php",
                eventLimit: true,
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
                    $('#calendar').fullCalendar('renderEvent', eventData, true);
                }
                $('#calendar').fullCalendar('unselect');
                $('.modal').find('input').val('');
                $('.modal').modal('hide');
            });
            $('.modal').click(function() {
                var moment = $('#calendar').fullCalendar('getDate');
                alert("The current date of the calendar is " + moment.format());
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