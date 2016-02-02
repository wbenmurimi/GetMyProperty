<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="View single property">
  <meta name="keywords" content="houses i kenya, appartments in kenya, real estate in kenya, plots in kenya">
  <meta name="author" content="Benson Wachira">
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/viewer.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../plugin/countrycode/build/css/intlTelInput.css">
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="">
 <!--start of navbar-->
 <?php include "../header/header.html";?>
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

              <div class="">

                <div>
                  <ul class="images">
                  <div class="col l4 s6">
                   <li> <img src="../image/4.jpg" alt="Picture"></li>
                   </div>
                   <div class="col l4 s6">
                    <li><img src="../image/5.jpg" alt="Picture"></li>
                    </div>
                    <div class="col l4 s6">
                    <li><img src="../image/6.jpg" alt="Picture 2"></li>
                    </div>
                    <div class="col l4 s6">
                    <li><img src="../image/7.jpg" alt="Picture 3"></li>
                    </div>
                  </ul>
                </div>
              </div>
            </div>
          </div>       
        </div>
        <div class="col l4 card">
          <div class="single_property_bold_heading_msg">
           <span >Contact Seller</span>
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
          <label for="buyer_email_radio">Send Email to Seller</label>
        </div>
        <div class="input-field col l12 s12 mesage-div">
          <input onclick="buyerMessageOption()" name="buyer" id="buyer_phone_radio" type="radio" class="validate with-gap" autocomplete="off">
          <label for="buyer_phone_radio">Send Mesage to Seller</label>
        </div>
        <div id="send-buyer-message" class="input-field col l12 s12">
          <div class="col l12 s12">
            <input id="sending_name" type="text" class="validate" autocomplete="off"> 
            <label for="sending_name">Your Name *</label>
          </div>
          <div class="input-field col l12 s12"> 
            <input type="tel" id="demo" placeholder="" class="validate" autocomplete="off">
          </div>
          <div class="input-field col l12 s12 ">
           <input id="sending_text_mesage" type="text" class="validate materialize-textarea"  placeholder="I saw this property for sale at www.getmyproperty.co.ke/1053888 and would like some more information. Could you please contact me as soon as possible?" autocomplete="off"> 
           <label for="sending_text_mesage">Mesage *</label>
         </div>
         <div class="col l12 m12 s12 bottom-space"> 
           <button onclick="sendSellerMessage()" type="submit" class="btn reset-btn-space waves-effect blue darken-1 center-align col l12 ">Send Message</button>
         </div>
       </div>

       <div id="send-buyer-email" class="col l12 s12">
        <div class="input-field col l12 s12">
          <input id="sending_buyer_name" type="text" class="validate" autocomplete="off">
          <label for="sending_buyer_name">Your Name *</label>
        </div>
        <div class="input-field col l12 s12">
          <input type="tel" id="demo2" placeholder="" class="validate" autocomplete="off"> 
        </div>
        <div class="input-field col l12 s12">
          <input id="sending_buyer_email" type="email" class="validate" autocomplete="off">
          <label for="sending_email">Your Email *</label>
        </div>
        <div class="input-field col l12 s12">
         <input id="sending_buyer_mesage" type="text" class="validate materialize-textarea" placeholder="I saw this property for sale at www.getmyproperty.co.ke/1053888 and would like some more information. Could you please contact me as soon as possible?" autocomplete="off">
         <label for="sending_buyer_mesage">Mesage *</label>
       </div>
       <div class="col l12 m12 s12 bottom-space">
         <button onclick="sendSellerEmail()" type="submit" class="btn reset-btn-space waves-effect wave-dark blue darken-1 center-align col l12 s12">Send Email</button>
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
<script src="../js/main.js"></script>
<script src="../js/viewer.js"></script>
<script src="../js/country-code.js"></script>
<script src="../plugin/countrycode/build/js/intlTelInput.js"></script>

<script>

 $(document).ready(function(){
   hide("send-buyer-email","send-buyer-message");
   $("#demo").intlTelInput();
   $("#demo2").intlTelInput();
   // View one image
   $('.image').viewer();

// View some images
$('.images').viewer();
$.fn.viewer;
$.fn.viewer.noConflict();
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