<!DOCTYPE html>

<html>
<head>
  <title>My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/bread.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/highslide.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="">
 <!--start of navbar-->
 <?php include "../header/header-login.html";?>

 <div id="myPropertyDiv">
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="index.php" class="active">My property</a>
  </div>
</div>
<!-- end of navbar-->
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="col l12 " id="">
          <ol id="my_post_area_li">

       </ol>   
</div>
</div>
</div>
</div>


<div id="pDetailsDiv">

  <div class="mybreadcrumb col s12 l12">
    <div class="breadcrumb flat ">
      <a href="index.php" class="">Home</a>
      <a href="index.php" class="">My property</a>
      <a href="#" class="active">property details</a>
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
                    <div class="collapsible-header bold"><span class="boldHead">General details</span></div>
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
                    <div class="collapsible-header bold"><span class="boldHead">Security</span></div>
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
                  <div class="collapsible-header bold"><span class="boldHead">Amenities</span></div>
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
        </ul>             
     </div>
   </div>
w   <div class=" col l12 12  similar-property" id="similar-property">
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


<!--  end of body division-->
<!--  footer section-->        
<?php include "../footer/footer.html";?>
<!--  end of footer section-->

<!--  Scripts-->
<script src="../js/jquery.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/highslide-full.js"></script>
<script>

 $(document).ready(function(){
  getAllUserPosts()
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
   $(".button-collapse").sideNav();
   $('.modal-trigger').leanModal();
   $(".dropdown-button").dropdown();
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
</script>
</body>
</html>