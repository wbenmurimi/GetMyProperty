
var myurl = "../model/main.php?";
var urlHome = "model/main.php?";
function sendRequest(u) {
    // Send request to server
    var obj = $.ajax({url: u, async: false});
    //Convert the JSON string to object
    var result = $.parseJSON(obj.responseText);
    return result;	//return object
  }

  function hide(){

    for (var i = 0; i < arguments.length; i++) {

      var input = arguments[i];
        $('#'+input).addClass('hide'); //jquery way
      }
    }

    function show(){

      for (var i = 0; i < arguments.length; i++) {

        var input = arguments[i];
        $('#'+input).removeClass('hide');
        $('#'+input).show();
      }
    }

    function checkIfChecked(){
     var selectedOption=document.getElementById("send-option");

     var send_option = document.getElementsByName("reset");
     if (send_option[0].checked == true) {
      selectedOption.innerHTML='<div class="input-field col l6 s12"><input id="reset_email" type="text" class="validate" autocomplete="off"> <label for="reset_email">Email</label> </div><div class="col l6 m6 s12"> <button onclick="sendVerificationCode()" type="submit" class="btn reset-btn-space waves-effect wave-dark blue darken-1 center-align ">Reset my password</button></div>';
    } 
    else if (send_option[1].checked == true) {
      selectedOption.innerHTML='<div class="input-field col l6 s12"><input id="reset_phone" type="text" class="validate" autocomplete="off"> <label for="reset_phone">Phone</label> </div> <div class="col l6 m6 s12"> <button onclick="sendVerificationCode()" type="submit" class="btn reset-btn-space waves-effect wave-dark blue darken-1 center-align ">Reset my password</button></div>';
    }
  }

  function checkIfResidentialSearchIsChecked(){

   var send_option = document.getElementsByName("residential_R");
   if (send_option[0].checked == true) {
   } 
   else if (send_option[1].checked == true) {
   }
 }
 function checkIfCommercialSearchIsChecked(){
   var send_option = document.getElementsByName("commercial_R");
   if (send_option[0].checked == true) {
   } 
   else if (send_option[1].checked == true) {
   }
 }
 function checkIfLandSearchIsChecked(){


   var send_option = document.getElementsByName("land_R");
   if (send_option[0].checked == true) {
   } 
   else if (send_option[1].checked == true) {
   }
 }

 function checkAddOption(){

  var add_option = document.getElementsByName("p_cat");
  if (add_option[0].checked == true) {  
    hide("land_div"); 
    show("house_div");
  } 
  else if (add_option[1].checked == true) {
    hide("house_div");
    show("land_div");
  }
}

function checkCheckedOption(){
 var selectedOption=document.getElementById("search-option-div");

 var opt = document.getElementsByName("search-option");
 if (opt[0].checked == true) {
  selectedOption.innerHTML='<div class="input-field col l6 s12"><input id="search_email" type="text" class="validate" autocomplete="off"> <label for="reset_email">Email</label> </div><div class="col l6 m6 s12"> <button onclick="searchAlerts()" type="submit" class="btn reset-btn-space waves-effect wave-dark blue darken-1 center-align ">Search</button></div>';
} else if (opt[1].checked == true) {
  selectedOption.innerHTML='<div class="input-field col l6 s12"><input id="search_phone" type="text" class="validate" autocomplete="off"> <label for="reset_phone">Phone</label> </div> <div class="col l6 m6 s12"> <button onclick="searchAlerts()" type="submit" class="btn reset-btn-space waves-effect wave-dark blue darken-1 center-align ">Search</button></div>';
}
}

function buyerMessageOption(){
 var selectedOption=document.getElementById("send-buyer-option");

 var buyer_option = document.getElementsByName("buyer");
 if (buyer_option[0].checked == true) {
  hide("send-buyer-message");
  show("send-buyer-email");
} 
else if (buyer_option[1].checked == true) {
  hide("send-buyer-email");
  show("send-buyer-message");
}
}

// function alertMessageOption(){
//  var alertDiv=document.getElementById("alertOptionDiv");

//  var optAlert = document.getElementsByName("alert_option");
//  if (optAlert[0].checked == true) {
//   alertDiv.innerHTML='<div class="input-field col l12 s12"> <input id="alert_email" type="email" class="validate" autocomplete="off"> <label for="alert_email">Email </label>  </div>';
// } else if (optAlert[1].checked == true) {
//   alertDiv.innerHTML='<div class="input-field col l12 s12"> <input type="tel" id="alert_phone" placeholder="" class="validate" autocomplete="off"> <label for="alert_phone">Phone </label></div>';
// }
// }

function changePropertyCategory(){
  var p_category = document.getElementById("Property_category");
  if (p_category.selectedIndex == "0") {
    hide("land_property_div");
    show("house_property_div");
  }
  if (p_category.selectedIndex == "1") {
    hide("house_property_div");
    show("land_property_div");
  }
}

function Login(){
  /*username*/
  var user_name = $("#login_username").val();
  /*password*/
  var pass_word = $("#login_password").val();

  /* empty username */
  if(user_name.length == 0){
    document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Empty username<i class="material-icons">close</i></div>';
    return
  }
  /*password*/
  if(pass_word.length == 0){
    document.getEl

    ementById("error_area").innerHTML = '<div class="chip red white-text">Empty password<i class="material-icons">close</i></div>';
    return;
  }

  var strUrl = myurl+"cmd=1&username="+user_name+"&password="+pass_word;
      // prompt("url",strUrl);
      var objResult = sendRequest(strUrl);
      var errorArea = document.getElementById("login_error_area");
      document.getElementById("login_error_area").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
      if(objResult.result == 0) {
        document.getElementById("login_error_area").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
        return;
      }
      var my_user_type=objResult.user[0].xx_user_type;
  // alert(my_user_type);

  if (my_user_type.localeCompare("admin")==0) {
    window.location.href ="admin.php"
  }
  else if (my_user_type.localeCompare("regular")==0) {
    window.location.href = "../my property/index.php";
  }

}

function getUser(){
  var strUrl = myurl+"cmd=5";
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    alert(objResult.message);
    return;
  }
  document.getElementById("username").innerHTML=objResult.message;
}

function addUser(){

 /*first name*/
 var f_name = $("#fname").val();
 /*Last name*/
 var l_name = $("#lname").val();
 /*Date of birth*/
 var dob = $("#dob").val();
 var gend = document.getElementById("gender");
 var gender = gend.options[gend.selectedIndex].value;
 /*password*/
 var password = $("#password").val();
 /*password2*/
 var password2 = $("#confirm_password").val();
 /*username*/
 var user_name = $("#username").val();
 /*email*/
 var email = $("#email").val();
 /*phone*/
 var phone = $("#phone").val();

 if(f_name.length == 0){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty First name field<i class="material-icons">close</i></i></div>';
  return
}
if(l_name.length == 0){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty last name field<i class="material-icons">close</i></i></div>';
  return
}
if(gender.length == 0){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty gender field<i class="material-icons">close</i></i></div>';
  return
}
if(dob.length == 0){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty Date of birth field<i class="material-icons">close</i></i></div>';
  return
}
/* empty username */
if(user_name.length == 0){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty Username field<i class="material-icons">close</i></i></div>';
  return
}
/* empty password */
if(password.length == 0){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty password field<i class="material-icons">close</i></div>';
  return;
}
/* empty confirm password */
if(password2.length == 0){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty confirm password field<i class="material-icons">close</i></div>';
  return;
}
/* different password */
if(password!=password2){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">The entered passwords do not match<i class="material-icons">close</i></div>';
  return;
}
/* empty phone */
if(phone.length == 0){
  document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty Phone Field<i class="material-icons">close</i></div>';
  return;
}
var strUrl = myurl+"cmd=2&fname="+f_name+"&lname="+l_name+"&gender="+gender+"&dob="+dob+
"&username="+user_name+"&password="+password+"&email="+email+"&phone="+phone;
        // prompt("url",strUrl);
        var objResult = sendRequest(strUrl);
        var errorArea = document.getElementById("serror_area");
        document.getElementById("serror_area").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
        if(objResult.result == 0) {
          document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
          return;
        }
        location.reload();
      }

      function saveProfile(){

       /*first name*/
       var f_name = $("#fname").val();
       /*Last name*/
       var l_name = $("#lname").val();
       /*Date of birth*/
       var dob = $("#dob").val();

       // var gender = $("#gender").val();
       /*email*/
       var email = $("#email").val();
       /*phone*/
       var phone = $("#phone").val();



       if(f_name.length == 0){
        document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty First name field<i class="material-icons">close</i></i></div>';
        return
      }
      if(l_name.length == 0){
        document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty last name field<i class="material-icons">close</i></i></div>';
        return
      }

      if(dob.length == 0){
        document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty Date of birth field<i class="material-icons">close</i></i></div>';
        return
      }

      /* empty phone */
      if(phone.length == 0){
        document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">Empty Phone Field<i class="material-icons">close</i></div>';
        return;
      }
      var strUrl = myurl+"cmd=43&fname="+f_name+"&lname="+l_name+"&dob="+dob+"&email="+email+"&phone="+phone;
        // prompt("url",strUrl);
        var objResult = sendRequest(strUrl);
        var errorArea = document.getElementById("serror_area");
        document.getElementById("serror_area").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
        if(objResult.result == 0) {
          document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
          return;
        }
        location.reload();
      }

      function sendVerificationCode(){
        var send_option = document.getElementsByName("reset"); 
        var user_email ;
        var user_phone;
        var strUrl;
        if (send_option[0].checked == true) {
          /*email*/
          user_email = $("#reset_email").val();
          if(user_email.length == 0){
            document.getElementById("error_div_reset").innerHTML = '<div class="chip red white-text">Please provide email<i class="material-icons">close</i></div>';
            return
          }
          strUrl = myurl+"cmd=4&email="+user_email;
        }
        /*phone*/
        if (send_option[1].checked == true) {
         user_phone= $("#reset_phone").val();
         if(user_phone.length == 0){
          document.getElementById("error_div_reset").innerHTML = '<div class="chip red white-text">Please provide phone number<i class="material-icons">close</i></div>';
          return;
        }
        strUrl = myurl+"cmd=4&phone="+user_phone;
      }
      /* email */
      // prompt("url",strUrl);
      var objResult = sendRequest(strUrl);
      if(objResult.result == 0) {
        document.getElementById("error_div_reset").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
        return;
      }
      alert(objResult.message); 
      $("#reset_email").val("");
      $("#reset_phone").val("");
    }

    function resetUserPassword(){   
     /*password*/
     var password = $("#new_password").val();
     /*password2*/
     var password2 = $("#confirm_new_password").val();
     /*verification code*/
     var v_code = $("#verification_code").val();

     /* empty verification code */
     if(v_code.length == 0){
      document.getElementById("error_div_new").innerHTML = '<div class="chip red white-text">Empty verification code field<i class="material-icons">close</i></i></div>';
      return
    }
    /* empty password */
    if(password.length == 0){
      document.getElementById("error_div_new").innerHTML = '<div class="chip red white-text">Empty password field<i class="material-icons">close</i></div>';
      return;
    }
    /* empty confirm password */
    if(password2.length == 0){
      document.getElementById("error_div_new").innerHTML = '<div class="chip red white-text">Empty confirm password field<i class="material-icons">close</i></div>';
      return;
    }

    /* different password */
    if(password!=password2){
      document.getElementById("error_div_new").innerHTML = '<div class="chip red white-text">The entered passwords do not match<i class="material-icons">close</i></div>';
      return;
    }

    var strUrl = myurl+"cmd=5&code="+v_code+"&password="+password;
    // prompt("url",strUrl);
    var objResult = sendRequest(strUrl);
    var errorArea = document.getElementById("error_div_new");
    document.getElementById("error_div_new").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
    if(objResult.result == 0) {
      document.getElementById("error_div_new").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
      return;
    }
    document.getElementById("error_div_new").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
    $("#verification_code").val('');
    $("#new_password").val('');
    $("#confirm_new_password").val('');

  }

  function showFirstName(){

    var strUrl = myurl+"cmd=13";
 // prompt("url", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  // alert(objResult.message);
  return;
}
$("#LoggedUser").text(objResult.uname[0].person);
}
function showHomeFirstName(){

  var strUrl = urlHome+"cmd=13";
 // prompt("url", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  // alert(objResult.message);
  return;
}
$("#LoggedUser").text(objResult.uname[0].person);
}

function subscribeAlert(){

  var alert_option = document.getElementsByName("alert_option"); 
  var buy_rent_option = document.getElementsByName("type1");

  var cnty = document.getElementById("Property_county");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var p_category = document.getElementById("Property_category");

  var buy_rent ;
  var strUrl;
  /*property category*/
  var Property_category;
  var property_type;
  /*price from*/
  var p_from;
  /*price to*/
  var p_to;
  /*bedroom*/
  var p_bed;
  /*bathroom*/
  var p_bath;
  /*acres*/
  var acres;

  if (buy_rent_option[0].checked == true) {
    /*buy option*/
    buy_rent = "Sale";
  }
  /*rent option*/
  if (buy_rent_option[1].checked == true) {
   buy_rent= "Rent";
 }

  // if ((alert_option[0].checked == false)||(alert_option[1].checked == false)) {
  //   document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Please select either email or phone<i class="material-icons">close</i></div>';
  //   return
  // }
  // if ((buy_rent_option[0].checked == false)||(buy_rent_option[1].checked == false)) {
  //   document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Please select if the property it for rent or buying<i class="material-icons">close</i></div>';
  //   return
  // }
  if(p_category.options[p_category.selectedIndex].value== ""){
    document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Empty Property category<i class="material-icons">close</i></div>';
    return;
  }

  if (p_category.selectedIndex == "0") {
    /*property category*/
    Property_category = p_category.options[p_category.selectedIndex].value;
    /*property type*/
    var p_type = document.getElementById("Property_type_alert");
    property_type = p_type.options[p_type.selectedIndex].value;
    /*price from*/
    p_from = $("#price_from_alert").val();
    /*price to*/
    p_to = $("#price_to_alert").val();
    /*bedroom*/
    p_bed = $("#bedroom_alert").val();
    /*bathroom*/
    p_bath = $("#bathroom_alert").val();

    if(p_from.length == 0){
      document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Empty Price from <i class="material-icons">close</i></div>';

      return;
    }
    if(p_to.length == 0){
      document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Empty Price to <i class="material-icons">close</i></div>';
      return;
    }
    if(p_bed.length == 0){
      document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Empty Number of beds<i class="material-icons">close</i></div>';
      return;
    }
    if(p_bath.length == 0){
      document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Empty Number of bathrooms <i class="material-icons">close</i></div>';
      return
    }
  }

  if (p_category.selectedIndex == "1") {
    property_type ="";
    /*property category*/
    Property_category = p_category.options[p_category.selectedIndex].value;
    /*price from*/
    p_from = $("#land_price_from_alert").val();
    /*price to*/
    p_to = $("#land_price_to_alert").val();
    /*acres*/
    acres = $("#acre_alert").val();

    if(p_from.length == 0){
      document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Empty Price from<i class="material-icons">close</i></div>';

      return;
    }
    if(p_to.length == 0){
      document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Empty Price to<i class="material-icons">close</i></div>';
      return;
    }
    if(acres.length == 0){
      document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">Empty Acres field<i class="material-icons">close</i></div>';
      return;
    }

  }
  /*email*/
  if (alert_option[0].checked == true) {

   strUrl = myurl+"cmd=6&email=1&county="+county+"&sub_county="+sub_county+
   "&buy_rent="+buy_rent+"&Property_category="+Property_category+"&property_type="+property_type+
   "&p_from="+p_from+"&p_to="+p_to+"&p_bed="+p_bed+"&p_bath="+p_bath+"&acres="+acres;
 }
 /*phone*/
 if (alert_option[1].checked == true) {

   strUrl = myurl+"cmd=6&phone=1&county="+county+"&sub_county="+sub_county+
   "&buy_rent="+buy_rent+"&Property_category="+Property_category+"&property_type="+property_type+
   "&p_from="+p_from+"&p_to="+p_to+"&p_bed="+p_bed+"&p_bath="+p_bath+"&acres="+acres;
 }


  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  document.getElementById("error_div_alert").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
  if(objResult.result == 0) {
    document.getElementById("error_div_alert").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }
  if(objResult.result == 1) {
    document.getElementById("error_div_alert").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }
  $("#land_price_from_alert").val('');
  $("#land_price_to_alert").val('');
  $("#bedroom_alert").val('');
  $("#bathroom_alert").val('');
  $("#acre_alert").val('');
  $("#alert_email").val('');
  $("#alert_phone").val('');

  // location.reload();
}

function searchAlerts(){

  var strUrl = myurl+"cmd=7";
 // prompt("url", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}

var mytable=$('#jsontable').dataTable();
mytable.fnClearTable();
for(i=0;i<objResult.alert.length;i++){
  var newid=objResult.alert[i].xx_alert_id;

  mytable.fnAddData([ objResult.alert[i].xx_alert_id, objResult.alert[i].xx_message_alert, objResult.alert[i].xx_email_alert,
    objResult.alert[i].xx_property_category, objResult.alert[i].xx_sub_county, 
    objResult.alert[i].xx_buy_rent,objResult.alert[i].start_date, objResult.alert[i].xx_end_time
    , objResult.alert[i].xx_alert_status,
    mytable.innerHTML='<span class="iconClick"  onclick="disableAlert(this)" id="item'+newid+'" ><i  class="fa fa-times prefix fa-2" style="color:red; font-weight:bold;">Disable</i></span>',
    mytable.innerHTML='<span class="iconClick"  onclick="enableAlert(this)" id="item2'+newid+'"><i  class="fa fa-check prefix fa-2" style="color:green;font-weight:bold;">Enable</i></span>'
    ]);

  if(document.getElementById('item'+newid)){
    var getClicked=document.getElementById('item'+newid);
    getClicked.setAttribute('id',newid);
  }
  if(document.getElementById('item2'+newid)){
    var getClicked=document.getElementById('item2'+newid);
    getClicked.setAttribute('id',newid);
  }
}
}

function disableAlert(newid){

 var id= newid.getAttribute('id');
   // alert("id: "+id);
   var strUrl = myurl+"cmd=42&id="+id;
    // prompt("url",strUrl);
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0) {
     alert(objResult.message);
     return;
   }
   // alert(objResult.message);
   location.reload();
 }


 function enableAlert(newid){

   var id= newid.getAttribute('id');
   // alert("id: "+id);
   var strUrl = myurl+"cmd=41&id="+id;
    // prompt("url",strUrl);
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0) {
     alert(objResult.message);
     return;
   }
   // alert(objResult.message);
   location.reload();
 }



 function freePlan(){
   var strUrl = myurl+"cmd=14";
 // prompt("url", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  // alert(objResult.message);
  return;
} 
return;
}

function featuredPlan(){
 var strUrl = myurl+"cmd=15";
 // prompt("url", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  // alert(objResult.message);
  return;
} 
return;
}
function page1Session(){

 var cnty = document.getElementById("Property_county");
 var county = cnty.options[cnty.selectedIndex].value;

 var sub_cnty = document.getElementById("Property_sub_county");
 var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

 var ptype = document.getElementById("Property_type");
 var p_type = ptype.options[ptype.selectedIndex].value;

 var p_option = document.getElementsByName("p_cat"); 
 var buy_rent_option = document.getElementsByName("buy-rent");

 var hr_= document.getElementsByName("24hr_radio");
 var cctv_= document.getElementsByName("cctv_radio");
 var alarm_= document.getElementsByName("alarm_radio");
 var electric_fence_ = document.getElementsByName("electric_radio");
 var wall_ = document.getElementsByName("wall_radio");
 var internet_ = document.getElementsByName("internet_radio");
 var pool_ = document.getElementsByName("pool_radio");
 var garden_ = document.getElementsByName("garden_radio");
 var water_storage_ = document.getElementsByName("water_radio");
 var gym_ = document.getElementsByName("gym_radio");
 var disability_ = document.getElementsByName("furnished_radio");
 var furnished_ = document.getElementsByName("p_cat");

 var Property_category ;
 var buy_rent;
 var hr;
 var cctv;
 var alarm;
 var electric_fence;
 var wall;
 var internet;
 var pool;
 var garden;
 var water_storage;
 var gym;
 var disability;
 var furnished;

 if (hr_[0].checked == true) {
  hr="Yes";
}
else{
  hr="No";
}
if (cctv_[0].checked == true) {
  cctv="Yes";
}
else{
  cctv="No";
}
if (alarm_[0].checked == true) {
  alarm="Yes";
}
else{
 alarm="No";
}
if (electric_fence_[0].checked == true) {
  electric_fence="Yes";
}
else{
 electric_fence="No";
}
if (wall_[0].checked == true) {
  wall="Yes";
}
else{
 wall="No";
}
if (internet_[0].checked == true) {
  internet="Yes";
}
else{
  internet="No";
}
if (pool_[0].checked == true) {
  pool="Yes";
}
else{
  pool="No";
}
if (garden_[0].checked == true) {
  garden="Yes";
}
else{
  garden="No";
}
if (water_storage_[0].checked == true) {
  water_storage="Yes";
}
else{
  water_storage="No";
}
if (gym_[0].checked == true) {
  gym="Yes";
}
else{
 gym="No";
}
if (disability_[0].checked == true) {
  disability="Yes";
}
else{
  disability="No";
}
if (furnished_[0].checked == true) {
  furnished="Yes";
}
else{
  furnished="No";
}

if (p_option[0].checked == true) {
  Property_category="House";
}
if (p_option[1].checked == true) {
 Property_category="Land";
}
if (buy_rent_option[0].checked == true) {
  buy_rent="Sale";
}
if (buy_rent_option[1].checked == true) {
  buy_rent="Rent";
}

var price= $("#price").val();
var description= $("#description").val();
var bathroom= $("#bathroom").val();
var bedroom= $("#house_bedroom").val();
var floors= $("#floors").val();
var parking= $("#parking").val();
var acres= $("#acre_size").val();
var lprice= $("#lprice").val();
var ldescription= $("#ldescription").val();

/*validation */

if(county.length == 0) {
  document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please select the county<i class="material-icons">close</i></div>';
  $(window).scrollTop(0);
  return;
}
if(sub_county.length == 0) {
  document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please select the sub county<i class="material-icons">close</i></div>';
  $(window).scrollTop(0);
  return;
}
if (p_option[0].checked == false && p_option[1].checked == false) {
 document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please select the property category i.e. House or land<i class="material-icons">close</i></div>';
 $(window).scrollTop(0);
 return;
}
if (buy_rent_option[0].checked == false && buy_rent_option[1].checked == false) {
 document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please choose if the property is for sale or rent<i class="material-icons">close</i></div>';
 $(window).scrollTop(0);
 return;
}
if (p_option[0].checked == true) {
  if(p_type.length == 0) {
    document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please select the property type<i class="material-icons">close</i></div>';
    $(window).scrollTop(0);
    return;
  }
  if(price.length == 0) {
    document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please enter the price of the property <i class="material-icons">close</i></div>';
    $(window).scrollTop(0);
    return;
  }

  if((parseFloat(price) == parseFloat(price)) && !isNaN(price)){}
    else{
      document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Invalid input. Please provide a number on the price field e.g. 45000 <i class="material-icons">close</i></div>';
      $(window).scrollTop(0);
      return;
    }
    if(description.length == 0) {
      document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please enter the description of the property <i class="material-icons">close</i></div>';
      $(window).scrollTop(0);
      return;
    }
    if((parseFloat(bedroom) == parseInt(bedroom)) && !isNaN(bedroom)){}
      else{
        document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Error provide number on bedroom e.g. 2<i class="material-icons">close</i></div>';
        $(window).scrollTop(0);
        return;
      } 
      if((parseFloat(bathroom) == parseInt(bathroom)) && !isNaN(bathroom)){}
        else{
          document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Error provide number on bathroom e.g. 2<i class="material-icons">close</i></div>';
          $(window).scrollTop(0);
          return;
        } 

        if((parseFloat(floors) == parseInt(floors)) && !isNaN(floors)){}
          else{
            document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Error provide number on floors e.g. 2<i class="material-icons">close</i></div>';
            $(window).scrollTop(0);
            return;
          } 
          if((parseFloat(parking) == parseInt(parking)) && !isNaN(parking)){}
            else{
              document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Error provide number on parking e.g. 2<i class="material-icons">close</i></div>';
              $(window).scrollTop(0);
              return;
            } 
          }
          if (p_option[1].checked == true) {
            if(acres.length == 0) {
              document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Enter the land size<i class="material-icons">close</i></div>';
              $(window).scrollTop(0);
              return;

            }
            if((parseFloat(acres) == parseInt(acres)) && !isNaN(acres)){}
              else{
                document.getElementById("add_error").acres = '<div class="chip red white-text">Error provide number on acres<i class="material-icons">close</i></div>';
                $(window).scrollTop(0);
                return;
              }
              if(lprice.length == 0) {
                document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please enter the price of the land <i class="material-icons">close</i></div>';
                $(window).scrollTop(0);
                return;
              }
              if((parseFloat(lprice) == parseFloat(lprice)) && !isNaN(lprice)){}
                else{
                  document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Invalid input. Please provide a number on the price field e.g. 45000 <i class="material-icons">close</i></div>';
                  $(window).scrollTop(0);
                  return;
                } 
                if(ldescription.length == 0) {
                  document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please enter the description of the land <i class="material-icons">close</i></div>';
                  $(window).scrollTop(0);
                  return;
                } 
              }


              var strUrl = myurl+"cmd=20&county="+county+"&sub_county="+sub_county+"&price="+
              price+"&description="+description+"&bathroom="+bathroom+"&bedroom="+bedroom+
              "&floors="+floors+"&parking="+parking +"&acres="+acres+"&lprice="+lprice+
              "&ldescription="+ldescription+"&p_type="+p_type+"&p_cat="+Property_category+"&buy_rent="+buy_rent+
              "&hr="+hr+"&cctv="+cctv+"&alarm="+alarm+"&electric_fence="+electric_fence+
              "&wall="+wall+"&internet="+internet+"&pool="+pool+"&garden="+garden+
              "&water_storage="+water_storage+"&gym="+gym+"&disability="+disability+"&furnished="+furnished;

    // prompt("url", strUrl);
    var objResult = sendRequest(strUrl);

    if(objResult.result == 0){
      // alert(objResult.message);
      return;
    }
    window.location.href="property-plan.php";
    // return;
  }

  function backToPage1(){

    var strUrl = myurl+"cmd=21";
      // prompt("url", strUrl);
      var objResult = sendRequest(strUrl);

      if(objResult.result == 0){
        // alert(objResult.message);
        return;
      }


      $("#Property_county").val(objResult.p1[0].county);
      $('select').material_select();
      $("#Property_sub_county").val(objResult.p1[0].sub_county);
      $("#price").val(objResult.p1[0].price);
      $("#description").val(objResult.p1[0].description);
      $("#bathroom").val(objResult.p1[0].bathroom);
      $("#house_bedroom").val(objResult.p1[0].bedroom);
      $("#floors").val(objResult.p1[0].floors);
      $("#parking").val(objResult.p1[0].parking);
      $("#acre_size").val(objResult.p1[0].acre_size);
      $("#lprice").val(objResult.p1[0].lprice);
      $("#ldescription").val(objResult.p1[0].ldescription);
      $("#Property_type").val(objResult.p1[0].p_type);
      var prop_category=objResult.p1[0].p_cat;
      var prop_buy_rent=objResult.p1[0].buy_rent;
      var hr_= objResult.p1[0].hr;
      var cctv_= objResult.p1[0].cctv;
      var alarm_= objResult.p1[0].alarm;
      var electric_fence_ = objResult.p1[0].electric_fence;
      var wall_ = objResult.p1[0].wall;
      var internet_ = objResult.p1[0].internet;
      var pool_ = objResult.p1[0].pool;
      var garden_ = objResult.p1[0].garden;
      var water_storage_ = objResult.p1[0].water_storage;
      var gym_ = objResult.p1[0].gym;
      var disability_ = objResult.p1[0].disability;
      var furnished_ = objResult.p1[0].furnished;

      if (hr_.localeCompare("Yes")==0) {
        $( "#24hr_radio" ).prop( "checked", true );
      }
      if (cctv_.localeCompare("Yes")==0) {
        $( "#cctv_radio" ).prop( "checked", true );
      }
      if (alarm_.localeCompare("Yes")==0) {
        $( "#alarm_radio" ).prop( "checked", true );
      }
      if (electric_fence_.localeCompare("Yes")==0) {
        $( "#electric_radio" ).prop( "checked", true );
      }
      if (wall_.localeCompare("Yes")==0) {
        $( "#wall_radio" ).prop( "checked", true );
      }
      if (internet_.localeCompare("Yes")==0) {
        $( "#internet_radio" ).prop( "checked", true );
      }
      if (pool_.localeCompare("Yes")==0) {
        $( "#pool_radio" ).prop( "checked", true );
      }
      if (garden_.localeCompare("Yes")==0) {
        $( "#garden_radio" ).prop( "checked", true );
      }
      if (water_storage_.localeCompare("Yes")==0) {
        $( "#water_radio" ).prop( "checked", true );
      }
      if (gym_.localeCompare("Yes")==0) {
        $( "#gym_radio" ).prop( "checked", true );
      }
      if (disability_.localeCompare("Yes")==0) {
        $( "#disability_radio" ).prop( "checked", true );
      }
      if (furnished_.localeCompare("Yes")==0) {
        $( "#furnished_radio" ).prop( "checked", true );
      }
      if (prop_category.localeCompare("House")==0) {
        $( "#house_radio" ).prop( "checked", true );
      }
      if (prop_category.localeCompare("Land")==0) {
        $( "#land_radio" ).prop( "checked", true );
      }
      if (prop_buy_rent.localeCompare("Sale")==0) {
        $( "#buy_radio" ).prop( "checked", true );
      }
      if (prop_buy_rent.localeCompare("Rent")==0) {
        $( "#rent_radio" ).prop( "checked", true );
      }
    }

    function uploadPageSession(){

      var strUrl = myurl+"cmd=16";
    // prompt("url", strUrl);
    var objResult = sendRequest(strUrl);

    if(objResult.result == 0){
      // alert(objResult.message);
      return;
    }
    if(objResult.result == 1){  
      for(i=0;i<objResult.picture.length;i++){
       var p1 = document.createElement("img");
       var source;
       p1.setAttribute("height", "200");
       p1.setAttribute("width", "200");
       p1.setAttribute("alt", "Image not uploaded");
       if (i==0) {
        var newId=0;
        source=objResult.picture[i].pic0;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("delete1").innerHTML='<button id="dltbtn'+newId+'" onclick="deleteImage(this)" type="submit" class="btn  red btn-spacer waves-effect wave-dark center-align">Delete</button>';
        document.getElementById("picture1").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==1) {
        var newId=1;
        source=objResult.picture[i].pic1
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("delete2").innerHTML='<button id="dltbtn'+newId+'" onclick="deleteImage(this)" type="submit" class="btn  red btn-spacer waves-effect wave-dark center-align">Delete</button>';
        document.getElementById("picture2").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==2) {
        var newId=2;
        source=objResult.picture[i].pic2;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("delete3").innerHTML='<button id="dltbtn'+newId+'" onclick="deleteImage(this)" type="submit" class="btn  red btn-spacer waves-effect wave-dark center-align">Delete</button>';
        document.getElementById("picture3").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==3) {
        var newId=3;
        source=objResult.picture[i].pic3;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("delete4").innerHTML='<button id="dltbtn'+newId+'" onclick="deleteImage(this)" type="submit" class="btn  red btn-spacer waves-effect wave-dark center-align">Delete</button>';
        document.getElementById("picture4").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==4) {
        var newId=4;
        source=objResult.picture[i].pic4;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("delete5").innerHTML='<button id="dltbtn'+newId+'" onclick="deleteImage(this)" type="submit" class="btn  red btn-spacer waves-effect wave-dark center-align">Delete</button>';
        document.getElementById("picture5").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==5) {
        var newId=5;
        source=objResult.picture[i].pic5;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("delete6").innerHTML='<button id="dltbtn'+newId+'" onclick="deleteImage(this)" type="submit" class="btn  red btn-spacer waves-effect wave-dark center-align">Delete</button>';
        document.getElementById("picture6").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==6) {
        var newId=6;
        source=objResult.picture[i].pic6;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("delete7").innerHTML='<button id="dltbtn'+newId+'" onclick="deleteImage(this)" type="submit" class="btn  red btn-spacer waves-effect wave-dark center-align">Delete</button>';
        document.getElementById("picture7").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }

    }
    showPictureLimit();
  }
}

function showPictureLimit(){

  var strUrl = myurl+"cmd=31";
 // prompt("url", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){

  return;
}

$("#limit_error").text(objResult.limit[0].pic_limit);
}


function deleteImage(newid){

 var id= newid.getAttribute('id');
   // alert("id: "+id);
   var strUrl = myurl+"cmd=30&id="+id;
    // prompt("url",strUrl);
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0) {
     alert(objResult.message);
     return;
   }
     // alert(objResult.message);
     location.reload();
   }

   function uploadPageSession_review(){

    var strUrl = myurl+"cmd=16";
    // prompt("url", strUrl);
    var objResult = sendRequest(strUrl);

    if(objResult.result == 0){
      // alert(objResult.message);
      return;
    }
    if(objResult.result == 1){  
      for(i=0;i<objResult.picture.length;i++){
       var p1 = document.createElement("img");
       var source;
       p1.setAttribute("height", "200");
       p1.setAttribute("width", "200");
       p1.setAttribute("alt", "Image not uploaded");
       if (i==0) {
        var newId=0;
        source=objResult.picture[i].pic0;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("picture1").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==1) {
        var newId=1;
        source=objResult.picture[i].pic1
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("picture2").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==2) {
        var newId=2;
        source=objResult.picture[i].pic2;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("picture3").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==3) {
        var newId=3;
        source=objResult.picture[i].pic3;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("picture4").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==4) {
        var newId=4;
        source=objResult.picture[i].pic4;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("picture5").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }
      if (i==5) {
        var newId=5;
        source=objResult.picture[i].pic5;
        p1.setAttribute("src", "../uploads/"+source);
        document.getElementById("picture6").appendChild(p1);

        if(document.getElementById('dltbtn'+newId)){
          var getClicked=document.getElementById('dltbtn'+newId);
          getClicked.setAttribute('id',newId);
        }
      }

    }

  }
}

function getAllFields(){

  var strUrl = myurl+"cmd=21";
      // prompt("url", strUrl);
      var objResult = sendRequest(strUrl);

      if(objResult.result == 0){
        // alert(objResult.message);
        return;
      }

      $("#county").text(objResult.p1[0].county);
      $("#sub_county").text(objResult.p1[0].sub_county);
      $("#price").text(objResult.p1[0].price);
      $("#description").text(objResult.p1[0].description);
      $("#bathroom").text(objResult.p1[0].bathroom);
      $("#bedroom").text(objResult.p1[0].bedroom);
      $("#floors").text(objResult.p1[0].floors);
      $("#parking").text(objResult.p1[0].parking);
      $("#acres").text(objResult.p1[0].acre_size);
      $("#lprice").text(objResult.p1[0].lprice);
      $("#ldescription").text(objResult.p1[0].ldescription);
      $("#p_type").text(objResult.p1[0].p_type);
      var prop_category=objResult.p1[0].p_cat;
      var prop_buy_rent=objResult.p1[0].buy_rent;
      var hr_= objResult.p1[0].hr;
      var cctv_= objResult.p1[0].cctv;
      var alarm_= objResult.p1[0].alarm;
      var electric_fence_ = objResult.p1[0].electric_fence;
      var wall_ = objResult.p1[0].wall;
      var internet_ = objResult.p1[0].internet;
      var pool_ = objResult.p1[0].pool;
      var garden_ = objResult.p1[0].garden;
      var water_storage_ = objResult.p1[0].water_storage;
      var gym_ = objResult.p1[0].gym;
      var disability_ = objResult.p1[0].disability;
      var furnished_ = objResult.p1[0].furnished;

      if (hr_.localeCompare("Yes")==0) {
        $( "#hr" ).text(hr_);
      }
      else{$( "#hr" ).text("No");}
      if (cctv_.localeCompare("Yes")==0) {
        $( "#cctv" ).text(cctv_ );
      }
      else{
        $( "#cctv" ).text("No");
      }
      if (alarm_.localeCompare("Yes")==0) {
        $( "#alarm" ).text(  alarm_);
      }
      else{
        $( "#alarm" ).text("No");
      }
      if (electric_fence_.localeCompare("Yes")==0) {
        $( "#electric_fence" ).text( electric_fence_ );
      }
      else{
        $( "#electric_fence" ).text("No");
      }
      if (wall_.localeCompare("Yes")==0) {
        $( "#wall" ).text( wall_);
      }
      else{
        $( "#wall" ).text("No");
      }
      if (internet_.localeCompare("Yes")==0) {
        $( "#internet" ).text( internet_);
      }
      else{
        $( "#internet" ).text("No");
      }
      if (pool_.localeCompare("Yes")==0) {
        $( "#pool_" ).text(pool_ );
      }
      else{
        $( "#pool_" ).text("No" );
      }
      if (garden_.localeCompare("Yes")==0) {
        $( "#garden" ).text( garden_ );
      }
      else{
        $( "#garden" ).text( "No" );
      }
      if (water_storage_.localeCompare("Yes")==0) {
        $( "#water" ).text( water_storage_ );
      }
      else{
       $( "#water" ).text( "No" );
     }
     if (gym_.localeCompare("Yes")==0) {
      $("#gym" ).text(gym_ );
    }
    else{
     $( "#gym" ).text("No" );
   }
   if (disability_.localeCompare("Yes")==0) {
    $( "#disability" ).text(disability_ );
  }
  else{
    $( "#disability" ).text("No");
  }
  if (furnished_.localeCompare("Yes")==0) {
    $( "#furnished" ).text(furnished_);
  }
  else{
    $( "#furnished" ).text("No");
  }


  if (prop_category.localeCompare("House")==0) {
    $( "#category" ).text( prop_category );
  }
  if (prop_category.localeCompare("Land")==0) {
    $( "#category" ).text(prop_category );
  }
  if (prop_buy_rent.localeCompare("Sale")==0) {
    $( "#rent" ).text(prop_buy_rent );
  }
  if (prop_buy_rent.localeCompare("Rent")==0) {
    $( "#rent" ).text(prop_buy_rent );
  }

}

function addProperty(){

 var strUrl = myurl+"cmd=8";
 // prompt("url", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  // alert(objResult.message);
  return;
} 
window.location.href="../my property/index.php";
  // alert(objResult.message);
  return;
}

/**
* get 
*/

function getAllUserPosts(){

  var strUrl = myurl+"cmd=10";
   // prompt("url", strUrl);

   var objResult = sendRequest(strUrl);
   if(objResult.result == 0){

    return;
  }
  if(objResult.result == 1){  

    for(i=1;i<objResult.property.length;i++){
      var newId=objResult.property[i].xx_property_id;
      var newid=objResult.property[i].xx_property_id;

      var li = $('<li></li>');
      if (objResult.property[i].xx_property_category=="Land" ) {

       li.html( '<div class="card property-row"><div class=" col l2 "><a href="#"><img id="picSize" src="'+objResult.property[i].xx_picture_url+'" alt="" class="responsive-img center"></a></div><div class=" col l8 "><div class="bold_heading"><a href="#" onclick="showDetails2(this)" id="item'+newid+'"  class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Acres : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div></div> <div class="col l2"> <span onclick="editMyPost(this)" type="submit" class="iconClick" id="edit_btn'+newId+'"><i  class="fa fa-pencil-square-o prefix fa-2" style="color:green; font-weight:bold;">Edit</i></span><br><br><hr><br><span class="iconClick" id="delete_btn'+newId+'" onclick="deleteMyPost(this)"><i  class="fa fa-times prefix fa-2" style="color:red; font-weight:bold;">Delete</i></span> </div></div>');
     }
     else{
      li.html('<div class="card property-row"><div class=" col l2 "><a href="#"><img id="picSize" src="'+objResult.property[i].xx_picture_url+'" alt="" class="responsive-img center"></a></div><div class=" col l8 "><div class="bold_heading"><a href="#"  onclick="showDetails2(this)" id="item'+newid+'"  class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div></div> <div class="col l2"> <span onclick="editMyPost(this)" type="submit" class="iconClick" id="edit_btn'+newId+'"><i  class="fa fa-pencil-square-o prefix fa-2" style="color:green; font-weight:bold;">Edit</i></span><br><br><hr><br><span class="iconClick" id="delete_btn'+newId+'" onclick="deleteMyPost(this)"><i  class="fa fa-times prefix fa-2" style="color:red; font-weight:bold;">Delete</i></span> </div></div>');

    }
    $("#my_post_area_li").append(li);

    if(document.getElementById('delete_btn'+newId)){
      var getClicked=document.getElementById('delete_btn'+newId);
      getClicked.setAttribute('id',newId);
    }
    if(document.getElementById('edit_btn'+newId)){
      var getClicked=document.getElementById('edit_btn'+newId);
      getClicked.setAttribute('id',newId);
    }

    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }

  }
}
}

/**
* get all posts for the home page
*/

function getHomePosts(){
  var strUrl = urlHome+"cmd=11";
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(bjResult.message);
    return;
  }
  if(objResult.result == 1){  
    for(i=1;i<objResult.property.length;i++){

      var newId=objResult.property[i].xx_property_id;
      var newid=objResult.property[i].xx_property_id;
      var res = objResult.property[i].xx_picture_url.split("/");
      var url = res[res.length-1];
      url="uploads/"+url;

      var li = $('<li></li>');
      if (objResult.property[i].xx_property_category=="Land" ) {
        li.html(' <div class=" col l3 " id=""><div class="card property-row"><div class=" col l12 "><a href="#"><div class=" center"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div></a><div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Acres : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div></div>');
      }
      else{
        li.html(' <div class=" col l3 " id=""><div class="card property-row"><div class=" col l12 "><a href="#"><div class=" center"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div></a><div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div></div>');

      }
      $("#home_posts_li").append(li);

      if(document.getElementById('item'+newid)){
        var getClicked=document.getElementById('item'+newid);
        getClicked.setAttribute('id',newid);
      }
    }
  }
}

/**
* get all posts for the home page
*/

function redirect(){
  window.location.href="../search/search-result.php";
  getHousePosts();
}


/**
* get all posts for the home page
*/

function getAllPosts(){

  var page=1;

  $("#showing").text("");
  $("#showing").text(page);
  var strUrl = urlHome+"cmd=19&pg="+page;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);

    return;
  }
  if(objResult.result == 1){  

    hide("homepageDiv");
    hide("pDetailsDiv");
    show("searchDiv");

    showCount(page);

    for(i=1;i<objResult.property.length;i++){

     var newId=objResult.property[i].xx_property_id;
     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;
     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }

    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}

function getAllPostsAll(){

  var page=1;

  $("#showing").text("");
  $("#showing").text(page);
  var strUrl = myurl+"cmd=19&pg="+page;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);

    return;
  }
  if(objResult.result == 1){  


    hide("pDetailsDiv");
    show("myPropertyDiv");

    showCountFolder(page);

    for(i=1;i<objResult.property.length;i++){

     var newId=objResult.property[i].xx_property_id;
     
     var url = objResult.property[i].xx_picture_url;

     var newid=objResult.property[i].xx_property_id;
     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }

    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}

function getAllPostsAllHouse(){

  var page=1;

  $("#showing").text("");
  $("#showing").text(page);
  var strUrl = myurl+"cmd=17&pg="+page;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);

    return;
  }
  if(objResult.result == 1){  


    hide("pDetailsDiv");
    show("myPropertyDiv");

    showCountFolderHouse(page);

    for(i=1;i<objResult.property.length;i++){

     var newId=objResult.property[i].xx_property_id;
     
     var url = objResult.property[i].xx_picture_url;

     var newid=objResult.property[i].xx_property_id;
     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }

    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}

function getAllPostsAllLand(){

  var page=1;

  $("#showing").text("");
  $("#showing").text(page);
  var strUrl = myurl+"cmd=18&pg="+page;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);

    return;
  }
  if(objResult.result == 1){  


    hide("pDetailsDiv");
    show("myPropertyDiv");

    showCountFolderLand(page);

    for(i=1;i<objResult.property.length;i++){

     var newId=objResult.property[i].xx_property_id;
     
     var url = objResult.property[i].xx_picture_url;

     var newid=objResult.property[i].xx_property_id;
     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }

    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}


function showDetails(newid){
 var id= newid.getAttribute('id');
 // alert("detail: "+id);
 var strUrl = urlHome+"cmd=32&id="+id;
 // prompt("retails", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){

  alert(objResult.message);
  return;
}

if(objResult.result == 1){ 
  hide("homepageDiv");
  hide("searchDiv");
  show("pDetailsDiv");
  for(i=1;i<objResult.property.length;i++){

    var newid=objResult.property[i].xx_property_id;

    document.getElementById("headerDiv").innerHTML='<div class="single_property_bold_heading"><span id="property_title_area" class="property_title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span><br><span class="left">For '+objResult.property[i].xx_rent_sale+' <span id="cost_area" class="cost_area " > '+objResult.property[i].xx_price+ ' KES </span></span> <span class="right date_txt"> Posted on<span class="posted_on " id="property_post_date"> '+objResult.property[i].xx_time_added+'</span> </span></div>';
    document.getElementById("appendBtn").innerHTML='<button onclick="reportAddHome(this)" id="item'+newid+'" type="submit" class="btn reset-btn-space waves-effect wave-dark red center-align col l12 s12">Report</button>'

    if (objResult.property[i].xx_property_category=="Land" ) {
      $("#ldesc").text(objResult.property[i].xx_description);
      $("#ltype").text(objResult.property[i].xx_property_category);
      $("#lbuyrent").text(objResult.property[i].xx_rent_sale);
      $("#acre").text(objResult.property[i].xx_acres);
    }
    else{
      $("#desc").text(objResult.property[i].xx_description);
      $("#type").text(objResult.property[i].xx_property_category);
      $("#buyrent").text(objResult.property[i].xx_rent_sale);
      $("#bath").text(objResult.property[i].xx_bathroom);
      $("#bed").text(objResult.property[i].xx_bedroom);
      $("#floor").text(objResult.property[i].xx_floors);
      $("#parking").text(objResult.property[i].xx_parking_space);

      $("#24").text(objResult.property[i].xx_24_security);
      $("#cctv").text(objResult.property[i].xx_cctv);
      $("#alarm").text(objResult.property[i].xx_alarm_system);
      $("#electric").text(objResult.property[i].xx_electric_fence);
      $("#watchdog").text(objResult.property[i].xx_watch_dog);
      $("#wall").text(objResult.property[i].xx_wall);
      $("#gym").text(objResult.property[i].xx_gym);
      $("#water").text(objResult.property[i].xx_water_storage);
      $("#pool").text(objResult.property[i].xx_swimming_pool);
      $("#garden").text(objResult.property[i].xx_garden);
      $("#internet").text(objResult.property[i].xx_internet_access);
      $("#disability").text(objResult.property[i].xx_disability_access);
      $("#furnish").text(objResult.property[i].xx_fully_furnished);
    }
    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }

  showPictures(id);
}
}

function showDetails2(newid){
 var id= newid.getAttribute('id');
 // alert("detail: "+id);
 var strUrl = myurl+"cmd=32&id="+id;
 // prompt("retails", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){

  alert(objResult.message);
  return;
}

if(objResult.result == 1){ 
  hide("myPropertyDiv");
  show("pDetailsDiv");
  for(i=1;i<objResult.property.length;i++){

    var newid=objResult.property[i].xx_property_id;

    document.getElementById("headerDiv").innerHTML='<div class="single_property_bold_heading"><span id="property_title_area" class="property_title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span><br><span class="left">For '+objResult.property[i].xx_rent_sale+' <span id="cost_area" class="cost_area " > '+objResult.property[i].xx_price+ ' KES </span></span> <span class="right date_txt"> Posted on<span class="posted_on " id="property_post_date"> '+objResult.property[i].xx_time_added+'</span> </span></div>';
    document.getElementById("appendBtn").innerHTML='<button onclick="reportAdd(this)" id="item'+newid+'" type="submit" class="btn reset-btn-space waves-effect wave-dark red center-align col l12 s12">Report</button>'

    if (objResult.property[i].xx_property_category=="Land" ) {
      $("#ldesc").text(objResult.property[i].xx_description);
      $("#ltype").text(objResult.property[i].xx_property_category);
      $("#lbuyrent").text(objResult.property[i].xx_rent_sale);
      $("#acre").text(objResult.property[i].xx_acres);
    }
    else{
      $("#desc").text(objResult.property[i].xx_description);
      $("#type").text(objResult.property[i].xx_property_category);
      $("#buyrent").text(objResult.property[i].xx_rent_sale);
      $("#bath").text(objResult.property[i].xx_bathroom);
      $("#bed").text(objResult.property[i].xx_bedroom);
      $("#floor").text(objResult.property[i].xx_floors);
      $("#parking").text(objResult.property[i].xx_parking_space);

      $("#24").text(objResult.property[i].xx_24_security);
      $("#cctv").text(objResult.property[i].xx_cctv);
      $("#alarm").text(objResult.property[i].xx_alarm_system);
      $("#electric").text(objResult.property[i].xx_electric_fence);
      $("#watchdog").text(objResult.property[i].xx_watch_dog);
      $("#wall").text(objResult.property[i].xx_wall);
      $("#gym").text(objResult.property[i].xx_gym);
      $("#water").text(objResult.property[i].xx_water_storage);
      $("#pool").text(objResult.property[i].xx_swimming_pool);
      $("#garden").text(objResult.property[i].xx_garden);
      $("#internet").text(objResult.property[i].xx_internet_access);
      $("#disability").text(objResult.property[i].xx_disability_access);
      $("#furnish").text(objResult.property[i].xx_fully_furnished);
    }
    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }

  showPictures2(id);
}
}

function showDetails3(newid){
 var id= newid.getAttribute('id');
 // alert("detail: "+id);
 var strUrl = myurl+"cmd=32&id="+id;
 // prompt("retails", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){

  alert(objResult.message);
  return;
}

if(objResult.result == 1){ 
  hide("myPropertyDiv");
  show("pDetailsDiv");
  for(i=1;i<objResult.property.length;i++){
    var newid=objResult.property[i].xx_property_id;

    document.getElementById("headerDiv").innerHTML='<div class="single_property_bold_heading"><span id="property_title_area" class="property_title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span><br><span class="left">For '+objResult.property[i].xx_rent_sale+' <span id="cost_area" class="cost_area " > '+objResult.property[i].xx_price+ ' KES </span></span> <span class="right date_txt"> Posted on<span class="posted_on " id="property_post_date"> '+objResult.property[i].xx_time_added+'</span> </span></div>';
    document.getElementById("appendBtn").innerHTML='<button onclick="reportAdd(this)" id="item'+newid+'" type="submit" class="btn reset-btn-space waves-effect wave-dark red center-align col l12 s12">Report</button>'
    if (objResult.property[i].xx_property_category=="Land" ) {
      $("#ldesc").text(objResult.property[i].xx_description);
      $("#ltype").text(objResult.property[i].xx_property_category);
      $("#lbuyrent").text(objResult.property[i].xx_rent_sale);
      $("#acre").text(objResult.property[i].xx_acres);
    }
    else{
      $("#desc").text(objResult.property[i].xx_description);
      $("#type").text(objResult.property[i].xx_property_category);
      $("#buyrent").text(objResult.property[i].xx_rent_sale);
      $("#bath").text(objResult.property[i].xx_bathroom);
      $("#bed").text(objResult.property[i].xx_bedroom);
      $("#floor").text(objResult.property[i].xx_floors);
      $("#parking").text(objResult.property[i].xx_parking_space);

      $("#24").text(objResult.property[i].xx_24_security);
      $("#cctv").text(objResult.property[i].xx_cctv);
      $("#alarm").text(objResult.property[i].xx_alarm_system);
      $("#electric").text(objResult.property[i].xx_electric_fence);
      $("#watchdog").text(objResult.property[i].xx_watch_dog);
      $("#wall").text(objResult.property[i].xx_wall);
      $("#gym").text(objResult.property[i].xx_gym);
      $("#water").text(objResult.property[i].xx_water_storage);
      $("#pool").text(objResult.property[i].xx_swimming_pool);
      $("#garden").text(objResult.property[i].xx_garden);
      $("#internet").text(objResult.property[i].xx_internet_access);
      $("#disability").text(objResult.property[i].xx_disability_access);
      $("#furnish").text(objResult.property[i].xx_fully_furnished);
    }
    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }

  showPictures3(id);
}
}

function showPictures(myid){

 // alert("id-picture: "+myid);
 var strUrl = urlHome+"cmd=33&id="+myid;
 // prompt("picture", strUrl);
 var objResult2 = sendRequest(strUrl);

 if(objResult2.result == 0){

  alert(objResult2.message);
  return;
}
if(objResult2.result == 1){ 
  document.getElementById("appendImage1").innerHTML="";
  document.getElementById("appendImage2").innerHTML="";
  document.getElementById("appendImage3").innerHTML="";
  document.getElementById("appendImage4").innerHTML="";
  document.getElementById("appendImage5").innerHTML="";
  document.getElementById("appendImage6").innerHTML="";
  for(i=1;i<objResult2.property.length;i++){
    var res = objResult2.property[i].xx_picture_url.split("/");
    var url = res[res.length-1];
    url="uploads/"+url;


    if(i==1){
     document.getElementById("appendImage1").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==2){
     document.getElementById("appendImage2").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==3){
     document.getElementById("appendImage3").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==4){
     document.getElementById("appendImage4").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==5){
     document.getElementById("appendImage5").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==6){
     document.getElementById("appendImage6").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
 }
 showSellerDetails(myid);
}
}

function showPictures2(myid){

 // alert("id-picture: "+myid);
 var strUrl = myurl+"cmd=33&id="+myid;
 // prompt("picture", strUrl);
 var objResult2 = sendRequest(strUrl);

 if(objResult2.result == 0){

  alert(objResult2.message);
  return;
}
if(objResult2.result == 1){ 
  document.getElementById("appendImage1").innerHTML="";
  document.getElementById("appendImage2").innerHTML="";
  document.getElementById("appendImage3").innerHTML="";
  document.getElementById("appendImage4").innerHTML="";
  document.getElementById("appendImage5").innerHTML="";
  document.getElementById("appendImage6").innerHTML="";
  for(i=1;i<objResult2.property.length;i++){

    var url = objResult2.property[i].xx_picture_url;

    if(i==1){
     document.getElementById("appendImage1").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==2){
     document.getElementById("appendImage2").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==3){
     document.getElementById("appendImage3").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==4){
     document.getElementById("appendImage4").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==5){
     document.getElementById("appendImage5").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==6){
     document.getElementById("appendImage6").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
 }
 showSellerDetails2(myid);
}
}

function showPictures3(myid){

 // alert("id-picture: "+myid);
 var strUrl = myurl+"cmd=33&id="+myid;
 // prompt("picture", strUrl);
 var objResult2 = sendRequest(strUrl);

 if(objResult2.result == 0){

  alert(objResult2.message);
  return;
}
if(objResult2.result == 1){ 
  document.getElementById("appendImage1").innerHTML="";
  document.getElementById("appendImage2").innerHTML="";
  document.getElementById("appendImage3").innerHTML="";
  document.getElementById("appendImage4").innerHTML="";
  document.getElementById("appendImage5").innerHTML="";
  document.getElementById("appendImage6").innerHTML="";
  for(i=1;i<objResult2.property.length;i++){

    var url = objResult2.property[i].xx_picture_url;

    if(i==1){
     document.getElementById("appendImage1").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==2){
     document.getElementById("appendImage2").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==3){
     document.getElementById("appendImage3").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==4){
     document.getElementById("appendImage4").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==5){
     document.getElementById("appendImage5").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
   if(i==6){
     document.getElementById("appendImage6").innerHTML='<a href="'+url+'" class="highslide" onclick="return hs.expand(this)"><img src="'+url+'" class="slidepic" width="100%" height="100%" alt="Highslide JS" title="Click to enlarge image" /> </a> <div class="highslide-caption"> Find more details by contacting the property owner </div>';
   }
 }
 showSellerDetails3(myid);
}
}
function showSellerDetails(myid){

 // alert("id-picture: "+myid);
 var strUrl = urlHome+"cmd=34&id="+myid;
 // prompt("user", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){

  alert(objResult.message);
  return;
}
if(objResult.result == 1){ 
  $("#uname").text(objResult.user[1].xx_fname);
  $("#contact-space-phone").text(objResult.user[1].xx_user_phone);
  $("#contact-space-email").text(objResult.user[1].xx_user_email);
  getRelatedPosts(myid);
}
}

function showSellerDetails2(myid){

 // alert("id-picture: "+myid);
 var strUrl = myurl+"cmd=34&id="+myid;
 // prompt("user", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){

  alert(objResult.message);
  return;
}
if(objResult.result == 1){ 
  $("#uname").text(objResult.user[1].xx_fname);
  $("#contact-space-phone").text(objResult.user[1].xx_user_phone);
  $("#contact-space-email").text(objResult.user[1].xx_user_email);

}
}
function showSellerDetails3(myid){

 // alert("id-picture: "+myid);
 var strUrl = myurl+"cmd=34&id="+myid;
 // prompt("user", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){

  alert(objResult.message);
  return;
}
if(objResult.result == 1){ 
  $("#uname").text(objResult.user[1].xx_fname);
  $("#contact-space-phone").text(objResult.user[1].xx_user_phone);
  $("#contact-space-email").text(objResult.user[1].xx_user_email);
  getRelatedPosts2(myid);
}
}


function getRelatedPosts(myid){
  var strUrl = urlHome+"cmd=35&id="+myid;
   // prompt("related", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);
    return;
  }
  if(objResult.result == 1){  
   $("#search_posts_li2").empty();
   for(i=1;i<objResult.property.length;i++){

    var res = objResult.property[i].xx_picture_url.split("/");
    var url = res[res.length-1];
    url="uploads/"+url;

    var newid=objResult.property[i].xx_property_id;
    if(newid!=myid){
      var li = $('<li></li>');

      if (objResult.property[i].xx_property_category=="Land" ) {
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li2").append(li);
      }
      else{
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li2").append(li);
      }

      if(document.getElementById('item'+newid)){
        var getClicked=document.getElementById('item'+newid);
        getClicked.setAttribute('id',newid);
      }
    }
  }
}
}

function getRelatedPosts2(myid){
  var strUrl = myurl+"cmd=35&id="+myid;
   // prompt("related", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);
    return;
  }
  if(objResult.result == 1){  
   $("#search_posts_li2").empty();
   for(i=1;i<objResult.property.length;i++){

    var url = objResult.property[i].xx_picture_url;

    var newid=objResult.property[i].xx_property_id;
    if(newid!=myid){
      var li = $('<li></li>');

      if (objResult.property[i].xx_property_category=="Land" ) {
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li2").append(li);
      }
      else{
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li2").append(li);
      }

      if(document.getElementById('item'+newid)){
        var getClicked=document.getElementById('item'+newid);
        getClicked.setAttribute('id',newid);
      }
    }
  }
}
}

/**
* get all user details
*/

function getUserDetails(){
  var strUrl = myurl+"cmd=23";
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);
    return;
  }
  if(objResult.result == 1){ 

    $("#fname").val(objResult.user[1].xx_fname);
    $("#lname").val(objResult.user[1].xx_lname);
    $("#gender").val(objResult.user[1].xx_gender);
    $("#dob").val(objResult.user[1].xx_dob);
    $("#username").val(objResult.user[1].xx_username);
    $("#email").val(objResult.user[1].xx_user_email);
    $("#phone").val(objResult.user[1].xx_user_phone);
    $("#usertype").val(objResult.user[1].xx_user_type);
    $("#userstatus").val(objResult.user[1].xx_user_status);
    $("#created").val(objResult.user[1].xx_created_on);

  }
}




/**
* get count of user posts
*/

function getCountOfUserPosts(){
  var strUrl = myurl+"cmd=25";
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);
    return;
  }
  if(objResult.result == 1){ 

    $("#total_adds").text(objResult.property[1].post_count);

  }
}

/**
* get count of user posts
*/

function getCountOfUserAlerts(){

  var strUrl = myurl+"cmd=26";
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);
    return;
  }
  if(objResult.result == 1){ 

    $("#total_alerts").text(objResult.alert[1].alert_count);

  }
}

function resetProfileUserPassword(){   
 /* current password*/
 var c_password = $("#current_password").val();
 /*password2*/
 var password1 = $("#new_password").val();
 /*confirm password*/
 var password2 = $("#confirm_password").val();

 /* empty current password */
 if(c_password.length == 0){
  document.getElementById("login_error_area").innerHTML = '<div class="chip red white-text">Empty Current password code field<i class="material-icons">close</i></i></div>';
  return
}
/* empty password */
if(password1.length == 0){
  document.getElementById("login_error_area").innerHTML = '<div class="chip red white-text">Empty password field<i class="material-icons">close</i></div>';
  return;
}
/* empty confirm password */
if(password2.length == 0){
  document.getElementById("login_error_area").innerHTML = '<div class="chip red white-text">Empty confirm password field<i class="material-icons">close</i></div>';
  return;
}
/* different password */
if(password1!=password2){
  document.getElementById("login_error_area").innerHTML = '<div class="chip red white-text">The entered passwords do not match<i class="material-icons">close</i></div>';
  return;
}

var strUrl = myurl+"cmd=27&c_password="+c_password+"&password="+password1;
// prompt("url",strUrl);
var objResult = sendRequest(strUrl);
var errorArea = document.getElementById("login_error_area");
document.getElementById("login_error_area").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
if(objResult.result == 0) {
  document.getElementById("login_error_area").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  return;
}
else if(objResult.result == 1){

  document.getElementById("login_error_area").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    // return;
    $("#current_password").val('');
    $("#new_password").val('');
    $("#confirm_password").val('');
    logout();
  }
}


function deleteMyPost(newid){

 var id= newid.getAttribute('id');
   // alert("id: "+id);
   var strUrl = myurl+"cmd=28&id="+id;
    // prompt("url",strUrl);
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0) {
     alert(objResult.message);
     return;
   }
   alert(objResult.message);
   location.reload();
 }

 function reportAdd(newid){

   var id= newid.getAttribute('id');
   // alert("id: "+id);
   var strUrl = myurl+"cmd=40&id="+id;
    // prompt("url",strUrl);
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0) {
     alert(objResult.message);
     return;
   }
   alert(objResult.message);
   // location.reload();
 }

 function reportAddHome(newid){

   var id= newid.getAttribute('id');
   // alert("id: "+id);
   var strUrl = urlHome+"cmd=40&id="+id;
    // prompt("url",strUrl);
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0) {
     alert(objResult.message);
     return;
   }
   alert(objResult.message);
   // location.reload();
 }

 function searchProperty_Refined(){

  var page=1;

  $("#showing").text("");
  $("#showing").text(page);

  var cnty = document.getElementById("Property_county2");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county2");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type2");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category2");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from2").val();
  var price_to= $("#price_to2").val();

  var send_option = document.getElementsByName("property_option2");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = urlHome+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;
  // prompt("url", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){

    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    $("#no-results").text("");

    showSearchCount(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;

     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}


function searchHomeProperty_Refined(){

  var page=1;

  $("#showing").text("");
  $("#showing").text(page);


  var cnty = document.getElementById("Property_county");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from").val();
  var price_to= $("#price_to").val();

  var send_option = document.getElementsByName("property_option");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = urlHome+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;

  // prompt("home", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    getAllPosts();
    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    hide("homepageDiv");
    show("searchDiv");

    $("#no-results").text("");

    showSearchCount2(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;
     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}

function searchFolderProperty_Refined(){

  var page=1;

  $("#showing").text("");
  $("#showing").text(page);


  var cnty = document.getElementById("Property_county");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from").val();
  var price_to= $("#price_to").val();

  var send_option = document.getElementsByName("property_option");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = myurl+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;

  // prompt("home", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    getAllPostsAll();
    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    hide("homepageDiv");
    show("searchDiv");

    $("#no-results").text("");

    showSearchCount3(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

      var url = objResult.property[i].xx_picture_url;

      var newid=objResult.property[i].xx_property_id;
      var li = $('<li></li>');

      if (objResult.property[i].xx_property_category=="Land" ) {
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li").append(li);
      }
      else{
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li").append(li);
      }
      if(document.getElementById('item'+newid)){
        var getClicked=document.getElementById('item'+newid);
        getClicked.setAttribute('id',newid);
      }
    }
  }
}

function searchFolderProperty_RefinedNext(k){

  var page=k+1;

  $("#showing").text("");
  $("#showing").text(page);


  var cnty = document.getElementById("Property_county");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from").val();
  var price_to= $("#price_to").val();

  var send_option = document.getElementsByName("property_option");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = myurl+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;

  // prompt("home", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    getAllPostsAll();
    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    hide("homepageDiv");
    show("searchDiv");

    $("#no-results").text("");

    showSearchCount3(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

      var url = objResult.property[i].xx_picture_url;

      var newid=objResult.property[i].xx_property_id;
      var li = $('<li></li>');

      if (objResult.property[i].xx_property_category=="Land" ) {
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li").append(li);
      }
      else{
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li").append(li);
      }
      if(document.getElementById('item'+newid)){
        var getClicked=document.getElementById('item'+newid);
        getClicked.setAttribute('id',newid);
      }
    }
  }
}

function searchFolderProperty_RefinedBack(k){

  var page=k-1;

  $("#showing").text("");
  $("#showing").text(page);


  var cnty = document.getElementById("Property_county");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from").val();
  var price_to= $("#price_to").val();

  var send_option = document.getElementsByName("property_option");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = myurl+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;

  // prompt("home", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    getAllPostsAll();
    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    hide("homepageDiv");
    show("searchDiv");

    $("#no-results").text("");

    showSearchCount3(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

      var url = objResult.property[i].xx_picture_url;

      var newid=objResult.property[i].xx_property_id;
      var li = $('<li></li>');

      if (objResult.property[i].xx_property_category=="Land" ) {
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li").append(li);
      }
      else{
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li").append(li);
      }
      if(document.getElementById('item'+newid)){
        var getClicked=document.getElementById('item'+newid);
        getClicked.setAttribute('id',newid);
      }
    }
  }
}

function searchFolderProperty_RefinedThis(k){

  var page=k;

  $("#showing").text("");
  $("#showing").text(page);


  var cnty = document.getElementById("Property_county");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from").val();
  var price_to= $("#price_to").val();

  var send_option = document.getElementsByName("property_option");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = myurl+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;

  // prompt("home", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    getAllPostsAll();
    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    hide("homepageDiv");
    show("searchDiv");

    $("#no-results").text("");

    showSearchCount3(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

      var url = objResult.property[i].xx_picture_url;

      var newid=objResult.property[i].xx_property_id;
      var li = $('<li></li>');

      if (objResult.property[i].xx_property_category=="Land" ) {
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li").append(li);
      }
      else{
        li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails3(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
        $("#search_posts_li").append(li);
      }
      if(document.getElementById('item'+newid)){
        var getClicked=document.getElementById('item'+newid);
        getClicked.setAttribute('id',newid);
      }
    }
  }
}

function showSearchCount(p){


 var cnty = document.getElementById("Property_county2");
 var county = cnty.options[cnty.selectedIndex].value;

 var sub_cnty = document.getElementById("Property_sub_county2");
 var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

 var ptype = document.getElementById("Property_type2");
 var p_type = ptype.options[ptype.selectedIndex].value;

 var p_cat = document.getElementById("Property_category2");
 var p_category = p_cat.options[p_cat.selectedIndex].value;

 var price_from= $("#price_from2").val();
 var price_to= $("#price_to2").val();

 var send_option = document.getElementsByName("property_option2");
 var buy_rent;
 if (send_option[0].checked == true) {
  buy_rent="Sale";
} 
else if (send_option[1].checked == true) {
  buy_rent="Rent";
}

var strUrl = urlHome+"cmd=37&county="+county+"&sub_county="+sub_county+"&price_from="+
price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent;


 // prompt("",strUrl)
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
else{

  $("#num_results").text("");
  $("#num_results").text(objResult.property[1].numProperty);

  var numpages=objResult.property[1].numProperty/5;
  if (numpages<=0) {
    numpages=1;
  }

  $("#num_pgs").text("");
  $("#num_pgs").text(Math.floor(numpages));

  $("#pagen").empty();
  if(p>0){
    $("#pagen").append('<a href="#!"><span onclick="searchProperty_RefinedBack('+p+')" id="back"><i class="fa fa-chevron-left prefix"></i> </span></a>');
  }
  else{
    $("#pageError").text("You have reached the page limit");
  }

  for (var k = 1; k <= Math.floor(numpages+1); k++) {
    // alert(k)
    var li = $('<li class="waves-effect"></li>');
    li.html('<a class="black-text pageText"  onclick="searchProperty_RefinedThis('+k+')">'+k+'</a>');
    $("#pagen").append(li);
  }
  if(p<=Math.floor(numpages+1)){
    $("#pagen").append('<a href="#!"><span onclick="searchProperty_RefinedNext('+p+')" id="next"><i class="fa fa-chevron-right prefix"></i></span></a>');
  }
  else{
    $("#pageError").text("You have reached the page limit");
  }
}
}

function showSearchCount2(p){


  var cnty = document.getElementById("Property_county");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from").val();
  var price_to= $("#price_to").val();

  var send_option = document.getElementsByName("property_option");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = urlHome+"cmd=37&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent;
  
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    alert(objResult.message);
    return;
  }
  else{

    $("#num_results").text("");
    $("#num_results").text(objResult.property[1].numProperty);

    var numpages=objResult.property[1].numProperty/5;
    if (numpages<=0) {
      numpages=1;
    }

    $("#num_pgs").text("");
    $("#num_pgs").text(Math.floor(numpages+1));

    $("#pagen").empty();
    if(p>0){
      $("#pagen").append('<a href="#!"><span onclick="searchProperty_RefinedBack('+p+')" id="back"><i class="fa fa-chevron-left prefix"></i> </span></a>');
    }
    else{
      $("#pageError").text("You have reached the page limit");
    }

    for (var k = 1; k <= Math.floor(numpages+1); k++) {
    // alert(k)
    var li = $('<li class="waves-effect"></li>');
    li.html('<a class="black-text pageText"  onclick="searchProperty_RefinedThis('+k+')">'+k+'</a>');
    $("#pagen").append(li);
  }
  if(p<=Math.floor(numpages+1)){
    $("#pagen").append('<a href="#!"><span onclick="searchProperty_RefinedNext('+p+')" id="next"><i class="fa fa-chevron-right prefix"></i></span></a>');
  }
  else{
    $("#pageError").text("You have reached the page limit");
  }
}
}


function showSearchCount3(p){


  var cnty = document.getElementById("Property_county");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from").val();
  var price_to= $("#price_to").val();

  var send_option = document.getElementsByName("property_option");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = myurl+"cmd=37&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent;
  
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    alert(objResult.message);
    return;
  }
  else{

    $("#num_results").text("");
    $("#num_results").text(objResult.property[1].numProperty);

    var numpages=objResult.property[1].numProperty/5;
    if (numpages<=0) {
      numpages=1;
    }


    $("#num_pgs").text("");
    $("#num_pgs").text(Math.floor(numpages+1));

    $("#pagen").empty();
    if(p>0){
      $("#pagen").append('<a href="#!"><span onclick="searchFolderProperty_RefinedBack('+p+')" id="back"><i class="fa fa-chevron-left prefix"></i> </span></a>');
    }
    else{
      $("#pageError").text("You have reached the page limit");
    }

    for (var k = 1; k <= Math.floor(numpages+1); k++) {

      var li = $('<li class="waves-effect"></li>');
      li.html('<a class="black-text pageText"  onclick="searchFolderProperty_RefinedThis('+k+')">'+k+'</a>');
      $("#pagen").append(li);
    }
    if(p<=Math.floor(numpages+1)){
      $("#pagen").append('<a href="#!"><span onclick="searchFolderProperty_RefinedNext('+p+')" id="next"><i class="fa fa-chevron-right prefix"></i></span></a>');
    }
    else{
      $("#pageError").text("You have reached the page limit");
    }
  }
}


function searchProperty_RefinedBack(k){

  var page;
  page=(k+1);

  $("#showing").text("");
  $("#showing").text(page);

  var cnty = document.getElementById("Property_county2");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county2");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type2");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category2");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from2").val();
  var price_to= $("#price_to2").val();

  var send_option = document.getElementsByName("property_option2");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = urlHome+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;
  // prompt("url", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){

    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    $("#no-results").text("");

    showSearchCount(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;

     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}


function searchProperty_RefinedNext(k){

  var page;
  page=(k+1);

  $("#showing").text("");
  $("#showing").text(page);

  var cnty = document.getElementById("Property_county2");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county2");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type2");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category2");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from2").val();
  var price_to= $("#price_to2").val();

  var send_option = document.getElementsByName("property_option2");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = urlHome+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;
  // prompt("url", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){

    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    $("#no-results").text("");

    showSearchCount(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;

     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}

function searchProperty_RefinedThis(k){

  var page;
  page=k;

  $("#showing").text("");
  $("#showing").text(page);

  var cnty = document.getElementById("Property_county2");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_sub_county2");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var ptype = document.getElementById("Property_type2");
  var p_type = ptype.options[ptype.selectedIndex].value;

  var p_cat = document.getElementById("Property_category2");
  var p_category = p_cat.options[p_cat.selectedIndex].value;

  var price_from= $("#price_from2").val();
  var price_to= $("#price_to2").val();

  var send_option = document.getElementsByName("property_option2");
  var buy_rent;
  if (send_option[0].checked == true) {
    buy_rent="Sale";
  } 
  else if (send_option[1].checked == true) {
    buy_rent="Rent";
  }

  var strUrl = urlHome+"cmd=29&county="+county+"&sub_county="+sub_county+"&price_from="+
  price_from+"&price_to="+price_to+"&p_type="+p_type+"&p_cat="+p_category+"&buy_rent="+buy_rent+"&pg="+page;
  // prompt("url", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){

    $("#no-results").text(objResult.message);
    return;
  }
  if(objResult.result == 1){ 
    $("#no-results").text("");

    showSearchCount(page);

    $("#search_posts_li").empty(); 
    for(i=1;i<objResult.property.length;i++){

     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;

     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}


function showCount(p){


 strUrl = urlHome+"cmd=36";

 // prompt("",strUrl)
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
else{

  $("#num_results").text("");
  $("#num_results").text(objResult.property[1].numProperty);

  var numpages=objResult.property[1].numProperty/5;
  if (numpages<=0) {
    numpages=1;
  }


  $("#num_pgs").text("");
  $("#num_pgs").text(Math.floor(numpages+1));

  $("#pagen").empty();

  if(p>0){
    $("#pagen").append('<a href="#!"><span onclick="getBack('+p+')" id="back"><i class="fa fa-chevron-left prefix"></i> </span></a>');
  }
  else{
    $("#pageError").text("You have reached the page limit");
  }

  for (var k = 1; k <= Math.floor(numpages); k++) {
    // alert(k)
    var li = $('<li class="waves-effect"></li>');
    li.html('<a class="black-text-text pageText"  onclick="getThisPage('+k+')">'+k+'</a>');
    $("#pagen").append(li);
  }
  if(p<Math.floor(numpages+1)){
    $("#pagen").append('<a href="#!"><span onclick="getNext('+p+')" id="next"><i class="fa fa-chevron-right prefix"></i></span></a>');
  }

  else{
    $("#pageError").text("You have reached the page limit");
  }

}
}

function showCountFolder(p){


 strUrl = myurl+"cmd=36";

 // prompt("",strUrl)
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
else{

  $("#num_results").text("");
  $("#num_results").text(objResult.property[1].numProperty);

  var numpages=objResult.property[1].numProperty/5;
  if (numpages<=0) {
    numpages=1;
  }


  $("#num_pgs").text("");
  $("#num_pgs").text(Math.floor(numpages+1));

  $("#pagen").empty();

  if(p>0){
    $("#pagen").append('<a href="#!"><span onclick="searchFolderProperty_RefinedBack('+p+')" id="back"><i class="fa fa-chevron-left prefix"></i> </span></a>');
  }
  else{
    $("#pageError").text("You have reached the page limit");
  }

  for (var k = 1; k <= Math.floor(numpages); k++) {
    // alert(k)
    var li = $('<li class="waves-effect"></li>');
    li.html('<a class="black-text pageText"  onclick="searchFolderProperty_RefinedThis('+k+')">'+k+'</a>');
    $("#pagen").append(li);
  }
  if(p<Math.floor(numpages+1)){
    $("#pagen").append('<a href="#!"><span onclick="searchFolderProperty_RefinedNext('+p+')" id="next"><i class="fa fa-chevron-right prefix"></i></span></a>');
  }

  else{
    $("#pageError").text("You have reached the page limit");
  }

}
}

function showCountFolderHouse(p){


 strUrl = myurl+"cmd=38";

 // prompt("",strUrl)
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
else{

  $("#num_results").text("");
  $("#num_results").text(objResult.property[1].numProperty);

  var numpages=objResult.property[1].numProperty/5;
  if (numpages<=0) {
    numpages=1;
  }


  $("#num_pgs").text("");
  $("#num_pgs").text(Math.floor(numpages+1));

  $("#pagen").empty();

  if(p>0){
    $("#pagen").append('<a href="#!"><span onclick="searchFolderProperty_RefinedBack('+p+')" id="back"><i class="fa fa-chevron-left prefix"></i> </span></a>');
  }
  else{
    $("#pageError").text("You have reached the page limit");
  }

  for (var k = 1; k <= Math.floor(numpages); k++) {
    // alert(k)
    var li = $('<li class="waves-effect"></li>');
    li.html('<a class="black-text pageText"  onclick="searchFolderProperty_RefinedThis('+k+')">'+k+'</a>');
    $("#pagen").append(li);
  }
  if(p<Math.floor(numpages+1)){
    $("#pagen").append('<a href="#!"><span onclick="searchFolderProperty_RefinedNext('+p+')" id="next"><i class="fa fa-chevron-right prefix"></i></span></a>');
  }

  else{
    $("#pageError").text("You have reached the page limit");
  }

}
}

function showCountFolderLand(p){


 strUrl = myurl+"cmd=39";

 // prompt("",strUrl)
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
else{

  $("#num_results").text("");
  $("#num_results").text(objResult.property[1].numProperty);

  var numpages=objResult.property[1].numProperty/5;
  if (numpages<=0) {
    numpages=1;
  }


  $("#num_pgs").text("");
  $("#num_pgs").text(Math.floor(numpages+1));

  $("#pagen").empty();

  if(p>0){
    $("#pagen").append('<a href="#!"><span onclick="searchFolderProperty_RefinedBack('+p+')" id="back"><i class="fa fa-chevron-left prefix"></i> </span></a>');
  }
  else{
    $("#pageError").text("You have reached the page limit");
  }

  for (var k = 1; k <= Math.floor(numpages+1); k++) {
    // alert(k)
    var li = $('<li class="waves-effect"></li>');
    li.html('<a class="black-text pageText"  onclick="searchFolderProperty_RefinedThis('+k+')">'+k+'</a>');
    $("#pagen").append(li);
  }
  if(p<Math.floor(numpages+1)){
    $("#pagen").append('<a href="#!"><span onclick="searchFolderProperty_RefinedNext('+p+')" id="next"><i class="fa fa-chevron-right prefix"></i></span></a>');
  }

  else{
    $("#pageError").text("You have reached the page limit");
  }

}
}

function increase_page(n){
  var page=n+1;
  return page;
}


function getNext(k){

  var page;
  page=(k+1);

  $("#showing").text("");
  $("#showing").text(page);
  var strUrl = urlHome+"cmd=19&pg="+page;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);

    return;
  }
  if(objResult.result == 1){  

    hide("homepageDiv");
    hide("pDetailsDiv");
    show("searchDiv");

    showCount(page);
    $("#search_posts_li").empty();
    for(i=1;i<objResult.property.length;i++){

     var newId=objResult.property[i].xx_property_id;
     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;
     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }

    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}

function getBack(k){

  var page;
  page=(k-1);

  $("#showing").text("");
  $("#showing").text(page);
  var strUrl = urlHome+"cmd=19&pg="+page;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);

    return;
  }
  if(objResult.result == 1){  

    hide("homepageDiv");
    hide("pDetailsDiv");
    show("searchDiv");

    showCount(page);
    $("#search_posts_li").empty();
    for(i=1;i<objResult.property.length;i++){

     var newId=objResult.property[i].xx_property_id;
     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;
     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }

    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}

function getThisPage(k){

 var page;
 page=k;

 $("#showing").text("");
 $("#showing").text(page);
 var strUrl = urlHome+"cmd=19&pg="+page;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   
   if(objResult.result == 0){

    alert(objResult.message);

    return;
  }
  if(objResult.result == 1){  

    hide("homepageDiv");
    hide("pDetailsDiv");
    show("searchDiv");

    showCount(page);
    $("#search_posts_li").empty();
    for(i=1;i<objResult.property.length;i++){

     var newId=objResult.property[i].xx_property_id;
     var res = objResult.property[i].xx_picture_url.split("/");
     var url = res[res.length-1];
     url="uploads/"+url;

     var newid=objResult.property[i].xx_property_id;
     var li = $('<li></li>');

     if (objResult.property[i].xx_property_category=="Land" ) {
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#" onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Land size : <span id="bd_qty">'+objResult.property[i].xx_acres+' </span></span> </div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }
    else{
      li.html('<div class="card property-row"><div class=" col l2"><img id="picSize" src="'+url+'" alt="" class="responsive-img center"></div><div class="col l10"> <div class="bold_heading"><a href="#"onclick="showDetails(this)" id="item'+newid+'" class="property-link"><span id="title_area" class="title_area">'+objResult.property[i].xx_property_category+' for '+objResult.property[i].xx_rent_sale+' in '+objResult.property[i].xx_county+' ,'+objResult.property[i].xx_sub_county+'</span></a> <span id="cost_area" class="cost_area right" >'+objResult.property[i].xx_price+ ' KES </span> </div><div><span class="description_area">'+objResult.property[i].xx_description+'</span> </div><div class=""><span class="bedroom">Bedroom <span id="bd_qty">'+objResult.property[i].xx_bedroom+' </span></span> <span class="bathroom"> Bathroom <span id="bath_qty">'+objResult.property[i].xx_bathroom+'</span> </span></div><div><span class="posted_on">'+objResult.property[i].xx_time_added+'</span> <span class="seen right"><i class="fa fa-eye prefix" >50</i></span></div><div><span class="p_location" onclick="" >'+objResult.property[i].xx_sub_county+'</span></div> </div></div>');
      $("#search_posts_li").append(li);
    }

    if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }
  }
}
}



function editMyPost(newid){

 var id= newid.getAttribute('id');
 var strUrl = myurl+"cmd=44&id="+id;
   // prompt("url",strUrl);
   var objResult = sendRequest(strUrl);
   if(objResult.result == 0) {
    return;
  } 
  hide("pDetailsDiv");
  hide("myPropertyDiv");
  show("editPost");
   var newid=objResult.property[1].xx_property_id;

document.getElementById("updateBtn").innerHTML=' <button id="item'+newid+'" onclick="addEditedPost(this)"  type="submit" class="btn nextfooter btnColor btn-spacer waves-effect wave-dark center-align">Update Property</button>' 

  $("#Property_county").val(objResult.property[1].xx_county);
  $('select').material_select();
  $("#Property_sub_county").val(objResult.property[1].xx_sub_county);
  var prop_category=objResult.property[1].xx_property_category;
  var prop_buy_rent=objResult.property[1].xx_rent_sale;
  var hr_= objResult.property[1].xx_24_security;
  var cctv_= objResult.property[1].xx_cctv;
  var alarm_= objResult.property[1].xx_alarm_system;
  var electric_fence_ = objResult.property[1].xx_electric_fence;
  var wall_ = objResult.property[1].xx_wall;
  var internet_ = objResult.property[1].xx_internet_access;
  var pool_ = objResult.property[1].xx_swimming_pool;
  var garden_ = objResult.property[1].xx_garden;
  var water_storage_ = objResult.property[1].xx_water_storage;
  var gym_ = objResult.property[1].xx_gym;
  var disability_ = objResult.property[1].xx_disability_access;
  var furnished_ = objResult.property[1].xx_fully_furnished;

  if (prop_category.localeCompare("House")==0) {
    $( "#house_radio" ).prop( "checked", true );
    hide("land_div"); 
    show("house_div");

    $("#price").val(objResult.property[1].xx_price);
    $("#description").val(objResult.property[1].xx_description);
    $("#bathroom").val(objResult.property[1].xx_bathroom);
    $("#house_bedroom").val(objResult.property[1].xx_bedroom);
    $("#floors").val(objResult.property[1].xx_floors);
    $("#parking").val(objResult.property[1].xx_parking_space);

    $("#Property_type").val(objResult.property[1].xx_property_type);

    if (hr_.localeCompare("Yes")==0) {
    $( "#24hr_radio" ).prop( "checked", true );
  }
  if (cctv_.localeCompare("Yes")==0) {
    $( "#cctv_radio" ).prop( "checked", true );
  }
  if (alarm_.localeCompare("Yes")==0) {
    $( "#alarm_radio" ).prop( "checked", true );
  }
  if (electric_fence_.localeCompare("Yes")==0) {
    $( "#electric_radio" ).prop( "checked", true );
  }
  if (wall_.localeCompare("Yes")==0) {
    $( "#wall_radio" ).prop( "checked", true );
  }
  if (internet_.localeCompare("Yes")==0) {
    $( "#internet_radio" ).prop( "checked", true );
  }
  if (pool_.localeCompare("Yes")==0) {
    $( "#pool_radio" ).prop( "checked", true );
  }
  if (garden_.localeCompare("Yes")==0) {
    $( "#garden_radio" ).prop( "checked", true );
  }
  if (water_storage_.localeCompare("Yes")==0) {
    $( "#water_radio" ).prop( "checked", true );
  }
  if (gym_.localeCompare("Yes")==0) {
    $( "#gym_radio" ).prop( "checked", true );
  }
  if (disability_.localeCompare("Yes")==0) {
    $( "#disability_radio" ).prop( "checked", true );
  }
  if (furnished_.localeCompare("Yes")==0) {
    $( "#furnished_radio" ).prop( "checked", true );
  }
  }
  if (prop_category.localeCompare("Land")==0) {
    $( "#land_radio" ).prop( "checked", true );
    show("land_div"); 
    hide("house_div");
    $("#acre_size").val(objResult.property[1].xx_acres);
    $("#lprice").val(objResult.property[1].xx_price);
    $("#ldescription").val(objResult.property[1].xx_description);
  }
  if (prop_buy_rent.localeCompare("Sale")==0) {
    $( "#buy_radio" ).prop( "checked", true );
  }
  if (prop_buy_rent.localeCompare("Rent")==0) {
    $( "#rent_radio" ).prop( "checked", true );
  }


  

   if(document.getElementById('item'+newid)){
      var getClicked=document.getElementById('item'+newid);
      getClicked.setAttribute('id',newid);
    }

  }

function addEditedPost(newid){
 var id= newid.getAttribute('id');

 // alert("new id is "+id);

var cnty = document.getElementById("Property_county");
 var county = cnty.options[cnty.selectedIndex].value;

 var sub_cnty = document.getElementById("Property_sub_county");
 var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

 var ptype = document.getElementById("Property_type");
 var p_type = ptype.options[ptype.selectedIndex].value;

 var p_option = document.getElementsByName("p_cat"); 
 var buy_rent_option = document.getElementsByName("buy-rent");

 var hr_= document.getElementsByName("24hr_radio");
 var cctv_= document.getElementsByName("cctv_radio");
 var alarm_= document.getElementsByName("alarm_radio");
 var electric_fence_ = document.getElementsByName("electric_radio");
 var wall_ = document.getElementsByName("wall_radio");
 var internet_ = document.getElementsByName("internet_radio");
 var pool_ = document.getElementsByName("pool_radio");
 var garden_ = document.getElementsByName("garden_radio");
 var water_storage_ = document.getElementsByName("water_radio");
 var gym_ = document.getElementsByName("gym_radio");
 var disability_ = document.getElementsByName("furnished_radio");
 var furnished_ = document.getElementsByName("p_cat");

 var Property_category ;
 var buy_rent;
 var hr;
 var cctv;
 var alarm;
 var electric_fence;
 var wall;
 var internet;
 var pool;
 var garden;
 var water_storage;
 var gym;
 var disability;
 var furnished;

 if (hr_[0].checked == true) {
  hr="Yes";
}
else{
  hr="No";
}
if (cctv_[0].checked == true) {
  cctv="Yes";
}
else{
  cctv="No";
}
if (alarm_[0].checked == true) {
  alarm="Yes";
}
else{
 alarm="No";
}
if (electric_fence_[0].checked == true) {
  electric_fence="Yes";
}
else{
 electric_fence="No";
}
if (wall_[0].checked == true) {
  wall="Yes";
}
else{
 wall="No";
}
if (internet_[0].checked == true) {
  internet="Yes";
}
else{
  internet="No";
}
if (pool_[0].checked == true) {
  pool="Yes";
}
else{
  pool="No";
}
if (garden_[0].checked == true) {
  garden="Yes";
}
else{
  garden="No";
}
if (water_storage_[0].checked == true) {
  water_storage="Yes";
}
else{
  water_storage="No";
}
if (gym_[0].checked == true) {
  gym="Yes";
}
else{
 gym="No";
}
if (disability_[0].checked == true) {
  disability="Yes";
}
else{
  disability="No";
}
if (furnished_[0].checked == true) {
  furnished="Yes";
}
else{
  furnished="No";
}

if (p_option[0].checked == true) {
  Property_category="House";
}
if (p_option[1].checked == true) {
 Property_category="Land";
}
if (buy_rent_option[0].checked == true) {
  buy_rent="Sale";
}
if (buy_rent_option[1].checked == true) {
  buy_rent="Rent";
}

var price= $("#price").val();
var description= $("#description").val();
var bathroom= $("#bathroom").val();
var bedroom= $("#house_bedroom").val();
var floors= $("#floors").val();
var parking= $("#parking").val();
var acres= $("#acre_size").val();
var lprice= $("#lprice").val();
var ldescription= $("#ldescription").val();

/*validation */

if(county.length == 0) {
  document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please select the county<i class="material-icons">close</i></div>';
  $(window).scrollTop(0);
  return;
}
if(sub_county.length == 0) {
  document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please select the sub county<i class="material-icons">close</i></div>';
  $(window).scrollTop(0);
  return;
}
if (p_option[0].checked == false && p_option[1].checked == false) {
 document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please select the property category i.e. House or land<i class="material-icons">close</i></div>';
 $(window).scrollTop(0);
 return;
}
if (buy_rent_option[0].checked == false && buy_rent_option[1].checked == false) {
 document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please choose if the property is for sale or rent<i class="material-icons">close</i></div>';
 $(window).scrollTop(0);
 return;
}
if (p_option[0].checked == true) {
  if(p_type.length == 0) {
    document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please select the property type<i class="material-icons">close</i></div>';
    $(window).scrollTop(0);
    return;
  }
  if(price.length == 0) {
    document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please enter the price of the property <i class="material-icons">close</i></div>';
    $(window).scrollTop(0);
    return;
  }

  if((parseFloat(price) == parseFloat(price)) && !isNaN(price)){}
    else{
      document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Invalid input. Please provide a number on the price field e.g. 45000 <i class="material-icons">close</i></div>';
      $(window).scrollTop(0);
      return;
    }
    if(description.length == 0) {
      document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please enter the description of the property <i class="material-icons">close</i></div>';
      $(window).scrollTop(0);
      return;
    }
    if((parseFloat(bedroom) == parseInt(bedroom)) && !isNaN(bedroom)){}
      else{
        document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Error provide number on bedroom e.g. 2<i class="material-icons">close</i></div>';
        $(window).scrollTop(0);
        return;
      } 
      if((parseFloat(bathroom) == parseInt(bathroom)) && !isNaN(bathroom)){}
        else{
          document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Error provide number on bathroom e.g. 2<i class="material-icons">close</i></div>';
          $(window).scrollTop(0);
          return;
        } 

        if((parseFloat(floors) == parseInt(floors)) && !isNaN(floors)){}
          else{
            document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Error provide number on floors e.g. 2<i class="material-icons">close</i></div>';
            $(window).scrollTop(0);
            return;
          } 
          if((parseFloat(parking) == parseInt(parking)) && !isNaN(parking)){}
            else{
              document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Error provide number on parking e.g. 2<i class="material-icons">close</i></div>';
              $(window).scrollTop(0);
              return;
            } 
          }
          if (p_option[1].checked == true) {
            if(acres.length == 0) {
              document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Enter the land size<i class="material-icons">close</i></div>';
              $(window).scrollTop(0);
              return;

            }
            if((parseFloat(acres) == parseInt(acres)) && !isNaN(acres)){}
              else{
                document.getElementById("add_error").acres = '<div class="chip red white-text">Error provide number on acres<i class="material-icons">close</i></div>';
                $(window).scrollTop(0);
                return;
              }
              if(lprice.length == 0) {
                document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please enter the price of the land <i class="material-icons">close</i></div>';
                $(window).scrollTop(0);
                return;
      }
      if((parseFloat(lprice) == parseFloat(lprice)) && !isNaN(lprice)){}
        else{
          document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Invalid input. Please provide a number on the price field e.g. 45000 <i class="material-icons">close</i></div>';
          $(window).scrollTop(0);
          return;
        } 
        if(ldescription.length == 0) {
          document.getElementById("add_error").innerHTML = '<div class="chip red white-text">Please enter the description of the land <i class="material-icons">close</i></div>';
          $(window).scrollTop(0);
          return;
        } 
      }


      var strUrl = myurl+"cmd=45&county="+county+"&sub_county="+sub_county+"&price="+
      price+"&description="+description+"&bathroom="+bathroom+"&bedroom="+bedroom+
      "&floors="+floors+"&parking="+parking +"&acres="+acres+"&lprice="+lprice+
      "&ldescription="+ldescription+"&p_type="+p_type+"&p_cat="+Property_category+"&buy_rent="+buy_rent+
      "&hr="+hr+"&cctv="+cctv+"&alarm="+alarm+"&electric_fence="+electric_fence+
      "&wall="+wall+"&internet="+internet+"&pool="+pool+"&garden="+garden+
      "&water_storage="+water_storage+"&gym="+gym+"&disability="+disability+"&furnished="+furnished+"&id="+id;

    // prompt("url", strUrl);
    var objResult = sendRequest(strUrl);

    if(objResult.result == 0){
      alert(objResult.message);
      return;
    }

    if(objResult.result == 1){
      // alert(objResult.message);
      location.reload();
    }
    
  }




  function logout(){
   var strUrl = myurl+"cmd=3";
 // prompt("url",strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
alert(objResult.message);
window.location.href = "../index.php";

}
function logout_Home(){
 var strUrl = urlHome+"cmd=3";
 // prompt("url",strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
alert(objResult.message);
window.location.href = "index.php";

}


