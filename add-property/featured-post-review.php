<?php include "../model/check.php";?>
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
<body onload="getAllFields();uploadPageSession_review()">
 <!--start of navbar-->
 <?php include "../header/header-login.html";?>
 <!-- end of navbar-->
 <!-- end of navbar-->
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="index.php">Add property</a>
    <a href="property-plan.php" >Property plan</a>
    <a href="featured-plan.php" >Featured plan</a>
    <a href="review-post.php" class="active">Post review</a>

  </div>
</div>
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="card">
      <h4 class="center">Review post</h4>
      <div class="input-field col l3 s6 hoverSpace">
        <span class="fieldTitle">County <span class="fieldValue" id="county"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle"> Sub County<span class="fieldValue" id="sub_county"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Longitude <span class="fieldValue" id="longitude"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Latitude <span class="fieldValue" id="latitude"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Category <span class="fieldValue" id="category"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Sale/ Rent <span class="fieldValue" id="rent"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Property Type <span class="fieldValue" id="p_type"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Price <span class="fieldValue" id="price"></span></span>
      </div>
      <div class="input-field col l3 s12">
        <span class="fieldTitle">Description <span class="fieldValue" id="description"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Land Price <span class="fieldValue" id="lprice"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Size -Acres <span class="fieldValue" id="acres"></span></span>
      </div>
      <div class="input-field col l3 s12">
        <span class="fieldTitle">Land Description <span class="fieldValue" id="ldescription"></span></span>
      </div>
      
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Bedroom <span class="fieldValue" id="bedroom"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Bathroom <span class="fieldValue" id="bathroom"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Floors <span class="fieldValue" id="floors"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Parking <span class="fieldValue" id="parking"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">24 Hr Security <span class="fieldValue" id="hr"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">CCTV <span class="fieldValue" id="cctv"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Alarm System <span class="fieldValue" id="alarm"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Electric Fence <span class="fieldValue" id="electric_fence"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Wall <span class="fieldValue" id="wall"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Internet Access <span class="fieldValue" id="internet"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Swimming Pool <span class="fieldValue" id="pool"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Garden <span class="fieldValue" id="garden"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Water Storage <span class="fieldValue" id="water"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Gym <span class="fieldValue" id="gym"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Disability Access <span class="fieldValue" id="disability"></span></span>
      </div>
      <div class="input-field col l3 s6">
        <span class="fieldTitle">Furnished <span class="fieldValue" id="furnished"></span></span>
      </div>
       <div class="input-field col l12 s12">
      <div class="input-field col l4 s6">
        <div class="picture_preview" id="picture1">

        </div>
      </div>
      <div class="input-field col l4 s6">
        <div class="picture_preview" id="picture2">

        </div>
      </div>
      <div class="input-field col l4 s6">
        <div class="picture_preview" id="picture3">

        </div>
      </div>
      <div class="input-field col l4 s6">
        <div class="picture_preview" id="picture4">

        </div>
      </div>
      <div class="input-field col l4 s6">
        <div class="picture_preview" id="picture5">

        </div>
      </div>
      <div class="input-field col l4 s6">
        <div class="picture_preview" id="picture6">

        </div>
      </div>
      </div>
    </div>
    <div class="left">
     <a href="property-plan.php"> <button  type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Back</button></a>
   </div>
   <div class=" right">
     <button onclick="addProperty()" type="submit" class="btn nextfooter btn-spacer waves-effect wave-dark blue darken-1 center-align">Add post</button>
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

<script>

 $(document).ready(function(){
  showFirstName();
   // Activate the side menu 
   $(".button-collapse").sideNav();
   $('.modal-trigger').leanModal();
   $(".dropdown-button").dropdown();

 });
</script>
</body>
</html>