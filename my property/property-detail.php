<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/highslide.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../plugin/countrycode/build/css/intlTelInput.css">
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="">
 <!--start of navbar-->
 <?php include "../header/header-login.html";?>
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="index.php" class="">search</a>
    <a href="property-detail.php" class="active">Property details</a>
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
             <div class="single_property_bold_heading">
               <span id="property_title_area" class="property_title_area">One bedroom house for rent in Nairobi, Hurligham</span>
               <br>
               <span class="left">For rent <span id="cost_area" class="cost_area " > KES 20,000</span></span> <span class="right date_txt"> poted on<span class="property_post_date " id="property_post_date"> 27/1/2016 23:20 pm</span> </span>
             </div>
             <div id="image_div">

              <div class="highslide-gallery">
               <div class="image_1_div col l6 s12">
                <a href="../image/4.jpg" class="highslide" onclick="return hs.expand(this)">
                  <img src="../image/4.jpg" width="100%" alt="Highslide JS"
                  title="Click to enlarge" />
                </a>

                <div class="highslide-caption">
                  Caption for the First image.
                </div>
              </div>
              <div class="image_1_div col l6 s12">
                <a href="../image/5.jpg" class="highslide" onclick="return hs.expand(this)">
                  <img src="../image/5.jpg" width="100%" alt="Highslide JS"
                  title="Click to enlarge" />
                </a>

                <div class="highslide-caption">
                  Caption for the second image.
                </div>
              </div>
              <div class="image_1_div col l6 s12">
                <a href="../image/6.jpg" class="highslide" onclick="return hs.expand(this)">
                  <img src="../image/6.jpg" width="100%"alt="Highslide JS"
                  title="Click to enlarge" />
                </a>

                <div class="highslide-caption">
                  Caption for the third image.
                </div>
              </div>
              <div class="image_1_div col l6 s12">
                <a href="../image/7.jpg" class="highslide" onclick="return hs.expand(this)">
                  <img src="../image/7.jpg" width="100%" alt="Highslide JS"
                  title="Click to enlarge" />
                </a>

                <div class="highslide-caption">
                  Caption for the Fourth image.
                </div>
              </div>
            </div>
          </div>
          <div class="detail_div">
            <table class="category-table striped">
              <thead>
                <tr>
                  <th data-field="category" class="center bold">All Information</th>
                </tr>
              </thead>

              <tbody class="all-info-table ">
                <tr onclick="">
                  <td >Decription <span class="right">500</span></td>
                </tr>
                <tr onclick="">
                  <td>Property for <span class="right">500</span></td>
                </tr>
                <tr onclick="">
                  <td>Property type <span class="right">500</span></td>
                </tr>
                <tr onclick="">
                  <td>Bedroom <span class="right">500</span></td>
                </tr>
                <tr onclick="">
                  <td>Bathroom <span class="right">500</span></td>
                </tr>
                <tr onclick="">
                  <td>Floors<span class="right">5</span> </td>
                </tr>
              </tbody>
            </table>
            <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div class="collapsible-header bold">Security</div>
                <div class="collapsible-body">
                 <span class="span-hover"> <span class="span-padding" id="">24 Hr security </span><span class="right span-p"> Yes</span></span>
                 <hr>
                 <span class="span-hover" > <span class="span-padding" id="">CCTV Camera</span> <span class="right span-p"> No</span></span>
                 <hr>
                 <span class="span-hover"> <span class="span-padding" id="">Alarm System</span> <span class="right span-p"> Yes</span></span>
                 <hr>
                 <span class="span-hover"> <span class="span-padding" id="">Electric Fence</span> <span class="right span-p"> No </span></span>
                 <hr>
                 <span class="span-hover"> <span class="span-padding" id="">Watch Dog</span><span class="right span-p"> No</span></span>
                 <hr>
                 <span class="span-hover"> <span> <span class="span-padding" id="">Wall</span><span class="right span-p">Yes</span></span>
                 <hr>
               </div>
             </li>
             <li>
              <div class="collapsible-header bold">Amenities</div>
              <div class="collapsible-body">
                <span class="span-hover" id=""><span class="span-padding">Gym </span> <span class="right">Yes</span></span>
                <hr>
                <span class="span-hover"><span class="span-padding" id="">Water storage</span> <span class="right span-p">No</span></span>
                <hr>
                <span class="span-hover"><span class="span-padding" id="">Swimming Pool </span><span class="right span-p"> Yes</span></span>
                <hr>
                <span class="span-hover"> <span class="span-padding" id="">Parking space </span><span class="right span-p"> 2 </span></span>
                <hr>
                <span class="span-hover"> <span class="span-padding" id="">Garden<span> </span class="right span-padding">No</span></span>
                <hr>
                <span class="span-hover"> <span class="span-padding" id="">Internet Access</span><span class="right span-p"> Yes </span></span>
                <hr>
                <span class="span-hover"> <span class="span-padding" id="">Disability Access</span><span class="right span-p"> No</span></span>
                <hr>
              </div>
            </li>
          </ul>
        </div>
      </div>       
    </div>
    <div class="col l4 12 card">
      <div class="single_property_bold_heading_msg center">
       <span class="" >Contact Ben</span>
     </div>
      <div class="col l12 m12 s12 bottom-space"> 
       <button onclick="reportAd()" type="submit" class="btn reset-btn-space waves-effect blue darken-1 center-align col l12 ">Report Ad</button>
     </div>
     <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header"><i class="fa fa-phone prefix"></i>Contact Number</div>
        <div class="collapsible-body"><p class="contact-space" id="contact-space-phone">+233542615890.</p></div>
      </li>
      <li>
        <div class="collapsible-header"><i class="fa fa-envelope prefix"></i>Email Address</div>
        <div class="collapsible-body"><p class="contact-space" id="contact-space-email">Wbenmurimi@gmail.com.</p></div>
      </li>
    </ul>
    <div class="input-field col s12 l12">
      <input onclick="buyerMessageOption()" name="buyer" id="buyer_email_radio" type="radio" class="validate with-gap" autocomplete="off">
      <label for="buyer_email_radio">Send Email to Ben</label>
    </div>
   
     <div id="send-buyer-email" class="col l12 s12">
    <div class="input-field col l12 s12">
      <input id="sending_buyer_name" type="text" class="validate" autocomplete="off">
      <label for="sending_buyer_name">Your Name *</label>
    </div>
    <div class="input-field col l12 s12">
      <input type="tel" id="demo2" placeholder="" class="validate" length="12"autocomplete="off"> 
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
  <div class="card property-row">
    <div class=" col l2 ">
      <a href="property-detail.php"><img src="../image/4.jpg" alt="" class="circle responsive-img center"></a>
    </div>
    <div class=" col l8 ">
      <div class="bold_heading"><a href="property-detail.php" class="property-link"><span id="title_area" class="title_area">One bedroom house for rent in Nairobi, Hurligham</span></a> <span id="cost_area" class="cost_area right" >KES 20,000</span> </div>
      <div><span class="description_area">Located next to Argwings Khodek road</span> </div>
      <div class=""><span class="bedroom">Bedroom <span id="bd_qty">1 </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">1</span> </span></div>
      <div><span class="posted_on">26/01/2016 4:50pm</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div>
      <div><span class="p_location" onclick="" >Hurligham</span></div>
    </div>
    <div class="col l2">  
     <button onclick="" type="submit" class="btn bottom-space btn-more-detail btn-spacer waves-effect btnColor right center-align col l12 s12">More Details</button> 
   </div>
 </div>
 <div class="card property-row">
    <div class=" col l2 ">
      <a href="property-detail.php"><img src="../image/4.jpg" alt="" class="circle responsive-img center"></a>
    </div>
    <div class=" col l8 ">
      <div class="bold_heading"><a href="property-detail.php" class="property-link"><span id="title_area" class="title_area">One bedroom house for rent in Nairobi, Hurligham</span></a> <span id="cost_area" class="cost_area right" >KES 20,000</span> </div>
      <div><span class="description_area">Located next to Argwings Khodek road</span> </div>
      <div class=""><span class="bedroom">Bedroom <span id="bd_qty">1 </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">1</span> </span></div>
      <div><span class="posted_on">26/01/2016 4:50pm</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div>
      <div><span class="p_location" onclick="" >Hurligham</span></div>
    </div>
    <div class="col l2 s12">  
     <button onclick="" type="submit" class="btn bottom-space btn-more-detail btn-spacer waves-effect btnColor right center-align col l12 s12">More Details</button> 
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
<script src="../js/highslide-full.js"></script>
<script src="../js/country-code.js"></script>
<script src="../plugin/countrycode/build/js/intlTelInput.js"></script>
<script type="text/javascript">
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
</script>
<script>

 $(document).ready(function(){
  showFirstName();
   hide("send-buyer-email","send-buyer-message");
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