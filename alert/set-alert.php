<?php require "../model/check.php";?>

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
 if($_SESSION["username"]){
  include "../header/header-login.html";
}
?>
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="set-alert.php" class="active">Set Alert</a>
  </div>
</div>
 <!-- end of navbar-->
 <!--  start of body division-->
 <div class="template-container">
  <div class="row">
    <div class="card">
      <div class="center">
        <h5 >Subscribe for free Email and SMS Alerts</h5>
        <div class="error_div_alert center" id="error_div_alert">

        </div>
      </div>
      <div class="col l6 s12">
        <div class="input-field col l6 s12">
         <input onclick="" name="alert_option" id="email_option_radio" type="radio" class="validate with-gap" autocomplete="off">
         <label for="email_option_radio">Email</label>
       </div>
       
       <div class="input-field col l6 s12">
        <input  onclick="" name="alert_option" id="phone_option_radio" type="radio" class="validate with-gap" autocomplete="off">
        <label for="phone_option_radio">Phone</label>
      </div>
      <div id="alertOptionDiv" class="input-field col l12">

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
          <input name="type1" id="buy_radio_alert" type="radio" class=" with-gap" >
          <label for="buy_radio_alert">Sale</label>
        </div>
        <div class=" space_dropdown_d input-field col l6 s6">
          <input name="type1" id="rent_radio_alert" type="radio" class=" with-gap" >
          <label for="rent_radio_alert">Rent</label>
        </div>
      </div>

      <div class="input-field col l6 s12">
        <select id="Property_county" class="" onchange="loadSubCounty()" value=""></option>
          <script>
            var myArray = new Array('All','Baringo County','Bomet County','Bungoma County','Busia County','Elgeyo Marakwet County','Embu County','Garisa County','Homa Bay County','Isiolo County','Kajiando  County','Kakamega County','Kericho County','Kiambu County','Kirifi County','Kirinyaga County','Kisii County','Kiumu County','Kitui County','Kwale County','Laikipia County','Lamu County','Machako County','Makueni County','Mandera County','Marsabit County','Meru County','Migori County','Mombasa County','Muranga County','Nairobi County','Nakuru County','Nandi County','Narok County','Nyamira County','Nyandarua County','Nyeri County','Samburu County','Siaya County','Taita Taveta County','Tana River County','Tharaka Nithi County','Trans Zoia County','Turkana County','Uasin Gishu County','Vihiga County','Wajir County','West pokot County'
              );
            for(i=0; i<myArray.length; i++) {  
              document.write('<option value="' + myArray[i] +'">' + myArray[i] + '</option>');
            }

          </script>
        </select>
        <label><span class="requiredField">*</span>County</label> 
      </div>
      <div class="input-field col l6 s12" id="selectDiv">
        <select id="Property_sub_county" class="Property_sub_county_alert">
          <option value="">sub county</option>
        </select>
        <label><span class="requiredField">*</span>Sub County</label> 
      </div>
      <div class="input-field col l6 s12">
        <select onchange="changePropertyCategory()" class="Property_category" id="Property_category">
          <option value="House">House</option>
          <option value="Land">Land</option>
        </select>
        <label><span class="requiredField">*</span>Category</label> 
      </div>

      <div class="house_property_div" id="house_property_div">
        <div class="input-field col l6 s12">
          <select class="Property_type_alert" id="Property_type_alert">
            <option value="Apartment">Apartment/Flat</option>
            <option value="Bedsitter">Bedsitter</option>
            <option value="House">House</option>
            <option value="Room">Rooom</option>
            <option value="Other">Other</option>
          </select>
          <label><span class="requiredField">*</span>Property type</label> 
        </div>

        <div class="input-field col l6 s6">
          <input id="price_from_alert" type="text" class="validate" autocomplete="off">
          <label for="price_from_alert"><span class="requiredField">*</span>Price From</label> 
        </div>
        <div class="input-field col l6 s6">
         <input id="price_to_alert" type="text" class="validate" autocomplete="off">
         <label for="price_to_alert"><span class="requiredField">*</span>Price To </label> 
       </div>
       <div class="input-field col l6 s6">
        <input id="bedroom_alert" type="text" class="validate" autocomplete="off">
        <label for="bedroom_alert"><span class="requiredField">*</span>Bedroom</label> 
      </div>
      <div class="input-field col l6 s6">
       <input id="bathroom_alert" type="text" class="validate" autocomplete="off">
       <label for="bathroom_alert"><span class="requiredField">*</span>Bathroom</label> 
     </div>
   </div> 
   <div class="land_property_div" id="land_property_div">
     <div class="input-field col l6 s6">
      <input id="acre_alert" type="text" class="validate" autocomplete="off">
      <label for="acre_alert"><span class="requiredField">*</span>Acres</label> 
    </div>
    <div class="row col l12">
      <div class="input-field col l6 s6 left">
        <input id="land_price_from_alert" type="text" class="validate" autocomplete="off">
        <label for="land_price_from_alert"><span class="requiredField">*</span>Price From</label> 
      </div>
      <div class="input-field col l6 s6 right">
       <input id="land_price_to_alert" type="text" class="validate" autocomplete="off">
       <label for="land_price_to_alert"><span class="requiredField">*</span>Price To </label> 
     </div>
   </div>
 </div> 
 <div class=" center verification-space">
  <button type="submit" onclick="subscribeAlert()" class="btn btn-spacer reset-btn-space waves-effect wave-dark btnColor right ">
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
   hide("land_property_div");
   showFirstName();
   // Activate the side menu 
   $(".button-collapse").sideNav();
   $("#alert_phone").intlTelInput();
   // Change the country selection
   $("#alert_phone").intlTelInput("selectCountry", "ke");
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