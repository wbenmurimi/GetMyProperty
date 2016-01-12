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
      <div class="input-field col l6 s12">
        <select class="county">
          <option value="Private Seller">Private Seller</option>
          <option value="Agent">Agent</option>
        </select>
        <label>User type</label> 
      </div>
      <div class="input-field col l6 s12">
        <select class="sub-county">
          <option value="Private Seller">Private Seller</option>
          <option value="Agent">Agent</option>
        </select>
        <label>User type</label> 
      </div>
      <div class="input-field col l6 s12">
        <input id="verification_code" type="text" class="validate" autocomplete="off">
        <label for="verification_code">Verification code</label> 
      </div>
      <div class="input-field col l6 s12">
       <input id="new_password" type="text" class="validate" autocomplete="off">
       <label for="new_password">New Password</label> 
     </div>
     <div class="input-field col l6 s12">
      <input id="verification_code" type="text" class="validate" autocomplete="off">
      <label for="verification_code">Verification code</label> 
    </div>
    <div class="input-field col l6 s12">
     <input id="new_password" type="text" class="validate" autocomplete="off">
     <label for="new_password">New Password</label> 
   </div>
   <div class="input-field col l6 s12">
    <input id="verification_code" type="text" class="validate" autocomplete="off">
    <label for="verification_code">Verification code</label> 
  </div>
  <div class="input-field col l6 s12">
   <input id="new_password" type="text" class="validate" autocomplete="off">
   <label for="new_password">New Password</label> 
 </div>
 <div class="input-field col l6 s12">
  <input id="verification_code" type="text" class="validate" autocomplete="off">
  <label for="verification_code">Verification code</label> 
</div>
<div class="input-field col l6 s12">
 <input id="new_password" type="text" class="validate" autocomplete="off">
 <label for="new_password">New Password</label> 
</div>
<div class="input-field col l6 s12">
  <input id="verification_code" type="text" class="validate" autocomplete="off">
  <label for="verification_code">Verification code</label> 
</div>
<div class="input-field col l6 s12">
 <input id="new_password" type="text" class="validate" autocomplete="off">
 <label for="new_password">New Password</label> 
</div>
<div class="input-field col l6 s12">
  <input id="verification_code" type="text" class="validate" autocomplete="off">
  <label for="verification_code">Verification code</label> 
</div>
<div class="input-field col l6 s12">
 <input id="new_password" type="text" class="validate" autocomplete="off">
 <label for="new_password">New Password</label> 
</div>
<div class="right">
 <a href="property-plan.php"> <button  type="submit" class="btn nextfooter btn-spacer waves-effect wave-dark blue darken-1 center-align">next</button>
 </div>
</a>
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
<script src="''/js/script.js"></script>

<script>

 $(document).ready(function(){
   // Activate the side menu 
   $(".button-collapse").sideNav();
   $('select').material_select();
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