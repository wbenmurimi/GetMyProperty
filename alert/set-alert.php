<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link rel="stylesheet" href="../plugin/countrycode/build/css/intlTelInput.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="loadCounty()">
 <!--start of navbar-->
 <?php include "../header/header.html";?>
 <!-- end of navbar-->
 <!--  start of body division-->
 <div class="template-container">
  <div class="row">
    <div class="card">
      <div class="center">
        <h5 >Sign up for Free Email and SMS Alerts</h5>
      </div>
      <div class="col l6 s12">
        <div class="input-field col l6 s12">
         <input name="alert_option" id="email_option_radio" type="radio" class="validate with-gap" autocomplete="off">
         <label for="email_option_radio">Email</label>
       </div>
       <div class="input-field col l6 s12">
         <input id="alert_email" type="email" class="validate" autocomplete="off">
         <label for="alert_email">Email </label> 
       </div>
       <div class="input-field col l6 s12">
        <input name="alert_option" id="phone_option_radio" type="radio" class="validate with-gap" autocomplete="off">
        <label for="phone_option_radio">Phone</label>
      </div>
      <div class="input-field col l6 s12">
        <input type="tel" id="demo" placeholder="" class="validate" autocomplete="off">
        <!-- <label for="demo">Phone number</label>  -->
      </div>
      <div class=" added-info col l12 s12">
        <span>NOTE: If lots of new properties that match your preferences are posted we'll send you one daily email with all of them listed for you to choose from. It's that easy!</span>
        <hr>
        <span>Our alerts last for one month before expiring. You can unsubscribe <a href="unsubscribe-alert.php">here</a> before the end of the month to stop the alerts.</span>
        <hr>
        <span>We will never charge you for subscribing to our alerts. To unsubscribe from our email or message alerts,<a href="unsubscribe-alert.php">please click here.</a></span>
      </div>
    </div>
    <div class="col l6 s12 ">
      <div class="col l12 s12">
        <div class=" space_dropdown_d input-field col s6 l6">
          <input name="type1" id="buy_radio" type="radio" class=" with-gap" >
          <label for="buy_radio">Buy</label>
        </div>
        <div class=" space_dropdown_d input-field col l6 s6">
          <input name="type1" id="rent_radio" type="radio" class=" with-gap" >
          <label for="rent_radio">Rent</label>
        </div>
      </div>
      <div class="">
        <div class="input-field col l6 s12">
          <select class="Property_type">
            <option value="Apartment">Apartment/Flat</option>
            <option value="Bedsitter">Bedsitter</option>
            <option value="House">House</option>
            <option value="Room">Rooom</option>
            <option value="Other">Other</option>
          </select>
          <label>Property type</label> 
        </div>
        <div class="input-field col l6 s12">
          <select class="Property_category">
            <option value="House">House</option>
            <option value="Land">Land</option>
          </select>
          <label>Category</label> 
        </div>
      </div>
      <div class="input-field col l6 s12">
        <select id="Property_county" class="disabled multiple " value="">county</option>
          <script>
        var myArray = new Array("1", "2", "3", "4", "5");
        for(i=0; i<myArray.length; i++) {  
            document.write('<option value="' + myArray[i] +'">' + myArray[i] + '</option>');
        }
        var e = document.getElementById("Property_county");

        var e2 = document.getElementById("Property_sub_county");
var strUser = e.options[e.selectedIndex].value;
if (strUser.localeCompare("1")==0) {
  alert("one");
};
    </script>
        </select>
        <label>County</label> 

      </div>
      <div class="input-field col l6 s12">
        <select id="Property_sub_county" class="Property_sub_county">
          <option value="">sub county</option>
        </select>
        <label>Sub County</label> 

      </div>

      <div class="input-field col l6 s6">
        <input id="price_from" type="text" class="validate" autocomplete="off">
        <label for="price_from">Price From</label> 
      </div>
      <div class="input-field col l6 s6">
       <input id="price_to" type="text" class="validate" autocomplete="off">
       <label for="price_to">Price To </label> 
     </div>

   </div> 
   <div class=" center verification-space">
    <button type="submit" onclick="saveAlert()" class="btn reset-btn-space waves-effect wave-dark teal lighten-2 center-align ">
      Save alert</button>
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
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
});

</script>
</body>
</html>