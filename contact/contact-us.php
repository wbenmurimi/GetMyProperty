<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
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
    echo $_SESSION['username'];
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
    <a href="contact-us.php" class="active">Contact us</a>
  </div>
</div>
<!-- end of navbar-->
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="col m6 s12 card">
    <ol class="leftSpace">
        <h4>Talk to us</h4>
        <li>Call +25463228524</li>
        <li>Office hours
          <ul>
            <li>Monday-Friday -8am-5pm</li>
            <li>Saturday -9am-3pm</li>
          </ul>
        </li>
      </ol>
    </div>
    <div class="col m6 s12 card">
      <h3 class="center-align">Contact Us</h3>
      <div class="row">
        <form class="col m12 s12">
          <div class="contactdiv">
            <div class="input-field col s12">
              <input id="fname" type="text">
              <label for="fname">First Name</label>
            </div>
            <div class="input-field col s12">
              <input id="lname" type="text">
              <label for="lname">Last Name</label>
            </div>
            <div class="input-field col s12">
              <input id="email" type="email" class="form-input">
              <label for="email">Sender Email</label>
            </div>
            <div class="input-field col s12">
              <textarea id="message" class="materialize-textarea"></textarea>
              <label for="message">Message</label>
            </div>
          </div>

          <div class="divider"></div>
          <div class="contactdivBtn">
            <div class="col m12">
             <p class="right-align"><button class="btn btn-large btnColor waves-effect waves-dark" type="button" name="action">Send Message</button></p>
           </div>
         </div>
       </form>
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
   // Activate the side menu 
   $(".button-collapse").sideNav();
   $('select').material_select();
   $('.modal-trigger').leanModal();
   $(".dropdown-button").dropdown();

 });

</script>
</body>
</html>