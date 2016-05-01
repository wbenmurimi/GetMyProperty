<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <!--start of navbar-->
  <div>
   <?php include "../header/header.html";?>
 </div>
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="index.php" class="active">Login</a>
  </div>
</div>
<!-- end of navbar-->
<!--Start of body area-->

<div class="template-container">
  <div class="row">
    <div class="login_div" id="login_div">
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
              <ol class="leftSpace">
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
            <ul class="tabs color">
              <li class="tab col s3" class="white-text"><a class="active " class="white-text" href="#login">Login</a></li>
              <li class="tab col s3"><a href="#signup" class="white-text"><span class="white-text">Sign up</span></a></li>
            </ul>

            <div id="login" class="col s12 textcontainer ">
              <div class="login_error_area center" id="login_error_area">

              </div>
              <div class="input-field col s12">
                <i class="fa fa-user prefix"></i>
                <input id="login_username" type="text" class="validate" autocomplete="off" required>
                <label for="login_username">Username</label>
              </div>
              <div class="input-field col s12 mypass">
                <i class="fa fa-key prefix"></i>
                <input id="login_password" type="password" class="validate" autocomplete="off" required>
                <label for="login_password">Password</label>
              </div>
              <div class="left">
                <a href="#" onclick="hide('login_div','verification_code_div'); show('reset_pass_div')">
                  <span class="forget-pass" >Forgot password</span></a>
                </div>
                <div class="loginfooter right">
                  <button onclick="Login()" type="submit" class=" btn btn-spacer waves-effect wave-dark loginbtn btnColor center-align">Log In</button>

                </div>
              </div>
              <div id="signup" class="col s12 textcontainer">
                <div class="serror_area center" id="serror_area">
                </div>

                <div class="input-field col s12">
                  <i class="fa fa-user prefix"> <span class="requiredField">*</span></i>
                  <input id="fname" type="text" class="validate" autocomplete="off" required>
                  <label for="fname">First name</label>
                </div>
                <div class="input-field col s12">
                  <i class="fa fa-user prefix"><span class="requiredField">*</span></i>
                  <input id="lname" type="text" class="validate" autocomplete="off" required>
                  <label for="lname">Last name</label>
                </div>
                <div class="input-field col s12">
                  <i class="fa fa-venus prefix"><span class="requiredField">*</span></i>
                  <select class="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <label>User type</label> 

                </div>
                <div class="input-field col s12">
                  <i class="fa fa-calendar prefix"><span class="requiredField">*</span></i>
                  <input id="dob" type="date" class="datepicker" autocomplete="off" required>
                  <label for="dob">Date of Birth</label>
                </div>
                <div class="input-field col s12">
                  <i class="fa fa-user prefix"><span class="requiredField">*</span></i>
                  <input id="username" type="text" class="validate" autocomplete="off" required>
                  <label for="username">Username</label>
                </div>
                <div class="input-field col s12">
                  <i class="fa fa-envelope prefix"></i>
                  <input id="email" type="email" class="validate" autocomplete="off" >
                  <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                  <i class="fa fa-phone prefix"><span class="requiredField">*</span></i>
                  <input id="phone" type="tel" class="validate" autocomplete="off" required>
                  <label for="phone">Phone</label>
                </div>
                
                <div class="input-field col s12 mypass">
                  <i class="fa fa-key prefix"><span class="requiredField">*</span></i>
                  <input id="password" type="password" class="validate" autocomplete="off" required>
                  <label for="password">Password</label>
                </div>
                <div class="input-field col s12 mypass">
                  <i class="fa fa-key prefix"><span class="requiredField">*</span></i>
                  <input id="confirm_password" type="password" class="validate" autocomplete="off" required>
                  <label for="confirm_password">Confirm Password</label>
                </div>
                <div class="loginfooter right">
                  <button onclick="addUser()" type="submit" class="btn btn-spacer waves-effect btnColor center-align">Sign Up</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>  
    <div class="reset_pass_div" id="reset_pass_div">
      <div class="card">

        <h4 class="center">Reset user password</h4>
        <div class="error_div_reset center" id="error_div_reset">

        </div>
        <div class="row">
          <div class="col l8 s8">
            <ol lass="leftSpace">
              <li>Select if you want to get the reset code on email or phone</li>
              <li>Enter the registered email or registered phone number in the textbox </li>
              <li>Check for the verification code in your email inbox or messages</li>
              <li>Click on the<a href="verification-code.php"><span> Enter verification code</span></a> link to proceed to change your password</li>
            </ol>

            <div class="input-field col s6 l6">
              <i class="fa fa-envelope prefix"></i>
              <input onclick="checkIfChecked()" name="reset" id="email_radio" type="radio" class="validate with-gap" autocomplete="off">
              <label for="email_radio">Email</label>
            </div>
            <div class="input-field col l6 s6">
              <i class="fa fa-phone prefix"></i>
              <input onclick="checkIfChecked()" name="reset" id="phone_radio" type="radio" class="validate with-gap" autocomplete="off">
              <label for="phone_radio">phone</label>
            </div>
            <div id="send-option" class="input-field col l12 s12">

            </div>
          </div>
          <div class="col l4 s4">
            <div class="verification-space">
              <button type="submit" onclick="hide('login_div','reset_pass_div'); show('verification_code_div')" class="btn reset-btn-space waves-effect wave-dark btnColor center-align ">
                Enter verification code</button>

              </div>
            </div>
          </div>
        </div> 
      </div>
      <div class="verification_code_div" id="verification_code_div">
        <div class="card">
          <div>
           <h4 class="center">Enter new user password</h4>
           <div class="error_div_new center" id="error_div_new">

           </div>
         </div>
         <div>
          <div class="input-field col l6 s12">
            <i class="fa fa-cube prefix"></i>
            <input id="verification_code" type="text" class="validate" autocomplete="off">
            <label for="verification_code">Verification code</label> 
          </div>
          <div class="input-field col l6 s12">
           <i class="fa fa-key prefix"></i>
           <input id="new_password" type="password" class="validate" autocomplete="off">
           <label for="new_password">New Password</label> 
         </div>
         <div class="input-field col l6 s12">
           <i class="fa fa-key prefix"></i>
           <input id="confirm_new_password" type="password" class="validate" autocomplete="off">
           <label for="confirm_new_password">Confirm password</label> 
         </div>
         <div class="col l6 m6 s12"> 
           <button onclick="resetUserPassword()" type="submit" class="btn save-new-btn-space waves-effect wave-dark btnColor center-align ">
             Save new password</button>
           </div>
         </div>
       </div>
     </div> 
   </div>
 </div>
 <!--end of body area-->
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
   hide("reset_pass_div","verification_code_div");
   $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
      })
 });
</script>
</body>
</html>