<?php include 'inc/app_snp_doctype.php';?>

<body class="">

<?php include 'inc/app_snp_header.php';?>
    
<!-- BEGIN CONTENT -->
<div class="page-container row-fluid events-page">

<?php include 'inc/app_snp_leftnav.php';?>

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content"> 
        <div class="content">  

            <div class="row">
                <div class="col-md-8">

                  <ul class="nav nav-pills" id="tab-4">
                    <li class="active"><a href="#event-list" data-toggle="tab"><i class="fa fa-list"></i> List View</a></li>
                    <li><a href="#event-calendar" data-toggle="tab"><i class="fa fa-calendar"></i> Calendar</a></li>
                    <button data-toggle="modal" data-target="#add_event" class="pull-right btn btn-success"><i class="fa fa-plus-circle"></i> Add new Event</button>
                  </ul>
                  <div class="tab-content transparent">
                    <div class="tab-pane active" id="event-list">
                      <div class="row column-seperation">

                        <div class="grid transparent">
                            <div class="grid-title">
                               <h4>ARE YOU <span class="semi-bold">IN?</span></h4>
                            </div>
                        </div>

                        <div class="event-wrap">

                            <div class="row">

                              <h3>MONDAY, AUG 20th</h3>
      
                              <div class="tiles white border-right">

                                <div class="col-md-4 col-lg-5 col-sm-4 col-xs-4">
                                  <h2>6:30<span class="time-day">PM</span></h2>
                                      <div class="source-code in left">

                                              <!--BootstrapDialog.alert({
                                                  title: 'I am IN',
                                                  message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                  closable: false, // <-- Default value is true
                                                  buttonLabel: 'Confirm that I am IN'
                                              });-->

                                      </div>
                                      <div class="source-code out">

                                              <!--BootstrapDialog.alert({
                                                  title: 'I am Out',
                                                  message: 'I wont make the game on Monday August 15th at 18:30',
                                                  closable: false, // <-- Default value is true
                                                  buttonLabel: 'Confirm that I am out'
                                              });-->

                                      </div>

                                </div>
                                <div class="col-md-8 col-lg-7 col-sm-8 col-xs-8">
                                  <h4 class="semi-bold">Braves Team Practice</h4>
                                  <p class="event-ins"><i class="fa fa-check"></i> 9 ARE IN</p>
                                  <p class="light event-location"><i class="fa fa-map-marker"></i> Field B <a href="#">(map)</a></p>
                                  <p class="light event-note"><i class="fa fa-info-circle"></i> please show up at least 10 minutes before.. </p>
                                </div>

                              </div>

                          </div>

                        </div>

                      </div>
                    </div>

                    <div class="tab-pane" id="event-calendar">
                      <div class="row">
                        <div class="col-md-12 no-padding">

                            <div class="tiles white no-padding">
                                <div class="tiles-body">
                                  <div class="full-calender-header">
                                    <div class="pull-left">
                                      <div class="btn-group ">
                                        <button class="btn btn-success" id="calender-prev"><i class="fa fa-angle-left"></i></button>
                                        <button class="btn btn-success" id="calender-next"><i class="fa fa-angle-right"></i></button>
                                      </div>
                                    </div>
                                    <div class="pull-right">
                                      <div data-toggle="buttons-radio" class="btn-group">
                                        <button class="btn btn-primary active" type="button" id="change-view-month">month</button>
                                        <button class="btn btn-primary " type="button" id="change-view-week">week</button>
                                        <button class="btn btn-primary" type="button" id="change-view-day">day</button>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div id='calendar'></div>
                                </div>
                            </div>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-4">
                    side column
                </div>


            </div>

          </div>
    </div>
    <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 

<?php include 'inc/app_add_event.php';?>

{app_add_team}

<?php include 'inc/app_snp_scripts.php';?>

<script src="/assets-app/plugins/fullcalendar/fullcalendar.min.js"></script> 
<script src="/assets-app/js/calender.js" type="text/javascript"></script>

</body>
</html>
