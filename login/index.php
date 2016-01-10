<!DOCTYPE html>
<html>
<head>
<title>Login</title>
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <!--start of navbar-->
  <div>
   <?php include "../header/header.html";?>
 </div>
 <!-- end of navbar-->
 <!--Start of body area-->

 <div class="template-container">
  <div class="row">
    <div class="col l6">
      <div class="row">
        <div class="card white">
          <div class="card-content black-text">
            <span class="card-title black-text "><p class="login_area_text">Welcome to Get My Propperty</p></span>
            <p>Enter the necessary registration details to create an account on GetMyProperty and begin selling your property today!.</p>
          </div>
          <hr>
          <div class="card-content black-text">
            <span class=" bold card-title black-text "><p class="login_area_text">Why Use Our Site</p></span>
           <ol>
             <li>Manage all your real estate property on one site</li>
             <li>View comprehensive photo galleries – full-screen, high resolution photographs</li>
             <li>Search for houses and land for sale and rent in any region in Kenya</li>
           </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="col l6">
        <div class="row">
          <div class="col l12">
            <div class="card white">

              <hr>
              <ul class="tabs">
                <li class="tab col s3"><a class="active"  href="#login">Login</a></li>
                <li class="tab col s3"><a href="#signup">Sign up</a></li>
              </ul>

              <div id="login" class="col s12 textcontainer ">
                <div class="error_area center" id="error_area">

                </div>
                <div class="input-field col s12">
                  <i class="fa fa-user prefix"></i>
                  <input id="login_username" type="text" class="validate" autocomplete="off">
                  <label for="login_username">Username</label>
                </div>
                <div class="input-field col s12 mypass">
                  <i class="fa fa-key prefix"></i>
                  <input id="login_password" type="password" class="validate" autocomplete="off">
                  <label for="login_password">Password</label>
                </div>
                <div class="left">
                  <a href="reset-password.php"><span class="forget-pass" >Forgot password</span></a>
                </div>
                <div class="loginfooter right">
                  <button onclick="Login()" type="submit" class=" btn btn-spacer waves-effect wave-dark loginbtn blue darken-1 center-align">Log In</button>

                </div>
              </div>
              <div id="signup" class="col s12 textcontainer">
                <div class="error_area center" id="error_area">
                </div>

                <div class="input-field col s12">
                  <i class="fa fa-user prefix"></i>
                  <input id="username" type="text" class="validate" autocomplete="off">
                  <label for="username">Username</label>
                </div>
                <div class="input-field col s12">
                  <i class="fa fa-envelope prefix"></i>
                  <input id="email" type="email" class="validate" autocomplete="off">
                  <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                  <i class="fa fa-phone prefix"></i>
                  <input id="phone" type="tel" class="validate" autocomplete="off">
                  <label for="phone">Phone</label>
                </div>
                <!-- <div class="input-field col s12">
                  <i class="fa fa-users prefix"></i>
                  <select class="usertype">
                    <option value="" disabled selected>select user type</option>
                    <option value="Private Seller">Private Seller</option>
                    <option value="Agent">Agent</option>
                  </select>
                <label>User type</label> 

                </div> -->
                <div class="input-field col s12 mypass">
                  <i class="fa fa-key prefix"></i>
                  <input id="password" type="password" class="validate" autocomplete="off">
                  <label for="password">Password</label>
                </div>
                <div class="input-field col s12 mypass">
                  <i class="fa fa-key prefix"></i>
                  <input id="confirm_password" type="password" class="validate" autocomplete="off">
                  <label for="confirm_password">Confirm Password</label>
                </div>
                <div class="loginfooter right">
                  <button onclick="signUp()" type="submit" class="btn btn-spacer waves-effect wave-dark blue darken-1 center-align">Sign Up</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--end of body area-->
    </div>
  </div>
  <!--  footer section-->  
  <div>      
    <?php include "../footer/footer.html";?>
  </div>
  <!--  end of footer section-->

  <!--  Scripts-->
  <script src="../js/jquery.js"></script>
  <script src="../js/materialize.min.js"></script>
  <script src="../js/script.js"></script>
  <script type="text/javascript">
   $(document).ready(function() {
     $(".button-collapse").sideNav();
    $('select').material_select();
  });
 </script>
</body>
</html>