<?php include 'inc/app_snp_doctype.php';?>


<!-- BEGIN BODY -->
<body class="error-body no-top lazy"  data-original="/assets-app/img/login-bg-2.jpg"  style="background-image: url('/assets-app/img/login-bg-2.jpg')"> 
<div class="container">
  <div class="row login-container animated fadeInUp">  
        <div class="col-md-7 col-md-offset-2 tiles white no-padding">
        <a href="/" class="cancel-btn"></a>
		 <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10"> 
          <h2 class="normal">Sign in to are u in</h2>
          <p>Use Facebook, Twitter or your email to sign in.<br></p>
          <p class="p-b-20">Sign up Now! for webarch accounts, it's free and always will be..</p>
		  <button type="button" class="btn btn-cons" id="login_toggle">Login</button> or&nbsp;&nbsp;<button type="button" class="btn btn-cons" id="register_toggle"> Create an account</button>
        </div>
		<div class="tiles grey p-t-20 p-b-20 text-black">

      <form id="form-login" class="animated fadeIn">

          <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
            <div class="col-md-6 col-sm-6 ">
              <input name="email" id="email" type="text" class="form-control required" placeholder="Email">
            </div>
            <div class="col-md-6 col-sm-6">
              <input name="password" id="login_pass" type="password" class="form-control required" placeholder="Password">
            </div>
          </div>

          <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
            <div class="col-md-12 ">
              <button type="submit" class="btn btn-primary btn-md btn-cons">Login</button>    
            </div>
          </div>  

				<div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
				  <div class="control-group  col-md-10">
					<div class="checkbox checkbox check-success"> <a href="#">Trouble login in?</a>&nbsp;&nbsp;
					  <input type="checkbox" id="checkbox1" value="1">
					  <label for="checkbox1">Keep me reminded </label>
					</div>
				  </div>
				  </div>

     </form>


      <form id="form-register" class="animated fadeIn hide-me">
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-4 col-xs-12">
                        <input name="screen_name" id="screen_name" type="text"  class="form-control required" placeholder="Name">
                      </div>
                      <div class="col-md-4 col-xs-12">
                        <input name="username" id="reg_mail" type="text"  class="form-control required" placeholder="Email or Phone">
                      </div>
                      <div class="col-md-4 col-xs-12">
                        <input name="password" id="reg_pass" type="password"  class="form-control required" placeholder="Password">
                      </div>
                    </div>	
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-12 ">
                        <button type="submit" class="btn btn-info btn-md btn-cons">Join us, Free</button>		
                      </div>
                    </div>				
			</form>
		</div>   
      </div>   
  </div>
</div>
<?php include 'inc/app_snp_scripts.php';?>

<script src="/assets-app/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="/assets-app/js/login_v2.js" type="text/javascript"></script>

</body>
</html>