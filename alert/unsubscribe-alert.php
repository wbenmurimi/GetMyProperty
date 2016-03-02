
<?php require "../model/check.php";?>
<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link rel="stylesheet" href="../plugin/countrycode/build/css/intlTelInput.css">
   <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

</head>
<body onload="loadCounty()">
 <!--start of navbar-->
 <?php 
 if($_SESSION["username"]){
  include "../header/header-login.html";
}
 ?>
 <!-- end of navbar-->
 <!--  start of body division-->
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="reset-password.php" class="active">Reset password</a>
  </div>
</div>
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="searchAlertDiv" id="searchAlertDiv">
      <div class="card ">
        <div>
          <h4 class="center">Search alerts</h4>
          <ol>
            <li>Select if you want to search email or phone alerts</li>
            <li>Enter the subscribed email or subscribed phone number in the textbox </li>
          </ol>
        </div>
        <div class="input-field col s6 l6">
          <i class="fa fa-envelope prefix"></i>
          <input onclick="checkCheckedOption()" name="search-option" id="email_radio" type="radio" class="validate with-gap" autocomplete="off">
          <label for="email_radio">Email</label>
        </div>
        <div class="input-field col l6 s6">
          <i class="fa fa-phone prefix"></i>
          <input onclick="checkCheckedOption()" name="search-option" id="phone_radio" type="radio" class="validate with-gap" autocomplete="off">
          <label for="phone_radio">phone</label>
        </div>
        <div id="search-option-div" class="input-field col l12 s12">

        </div>
      </div>
    </div>
    <div class=" card listAlertsDiv" id="listAlertsDiv">
      <table id="jsontable" class="striped" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Category</th>
            <th>Sub County</th>
            <th>Buy/Rent</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Status</th>
          </tr>
        </thead>
        
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Category</th>
            <th>Sub County</th>
            <th>Buy/Rent</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Status</th>
          </tr>
        </tfoot>
      </table>
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
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/script.js"></script>
<script src="../js/county.js"></script>
<script src="../js/country-code.js"></script>
<script src="../plugin/countrycode/build/js/intlTelInput.js"></script>


<script>

 $(document).ready(function(){
 
   // Activate the side menu 
   $(".button-collapse").sideNav();
   $("#demo").intlTelInput();
   // Change the country selection
   $("#demo").intlTelInput("selectCountry", "ke");
// Insert a number, and update the selected flag accordingly.
// $("#demo").intlTelInput("setNumber", "+44 7733 123 456");
$('select').material_select();
$('.modal-trigger').leanModal();
$(".dropdown-button").dropdown();
  hide("listAlertsDiv");
  $('#jsontable').DataTable( {
    responsive: true
} );
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
});

</script>
</body>
</html>