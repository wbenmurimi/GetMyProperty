<?php


require "../model/check.php";
if(!isset($_SESSION["longitude"])){

  $longitude="";
}
else{
  $longitude=$_SESSION["longitude"];
}


?>
<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <!-- <link rel="stylesheet" href="../css/materialize.css"> -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="backToPage1()">
<!-- backToPage1() -->
 <!--start of navbar-->
 <?php include "../header/header-login.html";?>
 <!-- end of navbar-->
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="index.php" class="active">Add property</a>
  </div>
</div>

<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="">
<div class="center" id="add_error">
  
</div>
      <ul class="collapsible " data-collapsible="accordion">

       <li>
        <div class="collapsible-header cheader">
          <i class="fa fa-plus-square prefix"></i>Property Features</div>
          <div class="collapsible-body">
            <div class="  input-field col s3 l3">
              <input name="24hr_radio" id="24hr_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="24hr_radio">24Hr security</label>
            </div>
            <div class="  input-field col l3 s3">
              <input name="cctv_radio" id="cctv_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="cctv_radio">CCTV</label>
            </div>
            <div class="  input-field col s3 l3">
              <input name="alarm_radio" id="alarm_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="alarm_radio">Alarm System</label>
            </div>
            <div class="  input-field col l3 s3">
              <input name="electric_radio" id="electric_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="electric_radio">Electric Fence</label>
            </div>
            <div class="  input-field col l3 s3">
              <input name="wall_radio" id="wall_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="wall_radio">Wall</label>
            </div>    
            <div class="  input-field col s3 l3">
              <input name="internet_radio" id="internet_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="internet_radio">Internet Access</label>
            </div>
            <div class="  input-field col l3 s3">
              <input name="pool_radio" id="pool_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="pool_radio">Swimming Pool</label>
            </div>
            <div class="  input-field col s3 l3">
              <input name="garden_radio" id="garden_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="garden_radio">Garden</label>
            </div>
            <div class="space_dropdown_d  input-field col l3 s3">
              <input name="water_radio" id="water_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="water_radio">Water storage</label>
            </div>
            <div class="space_dropdown_d  input-field col l3 s3">
              <input name="gym_radio" id="gym_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="gym_radio">Gym</label>
            </div>
            <div class="space_dropdown_d  input-field col l3 s3">
              <input name="disability_radio" id="disability_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="disability_radio">Disability access</label>
            </div> 
            <div class="space_dropdown_d  input-field col l3 s3">
              <input name="furnished_radio" id="furnished_radio" type="checkbox" class=" with-gap filled-in" >
              <label for="furnished_radio">Fully Furnished</label>
            </div>      
          </div>
        </li>
        <li>
         <div class="collapsible-header cheader"><i class="fa fa-tasks prefix"></i>Property Details</div>
         <div class="collapsible-body">

           <div class=" space_dropdown_d input-field col s3 l3">
            <input onclick="checkAddOption()" name="p_cat" id="house_radio" class="house_radio" type="radio" class=" with-gap" >
            <label for="house_radio">House</label>
          </div>
          <div class=" space_dropdown_d input-field col l3 s3">
            <input onclick="checkAddOption()" name="p_cat" id="land_radio" type="radio" class=" with-gap" >
            <label for="land_radio">Land</label>
          </div>
          <div class=" space_dropdown_d input-field col s3 l3">
            <input name="buy-rent" id="buy_radio" type="radio" class=" with-gap" >
            <label for="buy_radio">Sale</label>
          </div>
          <div class=" space_dropdown_d input-field col l3 s3">
            <input name="buy-rent" id="rent_radio" type="radio" class=" with-gap" >
            <label for="rent_radio">Rent</label>
          </div>
          <div class="house_div" id="house_div">
            <div class="input-field col l4 s6">
              <select class="Property_type" id="Property_type">
                <option value="Apartment">Apartment/Flat</option>
                <option value="Bedsitter">Bedsitter</option>
                <option value="House">House</option>
                <option value="Room">Rooom</option>
                <option value="Other">Other</option>
              </select>
              <label>Property type</label> 
            </div>
            <div class="input-field col l2 s6">
             <input id="price" type="text" class="validate" autocomplete="off">
             <label for="price">Price</label> 
           </div>
           <div class="input-field col l6 s12">
             <input id="description" type="text" class="validate" autocomplete="off">
             <label for="description">Decription</label> 
           </div> 

           <div class="input-field col l3 s6">
             <input id="bathroom" type="text" class="validate" autocomplete="off">
             <label for="bathroom">Bathroom</label> 
           </div>
           <div class="input-field col l3 s6">
             <input id="house_bedroom" type="text" class="validate" autocomplete="off">
             <label for="house_bedroom">Bedrroom</label> 
           </div>
           <div class="input-field col l3 s6">
             <input id="floors" type="text" class="validate" autocomplete="off">
             <label for="floors">Floors</label> 
           </div>
           <div class="input-field col l3 s6">
             <input id="parking" type="text" class="validate" autocomplete="off">
             <label for="parking">Parking pace</label> 
           </div> 
         </div>
         <div class="land_div" id="land_div">
          <div class="input-field col l3 s6">
           <input id="acre_size" type="text" class="validate" autocomplete="off">
           <label for="acre_size">Acres</label> 
         </div>
         <div class="input-field col l3 s6">
           <input id="lprice" type="text" class="validate" autocomplete="off">
           <label for="lprice">Price</label> 
         </div>
         <div class="input-field col l6 s12">
           <input id="ldescription" type="text" class="validate" autocomplete="off">
           <label for="ldescription">Decription</label> 
         </div>      
       </div>
     </div>
   </li>
   <li>
     <div class="collapsible-header active cheader"><i class="material-icons">place</i>Location</div>
     <div class="collapsible-body">
      <div class="input-field col l3 s6">
        <select id="Property_county" class="" onchange="loadSubCounty()" value=""></option>
          <script>
            var myArray = new Array('All','Baringo County','Bomet County','Bungoma County','Busia County','Elgeyo Marakwet County','Embu County','Garisa County','Homa Bay County','Isiolo County','Kajiando  County','Kakamega County','Kericho County','Kiambu County','Kirifi County','Kirinyaga County','Kisii County','Kiumu County','Kitui County','Kwale County','Laikipia County','Lamu County','Machako County','Makueni County','Mandera County','Marsabit County','Meru County','Migori County','Mombasa County','Muranga County','Nairobi County','Nakuru County','Nandi County','Narok County','Nyamira County','Nyandarua County','Nyeri County','Samburu County','Siaya County','Taita Taveta County','Tana River County','Tharaka Nithi County','Trans Zoia County','Turkana County','Uasin Gishu County','Vihiga County','Wajir County','West pokot County'
              );
            for(i=0; i<myArray.length; i++) {  
              document.write('<option value="' + myArray[i] +'">' + myArray[i] + '</option>');
            }

          </script>
        </select>
        <label>County</label> 
      </div>
      <div class="input-field col l3 s6" id="selectDiv">
        <select id="Property_sub_county" class="Property_sub_county">
          <option value="">sub county</option>
        </select>
        <label>Sub County</label> 
      </div>
      <div class="input-field col l3 s6">
        <input id="longitude" type="text" class="validate"  >
        <label for="longitude">Longitude</label> 
      </div>
      <div class="input-field col l3 s6">
       <input id="latitude" type="text" class="validate"  >
       <label for="latitude">Latitude</label> 
     </div>
     <div class="row">
      <div class="col s12">
        <h4 class="center text-color"><a href="#" title="Template" class="text-color">Select location of the property</a></h4>
        <div id="map"></div>        
      </div>
    </div>
  </div>
</li>


</ul>


<div class="right">
 <button onclick="page1Session()"  type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">next</button>
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
<script src="../js/county_add.js"></script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="../js/google-map.js"></script>
  <script>
   $(document).ready(function(){
    hide("land_div");
    showFirstName();
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
