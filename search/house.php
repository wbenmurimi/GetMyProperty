<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <!-- <link rel="stylesheet" href="../css/materialize.css"> -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/highslide.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../plugin/countrycode/build/css/intlTelInput.css">
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="">
 <!--start of navbar-->
 <?php 
 session_start();
 if(isset($_SESSION["username"])){
   if($_SESSION["username"]){

    include "../header/header-login.html";
  }
  else if(!$_SESSION["username"]){
    include "../header/header.html";
  }
}
if(!isset($_SESSION["username"])){
  include "../header/header.html";
}
?>
<div id="myPropertyDiv">
  <div class="mybreadcrumb col s12 l12">
    <div class="breadcrumb flat ">
      <a href="../index.php" class="">Home</a>
      <a href="house.php" class="active">Houses</a>
    </div>
  </div>
  <!-- end of navbar-->
  <!--  start of body division-->
  <div class="template-container">
    <div class="col l12 s12 top-search">
      <div class="row">
        <div class="card">
          <div class="row  ">
           <div class="col l4 s12 search-result-view">
                <span class=""><i class="fa fa-hourglass-end prefix"></i><span id="num_results"></span> Results <span> Page </span><span id="showing"></span><span> of </span><span id="num_pgs"></span></span>
              </div>
              <div class="col l4 s12 center search-result-view">
                <center>
                  <span id="no-results"></span>
                </center>
              </div>
              <div class="col l4 s12 right">
                <div class="input-field col l12 s12 right ">
                  <select id="search-dropdown" class="search-dropdown">
                    <option value="date_posted">Date posted</option>
                    <option value="asceding">Price (Low to High)</option>
                    <option value="desceding">Price (High to Low)</option>
                    <option value="county">County</option>
                  </select>
                  <label>Sort by</label> 
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col l3 ">
             <h5 class="center">Refine search</h5>

             <div id="residential" class="col s12 ">
              <div class="input-field col s6 l6">
                <input onclick="" name="property_option" id="buy_radio" type="radio" class="validate with-gap" autocomplete="off">
                <label for="buy_radio">Sale</label>
              </div>
              <div class="input-field col l6 s6">
                <input onclick="" name="property_option" id="rent_radio" type="radio" class="validate with-gap" autocomplete="off">
                <label for="rent_radio">Rent</label>
              </div>
              <div class="input-field col l12 s12 Property_type_search">
                <select class="Property_type" id="Property_type">
                  <option value="All">All</option>
                  <option value="Apartment">Apartment/Flat</option>
                  <option value="Bedsitter">Bedsitter</option>
                  <option value="House">House</option>
                  <option value="Room">Rooom</option>
                  <option value="Other">Other</option>
                </select>
                <label>Property type</label> 
              </div>
              <div class="input-field col l12 s12">
                <select class="Property_category" id="Property_category">
                  <option value="House">House</option>
                  <option value="Land">Land</option>
                </select>
                <label>Category</label> 
              </div>
              <div class="input-field col l12 s12">
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
              <div class="input-field col l12 s12" id="selectDiv">
                <select id="Property_sub_county" class="Property_sub_county_alert">
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
             <div class="center col l12 s12 side-search-btn">
              <button type="submit" onclick="searchFolderProperty_Refined()" class="btn reset-btn waves-effect btnColor center-align col l12 s12">
                Search</button>
              </div>
            </div>

          </div>
          <div class="col l9 search_post_area" id="search_post_area">                  
            <ol class="" id="search_posts_li">

            </ol>

          </div>
        </div>
          <div class="row center">
            <div class="col  myPagination   center black-text" >
             <ul class="pagination center" id="pagen">


             </ul>
           </div>
         </div>
      </div>
    </div>
  </div>
</div>
</div>

<div id="pDetailsDiv">

  <div class="mybreadcrumb col s12 l12">
    <div class="breadcrumb flat ">
      <a href="../index.php" class="">Home</a>
      <a href="house.php" class="">Houses</a>
      <a href="index.php" class="active">property details</a>
    </div>
  </div>
  <!-- end of navbar-->
  <!--  start of body division-->
  <div class="template-container">
    <div class="col l12 s12 top-search">
      <div class="row">
        <div class="card">
          <div class="row">
            <div class="col l8 card search_post_area" id="search_post_area">
              <div class=" single-property-div">
                <div id="headerDiv">

                </div>
                <div id="image_div">

                  <div class="highslide-gallery" >
                   <div class="image_1_div col l6 s12" id="appendImage1">

                   </div> 
                   <div class="image_1_div col l6 s12" id="appendImage2">

                   </div> 
                   <div class="image_1_div col l6 s12" id="appendImage3">

                   </div> 
                   <div class="image_1_div col l6 s12" id="appendImage4">

                   </div> 
                   <div class="image_1_div col l6 s12" id="appendImage5">

                   </div> 
                   <div class="image_1_div col l6 s12" id="appendImage6">

                   </div> 

                 </div>
               </div>
               <br>
               <div class="detail_div col l12 s12">

                 <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header bold">General details</div>
                    <div class="collapsible-body">
                      <span class="span-hover" class="span-padding">Decription <span class="right span-p" id="desc"></span></span><hr>
                      <span class="span-hover" class="span-padding">Property for <span class="right span-p" id="buyrent"></span></span> <hr>                 
                      <span class="span-hover" class="span-padding">Property type <span class="right span-p" id="type"></span></span><hr>
                      <span class="span-hover" class="span-padding">Bedroom <span class="right span-p" id="bed"></span></span><hr>
                      <span class="span-hover" class="span-padding">Bathroom <span class="right span-p" id="bath"></span></span><hr>
                      <span class="span-hover" class="span-padding">Floors<span class="right span-p" id="floor"></span> </span><hr>
                      <span class="span-hover" class="span-padding">Parking<span class="right span-p" id="parking">5</span> </span><hr>
                      <span class="span-hover" class="span-padding">Description <span class="right span-p" id="ldesc"></span></span><hr>
                      <span class="span-hover" class="span-padding">Property for <span class="right span-p" id="lbuyrent"></span></span><hr>
                      <span class="span-hover" class="span-padding">Property type <span class="right span-p" id="ltype"></span></span><hr>
                      <span class="span-hover" class="span-padding">Acres<span class="right span-p" id="acre"></span> </span>
                      <hr>
                    </div>
                  </li>

                  <li>
                    <div class="collapsible-header bold">Security</div>
                    <div class="collapsible-body">
                     <span class="span-hover"> <span class="span-padding" id="">24 Hr security </span><span class="right span-p" id="24"> </span></span>
                     <hr>
                     <span class="span-hover" > <span class="span-padding" id="">CCTV Camera</span> <span class="right span-p" id="cctv"> </span></span>
                     <hr>
                     <span class="span-hover"> <span class="span-padding" id="">Alarm System</span> <span class="right span-p" id="alarm"> </span></span>
                     <hr>
                     <span class="span-hover"> <span class="span-padding" id="">Electric Fence</span> <span class="right span-p" id="electric">  </span></span>
                     <hr>
                     <span class="span-hover"> <span class="span-padding" id="">Watch Dog</span><span class="right span-p" id="watchdog"> </span></span>
                     <hr>
                     <span class="span-hover"> <span> <span class="span-padding" id="">Wall</span><span class="right span-p" id="wall"></span></span>
                     <hr>
                   </div>
                 </li>
                 <li>
                  <div class="collapsible-header bold">Amenities</div>
                  <div class="collapsible-body">
                    <span class="span-hover" id=""><span class="span-padding">Gym </span> <span class="right span-p" id="gym"></span></span>
                    <hr>
                    <span class="span-hover"><span class="span-padding" id="">Water storage</span> <span class="right span-p" id="water"></span></span>
                    <hr>
                    <span class="span-hover"><span class="span-padding" id="">Swimming Pool </span><span class="right span-p" id="pool"> </span></span>

                    <hr>
                    <span class="span-hover"> <span class="span-padding" id="">Garden<span> </span class="right span-padding" id="garden"></span></span>
                    <hr>
                    <span class="span-hover"> <span class="span-padding" id="">Internet Access</span><span class="right span-p" id="internet">  </span></span>
                    <hr>
                    <span class="span-hover"> <span class="span-padding" id="">Disability Access</span><span class="right span-p" id="disability"> </span></span>
                    <hr>
                    <span class="span-hover"> <span class="span-padding" id="">Fully Furnished</span><span class="right span-p" id="furnish"> </span></span>
                    <hr>
                  </div>
                </li>
              </ul>
            </div>
          </div>       
        </div>
        <div class="col l4 12 card">
          <div class="single_property_bold_heading_msg center">
           <span class="" >Contact Seller</span>
         </div>
         <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header"><i class="fa fa-user prefix"></i>Name</div>
            <div class="collapsible-body"><p class="contact-space" id="uname"></p></div>
          </li>
          <li>
            <div class="collapsible-header"><i class="fa fa-phone prefix"></i>Contact Number</div>
            <div class="collapsible-body"><p class="contact-space" id="contact-space-phone"></p></div>
          </li>
          <li>
            <div class="collapsible-header"><i class="fa fa-envelope prefix"></i>Email Address</div>
            <div class="collapsible-body"><p class="contact-space" id="contact-space-email"></p></div>
          </li>
          <li>
            <div class="collapsible-header"><i class="fa fa-close prefix"></i>Report Add</div>
            <div class="collapsible-body">
              <p class="contact-space">Report this post to the administrator</p>
             <div id="appendBtn">
                
              </div>
            </div>
          </li>
        </ul>
        <div class="input-field col s12 l12 sendEmaildiv">
          <input onclick="buyerMessageOption()" name="buyer" id="buyer_email_radio" type="radio" class="validate with-gap" autocomplete="off">
          <label for="buyer_email_radio">Send Email to Seller</label>
        </div>

        <div id="send-buyer-email" class="col l12 s12">
          <div class="input-field col l12 s12">
            <input id="sending_buyer_name" type="text" class="validate" autocomplete="off">
            <label for="sending_buyer_name">Your Name *</label>
          </div>
          <div class="input-field col l12 s12">
            <input type="tel" id="demo2" placeholder="" class="validate" length="9"autocomplete="off"> 
          </div>
          <div class="input-field col l12 s12">
            <input id="sending_buyer_email" type="email" class="validate" autocomplete="off">
            <label for="sending_email">Your Email *</label>
          </div>
          <div class="input-field col l12 s12">
            <input id="sending_buyer_mesage" type="text" class="validate materialize-textarea"  autocomplete="off">
            <label for="sending_buyer_mesage">Mesage *</label>
          </div>
          <div class="col l12 m12 s12 bottom-space">
           <button onclick="sendSellerEmail()" type="submit" class="btn reset-btn-space waves-effect wave-dark blue darken-1 center-align col l12 s12">Send Email</button>
         </div>

       </div>
     </div>
   </div>
   <div class="s-property center">similar Properties</div>
   <div class=" col l12 12  similar-property" id="similar-property">
    <div class="col l12 search_post_area2" id="search_post_area2">                  
    <ol class="" id="search_posts_li2">

    </ol>

  </div>

</div>
</div>
</div>
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

<script src="../js/county.js"></script>
<script src="../js/highslide-full.js"></script>
<script src="../js/country-code.js"></script>
<script src="../plugin/countrycode/build/js/intlTelInput.js"></script>

<script>

 $(document).ready(function(){
  
  getAllPostsAllHouse();
  showFirstName();
  hide("pDetailsDiv");
 
   // Activate the side menu 
   hs.graphicsDir = '../css/graphics/';
   hs.align = 'center';
   hs.transitions = ['expand', 'crossfade'];
   hs.outlineType = 'rounded-white';
   hs.fadeInOut = true;
   hs.dimmingOpacity = 0.75;

  // define the restraining box
  hs.useBox = true;
  hs.width = 640;
  hs.height = 480;

  // Add the controlbar
  hs.addSlideshow({
    //slideshowGroup: 'group1',
    interval: 5000,
    repeat: false,
    useControls: true,
    fixedControls: 'fit',
    overlayOptions: {
      opacity: 1,
      position: 'bottom center',
      hideOnMouseOut: true
    }
  });
  $('select').material_select();
  $(".button-collapse").sideNav();
  $('.modal-trigger').leanModal();
  $(".dropdown-button").dropdown();
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
});
</script>
<script>

 $(document).ready(function(){
   hide("send-buyer-email");
   $("#demo").intlTelInput();
   $("#demo2").intlTelInput();
   $('#sending_buyer_mesage').val('I saw this property for sale at www.getmyproperty.co.ke/1053888 and would like some more information. Could you please contact me as soon as possible?');
   $('#sending_buyer_mesage').trigger('autoresize');
   $('#sending_text_mesage').val('I saw this property for sale at www.getmyproperty.co.ke/1053888 and would like some more information. Could you please contact me as soon as possible?');
   $('#sending_text_mesage').trigger('autoresize');
   // Change the country selection
   $("#demo").intlTelInput("selectCountry", "ke");
   // Activate the side menu 
   $('select').material_select();
   $(".button-collapse").sideNav();
   $('.modal-trigger').leanModal();
   $(".dropdown-button").dropdown();
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
   $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
 });
</script>
</body>
</html>





