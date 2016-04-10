<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link rel="stylesheet" href="../plugin/countrycode/build/css/intlTelInput.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="">
 <!--start of navbar-->
 <?php 
 session_start();
 if(isset($_SESSION["username"])){
   if($_SESSION["username"]){
    include "../header/header-login.html";
  }
  else if(!$_SESSION["username"]){
    include "../header/header.html";
  }
}
if(!isset($_SESSION["username"])){
  include "../header/header.html";
}
?>
<div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="profile.php" class="active">My profile</a>
  </div>
</div>
<!-- end of navbar-->
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="col m4 s12 card ">
    <div class="center">
      <img src="../image/user_icon.jpg">
    </div>
    <h4 class="center-align">Statistics</h4>
      <ol class="center btn-spacer statsOl">
       <a href="../my property/index.php"> <li class="myStats">Total ads : <span class="stats" id="total_adds"> </span> </li></a>
        <br>
        <hr>
        <br>
        <a href="../alert/unsubscribe-alert.php"><li class="myStats">Total alerts : <span class="stats" id="total_alerts"></span></li></a>
      </ol>
    </div>
    <div class="col m8 s12 card">
      <h4 class="center-align">User Profile</h4>
      <div class="row">
        <div class="col l12">
          <div class=" white">
            <ul class="tabs color">
            <li class="tab col s3"><a class="active text-color"  href="#login">Profile Details</a></li>
              <li class="tab col s3"><a href="#signup">Acount Details</a></li>
            </ul>

            <div id="login" class="col s12 textcontainer ">
              <div class="login_error_area center" id="login_error_area">

              </div>
              <div class="input-field col s12 mypass">
                <i class="fa fa-key prefix"></i>
                <input id="current_password" type="password" class="validate" autocomplete="off">
                <label for="current_password"> Current Password</label>
              </div>
              <div class="input-field col s12 mypass">
                <i class="fa fa-key prefix"></i>
                <input id="new_password" type="password" class="validate" autocomplete="off">
                <label for="new_password">New Password</label>
              </div>

              <div class="input-field col s12 mypass">
                <i class="fa fa-key prefix"></i>
                <input id="confirm_password" type="password" class="validate" autocomplete="off">
                <label for="confirm_password">Confirm Password</label>
              </div>
              <div class="loginfooter right">
                <button onclick="resetProfileUserPassword()" type="submit" class="btn btn-spacer waves-effect btnColor center-align">Update Password</button>
              </div>

            </div>
            <div id="signup" class="col s12 textcontainer">
              <div class="serror_area center" id="serror_area">
              </div>

<div class="input-field col s12">
                <i class="fa fa-user prefix"></i>
                <input id="fname" type="text" class="validate" >
                <label for="fname">Firstname</label>
              </div>
              <div class="input-field col s12">
                <i class="fa fa-user prefix"></i>
                <input id="lname" type="text" class="validate" >
                <label for="lname">Lastname</label>
              </div>
              <div class="input-field col s12">
                <i class="fa fa-user prefix"></i>
                <input id="gender" type="text" class="validate" >
                <label for="gender">Gender</label>
              </div>
              <div class="input-field col s12">
                <i class="fa fa-user prefix"></i>
                <input id="dob" type="text" class="validate" >
                <label for="dob">Date of Birth</label>
              </div>
              <div class="input-field col s12">
                <i class="fa fa-user prefix"></i>
                <input id="username" type="text" class="validate" readonly>
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
              <div class="input-field col s12">
                <i class="fa fa-user-secret prefix"></i>
                <input id="usertype" type="text" class="validate" readonly >
                <label for="usertype">User type</label>
              </div>
              <div class="input-field col s12">
                <i class="fa fa-user prefix"></i>
                <input id="userstatus" type="text" class="validate" readonly >
                <label for="userstatus">User status</label>
              </div>
              <div class="input-field col s12">
                <i class="fa fa-calendar prefix"></i>
                <input id="created" type="text" class="validate"  readonly >
                <label for="created">Created on</label>
              </div>
              <div class="loginfooter right">
                <button onclick="saveProfile()" type="submit" class="btn btn-spacer waves-effect btnColor center-align">Update Profile</button>
              </div>
            </div>
          </div>
        </div>
      </div>
   </div>
 </div>
</div>
<!--  end of body division-->
<!--  footer section-->        
<?php include "../footer/footer.html";?>
<!--  end of footer section-->

<!--  Scripts-->
<script src="../js/jquery.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="../js/script.js"></script>
<script src="../plugin/countrycode/build/js/intlTelInput.js"></script>

<script>

 $(document).ready(function(){
  showFirstName();
  getUserDetails();
  getCountOfUserPosts();
  getCountOfUserAlerts();
   // Activate the side menu 
   $(".button-collapse").sideNav();
   $('select').material_select();
   $('.modal-trigger').leanModal();
   $(".dropdown-button").dropdown();

 });

</script>
</body>
</html>