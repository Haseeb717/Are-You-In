<?php include 'inc/app_snp_doctype.php';?>

<body class="">

    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse"> 
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <!-- BEGIN NAVIGATION HEADER -->
            <div class="header-seperation"> 
                <!-- BEGIN MOBILE HEADER -->
                <ul class="nav pull-left notifcation-center visible-xs" id="main-menu-toggle-wrapper">    
                    <li class="dropdown">
                        <a id="main-menu-toggle" href="#main-menu" class="">
                            <div class="iconset top-menu-toggle-white"></div>
                        </a>
                    </li>        
                </ul>
                <!-- END MOBILE HEADER -->
                <!-- BEGIN LOGO --> 
                <a href="/">
                    <img src="/assets-app/img/logo-inverted.png" class="logo" alt="" data-src="/assets-app/img/logo-inverted.png" data-src-retina="/assets-app/img/logo2x.png"/>
                </a>
                <!-- END LOGO --> 
                <!-- BEGIN LOGO NAV BUTTONS -->

                <ul class="nav pull-right notifcation-center">  

                    <li class="quicklinks visible-xs"> 
                        <a data-toggle="dropdown" class="dropdown-toggle pull-right" href="#" id="user-options">                        
                            <div class="iconset top-settings"></div>   
                        </a>
                        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="user-options">
                            <li><a href="/user">Account Profile</a></li>
                            <li><a href="/user/edit">Edit Account</a></li>
                            <li class="divider"></li>  
                            <li><a data-toggle="modal" data-target="#add_team" class="add-team-modal" href="#"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Team</a></li>
                            <li class="divider"></li>
                            <li><a href="{path=LOGOUT}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
                        </ul>
                    </li>                      
                </ul>
                <!-- END LOGO NAV BUTTONS -->
            </div>
            <!-- END NAVIGATION HEADER -->
            <!-- BEGIN CONTENT HEADER -->
            <div class="header-quick-nav"> 
                <!-- BEGIN HEADER LEFT SIDE SECTION -->

                <div class="pull-left">
                    <ul class="nav quick-section mainnav">
                        <li class="quicklinks"> 
                            <a href="/" class="">All Events</a>
                        </li>
                        <li class="quicklinks dropdown"> 
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Teams <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/teams">Saturday Morning Basketball</a></li>
                                <li><a href="/teams">Hanahan Galaxy</a></li>
                                <li><a href="/teams">Hanahan Hawks</a></li>
                                <li class="divider"></li>
                                <li><a data-toggle="modal" data-target="#add_team" href="#" class=""><i class="fa fa-plus-circle"></i> Add Team</a></li> 
                            </ul>
                        </li>
                     
                        <li class="quicklinks"> 
                            <a data-toggle="modal" data-target="#add_event" href="#" class=""><i class="fa fa-calendar"></i> Add Event</a> 
                        </li>                    
                        <li class="quicklinks"> 
                            <a data-toggle="modal" data-target="#add_player" href="#" class=""><i class="fa fa-user"></i> Add Player</a> 
                        </li>              
                        <li class="quicklinks"> 
                            <a data-toggle="modal" data-target="#add_team" href="#" class="add-team-modal"><i class="fa fa-plus-circle"></i> Add Team</a> 
                        </li>     
                    </ul>
                </div>

                <!-- END HEADER LEFT SIDE SECTION -->
                <!-- BEGIN HEADER RIGHT SIDE SECTION -->
                <div class="pull-right settings-section"> 
                    <div class="chat-toggler">  

                        <!-- BEGIN PROFILE PICTURE -->
                        <div class="profile-pic"> 
                            <img src="/assets-app/img/profiles/avatar-male.png" alt="" data-src="/assets-app/img/profiles/avatar-male.png" data-src-retina="/assets-app/img/profiles/avatar-male.png" width="35" height="35" /> 
                        </div>  
                        <!-- END PROFILE PICTURE -->                
                    </div>

                    <!-- BEGIN HEADER NAV BUTTONS -->
                    <ul class="nav quick-section">
                        <!-- BEGIN SETTINGS -->
                        <li class="quicklinks"> 
                            <a data-toggle="dropdown" class="dropdown-toggle pull-right" href="#" id="user-options">    
                                <div class="user-name-drop"><span>Admin Name</span> <i class="fa fa-angle-down"></i></div>                      
                            </a>
                            <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="user-options">
                                <li><a href="/user">Account Profile</a></li>
                                <li><a href="/user/edit">Edit Account</a></li>
                                <li class="divider"></li>  
                                <li><a href="#" data-toggle="modal" data-target="#add_team"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Team</a></li>
                                <li class="divider"></li>
                                <li><a href="{path=LOGOUT}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END HEADER NAV BUTTONS -->
                </div>

                <div class="pull-right message-center-wrap">

                        <!-- BEGIN NOTIFICATION CENTER -->
                        <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom" data-content="" data-toggle="dropdown" data-original-title="Notifications">
                            <div class="user-details"> 
                                <div class="message-center">
                                    <i class="fa fa-envelope-o"></i>                             
                                </div>                      
                            </div> 
                        </a>    
                        <!-- END NOTIFICATION CENTER -->

                </div>

                <!-- END HEADER RIGHT SIDE SECTION -->
            </div> 
            <!-- END CONTENT HEADER --> 
        </div>
        <!-- END TOP NAVIGATION BAR --> 
    </div>
    <!-- END HEADER -->

    <!-- BEGIN CONTENT -->
    <div class="page-container row-fluid team-page">

        <?php include 'inc/app_snp_leftnav.php';?>

        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content">
            <div class="content">

              <div class="row">
                  <div class="col-md-3">

                      <div class="row team-info">


                          <div class="col-xs-12 m-b-20">

                              <div class="widget-item narrow-margin">
                                  <div class="tiles green  overflow-hidden full-height" style="max-height:214px">
                                      <div class="overlayer bottom-right fullwidth">
                                          <div class="overlayer-wrapper">
                                              <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                                  <div class="pull-right"> <a href="#" class="hashtags transparent"> #soccer </a> 
                                                  </div>
                                                  <div class="clearfix"></div>
                                              </div>
                                          </div>
                                      </div>
                                      <img src="/assets-app/img/others/soccer-m-1.jpg" alt="" class="lazy hover-effect-img image-responsive-width">
                                  </div>
                                  <div class="tiles white team-profile">
                                        <div class="controller pull-right"> 
                                          <a href="javascript:;" class="edit"><i class="fa fa-pencil-square-o"></i> edit</a> 
                                        </div>

                                      <div class="tiles-body">
                                          <h3>Hanahan Hawks</h3>
                                          <p>Coed Soccer - Age: 9 - 12</p>
                                          <p>Charleston, SC</p>
                                      </div>
                                  </div>
                              </div>

                          </div>

                          <div class="col-xs-12 m-b-5">

                              <div class="widget-item narrow-margin">

                                  <div class="tiles white ">
                                      <div class="controller pull-right"> 
                                        <a href="javascript:;" class="edit"><i class="fa fa-pencil-square-o"></i> edit</a> 
                                      </div>

                                      <div class="tiles-body">
                                          <div class="row">
                                              <div class="user-comment-wrapper pull-left">
                                                  <div class="profile-wrapper">
                                                      <img src="/assets-app/img/profiles/avatar-male.png" alt="" data-src="/assets-app/img/profiles/avatar-male.png" data-src-retina="/assets-app/img/profiles/avatar-male.png" width="35" height="35">
                                                  </div>
                                                  <div class="comment">
                                                      <div class="user-name text-black bold">Jane Smith
                                                          <p class="text-black all-caps smaller-text">Organizer</p>
                                                      </div>
                                                      <div class="preview-wrapper"><i class="fa fa-phone"></i> 843 789 8788</div>
                                                      <div class="preview-wrapper"><i class="fa fa-envelope"></i> jane.smith@email.com</div>
                                                  </div>
                                                  <div class="clearfix"></div>
                                              </div>

                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>

                          <div class="col-xs-12">

                              <div class="widget-item narrow-margin">

                                  <div class="friend-list tiles white">

                                    <div class="title-header">
                                      <div class="controller pull-right"> <a data-toggle="modal" data-target="#add_player" href="#" class=""><i class="fa fa-plus-circle"></i> Add Player</a> </div>
                                      <div class="tiles-title"> TEAM </div>
                                    </div>

                                      <a class="team-member" href="#">

                                          <div class="friend-profile-pic">
                                              <div class="user-profile-pic-normal">
                                                  <img width="35" height="35" src="/assets-app/img/profiles/avatar-male.png" data-src="/assets-app/img/profiles/avatar-male.png" data-src-retina="/assets-app/img/profiles/avatar-male.png" alt="">
                                              </div>
                                          </div>
                                          <div class="friend-details-wrapper">
                                              <div class="friend-name">
                                                  Johne Drake
                                              </div>
                                              <div class="friend-description">
                                                  James Smith in commman
                                              </div>
                                              
                                          </div>

                                      </a>

                                        <a class="team-member" href="">

                                          <div class="friend-profile-pic">
                                              <div class="user-profile-pic-normal">
                                                  <img width="35" height="35" src="/assets-app/img/profiles/avatar-male.png" data-src="/assets-app/img/profiles/avatar-male.png" data-src-retina="/assets-app/img/profiles/avatar-male.png" alt="">
                                              </div>
                                          </div>
                                          <div class="friend-details-wrapper">
                                              <div class="friend-name">
                                                  Johne Drake
                                              </div>
                                              <div class="friend-description">
                                                  James Smith in commman
                                              </div>
                                             
                                          </div>

                                        </a>

                                      <a class="team-member" href="#">
                                          <div class="friend-profile-pic">
                                              <div class="user-profile-pic-normal">
                                                  <img width="35" height="35" src="/assets-app/img/profiles/avatar-male.png" data-src="/assets-app/img/profiles/avatar-male.png" data-src-retina="/assets-app/img/profiles/avatar-male.png" alt="">
                                              </div>
                                          </div>
                                          <div class="friend-details-wrapper">
                                              <div class="friend-name">
                                                  Johne Drake
                                              </div>
                                              <div class="friend-description">
                                                  James Smith in commman
                                              </div>
                                          </div>
                                          
                                      </a>

                                      <div class="clearfix"></div>
                                  </div>

                              </div>

                          </div>

                      </div>


                  </div>

                  <div class="col-md-6">

                      <div class="widget-item m-b-15">

                          <div class="tiles green " style="max-height:345px">
                              <div class="tiles-body">

                                  <h3 class="text-white m-t-5 m-b-20">Upcoming Events for the 
                                      <span class="semi-bold">'Charleston Kickers'</span>
                                  </h3>

                                  <a href="#" class="hashtags transparent"> #Are You In? </a> 

                                  <div class="add-btn pull-right">
                                    <a data-toggle="modal" data-target="#add_event" href="#" class="btn btn-small btn-border"><i class="fa fa-plus-circle"></i> Add Event</a> 
                                  </div>

                              </div>
                          </div>

                      </div>

                      <div class="event-wrap">

                          <div class="row">

                            <div class="cal-day">

                               <h3>Monday, Dec 15th</h3>

                               <div class="event-wrap widget-item style-b">
                                  <div class="row">
                                     <div class="tiles white border-right sm-bottom-30">

                                           <div class="controller pull-right"> 
                                              <a href="javascript:;" class="edit"><i class="fa fa-pencil-square-o"></i></a> 
                                            </div>

                                        <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 p-b-15 p-t-15">
                                           <div><h2>6:30<span class="time-day">PM</span></h2> <h3>Practice</h3></div>
                                           <h5 class="event-team-name"><span>Group:</span> Hanahan Lakers</h5>
                                           <h5 class="event-team-name"><span>Where:</span> Field B, Hanahan <a href="#">(map)</a></h5>

                                        </div>

                                        <div class="col-md-6 col-lg-6 col-sm-7 col-xs-12 p-b-15 p-t-15">

                                           <div class="run listit">

                                              <p class="event-ins in"><i class="fa fa-check"></i> 

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Mike Klein, Patrick, Allen, Sam, Jeff, Mike, Flo"><strong>5</strong> IN</a>

                                              </p>

                                              <p class="event-ins maybe"><i class="fa fa-question-circle"></i>  

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Mike K., Jeff U., Steve K., Paul S."><strong>2</strong> MAYBE</a>

                                              </p>

                                              <p class="event-ins out"><i class="fa fa-times-circle"></i> 

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Patrick M."><strong>2</strong> OUT</a>

                                              </p>

                                           </div>

                                           <p class="run-question">Are you In?!</p>

                                              <div class="run-btns">
                                                 <div class="toggle-in left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>

                                                 <div class="toggle-maybe left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>

                                                 <div class="toggle-out left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>
                                              </div>

                                        </div>
                                     </div>
                                  </div>
                               </div>

                            </div>

                          </div>

                          <div class="row">

                            <div class="cal-day">

                               <h3>Monday, Dec 15th</h3>

                               <div class="event-wrap widget-item style-b">
                                  <div class="row">
                                     <div class="tiles white border-right sm-bottom-30">

                                           <div class="controller pull-right"> 
                                              <a href="javascript:;" class="edit"><i class="fa fa-pencil-square-o"></i></a> 
                                            </div>

                                        <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 p-b-15 p-t-15">
                                           <div><h2>6:30<span class="time-day">PM</span></h2> <h3>Practice</h3></div>
                                           <h5 class="event-team-name"><span>Group:</span> Hanahan Lakers</h5>
                                           <h5 class="event-team-name"><span>Where:</span> Field B, Hanahan <a href="#">(map)</a></h5>

                                        </div>

                                        <div class="col-md-6 col-lg-6 col-sm-7 col-xs-12 p-b-15 p-t-15">

                                           <div class="run listit">

                                              <p class="event-ins in"><i class="fa fa-check"></i> 

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Mike Klein, Patrick, Allen, Sam, Jeff, Mike, Flo"><strong>5</strong> IN</a>

                                              </p>

                                              <p class="event-ins maybe"><i class="fa fa-question-circle"></i>  

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Mike K., Jeff U., Steve K., Paul S."><strong>2</strong> MAYBE</a>

                                              </p>

                                              <p class="event-ins out"><i class="fa fa-times-circle"></i> 

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Patrick M."><strong>2</strong> OUT</a>

                                              </p>

                                           </div>

                                           <p class="run-question">Are you In?!</p>

                                              <div class="run-btns">
                                                 <div class="toggle-in left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>

                                                 <div class="toggle-maybe left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>

                                                 <div class="toggle-out left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>
                                              </div>

                                        </div>
                                     </div>
                                  </div>
                               </div>

                            </div>

                          </div>

                          <div class="row">

                            <div class="cal-day">

                               <h3>Monday, Dec 15th</h3>

                               <div class="event-wrap widget-item style-b">
                                  <div class="row">
                                     <div class="tiles white border-right sm-bottom-30">

                                           <div class="controller pull-right"> 
                                              <a href="javascript:;" class="edit"><i class="fa fa-pencil-square-o"></i></a> 
                                            </div>

                                        <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 p-b-15 p-t-15">
                                           <div><h2>6:30<span class="time-day">PM</span></h2> <h3>Practice</h3></div>
                                           <h5 class="event-team-name"><span>Group:</span> Hanahan Lakers</h5>
                                           <h5 class="event-team-name"><span>Where:</span> Field B, Hanahan <a href="#">(map)</a></h5>

                                        </div>

                                        <div class="col-md-6 col-lg-6 col-sm-7 col-xs-12 p-b-15 p-t-15">

                                           <div class="run listit">

                                              <p class="event-ins in"><i class="fa fa-check"></i> 

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Mike Klein, Patrick, Allen, Sam, Jeff, Mike, Flo"><strong>5</strong> IN</a>

                                              </p>

                                              <p class="event-ins maybe"><i class="fa fa-question-circle"></i>  

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Mike K., Jeff U., Steve K., Paul S."><strong>2</strong> MAYBE</a>

                                              </p>

                                              <p class="event-ins out"><i class="fa fa-times-circle"></i> 

                                                 <a href="#" tabindex="0" class="run-count" data-toggle="popover" data-trigger="focus" title="" data-content="Patrick M."><strong>2</strong> OUT</a>

                                              </p>

                                           </div>

                                           <p class="run-question">Are you In?!</p>

                                              <div class="run-btns">
                                                 <div class="toggle-in left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>

                                                 <div class="toggle-maybe left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>

                                                 <div class="toggle-out left source-code">
                                                    <!--BootstrapDialog.alert({
                                                       title: 'I am IN',
                                                       message: 'I confirm that I can make the came on Monday August 17th, at 18:30 at City Gym.',
                                                       closable: false, // <-- Default value is true
                                                       buttonLabel: 'Confirm that I am IN'
                                                       });-->
                                                 </div>
                                              </div>

                                        </div>
                                     </div>
                                  </div>
                               </div>

                            </div>

                          </div>

                      </div>

                  </div>

                  <div class="col-md-3">
                    <div class="tiles white com-widget">
                      <div class="tiles-body">
                        <div class="title-header">
                          <div class="controller"> <a href="javascript:;" class="reload"></a> </div>
                          <div class="tiles-title"> TEAM FEED </div>
                        </div>
                        <div class="message-wrap">
                          <div class="user-profile"> <img src="/assets-app/img/profiles/c.jpg" alt="" data-src="/assets-app/img/profiles/c.jpg" data-src-retina="/assets-app/img/profiles/c2x.jpg" width="35" height="35"> </div>
                          <div class="message-wrapper">
                            <div class="heading"> David Nester</div>
                            <div class="date"> Just now </div>
                            <div class="text-description"> Photos are canceled, we will do team pictures on January 12th and individuals whenever. </div>
                            <div class="feed-function">
                              <a class="reply-trigger" href="#"><i class="fa fa-reply"></i>Reply</a>
                              <a class="reply-trigger" href="#"><i class="fa fa-reply-all"></i>Reply All</a>
                              <div class="reply-wrap" style="display:none;">
                                <div class="title-header">
                                  <div class="controller"> <a href="javascript:;" class="remove reply-trigger"></a> </div>
                                </div>

                                <form>
                                  <textarea>text here...</textarea>
                                  <button type="button" class="btn btn-blue btn-small">Send to David</button>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div class="message-wrap">
                          <div class="user-profile"> <img src="/assets-app/img/profiles/h.jpg" alt="" data-src="/assets-app/img/profiles/h.jpg" data-src-retina="/assets-app/img/profiles/h2x.jpg" width="35" height="35"> </div>
                          <div class="message-wrapper">
                            <div class="heading">Jim Smith </div>
                            <div class="date"> Yesterday </div>
                            <div class="text-description"> This is a reminder that we practice today from 3 to 4:30 at loftis Field. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="feed-function">
                              <a class="reply-trigger" href="#"><i class="fa fa-reply"></i>Reply</a>
                              <a class="reply-trigger" href="#"><i class="fa fa-reply-all"></i>Reply All</a>
                              <div class="reply-wrap" style="display:none;">
                                <div class="title-header">
                                  <div class="controller"> <a href="javascript:;" class="remove reply-trigger"></a> </div>
                                </div>

                                <form>
                                  <textarea>text here...</textarea>
                                  <button type="button" class="btn btn-blue btn-small">Send to All</button>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div class="message-wrap">
                          <div class="user-profile"> <img src="/assets-app/img/profiles/h.jpg" alt="" data-src="/assets-app/img/profiles/h.jpg" data-src-retina="/assets-app/img/profiles/h2x.jpg" width="35" height="35"> </div>
                          <div class="message-wrapper">
                            <div class="heading"> Anton Maurer </div>
                            <div class="date"> Yesterday </div>
                            <div class="text-description"> Great game yesterday. Keep it up! </div>
                            <div class="feed-function">
                              <a class="reply-trigger" href="#"><i class="fa fa-reply"></i>Reply</a>
                              <a class="reply-trigger" href="#"><i class="fa fa-reply-all"></i>Reply All</a>
                              <div class="reply-wrap" style="display:none;">
                                <div class="title-header">
                                  <div class="controller"> <a href="javascript:;" class="remove reply-trigger"></a> </div>
                                </div>

                                <form>
                                  <textarea>text here...</textarea>
                                  <button type="button" class="btn btn-blue btn-small">Send To Anton</button>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>

                    <div class="tiles white com-widget com-post">
                      <div class="tiles-body">
                      <div class="message-wrap">
                      <div class="profile-img-wrapper pull-left"> <img src="/assets-app/img/profiles/avatar_small.jpg" alt="" data-src="/assets-app/img/profiles/avatar_small.jpg" data-src-retina="/assets-app/img/profiles/avatar_small2x.jpg" width="35" height="35"> </div>
                      <div class="inline pull-right" style="width:86%">
                        <div class="input-group transparent ">
                          <input type="text" class="form-control" placeholder="Write a message">
                          <span class="input-group-addon"> <i class="fa fa-camera"></i> </span> </div>
                      </div>
                      <div class="clearfix"></div>
                      </div>
                      </div>
                    </div>

                  </div>


              </div>

            </div>
        </div>
        <!-- END PAGE CONTAINER -->
    </div>
    <!-- END CONTENT -->

    <?php include 'inc/app_add_event.php';?>
    <?php include 'inc/app_add_team.php';?>
    <?php include 'inc/app_add_player.php';?>
    <?php include 'inc/app_snp_scripts.php';?>


</body>

</html>
