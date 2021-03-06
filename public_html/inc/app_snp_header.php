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