<?php include "../model/check.php";?>
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
 <?php include "../header/header-login.html";?>
 <!-- end of navbar-->
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="index.php">Add property</a>
    <a href="property-plan.php" class="active">Property plan</a>
  </div>
</div>
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="card">
      <h3 class="center">Choose your prefered plan</h3>
      <a href="free-plan.php">
        <div class="col l6 s12">
          <div class="card packagePlan">
            <h4 class="center">FREE</h4>
            <ul class=" free-plan ">
              <li>The property is listed on the site for two months</li>
              <hr>
              <li>Upload a maximum of 4 pictures</li>
              <hr>
              <li>Your property is listed normally</li>
              <hr>
              <li>Your property get less views compared to the featured plan</li>
            </ul>
          </div>
        </div>
      </a>
      <a href="featured-plan.php"> 
        <div class="col l6 s12">
         <div class="card packagePlan">
          <h4 class="center">FEATURED</h4>
          <h4 class="center">200 KES</h4>
          <ul class="">
            <li>The property is listed on the site for Three months</li>
            <hr>
            <li>Upload a maximum of 6 pictures</li>
            <hr>
            <li>Your property is ranked at the top during searches</li>
            <hr>
            <li>Your property get more views than on the free plan</li>
          </ul>
        </div>

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
<script src="../js/script.js"></script>

<script>

 $(document).ready(function(){
  showFirstName();
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