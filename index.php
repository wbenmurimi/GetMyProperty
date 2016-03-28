<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="css/materialize.min.css">
  <!-- <link rel="stylesheet" href="css/materialize.css"> -->
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="">
 <!--start of navbar-->
 <?php
 session_start();
 if(isset($_SESSION["username"])){
   if($_SESSION["username"]){

    include "header/header-login-home.html";
  }
  else if(!$_SESSION["username"]){
    include "header/header-home.html";
  }
}
if(!isset($_SESSION["username"])){
  include "header/header-home.html";
}
?>
<!-- end of navbar-->
<!-- start of slider-->
<div class="slider">
  <ul class="slides">
    <li class="transbox">
      <img src="image/s4.jpg"> <!-- random image -->
      <div class="caption center-align ">
        <h3>We Got Your Back</h3>
        <h5 class="light grey-text text-lighten-3">For all real estate solutions</h5>
      </div>
    </li>
    <li class="transbox">
      <img src="image/s1.jpg"> <!-- random image -->
      <div class="caption left-align">
        <h3>Good Outdoor Space</h3>
        <h5 class="light grey-text text-lighten-3 ">We offer landscape services</h5>
      </div>
    </li>
    <li class="transbox">
      <img src="image/s2.jpg"> <!-- random image -->
      <div class="caption right-align">
        <h3>Elegant Houses</h3>
        <h5 class="light grey-text text-lighten-3">Contact our team for interior design and decoration</h5>
      </div>
    </li>
    <li class="transbox">
      <img src="image/s3.jpg"> <!-- random image -->
      <div class="caption center-align">
        <h3>Design</h3>
        <h5 class="light grey-text text-lighten-3">Contact our architectures</h5>
      </div>
    </li>
  </ul>
</div>
<!-- end of slider-->

<!--  start of body division-->
<div class="template-container">
  <div class="col l12 s12 top-search">
    <div class="row">
      <div class="">
       <div class="col l12 s12 search_banner"></div>
        <div id="residential" class="col s12 text-color ">
          <div class="input-field col s2 l2">
            <input onclick="checkIfResidentialSearchIsChecked()" name="residential_R" id="residential_buy_radio" type="radio" class="validate with-gap" autocomplete="off">
            <label for="residential_buy_radio">Sale</label>
          </div>
          <div class="input-field col l2 s2">
            <input onclick="checkIfResidentialSearchIsChecked()" name="residential_R" id="residential_rent_radio" type="radio" class="validate with-gap" autocomplete="off">
            <label for="residential_rent_radio">Rent</label>
          </div>
          <div class="input-field col l4 s6">
            <select class="Property_type mydrop">
              <option value="Apartment">Apartment/Flat</option>
              <option value="Bedsitter">Bedsitter</option>
              <option value="House">House</option>
              <option value="Room">Rooom</option>
              <option value="Other">Other</option>
            </select>
            <label>Property type</label> 
          </div>
          <div class="input-field col l4 s6">
            <select class="Property_category mydrop">
              <option value="House">House</option>
              <option value="Land">Land</option>
            </select>
            <label>Category</label> 
          </div>
          <div class="input-field col l3 s12">
            <select id="Property_county" class="mydrop" onchange="loadSubCounty()" value=""></option>
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
          <div class="input-field col l3 s12" id="selectDiv">
            <select id="Property_sub_county" class="Property_sub_county_alert">
              <option value="">sub county</option>
            </select>
            <label>Sub County</label> 
          </div>
          <div class="input-field col l2 s4">
            <input id="price_from" type="text" class="validate" autocomplete="off">
            <label for="price_from">Price From</label> 
          </div>
          <div class="input-field col l2 s4">
           <input id="price_to" type="text" class="validate" autocomplete="off">
           <label for="price_to">Price To </label> 
         </div>
         <div class=" col l2 s4">
          <button type="submit" onclick="searchProperty()" class="btn waves-effect btnColor center-align ">
            Search</button>
          </div>
        </div>       
      </div>
    </div>

    <div class="row col l12">
      <div class="col l3 " id="">
       <div class="card property-row">
        <div class=" col l12 ">
          <a href="search/property-detail.php"><img src="image/4.jpg" alt="" class=" responsive-img center"></a>
          <div class="bold_heading"><a href="search/property-detail.php" class="property-link"><span id="title_area" class="title_area">One bedroom house for rent in Nairobi, Hurligham</span></a> <span id="cost_area" class="cost_area right" >KES 20,000</span> </div>
          <div><span class="description_area">Located next to Argwings Khodek road</span> </div>
          <div><span class="bedroom">Bedroom <span id="bd_qty">1 </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">1</span> </span> </div>
          <div><span class="posted_on">26/01/2016 4:50pm</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div>
          <div><span class="p_location" onclick="" >Hurligham</span></div>
        </div>

      </div> 
    </div>   

    <div class="col l3" id="">
     <div class="card property-row">
      <div class=" col l12 ">
        <a href="search/property-detail.php"><img src="image/4.jpg" alt="" class="circle responsive-img center"></a>
        <div class="bold_heading"><a href="search/property-detail.php" class="property-link"><span id="title_area" class="title_area">One bedroom house for rent in Nairobi, Hurligham</span></a> <span id="cost_area" class="cost_area right" >KES 20,000</span> </div>
        <div><span class="description_area">Located next to Argwings Khodek road</span> </div>
        <div><span class="bedroom">Bedroom <span id="bd_qty">1 </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">1</span> </span> </div>
        <div><span class="posted_on">26/01/2016 4:50pm</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div>
        <div><span class="p_location" onclick="" >Hurligham</span></div>
      </div>  
    </div> 
  </div>         
  <div class="col l3 " id="">
    <div class="card property-row">
      <div class=" col l12 ">
        <a href="search/property-detail.php"><img src="image/4.jpg" alt="" class=" responsive-img center"></a>
        <div class="bold_heading"><a href="search/property-detail.php" class="property-link"><span id="title_area" class="title_area">One bedroom house for rent in Nairobi, Hurligham</span></a> <span id="cost_area" class="cost_area right" >KES 20,000</span> </div>
        <div><span class="description_area">Located next to Argwings Khodek road</span> </div>
        <div><span class="bedroom">Bedroom <span id="bd_qty">1 </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">1</span> </span> </div>
        <div><span class="posted_on">26/01/2016 4:50pm</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div>
        <div><span class="p_location" onclick="" >Hurligham</span></div>
      </div>

    </div>
  </div>
  <div class="col l3 " id="">
   <div class="card property-row">
    <div class=" col l12 ">
      <a href="search/property-detail.php"><img src="image/4.jpg" alt="" class="circle responsive-img center"></a>
      <div class="bold_heading"><a href="search/property-detail.php" class="property-link"><span id="title_area" class="title_area">One bedroom house for rent in Nairobi, Hurligham</span></a> <span id="cost_area" class="cost_area right" >KES 20,000</span> </div>
      <div><span class="description_area">Located next to Argwings Khodek road</span> </div>
      <div><span class="bedroom">Bedroom <span id="bd_qty">1 </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">1</span> </span> </div>
      <div><span class="posted_on">26/01/2016 4:50pm</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div>
      <div><span class="p_location" onclick="" >Hurligham</span></div>
    </div>
  </div>


</div>
</div>
<div class="row col l12" id="home_posts">
  <ol class="row col l12" id="home_posts_li">

  </ol>
</div>
</div>
<!--  end of body division-->
<!--  footer section-->        
<?php include "footer/footer.html";?>
<!--  end of footer section-->

<!--  Scripts-->
<script src="js/jquery.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/script.js"></script>
<script src="js/county.js"></script>

<script>

 $(document).ready(function(){
  getHomePosts();
  // showHomeFirstName();
   // Activate the side menu 
   $('select').material_select();
   $(".button-collapse").sideNav();
   $('.modal-trigger').leanModal();
   $(".dropdown-button").dropdown();
   $('.slider').slider({full_width: true});
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
   $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
      constrain_width: true, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      //alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
    );
 });
</script>
</body>
</html>