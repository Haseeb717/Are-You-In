
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
        
        <div class="content">

          <div class="row">

            <div class="col-sm-12">

                <div class="row tiles-container  m-b-20 ">
                  <div class="tiles white p-t-15 p-l-15 p-r-15 p-b-25 text-center">
                    <h2 class="text-center">Welcome <span class="semi-bold text-success">First Name</span></h2>
                    <h4 class="text-center muted m-l-10 m-r-10">First step is to create a Team.</h4>
                    <button type="button" data-toggle="modal" data-target="#add_first_team" class="btn btn-primary m-t-20 btn-cons"><i class="fa fa-add"></i>&nbsp;Add Team</button>
                  </div>
                </div>

                <div class="modal fade" id="add_first_team" tabindex="-1" role="dialog" aria-labelledby="add_team" aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content team-modal">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <form action="/file-upload" class="dropzone team-pic no-margin">
                             <i class="fa fa-users fa-7x"></i>
                             <div class="fallback">
                                <input name="file" type="file" multiple />
                             </div>
                          </form>
                          <h3>Welcome First-Name</h3>
                          <h4 id="add_team" class="semi-bold">Add Your Team</h4>
                       </div>
                       <div class="modal-body">
                          <form id="add_team" class="add-team-form">
                             <div class="form-wrap">
                                <div class="row form-row form-group">
                                   <div class="col-md-12">
                                      <input type="text" name="team_name" class="form-control" placeholder="Team Name"/>
                                   </div>
                                   <div class="col-md-12 m-b-10 select-container">
                                      <select name="sport" class="source form-control" style="width:100%">
                                         <option value="">Please Select Sport</option>
                                         {exp:mx_team:sports}
                                         <option value="{sport_id}">{sport_title}</option>
                                         {/exp:mx_team:sports}
                                      </select>
                                   </div>
                                   <div class="col-md-12">
                                      <input type="text" name="city" class="form-control" placeholder="City">
                                   </div>
                                </div>
                                <div class="row form-row form-group">
                                   <div class="col-md-12">
                                      <div class="radio border-sep">
                                         <input id="male" type="radio" name="gender" value="male" checked="checked">
                                         <label for="male">Male</label>
                                         <input id="female" type="radio" name="gender" value="female">
                                         <label for="female">Female</label>                            
                                         <input id="coed" type="radio" name="gender" value="coed">
                                         <label for="coed">Coed</label>
                                      </div>
                                   </div>
                                </div>
                                <div class="row form-row">
                                   <div class="col-md-12">
                                      <div class="radio toggles">
                                         <input id="adult" type="radio" name="age" value="adult" checked="checked">
                                         <label for="adult">Adult</label>
                                         <input id="youth" type="radio" name="age" class="youth" value="youth">
                                         <label for="youth">Youth</label>                            
                                      </div>
                                   </div>
                                </div>
                                <div class="row form-row collapse youth">
                                   <div class="col-md-6 m-b-10">
                                      <select name="age_from" class="source-nosearch" style="width:100%">
                                         <option value="">Age From</option>
                                         {exp:mx_team:numbers from="1" to="100"}
                                         <option value="{short_name}">{name}</option>
                                         {/exp:mx_team:numbers}
                                      </select>
                                   </div>
                                   <div class="col-md-6 m-b-10">
                                      <select name="age_to" class="source-nosearch" style="width:100%">
                                         <option value="">Age To</option>
                                         {exp:mx_team:numbers from="1" to="100"}
                                         <option value="{short_name}">{name}</option>
                                         {/exp:mx_team:numbers}
                                      </select>
                                   </div>
                                </div>
                                <div class="modal-footer">
                                   <div class="row form-row">
                                      <div class="col-md-7">
                                         <div class="checkbox text-left">
                                            <input id="yes" type="checkbox" name="public_contact_info" value="1">
                                            <label for="yes">Allow team to see each others contact info</label>
                                         </div>
                                      </div>
                                      <div class="col-md-5">
                                         <div class="checkbox">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Create Team</button>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </form>
                          <div id="status">
                             <div class="modal-body">
                                <div class="row">
                                   <div class="col-xs-12 align-center">
                                      <h4><i class="fa fa-check"></i> Team Successfully Added</h4>
                                      <p>Next step is to add players to your team</p>
                                      <a href="/teams/">Click here to manage team</a>
                                   </div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <div class="row">
                                   <div class="col-md-12">
                                      <div class="checkbox">
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                         <a href="#" class="btn team-page btn-primary">Go to Team Page</a>
                                         <a href="#" class="btn btn-primary add-another">Add Another Team</a>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                 </div>
                 <!-- /.modal -->
              </div>

            </div>

          </div>

        </div>

      </div>
      <!-- END PAGE CONTAINER -->
   </div>
   <!-- END CONTENT --> 

   <?php include 'inc/app_snp_scripts.php';?>
</body>
</html>