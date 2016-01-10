<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="">
 <!--start of navbar-->
 <?php include "../header/header.html";?>
 <!-- end of navbar-->
 <!--  start of body division-->
 <div class="template-container">
  <div class="row">
    <div class="card">
    <div>
      <h4 class="center">Reset user password</h4>
      <ol>
        <li>Select if you want to get the reset code on email or phone</li>
        <li>Enter the registered email or registered phone number in the textbox </li>
        <li>Check for the verification code in your email inbox or messages</li>
        <li>Click on the<a href="verification-code.php"><span> Enter verification code</span></a> link to proceed to change your password</li>
      </ol>
     </div>
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
      <div class="verification-space">
        <a href="verification-code.php">
        <button type="submit" class="btn reset-btn-space waves-effect wave-dark teal lighten-2 center-align ">
        Enter verification code</button>
        </div>
        </a>
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

<script>

 $(document).ready(function(){
   // Activate the side menu 
   $(".button-collapse").sideNav();
   $('.modal-trigger').leanModal();
   $(".dropdown-button").dropdown();
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
 });
</script>
</body>
</html>