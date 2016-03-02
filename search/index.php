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
<body onload="">
 <!--start of navbar-->
 <?php include "../header/header.html";?>
 <!-- end of navbar-->
 <!--  start of body division-->
 <div class="template-container">
  <div class="col l12 s12 top-search">
    <div class="row">
      <div class="">
        <ul class="tabs">
          <li class="tab col l4"><a class="active"  href="#residential">Residential</a></li>
          <li class="tab col l4"><a href="#commercial">Commercial</a></li>
          <li class="tab col l4"><a href="#land">Land</a></li>
        </ul>
        <div id="residential" class="col s12 ">
          <div class="input-field col s2 l2">
            <input onclick="checkIfChecked()" name="residential_R" id="residential_buy_radio" type="radio" class="validate with-gap" autocomplete="off">
            <label for="residential_buy_radio">Buy</label>
          </div>
          <div class="input-field col l2 s2">
            <input onclick="checkIfChecked()" name="residential_R" id="residential_rent_radio" type="radio" class="validate with-gap" autocomplete="off">
            <label for="residential_rent_radio">Rent</label>
          </div>
          <div class="input-field col l4 s6">
            <select class="Property_type">
              <option value="Apartment">Apartment/Flat</option>
              <option value="Bedsitter">Bedsitter</option>
              <option value="House">House</option>
              <option value="Room">Rooom</option>
              <option value="Other">Other</option>
            </select>
            <label>Property type</label> 
          </div>
          <div class="input-field col l4 s6">
            <select class="Property_category">
              <option value="House">House</option>
              <option value="Land">Land</option>
            </select>
            <label>Category</label> 
          </div>
         <div class="input-field col l6 s12">
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
      <div class="input-field col l6 s12" id="selectDiv">
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
          <button type="submit" onclick="searchProperty()" class="btn reset-btn waves-effect wave-dark btnColor center-align ">
            Search</button>
          </div>
        </div>
        <div id="commercial" class="col s12 ">
          <div class="input-field col s2 l2">
            <input onclick="checkIfChecked()" name="commercial_R" id="commercial_buy_radio" type="radio" class="validate with-gap" autocomplete="off">
            <label for="commercial_buy_radio">Buy</label>
          </div>
          <div class="input-field col l2 s2">
            <input onclick="checkIfChecked()" name="commercial_R" id="commercial_rent_radio" type="radio" class="validate with-gap" autocomplete="off">
            <label for="commercial_rent_radio">Rent</label>
          </div>
          <div class="input-field col l4 s6">
            <select class="Property_type">
              <option value="Apartment">Apartment/Flat</option>
              <option value="Bedsitter">Bedsitter</option>
              <option value="House">House</option>
              <option value="Room">Rooom</option>
              <option value="Other">Other</option>
            </select>
            <label>Property type</label> 
          </div>
          <div class="input-field col l4 s6">
            <select class="Property_category">
              <option value="House">House</option>
              <option value="Land">Land</option>
            </select>
            <label>Category</label> 
          </div>
         <div class="input-field col l3 s12">
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
          <button type="submit" onclick="searchProperty()" class="btn reset-btn waves-effect wave-dark btnColor center-align ">
            Search</button>
          </div>
        </div>


     <div id="land" class="col s12 ">
        
         <div class="input-field col s2 l2">
            <input onclick="checkIfChecked()" name="land_R" id="land_buy_radio" type="radio" class="validate with-gap" autocomplete="off">
            <label for="land_buy_radio">Buy</label>
          </div>
          <div class="input-field col l2 s2">
            <input onclick="checkIfChecked()" name="land_R" id="land_rent_radio" type="radio" class="validate with-gap" autocomplete="off">
            <label for="land_rent_radio">Rent</label>
          </div>
          <div class="input-field col l3 s4">
            <input id="land_size" type="text" class="validate" autocomplete="off">
            <label for="land_size">land size in acres</label> 
          </div>
          <div class="input-field col l3 s12">
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
          <button type="submit" onclick="searchProperty()" class="btn reset-btn waves-effect wave-dark btnColor center-align ">
            Search</button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col l3 card">
      <hr>
      <table class="category-table">
        <thead>
          <tr>
            <th data-field="category" class="center bold">Category</th>
          </tr>
        </thead>

        <tbody class="category-table-row">
          <tr onclick="">
            <td >Apartment/Flat <span class="right">500</span></td>
          </tr>
          <tr onclick="">
            <td>Offices/Commercial <span class="right">800</span></td>
          </tr>
          <tr onclick="">
            <td>Bedsitter <span class="right">300</span></td>
          </tr>
          <tr onclick="">
            <td>Houses <span class="right">1000</span></td>
          </tr>
          <tr onclick="">
            <td>Rooms <span class="right">200</span></td>
          </tr>
          <tr onclick="">
            <td>Lands <span class="right">540</span></td>
          </tr>
        </tbody>
      </table>
      <hr>
      <table class="location-table ">
        <thead>
          <tr>
            <th data-field="category" class="center bold">Location</th>
          </tr>
        </thead>

        <tbody class="location-table-row ">
          <tr onclick="">
            <td >Nairobi <span class="right">500</span></td>
          </tr>
          <tr onclick="">
            <td>Coast<span class="right">800</span></td>
          </tr>
          <tr onclick="">
            <td>Central<span class="right">800</span></td>
          </tr>
          <tr onclick="">
            <td>Rift Valley <span class="right">300</span></td>
          </tr>
          <tr onclick="">
            <td>Eastern <span class="right">1000</span></td>
          </tr>
          <tr onclick="">
            <td>Western <span class="right">200</span></td>
          </tr>
          <tr onclick="">
            <td>Nothern <span class="right">540</span></td>
          </tr>
        </tbody>
      </table>
      <hr>
      <div class="input-field col l6 s12">
        <input id="search_price_from" type="text" class="validate" autocomplete="off">
        <label for="search_price_from">Price From</label> 
      </div>
      <div class="input-field col l6 s12">
       <input id="search_price_to" type="text" class="validate" autocomplete="off">
       <label for="search_price_to">Price To </label> 
     </div>
     <div class="center col l12 s12 side-search-btn">
      <button type="submit" onclick="searchProperty()" class="btn reset-btn waves-effect btnColor center-align col l12 s12">
        Search</button>
      </div>
    </div>            
    <div class="col l9 search_post_area" id="search_post_area">
      <div class="card property-row">
        <div class=" col l2 ">
          <a href="search/property-detail.php"><img src="../image/4.jpg" alt="" class="responsive-img center"></a>
        </div>
        <div class=" col l10 ">
          <div class="bold_heading"><a href="search/property-detail.php" class="property-link"><span id="title_area" class="title_area">One bedroom house for rent in Nairobi, Hurligham</span></a> <span id="cost_area" class="cost_area right" >KES 20,000</span> </div>
          <div><span class="description_area">Located next to Argwings Khodek road</span> </div>
          <div><span class="bedroom">Bedroom <span id="bd_qty">1 </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">1</span> </span> </div>
          <div><span class="posted_on">26/01/2016 4:50pm</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div>
          <div><span class="p_location" onclick="" >Hurligham</span></div>
        </div>
      </div>
      <div class="card property-row">
        <div class=" col l2 ">
          <a href="search/property-detail.php"><img src="../image/4.jpg" alt="" class=" responsive-img"></a>
        </div>
        <div class=" col l10 ">
          <div class="bold_heading"><a href="search/property-detail.php" class="property-link"><span id="title_area" class="title_area">One bedroom house for rent in Nairobi, Hurligham</span></a> <span id="cost_area" class="cost_area right" >KES 20,000</span> </div>
          <div><span class="description_area">Located next to Argwings Khodek road</span> </div>
          <div><span class="bedroom">Bedroom <span id="bd_qty">1 </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">1</span> </span> </div>
          <div><span class="posted_on">26/01/2016 4:50pm</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div>
          <div><span class="p_location" onclick="" >Hurligham</span></div>
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

<script>

 $(document).ready(function(){
   // Activate the side menu 
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
</body>
</html>