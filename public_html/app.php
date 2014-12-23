
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
   <div class="page-container row-fluid">
      <?php include 'inc/app_snp_leftnav.php';?>
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
         <div class="content dashboard m-b-10">

            <div class="row">
               <div class="col-md-4 col-sm-12 col-lg-3 m-b-15">

                   <select id="source" style="width:100%;">
                    <option value="">Select Team to Filter: Viewing All</option>
                    <option value="CT">Hanahan Hawks</option>
                    <option value="DE">Bourne Group</option>
                    <option value="FL">Hanahan Lakers</option>
                    <option value="FL">Saturday Morning Basketball</option>
                  </select>

               </div>
            </div>

            <div class="row">
               <div class="col-md-6 col-sm-12">

                  <div class="visibleoverflow transparent">

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

                        <div class="cal-day">

                           <h3>Tuesday, Dec 16th</h3>

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

                                       <p class="run-question">Are you In?</p>

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

                        <div class="cal-day">

                           <h3>Friday, Nov 15th</h3>

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

                                       <p class="run-question">Are you In?</p>

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

                           <div class="event-wrap widget-item style-b">
                              <div class="row">
                                 <div class="tiles white border-right sm-bottom-30">

                                       <div class="controller pull-right"> 
                                          <a href="javascript:;" class="edit"><i class="fa fa-pencil-square-o"></i></a> 
                                        </div>

                                    <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12 p-b-15 p-t-15">
                                       <div><h2>8:30<span class="time-day">PM</span></h2> <h3>Game vs The Pirates</h3></div>
                                       <h5 class="event-team-name"><span>Group:</span> Hanahan Lakers</h5>
                                       <h5 class="event-team-name"><span>Where:</span> Field B, Hanahan <a href="#">(map)</a></h5>
                                       <h5 class="event-team-name"><span>Note:</span> Parents meeting after game</h5>

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

                                       <p class="run-question">Are you In?</p>

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
               <!-- END COL 12 -->

               <div class="col-md-6 col-sm-12">

                     <div class="grid simple ">
                          <h3>Schedule: <span>All</span></h3>
                         <div class="grid-body no-border no-padding">
                              <div class="table-responsive">
                                 <table class="table table-condensed team-schedule">
                                     <thead>
                                         <tr>
                                             <th style="width:16%">Team</th>
                                             <th style="width:10%">Date</th>
                                             <th style="width:4%">Time</th>
                                             <th style="width:16%">Event</th>
                                             <th style="width:15%">Site</th>
                                             <th style="width:4%">Score</th>
                                             <th style="width:3%">W/L</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <td class="v-align-middle">Hanahan Hawks</td>
                                             <td class="v-align-middle">Mon 17/11</td>
                                             <td class="v-align-middle">7:30</td>
                                             <td class="v-align-middle muted">Fly & Form Structures</td>
                                             <td class="muted">Jones Center</td>
                                             <td class="v-align-middle">62:48</td>
                                             <td class="v-align-middle">W</td>
                                         </tr>
                                         <tr>
                                             <td class="v-align-middle">Saturday Basketball</td>
                                             <td class="v-align-middle">Mon 11/24</td>
                                             <td class="v-align-middle">8:30</td>
                                             <td class="v-align-middle muted">Pug Life</td>
                                             <td class="muted">Park West-M</td>
                                             <td class="v-align-middle"></td>
                                             <td class="v-align-middle"></td>
                                         </tr>
                                         <tr>
                                             <td class="v-align-middle">Hanahan Galaxy</td>
                                             <td class="v-align-middle">Mon 12/01</td>
                                             <td class="v-align-middle">7:30</td>
                                             <td class="v-align-middle muted">MtP Misfits</td>
                                             <td class="muted">Jones Center</td>
                                             <td class="v-align-middle"></td>
                                             <td class="v-align-middle"></td>
                                         </tr>
                                         <tr>
                                             <td class="v-align-middle">Bourne Group</td>
                                             <td class="v-align-middle">Med 12/03</td>
                                             <td class="v-align-middle">8:30</td>
                                             <td class="v-align-middle muted">New Leaf</td>
                                             <td class="muted">Park West-M</td>
                                             <td class="v-align-middle"></td>
                                             <td class="v-align-middle"></td>
                                         </tr>
                                         <tr>
                                             <td class="v-align-middle">Bourne Group</td>
                                             <td class="v-align-middle">Mon 12/08</td>
                                             <td class="v-align-middle">7:30</td>
                                             <td class="v-align-middle muted">LCSwingbeds.com</td>
                                             <td class="muted">Jones Center</td>
                                             <td class="v-align-middle"></td>
                                             <td class="v-align-middle"></td>
                                         </tr>
                                         <tr>
                                             <td class="v-align-middle">Hanahwn Hawks</td>
                                             <td class="v-align-middle">Mon 12/15</td>
                                             <td class="v-align-middle">8:30</td>
                                             <td class="v-align-middle muted">Fly & Form Structures</td>
                                             <td class="muted">Jones Center</td>
                                             <td class="v-align-middle"></td>
                                             <td class="v-align-middle"></td>
                                         </tr>


                                     </tbody>
                                 </table>
                              </div>
                         </div>
                     </div> <!-- END Schedule -->


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
                    </div> <!-- END Feed -->


               </div>

            </div>
            <!-- END RO -->
         </div>
      </div>
      <!-- END PAGE CONTAINER -->
   </div>
   <!-- END CONTENT --> 
   <?php include 'inc/app_add_team.php';?>
   <?php include 'inc/app_snp_scripts.php';?>
</body>
</html>