<?php include "../model/check.php";?>
<!DOCTYPE html>

<html>
<head>
  <title>Get My Property</title>
  
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../font/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body onload="featuredPlan()">
 <!--start of navbar-->
 <?php include "../header/header-login.html";?>
 <!-- end of navbar-->
 <!--  start of body division-->
 <div class="template-container">
  <div class="row">
    <div class="card">
      <div class="template-container">
        <div class="row">
          <div class="card">
            <h4 class="center">Featured plan</h4>
            <div class="col l4 s6 ">
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
               <button type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Upload</button>
             </div>
           </form>
         </div>
         <div class="col l4 s6 ">
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
             <button type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Upload</button>
           </div>
         </form>
       </div>
       <div class="col l4 s6 ">
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
           <button type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Upload</button>
         </div>
       </form>
     </div>
     <div class="col l4 s6 ">
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
         <button type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Upload</button>
       </div>
     </form>
   </div>
   <div class="col l4 s6">
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
       <button type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Upload</button>
     </div>
   </form>
 </div>
 <div class="col l4 s6 ">
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
     <button type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Upload</button>
   </div>
 </form>
</div>

<div class=" right">
 <a href=".php"> <button  type="submit" class="btn btnColor nextfooter btn-spacer waves-effect center-align">next</button>
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

<script>

 $(document).ready(function(){
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