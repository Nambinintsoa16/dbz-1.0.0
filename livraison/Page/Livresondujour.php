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
                            <li class="active"><a data-toggle="tab" href="#home">Livraison</a></li>
                            <li><a data-toggle="tab" href="#menu1">Livraison Livrée</a></li>
                            <li><a data-toggle="tab" href="#menu2">Livraison Reportée</a></li>
                            <li><a data-toggle="tab" href="#menu3">Livraison Annulée</a></li>
                        </ul>

                        <div class="tab-content data">
                           

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

            

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events:"json-events.php",
                navLinks: true, 
                selectable: true,
                selectHelper: true,
                dayClick: function(date) { 
                  $('.modal-title1').empty().append(date);

               },
               
           
                select: function(start, end) {
                    $('.modal').modal('show');
                    var date=$('.modal-title1').html().split(":");
                    var date2=date[0].split(" ");
                    var dadefin=date2[2]+" "+date2[1]+ " "+date2[3]+" ";
                    $.post('fonction/foctionretourcalandar.php',{date:dadefin},function(data){
                       $('.data').empty().append(data);   
                    });
                    

                },
                eventClick: function(event, element) {
                    // Display the modal and set the values to the event values.
                    $('.modal').modal('show');
                    $('.modal').find('#title').val(event.title);
                    $('.modal').find('#starts-at').val(event.start);
                    $('.modal').find('#ends-at').val(event.end);

                },
                editable: true,
               
                eventLimit: true // allow "more" link when too many events

            });

            // Bind the dates to datetimepicker.
            // You should pass the options you need
            //$("#starts-at, #ends-at").datetimepicker();

            // Whenever the user clicks on the "save" button om the dialog
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