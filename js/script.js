
var myurl = "../model/main.php?";
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
    } else if (send_option[1].checked == true) {
      selectedOption.innerHTML='<div class="input-field col l6 s12"><input id="reset_phone" type="text" class="validate" autocomplete="off"> <label for="reset_phone">Phone</label> </div> <div class="col l6 m6 s12"> <button onclick="sendVerificationCode()" type="submit" class="btn reset-btn-space waves-effect wave-dark blue darken-1 center-align ">Reset my password</button></div>';
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
} else if (buyer_option[1].checked == true) {
  hide("send-buyer-email");
  show("send-buyer-message");
}
}

function alertMessageOption(){
 var alertDiv=document.getElementById("alertOptionDiv");

 var optAlert = document.getElementsByName("alert_option");
 if (optAlert[0].checked == true) {
  alertDiv.innerHTML='<div class="input-field col l12 s12"> <input id="alert_email" type="email" class="validate" autocomplete="off"> <label for="alert_email">Email </label>  </div>';
} else if (optAlert[1].checked == true) {
  alertDiv.innerHTML='<div class="input-field col l12 s12"> <input type="tel" id="alert_phone" placeholder="" class="validate" autocomplete="off"> <label for="alert_phone">Phone </label></div>';
}
}

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
            document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Empty password<i class="material-icons">close</i></div>';
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
      var strUrl = myurl+"cmd=2&username="+user_name+"&password="+password+"&email="+email+"&phone="+phone;

      var objResult = sendRequest(strUrl);
      var errorArea = document.getElementById("serror_area");
      document.getElementById("serror_area").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
      if(objResult.result == 0) {
        document.getElementById("serror_area").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
        return;
      }
      location.reload();
      // $("#username").val('');
      // $("#password").val('');
      // $("#confirm_password").val('');
      // $("#email").val('');
      // $("#phone").val('');
      // document.getElementById("serror_area").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="fa fa-remove"></i></div>';   
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
    prompt("url",strUrl);
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
  prompt("url",strUrl);
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

/**
Adding a new post
*/
function subscribeAlert(){

  var alert_option = document.getElementsByName("alert_option"); 
  var buy_rent_option = document.getElementsByName("type1");

  var cnty = document.getElementById("Property_county_alert");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_county_alert");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var p_category = document.getElementById("Property_category");

  var user_email ;
  var user_phone;
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
    buy_rent = "Buy";
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
 user_email = $("#alert_email").val();

 strUrl = myurl+"cmd=6&email="+user_email+"&county="+county+"&sub_county="+sub_county+
 "&buy_rent="+buy_rent+"&Property_category="+Property_category+"&property_type="+property_type+
 "&p_from="+p_from+"&p_to="+p_to+"&p_bed="+p_bed+"&p_bath="+p_bath+"&acres="+acres;
}
/*phone*/
if (alert_option[1].checked == true) {
 user_phone= $("#alert_phone").val();
 strUrl = myurl+"cmd=6&phone="+user_phone+"&county="+county+"&sub_county="+sub_county+
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
$("#alert_phone").val('')


  // location.reload();
}


function addProperty(){

  // var foodname=$("#foodname").val(); //get the food name
  // var foodprice=document.getElementById("#foodprice").val(); //get the food price
  
    var fullPath = getElementById('#fileToUpload').val(); //get the full path of uploaded image

    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/')); //get the index where the name starts
        var filename = fullPath.substring(startIndex); //get the  filename of image
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) { //check whether the filename still contains a '\' character.
            filename = filename.substring(1); //remove the unwanted characters
    }
    alert(filename);

    var imageName = filename;

    var strUrl = myurl+"cmd=8&pic=" + imageName;

    var response = sendRequest(strUrl);

    if (response.result == 1) {
        alert("image upload done");

            // attach handler to form's submit event
            $('#addform').submit(function () {
                // submit the form
                $(this).ajaxSubmit();
                // return false to prevent normal browser submit and page navigation

                return false;
            });
        }
        else
            alert("image upload failed");

    }
  }


function page1Session(){
 var longi= $("#longitude").val();
 var lati= $("#latitude").val();
  var cnty = document.getElementById("Property_county_add");
  var county = cnty.options[cnty.selectedIndex].value;

  var sub_cnty = document.getElementById("Property_county_add");
  var sub_county = sub_cnty.options[sub_cnty.selectedIndex].value;

  var strUrl = myurl+"cmd=20&longitude="+longitude+"&latitude="+latitude+
  "&county="+county+"&sub_county="+sub_county;
      var objResult = sendRequest(strUrl);

      if(objResult.result == 0){
        alert(objResult.message);
        return;
      }

}














function searchAlerts(){
 var strUrl;
 var search_option = document.getElementsByName("search-option");
 /*email*/
 if (search_option[0].checked == true) {
   user_email = $("#search_email").val();

   strUrl = myurl+"cmd=7&email="+user_email;
 }
 /*phone*/
 if (search_option[1].checked == true) {
   user_phone= $("#search_phone").val();
   strUrl = myurl+"cmd=7&phone="+user_phone;
 }
 ;
 // prompt("url", strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
hide("searchAlertDiv");
show("listAlertsDiv");
var mytable=$('#jsontable').dataTable();
mytable.fnClearTable();
for(i=0;i<objResult.alert.length;i++){
  mytable.fnAddData([ objResult.alert[i].xx_alert_id, objResult.alert[i].xx_phone, objResult.alert[i].xx_email,
    objResult.alert[i].xx_property_category, objResult.alert[i].xx_sub_county, 
    objResult.alert[i].xx_buy_rent,objResult.alert[i].start_date, objResult.alert[i].xx_end_time
   , objResult.alert[i].xx_alert_status]);
}
}

/**
* get all equipment
*/

function getPosts(){
  var strUrl = myurl+"cmd=5";
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);

   if(objResult.result == 0){
    document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

    return;
  }
  if(objResult.result == 1){  
    for(i=1;i<objResult.post.length;i++){


      var li = $('<li></li>');
      li.html('<div class="col s12 m12 post_area "><div class=" grey lighten-5 z-depth-1"><div class="row valign-wrapper"><div class="col s2"><img src="image/4.jpg" alt="" class="circle responsive-img"></div><div class="col s10"><span class="black-text">'+objResult.post[i].event_name +' '+ objResult.post[i].event_time+' '+ objResult.post[i].description+'<div class=""> Posted on: '+ objResult.post[i].post_time+' </br> By: '+ objResult.post[i].posted_by+' .</div> </span><span class="styleComments"> <a><p class="post_likes right"><i id="likeIcon'+objResult.post[i].post_id+'"class="fa fa-thumbs-o-up" onclick="addLikes(this)"></i></br><span id="userlikes'+objResult.post[i].post_id+'">'+objResult.post[i].post_likes+'</span></p></a><a><p id="view_comments"class="bold" onclick="toggleDiv(this)">Comments<i class="fa fa-commenting-o"></i></p></a></span><div class="col s12 commentDiv" id=""><ol id="comment_area'+objResult.post[i].post_id+'"></ol></div><div id="commenting_area" class=""><div class="input-field col s12 m10"><input id="comment'+objResult.post[i].post_id+'" type="text" class="validate" autocomplete="off"><label for="comment">Comment</label></div><div class="col s12 m12 save_post_area "><button id="post_comment_btn'+objResult.post[i].post_id+'" onclick="addComment(this)" type="submit" class="btn waves-effect wave-dark add_comment_btn blue right">Post</button></div></div> </div></div> </div></div>');

      $("#post_area_li").append(li);

      var newId=objResult.post[i].post_id;

      if(document.getElementById('post_comment_btn'+newId)){
        var getClicked=document.getElementById('post_comment_btn'+newId);

        getClicked.setAttribute('id',newId);
      }
      if(document.getElementById('view_comments')){
        var getClicked=document.getElementById('view_comments');

        getClicked.setAttribute('id',newId);
      }
      if(document.getElementById('likeIcon'+newId)){
        var getClicked=document.getElementById('likeIcon'+newId);

        getClicked.setAttribute('id',newId);

      }
    }
  }
}

function getMyPosts(){
  var strUrl = myurl+"cmd=8";
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);

   if(objResult.result == 0){
    document.getElementById("my_view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

    return;
  }
  if(objResult.result == 1){  
    for(i=1;i<objResult.post.length;i++){


      var li = $('<li></li>');
      li.html('<div class="col s12 m12 post_area "><div class=" grey lighten-5 z-depth-1"><div class="row valign-wrapper"><div class="col s2"><img src="image/4.jpg" alt="" class="circle responsive-img"></div><div class="col s10"><span class="black-text">'+objResult.post[i].event_name +' '+ objResult.post[i].event_time+' '+ objResult.post[i].description+'<div class=""> Posted on: '+ objResult.post[i].post_time+' </br> By: '+ objResult.post[i].posted_by+' .</div> </span><div class="col s12 edit_delete_post_area "><button id="editPost'+objResult.post[i].post_id+'" onclick="editMyPost(this)" type="submit" class="btn waves-effect wave-dark add_post_btn green "><i class="fa fa-edit"></i> EDIT</button><button id="deletePost'+objResult.post[i].post_id+'" onclick="deleteMyPost(this)" type="submit" class="btn waves-effect wave-dark add_post_btn red right"><i class="fa fa-remove"></i> DELETE</button></div>');
      $("#my_post_area_li").append(li);

      var newId=objResult.post[i].post_id;

      if(document.getElementById('editPost'+newId)){
        var getClicked=document.getElementById('editPost'+newId);

        getClicked.setAttribute('id',newId);
      }
      if(document.getElementById('deletePost'+newId)){
        var getClicked=document.getElementById('deletePost'+newId);

        getClicked.setAttribute('id',newId);
      }
      if(document.getElementById('editPostbtn')){
        var getClicked=document.getElementById('editPostbtn');

        getClicked.setAttribute('id',newId);
      }
    }
  }
}
function deleteMyPost(newid){
 var id= newid.getAttribute('id');
 var strUrl = myurl+"cmd=7&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  if(objResult.result == 0) {
    document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  document.getElementById("my_view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  location.reload();
}
function editMyPost(newid){
 var id= newid.getAttribute('id');
 var strUrl = myurl+"cmd=13&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  if(objResult.result == 0) {
    document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  } 
  hide("addPostDiv");
  showDiv("editPost");
  $("#event_name").val(objResult.post[1].event_name);
  $("#event_date").val(objResult.post[1].event_time);
  $("#event_description").val(objResult.post[1].description);
  $("#event_poster").val(objResult.post[1].poster); 
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

}

function addEditedPost(newid){
 var id= newid.getAttribute('id');
 var name = $("#event_name").val();
 var description = $("#event_description").val();
 var e_date = $("#event_date").val();
 var e_poster = $("#event_poster").val();
 // alert("new id is "+id);

 if(name.length == 0){
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Name<i class="material-icons">close</i></div>';

  return;
}
if(description.length == 0){
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Description<i class="material-icons">close</i></div>';
  return;
}
if(e_date.length == 0){
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Date<i class="material-icons">close</i></div>';
  return;
}
if(e_poster.length == 0){
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Poster<i class="material-icons">close</i></div>';
  return
}

var strUrl = myurl+"cmd=6&name="+name+"&description="+description+"&date="+e_date+"&poster="+e_poster+"&id="+id;
// prompt("url",strUrl);
var objResult = sendRequest(strUrl);
document.getElementById("my_view_post_error").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
if(objResult.result == 0) {
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  return;
}

$("#event_name").val('');
$("#event_description").val('');
$("#event_date").val('');
$("#event_poster").val('');

document.getElementById("my_view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

// location.reload();
}
function addComment(newid){
  var id= newid.getAttribute('id');
  var comment = $("#comment"+id).val();

  if(comment.length == 0){
    document.getElementById("view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Description<i class="material-icons">close</i></div>';
    return;
  }

  var strUrl = myurl+"cmd=9&description="+comment+"&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  document.getElementById("view_post_error").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
  if(objResult.result == 0) {
    document.getElementById("view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  $("#comment"+id).val('');
  document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

}

function getPostComments(id){
  // var id= newid.getAttribute('id');
  var strUrl = myurl+"cmd=10&id="+id;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   $("#comment_area").text("");
   $("#comment_area"+id).innerHTML="";
   if(objResult.result == 0){
    document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

    return;
  }
  if(objResult.result == 1){  
    $("#comment_area"+id).empty();
    for(i=1;i<objResult.comment.length;i++){

      var li = $('<li></li>');
      li.html('<div id="commentSpacing"><p id="myP">'+objResult.comment[i].comment_detail+'    '+objResult.comment[i].comment_date+'     <i> '+objResult.comment[i].commented_by+'<i></p></div>');

      $("#comment_area"+id).append(li);

      
    }
  }
}

function addLikes(newid){

 var id= newid.getAttribute('id'); 
 var likes =  document.getElementById("userlikes"+id).innerText;

 var newlikes= parseInt(likes)+1;
 var strUrl = myurl+"cmd=11&likes="+newlikes+"&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  if(objResult.result == 0) {
    document.getElementById("view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  location.reload();
  // $("#userlikes").innerHTML=newlikes;
}

function getAllUsers(){
  var strUrl = myurl+"cmd=14";
  // prompt("url", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    alert(objResult.message);
    return;
  }
  var mytable=document.getElementById("users_table");
  for(i=1;i<objResult.user.length;i++){
   var myrow=mytable.rows.length;
   var row=mytable.insertRow(myrow);
   cnt=row.insertCell(0)
   username=row.insertCell(1)
   phone=row.insertCell(2);
   year=row.insertCell(3);
   type=row.insertCell(4);
   edit=row.insertCell(5);

   cnt.innerHTML=i;
   username.innerHTML=objResult.user[i].user_name;
   phone.innerHTML=objResult.user[i].user_phone;
   year.innerHTML=objResult.user[i].year_group;
   var userTypeOption = document.createElement("select");
   userTypeOption.setAttribute('class','input-field');
   userTypeOption.setAttribute('value', objResult.user[i].user_type);
   // objResult.user[i].user_type
   type.innerHTML='<div class="input-field col s12 m8"><input id="userType'+objResult.user[i].user_id+'" type="text" class="validate" autocomplete="off"></div>'; 
   edit.innerHTML='</div><button id="myBtn'+objResult.user[i].user_id+'" onclick="change_user_type(this)" class="btn waves-effect waves-light green center-align" type="submit" name="action"><i class="fa fa-save"></i>SAVE</button></div>';      
   
   $("#userType"+objResult.user[i].user_id).val(objResult.user[i].user_type);
   var newId=objResult.user[i].user_id;
   if(document.getElementById('myBtn'+newId)){
    var getClicked=document.getElementById('myBtn'+newId);

    getClicked.setAttribute('id',newId);
  }

}
}

function change_user_type(newid){
  var id= newid.getAttribute('id');
  // alert("saving");
  var user = $("#userType"+id).val();
  if(user.length == 0){
    document.getElementById("admin_error").innerHTML = '<div class="chip red white-text">Empty Event Name<i class="material-icons">close</i></div>';

    return;
  }
  var strUrl = myurl+"cmd=15&user="+user+"&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  if(objResult.result == 0) {
    document.getElementById("admin_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  document.getElementById("admin_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  location.reload();

}

function sendInvite(){

  var fon = $("#user_invite").val();
  if(fon.length == 0){
    document.getElementById("send_msg_error").innerHTML = '<div class="chip red white-text">Empty phone Number<i class="material-icons">close</i></div>';

    return;
  }
  var strUrl = myurl+"cmd=16&phone="+fon;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);

  document.getElementById("send_msg_error").innerHTML = '<div class="chip green white-text">Message sent to: '+fon+'<i class="material-icons">close</i></div>';
  $("#user_invite").val('');

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


