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
<body onload="freePlan();uploadPageSession()">
 <!--start of navbar-->
 <?php include "../header/header-login.html";?>
 <!-- end of navbar-->
 <div class="mybreadcrumb col s12 l12">
  <div class="breadcrumb flat ">
    <a href="../index.php" class="">Home</a>
    <a href="index.php">Add property</a>
    <a href="property-plan.php" >Property plan</a>
    <a href="free-plan.php" class="active">Free plan</a>
  </div>
</div>
<!--  start of body division-->
<div class="template-container">
  <div class="row">
    <div class="card">
      <h4 class="center">Upload property pictures (Max: 4)</h4>
      <div class=" center limit_error" id="limit_error" style="color: red; font-weight: bold;">
        
      </div>
      <div class="col l12 s12 card center">

        <form action="../model/myUpload.php" method="POST" enctype="multipart/form-data" multiple="true">
          <div class="file-field input-field">
            <div class="btn">
              <span>File</span>
              <input type="file" id="fileToUpload" name="image">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" >
            </div>
          </div>
          <div class="right">
           <button onclick="uploadPageSession();" type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Upload</button>
         </div>
       </form>
     </div>
     <div class="input-field col l12 s12">
     <div class="" id="picture-">
       <div class="input-field col l3 s6">
        <div class="picture_preview" id="picture1"> 
         <div id="delete1"></div>       

        </div>
      </div>
      <div class="input-field col l3 s6">
        <div class="picture_preview" id="picture2">  
        <div id="delete2"></div>      

        </div>
      </div>
       <div class="input-field col l3 s6">
        <div class="picture_preview" id="picture3">
        <div id="delete3"></div>  

        </div>
      </div>
       <div class="input-field col l3 s6">
        <div class="picture_preview" id="picture4">
        <div id="delete4"></div>  

        </div>
      </div>
       <div class="input-field col l3 s6">
        <div class="picture_preview" id="picture5">
        <div id="delete5"></div>  

        </div>
      </div>
    </div>
  </div>
<!--   <div class="input-field col l12 s12">
     <div class="" id="picture-">
    
      <div class="input-field col l4 s6">
        <div class="picture_preview" id="picture4">
        <div id="delete4"></div>  

        </div>
      </div>
    </div>
  </div> -->

  <div class="left">
   <a href="property-plan.php"> <button  type="submit" class="btn btnBack nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Back</button></a>
 </div>
 <div class="loginfooter right">
   <a href="review-post.php"> <button  type="submit" class="btn btnNext btnColor btn-spacer waves-effect wave-dark blue darken-1 center-align">Next</button>
   </a>
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
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
 });
</script>
</body>
</html>