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
    <a href="index.php" class="active">Add property</a>
  </div>
</div>
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="card">


      <ul class="collapsible" data-collapsible="expandable">
           <li>
            <div class="collapsible-header active"><i class="material-icons">place</i>Location</div>
            <div class="collapsible-body">
              <div class="input-field col l6 s12">
                <select id="Property_county" class="disabled multiple " value="">county</option>
                  <script>
                    var myArray = new Array('Baringo County','Bomet County','Bungoma County','Busia County','Elgeyo Marakwet County','Embu County','Garisa County','Homa Bay County','Isiolo County','Kajiando  County','Kakamega County','Kericho County','Kiambu County','Kirifi County','Kirinyaga County','Kiii County','Kiumu County','Kitui County','Kwale County','Laikipia County','Lamu County','Machako County','Makueni County','Mandera County','Marsabit County','Meru County','Migori County','Mombasa County','Muranga County','Nairobi County','Nakuru County','Nandi County','Narok County','Nyamira County','Nyandarua County','Nyeri County','Samburu County','Siaya County','Taita Taveta County','Tana River County','Tharaka Nithi County','Trans Zoia County','Turkana County','Uasin Gishu County','Vihiga County','Wajir County','West pokot County'
                      );
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
              <div class="row">
                <div class="col s12">
                  <h4><a href="#" title="Template">Select location of the property</a></h>
                    <div id="map"></div>
                    Location:<br>
                    <div class="input-field col l6 s12">
                      <input id="longitude" type="text" class="validate" >
                      <!-- <label for="longitude">Longitude</label>  -->
                    </div>
                    <div class="input-field col l6 s12">
                     <input id="latitude" type="text" class="validate">
                     <!-- <label for="latitude">Latitude</label>  -->
                   </div>
                 </div>
               </div>
             </div>
           </li>
           <li>
           <div class="collapsible-header active"><i class="material-icons">filter_drama</i>Property Details</div>
           <div class="collapsible-body">
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
             <input id="description" type="text" class="validate" autocomplete="off">
             <label for="description">Decription</label> 
           </div>
           <div class=" space_dropdown_d input-field col s3 l3">
            <input name="type1" id="house_radio" type="radio" class=" with-gap" >
            <label for="house_radio">House</label>
          </div>
          <div class=" space_dropdown_d input-field col l3 s3">
            <input name="type1" id="land_radio" type="radio" class=" with-gap" >
            <label for="land_radio">Land</label>
          </div>
          <div class=" space_dropdown_d input-field col s3 l3">
            <input name="type2" id="buy_radio" type="radio" class=" with-gap" >
            <label for="buy_radio">Buy</label>
          </div>
          <div class=" space_dropdown_d input-field col l3 s3">
            <input name="type2" id="rent_radio" type="radio" class=" with-gap" >
            <label for="rent_radio">Rent</label>
          </div>
          <div class="input-field col l4 s4">
           <input id="price" type="text" class="validate" autocomplete="off">
           <label for="price">Price</label> 
         </div>
         <div class="input-field col l4 s4">
           <input id="bathroom" type="text" class="validate" autocomplete="off">
           <label for="bathroom">Bathroom</label> 
         </div>
         <div class="input-field col l4 s4">
           <input id="bedroom" type="text" class="validate" autocomplete="off">
           <label for="bedroom">Bedrroom</label> 
         </div>
         <div class="input-field col l4 s4">
           <input id="floors" type="text" class="validate" autocomplete="off">
           <label for="floors">Floors</label> 
         </div>
         <div class="input-field col l4 s4">
           <input id="parking" type="text" class="validate" autocomplete="off">
           <label for="parking">Parking pace</label> 
         </div>
       </div>
     </li>
     <li>
      <div class="collapsible-header"><i class="material-icons">place</i>Property Features</div>
      <div class="collapsible-body">
        <div class=" space_dropdown_d input-field col s3 l3">
          <input name="type1" id="24hr_radio" type="radio" class=" with-gap" >
          <label for="24hr_radio">24Hr security</label>
        </div>
        <div class=" space_dropdown_d input-field col l3 s3">
          <input name="type1" id="cctv_radio" type="radio" class=" with-gap" >
          <label for="cctv_radio">CCTV</label>
        </div>
        <div class=" space_dropdown_d input-field col s3 l3">
          <input name="type2" id="alarm_radio" type="radio" class=" with-gap" >
          <label for="alarm_radio">Alarm System</label>
        </div>
        <div class=" space_dropdown_d input-field col l3 s3">
          <input name="type2" id="electric_radio" type="radio" class=" with-gap" >
          <label for="electric_radio">Electric Fence</label>
        </div>
        <div class=" space_dropdown_d input-field col l3 s3">
          <input name="type2" id="wall_radio" type="radio" class=" with-gap" >
          <label for="wall_radio">Wall</label>
        </div>
        <div class=" space_dropdown_d input-field col s3 l3">
          <input name="type1" id="house_radio" type="radio" class=" with-gap" >
          <label for="house_radio">House</label>
        </div>
        <div class=" space_dropdown_d input-field col l3 s3">
          <input name="type1" id="land_radio" type="radio" class=" with-gap" >
          <label for="land_radio">Land</label>
        </div>
        <div class=" space_dropdown_d input-field col s3 l3">
          <input name="type2" id="buy_radio" type="radio" class=" with-gap" >
          <label for="buy_radio">Buy</label>
        </div>
        <div class=" space_dropdown_d input-field col l3 s3">
          <input name="type2" id="rent_radio" type="radio" class=" with-gap" >
          <label for="rent_radio">Rent</label>
        </div>
        <hr>
        <h5>Amenities</h5>
        <div class=" space_dropdown_d input-field col s3 l3">
          <input name="type2" id="internet_radio" type="radio" class=" with-gap" >
          <label for="internet_radio">Internet Access</label>
        </div>
        <div class=" space_dropdown_d input-field col l3 s3">
          <input name="type2" id="pool_radio" type="radio" class=" with-gap" >
          <label for="pool_radio">Swimming Pool</label>
        </div>
        <div class=" space_dropdown_d input-field col s3 l3">
          <input name="type2" id="garden_radio" type="radio" class=" with-gap" >
          <label for="garden_radio">Garden</label>
        </div>
        <div class=" space_dropdown_d input-field col l3 s3">
          <input name="type2" id="water_radio" type="radio" class=" with-gap" >
          <label for="water_radio">Water storage</label>
        </div>
        <div class=" space_dropdown_d input-field col l3 s3">
          <input name="type2" id="gym_radio" type="radio" class=" with-gap" >
          <label for="gym_radio">Gym</label>
        </div>
      </div>
    </li>

  </ul>

  


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
<script src="../js/script.js"></script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="../js/google-map.js"></script>
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