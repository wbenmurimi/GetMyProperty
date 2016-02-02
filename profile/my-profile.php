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
      <a href="my-profile.php" class="active">My profile</a>
      
    </div>
  </div>
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="card">
      
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
   $('.modal-trigger').leanModal();
   $(".dropdown-button").dropdown();
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
 });
</script>
 </script>
</body>
</html>