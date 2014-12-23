<?php include 'inc/app_snp_doctype.php';?>

<body class="">

<?php include 'inc/app_snp_header.php';?>
    
<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">

<?php include 'inc/app_snp_leftnav.php';?>

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content"> 
        <div class="content">  

            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-9">

                <div class=" tiles white col-md-12 no-padding profile-pix">
                      <div class="overlayer top-right">                            
                         <div class="overlayer-wrapper">                               
                            <div class="padding-10 ">                 
                               <button type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#edit-picture"><i class="fa fa-pencil"></i>&nbsp;&nbsp; Edit Picture</button>
                            </div>
                         </div>
                      </div> 

                   <div class="tiles green cover-pic-wrapper">                           
                      <img src="/assets-app/img/cover_pic.png" alt="">
                   </div>
                   <div class="tiles white">
                      <div class="row">
                         <div class="col-md-3 col-sm-2" >
                            <div class="user-profile-pic">  
                               <img width="69" height="69" data-src-retina="/assets-app/img/profiles/avatar2x.jpg" data-src="/assets-app/img/profiles/avatar.jpg" src="/assets-app/img/profiles/avatar.jpg" alt="">
                            </div>
                         </div>
                         <div class="col-md-8 col-sm-8 no-padding">
                            <div class="profile-name">
                              <h2>{screen_name}</h2>
                              <h6>Member since August 11, 2014</h6>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>

                <div class="row">
                   <div class="col-xs-12">
                      <div class="grid simple">
                         <div class="grid-title no-border">
                            <h4>Edit <span class="semi-bold">Account</span></h4>
                         </div>
                         <div class="grid-body no-border">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                     <label class="form-label">First Name</label>
                                     <div class="controls">
                                        <input type="text" name="first_name" class="form-control">
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                     <label class="form-label">Last Name</label>
                                     <div class="controls">
                                        <input type="text" name="last_name" class="form-control">
                                     </div>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                     <label class="form-label">Email</label>
                                     <div class="controls">
                                        <input type="email" name="email" class="form-control">
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                     <label class="form-label">Phone</label>
                                     <div class="controls">
                                        <input type="text" name="phone" class="form-control">
                                     </div>
                                  </div>
                                </div> 
                            </div> 
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                      <label class="form-label">Date of Birth</label>
                                       <div class="controls">
                                      <div class="input-append success date full-width no-padding">
                                        <input type="text" class="form-control">
                                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                                       </div>
                                    </div> 
                                  </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <div class="form-group">
                                        <label class="form-label">Gender</label>
                                         <div class="controls">
                                            <select class="source-nosearch" style="width:100%">
                                              <option value="male">Male</option>
                                              <option value="female">Female</option>
                                              <option value="private">Private</option>
                                            </select>
                                          </div>
                                    </div>
                                </div> 
                            </div>  
                            <div class="row">                                  
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <span class="help">only needed if you update password</span>
                                     <div class="controls">
                                        <input type="password" name="password" class="form-control">
                                     </div>
                                  </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                      <div class="form-group">
                                         <label class="form-label">City</label>
                                         <div class="controls">
                                            <input type="text" name="city" class="form-control">
                                         </div>
                                      </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                      <div class="form-group">
                                        <label class="form-label">Country</label>
                                         <div class="controls">
                                            <select class="source-nosearch" style="width:100%">
                                              <option value="us">United States</option>
                                              <option value="canada">Canada</option>
                                            </select>
                                          </div>
                                      </div> 
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                      <div class="form-group">
                                        <label class="form-label">State</label>
                                         <div class="controls">
                                            <select class="source" style="width:100%">
                                              <option value="AL">Alabama</option>
                                              <option value="AK">Alaska</option>
                                              <option value="AZ">Arizona</option>
                                              <option value="AR">Arkansas</option>
                                              <option value="CA">California</option>
                                              <option value="CO">Colorado</option>
                                              <option value="CT">Connecticut</option>
                                              <option value="DE">Delaware</option>
                                              <option value="DC">District Of Columbia</option>
                                              <option value="FL">Florida</option>
                                              <option value="GA">Georgia</option>
                                              <option value="HI">Hawaii</option>
                                              <option value="ID">Idaho</option>
                                              <option value="IL">Illinois</option>
                                              <option value="IN">Indiana</option>
                                              <option value="IA">Iowa</option>
                                              <option value="KS">Kansas</option>
                                              <option value="KY">Kentucky</option>
                                              <option value="LA">Louisiana</option>
                                              <option value="ME">Maine</option>
                                              <option value="MD">Maryland</option>
                                              <option value="MA">Massachusetts</option>
                                              <option value="MI">Michigan</option>
                                              <option value="MN">Minnesota</option>
                                              <option value="MS">Mississippi</option>
                                              <option value="MO">Missouri</option>
                                              <option value="MT">Montana</option>
                                              <option value="NE">Nebraska</option>
                                              <option value="NV">Nevada</option>
                                              <option value="NH">New Hampshire</option>
                                              <option value="NJ">New Jersey</option>
                                              <option value="NM">New Mexico</option>
                                              <option value="NY">New York</option>
                                              <option value="NC">North Carolina</option>
                                              <option value="ND">North Dakota</option>
                                              <option value="OH">Ohio</option>
                                              <option value="OK">Oklahoma</option>
                                              <option value="OR">Oregon</option>
                                              <option value="PA">Pennsylvania</option>
                                              <option value="RI">Rhode Island</option>
                                              <option value="SC">South Carolina</option>
                                              <option value="SD">South Dakota</option>
                                              <option value="TN">Tennessee</option>
                                              <option value="TX">Texas</option>
                                              <option value="UT">Utah</option>
                                              <option value="VT">Vermont</option>
                                              <option value="VA">Virginia</option>
                                              <option value="WA">Washington</option>
                                              <option value="WV">West Virginia</option>
                                              <option value="WI">Wisconsin</option>
                                              <option value="WY">Wyoming</option>
                                            </select>
                                          </div>
                                      </div>
                                    </div>


                                  </div>
                                </div>                                     

                            </div>

                          </div>

                         <div class="grid-title no-border">
                            <h4>Notification <span class="semi-bold">Options</span></h4>
                         </div>
                        <div class="grid-body no-border">

                          <div class="row">
                            <div class="col-md-6 col-xs-12 m-b-15">
                              <div class="checkbox">
                                <input id="male" type="checkbox" name="gender" value="male" checked="checked">
                                <label for="male">SMS</label>
                                <input id="female" type="checkbox" name="gender" value="female">
                                <label for="female">E-Mail</label>
                                <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquan lorem ante, dapibus in, viverra quis, feugiat a, tellus. </p>
                              </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                              <div class="checkbox">
                                <input id="yes" type="checkbox" name="optionyes" value="yes">
                                <label for="yes">Terms and Conditions</label>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                              </div>
                            </div>
                          </div>

                        </div>

                        <div class="grid-body no-border">

                          <div class="row">
                            <div class="col-md-6 col-xs-6">

                              <button type="button" class="btn btn-primary btn-cons">Save Settings</button>

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

<?php include 'inc/app_add_team.php';?>

<?php include 'inc/app_snp_scripts.php';?>

</body>
</html>
