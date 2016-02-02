<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="">
 <!--start of navbar-->
 <?php include "../header/header.html";?>
 <!-- end of navbar-->
 <div class="blue lighten-1 col s12 l12">
    <div class="breadcrumb flat ">
      <a href="../index.php" class="">Home</a>
      <a href="verification-code.php" class="active">Password Change</a>
    </div>
  </div>
 <!--  start of body division-->
 <div class="template-container">
  <div class="row">
    <div class="card">
    <div>
       <h4 class="center">Enter new user password</h4>
    </div>
      <div>
        <div class="input-field col l6 s12">
        <i class="fa fa-cube prefix"></i>
          <input id="verification_code" type="text" class="validate" autocomplete="off">
          <label for="verification_code">Verification code</label> 
        </div>
        <div class="input-field col l6 s12">
         <i class="fa fa-key prefix"></i>
         <input id="new_password" type="text" class="validate" autocomplete="off">
         <label for="new_password">New Password</label> 
       </div>
       <div class="input-field col l6 s12">
         <i class="fa fa-key prefix"></i>
         <input id="confirm_password" type="text" class="validate" autocomplete="off">
         <label for="confirm_password">Confirm password</label> 
       </div>
       <div class="col l6 m6 s12"> 
         <button onclick="resetUserPassword()" type="submit" class="btn save-new-btn-space waves-effect wave-dark blue darken-1 center-align ">
           Save new password</button>
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