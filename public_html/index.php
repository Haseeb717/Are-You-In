<?php include 'inc/snp_doctype.php';?>

<body>

<!-- Fade In of the Page -->    
<div class="loader"></div>

<?php include 'inc/snp_header.php';?>

<section id="header" class="header et-wrapper">

  <button class="et-rotate" et-in="scaleUpDown delay300" et-out="scaleDown"><img src="/assets/img/hamburger.png" alt="Display Mobile Menu"></button>
    
  <!-- BACKGROUND HEADER -->    
    
  <div class='blurImg'>
              <!-- VIDEO BACKGROUND -->
        <div class="video-background-container parallax" data-stellar-ratio="0.4">
          <video preload="auto" autoplay="autoplay" autoplay loop muted class="video-background">
            <source type="video/mp4" src="/assets/video/run.mov" />
          </video>
        </div>
      <div class='blur' style="background-image: url('/assets/img/bgnormal.jpg')"></div>
  </div>

    <div class="et-page"> <!-- For Mobile Menu transition -->
     
         <div id="leadFader" class="eight columns">
            
            <!-- Logo -->
            
            <img src="/assets/img/logo_white.png" alt="YOUR LOGO">
                            
            <!-- Title --> 
                  
            <h2>Easy Team Management!</h2>  
          <a class="border-button button-white switch" gumby-trigger="#getstarted">Get Started, for free</a>   

        
        </div>

            <!-- Little text on bottom with arrow --> 
          
           <a href="#first" class="scrollTo"> 
           
               <div class="go-down">
                    <p class="start-tour">start tour</p>
                    <img src="/assets/img/go-down.png" alt="Go Down">
               </div>
               
           </a>
      
       </div> <!-- End et-page transition -->

       <div class="et-page"> <!-- For Mobile Menu transition -->
       
            <nav class="menu-off">
            
                <ul class="nav-off">
                    <li><a class="scrollTo" href="#first">Tour</a></li>
                    <li><a class="switch" href="#" gumby-trigger="#login"></a>Login</li>
                    <li><a class="switch" href="#" gumby-trigger="#getstarted"></a>Get Started</li>
                </ul>
                
            </nav>  
            
       </div> <!-- End et-page transition -->
       
</section>

<div id="container" class="container">

  <section id="first" class="first">

      <div class="row scrollme">
      
                  <!-- CONTENT LEFT --> 
          
                  <div class="six columns info-left">
                  
                      <!-- Title --> 
                  
                      <h3>What is RU N?</h3>
                                  
                      <!-- Content --> 

                      <h5>RU N reminds your players about an upcoming event. They RSVP and everybody is in sync</h5>

                      <p><strong>Coaches:</strong> Never forfeit again, never have too many players or not enough, automate reminders.<br> 
                      RU N helps with: Automated reminders, team communication, min/max participation.</p>

                      <p><strong>Players:</strong> Never forget about an event, see who else is going in real time.<br> 
                      RU N helps with: Event reminders, easy RSVP, who else is in.</p>

                      <p><strong>Leagues:</strong> Never answer phone about rain out again, setup leagues 10x faster.</br> 
                      RU N helps with: Team creation, league communication</p>
                                                                                  
                  </div>
                  
                  <!-- CONTENT RIGHT --> 

                  <div class="six columns ipad  animateme" data-when="enter" data-from="1" data-to="0.3" data-opacity="0" data-translatey="-100" data-rotatez="0">
              
                      <!-- Content --> 
                      
                      <img src="/assets/img/mockup-iPad.png" alt="iPad Mockup">
                                          
                  </div>
                  
              </div> <!-- End row div -->    

  </section>

  <section id="second" class="second">

      <div class="row scrollme">
            
        <div class="six columns iphone animateme" data-when="enter" data-from="1" data-to="0.3" data-opacity="0" data-translatey="-80" data-rotatez="0">

            <img src="/assets/img/mockup-iphone.png" alt="iPhone Mockup">
                                
        </div>      
        
        <!-- CONTENT RIGHT --> 
    
        <div class="six columns info-left">
        
            <!-- Title --> 
        
            <h3>How does it work?</h3>
                        
            <!-- Content --> 
            
            <p>It takes only minutes to get started, and players/parents dont need to signup or install anything. </p>
                
            <div class="space"></div>
                
            <ul class="how-works-list">

            <li>

                <h2>1</h2>

                <h5>Add Players</h5>
                            
                <p>Coach or organizer adds player name, phone # and email to team</p>

              </li>
                
            <li>

                <h2>2</h2>

                <h5>Add Events</h5>
                            
                <p>Coach or organizers adds calendar events to the team.</p>

              </li>

            <li>

                <h2>3</h2>

                <h5>'RUN' Sends Reminders</h5>
                            
                <p>'Are you in?' The system sends smart event reminders.</p>

              </li>
                
            <li>

                <h2>4</h2>

                <h5>Players RSVP</h5>
                            
                <p>Players get notification and can click YES/NO/MAYBE.</p>

              </li>


            </ul>               
                                
            <h6><i class="fa fa-long-arrow-right"></i> Now coaches and players know how many and who is going to the event.</h6>
                

        </div>

        
    </div> <!-- End row div -->    

  </section>

  <section id="tirth" class="tirth">

      <div class="row scrollme animateme" data-when="enter" data-from="1" data-to="0.3" data-opacity="0" data-translatey="-80" data-rotatez="0">
        
        <div class="ten columns centered">

            <!-- Image --> 
            
            <img src="/assets/img/mockup-iphone2.png" alt="iPhone Mockup" class="animateme" data-when="enter" data-from="1" data-to="0.3" data-opacity="0" data-translatey="-80" data-rotatez="0">
        
            <!-- Title --> 
        
            <h3>Why RU N?</h3>
                        
            <!-- Content --> 
            
            <div class="row inner-content">


            <div class="six columns text-right">
            
            <h5>Coaches</h5>

              <ul class="feature-list">
                <li>Save time organizing your team <i class="fa fa-check-circle-o"></i></li>
                <li>Everything in the cloud, nothing to install <i class="fa fa-check-circle-o"></i></li>
                <li>Make sure you always have right amount <i class="fa fa-check-circle-o"></i> </li>
              </ul>

            </div>

            <div class="six columns text-left">

            <h5>Players</h5>

              <ul class="feature-list">
                <li><i class="fa fa-check-circle-o"></i> See whoe else is going in real time</li>
                <li><i class="fa fa-check-circle-o"></i> Never miss an event</li>
                <li><i class="fa fa-check-circle-o"></i> Always up to date calendar</li>
              </ul>

            </div>


            </div>
            
            <div class="space"></div>

                              
        </div>

        
    </div> <!-- End row div -->    

  </section>

  <section id="screen" class="screenshots" >

      <div class="infinite-carousel">

      <div class="front-iphone"><img src="/assets/img/iphone-mockup.png" alt="exemple"></div>
      
        <div class="carousel-viewport">
            <div class="slide slide-current"><img src="/assets/img/areyouin-app1.jpg" alt="exemple"></div>
            <div class="slide"><img src="assets/img/areyouin-app2.jpg" alt="exemple"></div>
            <div class="slide"><img src="assets/img/areyouin-app3.jpg" alt="exemple"></div>
            <div class="slide"><img src="assets/img/areyouin-app4.jpg" alt="exemple"></div>
            <div class="slide"><img src="assets/img/areyouin-app5.jpg" alt="exemple"></div>
            <div class="slide"><img src="assets/img/areyouin-app6.jpg" alt="exemple"></div>
            <div class="slide"><img src="assets/img/areyouin-app7.jpg" alt="exemple"></div>
            <div class="slide"><img src="assets/img/areyouin-app8.jpg" alt="exemple"></div>
            <div class="slide"><img src="assets/img/areyouin-app9.jpg" alt="exemple"></div>

        </div><!--.carousel-viewport-->
      
        <a class="carousel-control-previous"></a>
        <a class="carousel-control-next"></a>
      
      </div><!--.infinite-carousel-->
            
  </section>

  <section id="services" class="services">

      <div class="row scrollme">

        <div class="twelve columns animateme" data-when="enter" data-from="1" data-to="0.2" data-opacity="0" data-translateY="-120" data-rotatez="0">

            <!-- Title --> 
        
            <h3>Who uses RU N?</h3>
            
            <!-- Content --> 

            <ul class="four_up tiles services_list">
                
                <!-- SERVICE --> 
                <li class="arrow-left animateme" data-when="enter" data-from="0.5" data-to="0.3" data-opacity="0" data-translatex="-40" data-rotatez="0">
                
                <img src="/assets/img/ico/1.png" alt="1">
        
                <!-- Title --> 
            
                <h5>Coaches</h5>
                            
                <!-- Content --> 
                
                <p>Easiest way to organize your team, and make sure you always have right amount of players. Communicate with your entire time with one click of a button.</p>
                
                </li>

                <!-- SERVICE --> 
                <li class="arrow-left animateme" data-when="enter" data-from="0.8" data-to="0.4" data-opacity="0" data-translatex="-80" data-rotatez="0">
                
                <img src="/assets/img/ico/2.png" alt="2">
        
                <!-- Title --> 
            
                <h5>City Rec Leagues</h5>
                            
                <!-- Content --> 
                
                <p>Give coaches a platform that lets them save time and takes the hazzle out of team management. Provide your staff with an easy way to create leagues, schedules and teams.</p>
                
                </li>

                <!-- SERVICE --> 
                <li class="arrow-left animateme" data-when="enter" data-from="0.7" data-to="0.5" data-opacity="0" data-translatex="-80" data-rotatez="0">
                                        
                <img src="/assets/img/ico/3.png" alt="3">
        
                <!-- Title --> 
            
                <h5>Players</h5>
                            
                <!-- Content --> 
                
                <p>Never forget an event. Easily RSV or tell the coach that you are not available. See who else is going to the game or practice. </p>
                
                </li>       
                
                <!-- SERVICE -->            
                <li class="animateme" data-when="enter" data-from="0.7" data-to="0.6" data-opacity="0" data-translatex="-80" data-rotatez="0">
                
                <img src="/assets/img/ico/4.png" alt="4">
        
                <!-- Title --> 
            
                <h5>Teams, Groups</h5>
                            
                <!-- Content --> 
                
                <p>You have a small group or a single team? Why not use RU N to organize your pick up games or meeting.Everybody will love it.</p>
                
                </li>       

            
            </ul>
        
        </div>
        

    </div> <!-- End row div -->    
  </section>

  <section id="quotes" class="quotes">

  <div class="row scrollme">
      
      <div id="testimonials" class="animateme" data-when="enter" data-from="0.4" data-to="0.2" data-opacity="0" data-translatey="-40" data-rotatez="0">
      
          <!-- THUMBNAILS -->
          
          <div class="testimonial-box">
          
              <ul class="testimonial-box-nav ">
                  <!-- Member 1  -->
                  <li>
                      <a href="#testimonial1">
                          <img src="http://www.placehold.it/170x170" alt="Exemple">
                      </a>
                  </li>
                  <!-- Member 2  -->
                  <li>
                      <a href="#testimonial2">
                          <img src="http://www.placehold.it/170x170" alt="Exemple">
                      </a>
                  </li>
                  <!-- Member 3  -->
                  <li>
                      <a href="#testimonial3" class="active">
                          <img src="http://www.placehold.it/170x170" alt="Exemple">
                      </a>
                  </li>
                  <!-- Member 4  -->
                  <li>
                      <a href="#testimonial4">
                          <img src="http://www.placehold.it/170x170" alt="Exemple">
                     </a>
                 </li>
                 
              </ul>
              
          </div>

          <!-- CONTENT -->
          
            <!-- Member 1  -->
            <div class="testimonial" id="testimonial1" style="display: none;">
              <h6>Francis M. | Organizer: Adult Basketball Team</h6>
              <p>“ We run a weekly basketball pick up game and RU N makes it extremely easy to organize. We used to have either not enough player or too many, but this platform took care of the problem. ”</p> 
            </div>
            
            <!-- Member 2  -->
            <div class="testimonial" id="testimonial2" style="display: none;">
              <h6>Dave C. | League Organizer: City of North Charleston</h6>
              <p>“ It used to take us 2 weeks to organize for a league. Excel speet sheets and print out for coaches. With RU N we do this in a day and the coaches have a platform to keep teams organized. ”</p>
            </div>
            
            <!-- Member 3  -->
            <div class="testimonial" id="testimonial3" style="display: block;">
              <h6>Andrea B. | Little League Coach: Hanahan Pirates</h6>
              <p>“ I coach a few teams, and RU N has allowed me to focus on coaching rather than typing out reminder text message. Getting players to games and practices has been easy now. ”</p>
            </div>
            
            <!-- Member 4  -->
            <div class="testimonial" id="testimonial4" style="display: none;">
              <h6>Jim V. | Athletic Director: Price College</h6>
              <p>“ All our sports went to use RU N for team organization. We've seen increased participation, fewer missed practices and coaches have been enjoying the extra time they now have since they dont need to worry about reminders and organization as much. ”</p>
            </div>
      
      </div>

  </div> <!-- Row end -->

  </section>

  <section class="subscribe scrollme">
    
    <div class="row animateme" data-when="enter" data-from="0.8" data-to="0.2" data-opacity="0" data-translateY="-80">
    
        <!-- Subscribe --> 

        <div class="ten columns centered">
        
            <!-- Title --> 
            
            <h3>Stay in touch? Sign up for an occassional update</h3>
            
            <form id="subscribe" class="form">

            <div class="form-group form-inline">
                <input class="form-control required" type="text" id="newsletter_first_name" placeholder="First Name">
                <input class="form-control required" type="text" id="newsletter_last_name" placeholder="Last Name">
                <input class="form-control required" type="email" id="newsletter_email" placeholder="your@email.com">
              <input type="submit" class="btn btn-default submit" value="SUBSCRIBE" />
              <span id="result">
                
              </span>
            </div>

            </form> 
                                                            
        </div>
        
    </div>
              

  </section>

  <section id="four" class="fourth">

      <div class="row scrollme animateme" data-when="enter" data-from="1" data-to="0.5" data-opacity="0" data-translatey="-100" data-rotatez="0">

      
            <!-- CONTENT CENTERED --> 
                                            
            <div class="center-me">
            
                <!-- Title --> 
                
                <h3>GET STARTED NOW !</h3>
                
                <p class="lead">The best and easiest way to manage your team</p>

                <div class="space-20"></div>                

                <a class="border-button button-xl open-thanks switch" gumby-trigger="#getstarted">Create a Team</a>    
                
                <div class="space-60"></div>
                
                <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
            
            </div>

      </div> <!-- End row div -->    

  </section>

</div> <!-- end of container -->

<div class="modal acc" id="getstarted">
  <div class="content">
    <a class="close switch" gumby-trigger="|#getstarted"><i class="icon-cancel" /></i></a>
    <div class="row">
      <div class="twelve columns">
        <h4>Sign Up</h4>

        <form id="form-register" class="styled">

          <div class="form-field">
              <input name="screen_name" id="screen_name" type="text"  class="form-control required" placeholder="Name">
          </div>

          <div class="form-field">
               <input name="username" id="reg_mail" type="text"  class="form-control required" placeholder="Email or Phone">
          </div>

          <div class="form-field">
               <input name="password" id="reg_pass" type="password"  class="form-control required" placeholder="Password">
          </div>

          <p>Already have an account? <a class="forgot-pw" href="#">Login here</a></p>

          <div class="form-field">
              <input type="submit" class="btn btn-default submit" value="Join us, free">    
          </div>  

       </form>
      </div>
    </div>
  </div>
</div>

<div class="modal acc" id="login">
  <div class="content">
    <a class="close switch" gumby-trigger="|#login"><i class="icon-cancel" /></i></a>
    <div class="row">
      <div class="twelve columns">
        <h4>Log in</h4>

        <form id="form-login" class='styled'>

          <div class="form-field">
              <input name="email" id="email" type="text" class="form-control required" placeholder="Email">
          </div>

          <div class="form-field">
              <input name="password" id="login_pass" type="password" class="form-control required" placeholder="Password">
          </div>

          <a class="forgot-pw" href="#">Forgot your Password?</a>

          <div class="form-field">
              <input type="submit" class="btn btn-default submit" value="Login">    
          </div>  

        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'inc/snp_scripts.php';?>

  </body>
  
</html>
