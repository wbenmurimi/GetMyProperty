<?php
session_start();
ob_start();

if(!isset($_REQUEST['cmd'])){
	echo '{"result": 0, "message": "Unknown command"}';
	return;
}

$cmd = $_REQUEST['cmd'];

switch ($cmd) {
	case 1:
  login();
  break;
  case 2:
  userSignUp();
  break;
  case 3:
  logout();
  break;
  case 4:
  sendVerificationCode();
  break;
  case 5:
  resetPassword();
  break;
  case 6:
  subscribeAlert();
  break;
  case 7:
  searchAlerts();
  break;
  case 8:
  addProperty();
  break;
  case 9:
  getAllProperty();
  break;
  case 10:
  getMyProperty();
  break;
  case 11:
  homePageProperty();
  break;
  case 12:
  deleteProperty();
  break;
  case 13:
  returnUserFirstName();
  break;
  case 14:
  saveFreePlan();
  break;
  case 15:
  saveFeaturedPlan();
  break;
  case 16:
  getUploadPageSession();
  break;
  case 17:
  getHouseProperty();
  break;
  case 18:
  getLandProperty();
  break;
  case 19:
  getAllSearchProperty();
  break;
  case 20:
  saveSession();
  break;
  case 21:
  getPageoneSession();
  break;
  case 22:
  returnUserFirstName();
  break;
  case 23:
  getUserDetails();
  break;
  case 24:
  destroySession();
  break;
  case 25:
  getPostCount();
  break;
  case 26:
  getAlertCount();
  break;
  case 27:
  resetProfileUserPassword();
  break;
  case 28:
  deleteProperty();
  break;
  case 29:
  searchProperty();
  break;
  case 30:
  deleteImage();
  break;
  case 31:
  pictureLimit();
  break;
  case 32:
  loadPropertyDetails();
  break;
  case 33:
  loadPropertyPictures();
  break;
  case 34:
  getSellerDetails();
  break;
  case 35:
  getRelatedProperties();
  break;
  case 36:
  getResultCount();
  break;
  case 37:
  getSearchCount();
  break;
  case 38:
  getResultCountHouse();
  break;
  case 39:
  getResultCountLand();
  break;
  case 40:
  reportPost();
  break;
  default:
  echo '{"result": 0, "message": "Unknown command"}';
  return;
  break;
}


function login(){
	include "../classes/user.php";

  $myuser = new users();

  $username = $_GET['username'];
  $password = $_GET['password'];
  $myuser->Login($username, $password);
  $row=$myuser->fetch();

  if($row){
    session_destroy();
    session_start();

    $_SESSION['username'] = $username;
    $_SESSION['userId']= $row['xx_user_id'];
    $_SESSION['fname']= $row['xx_fname'];
    echo '{"result": 1, "user": [';
    while($row){
      echo json_encode($row);
      $row = $myuser->fetch();
      if($row){
        echo ',';
      }
    }
    echo "]}";
    return; 
  }
  echo '{"result": 0, "message": "Wrong details! Please try again"}';
  return;

}

function userSignUp(){
  include "../classes/user.php";

  $myuser = new users();
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $dob = date("Y-m-d",strtotime($_GET['dob']));
  $gender = $_GET['gender'];
  $username = $_GET['username'];
  $password = $_GET['password'];
  $phone = $_GET['phone'];
  $user_email = $_GET['email'];
  $usertype="regular";
  $user_status="enabled";

  if(!$myuser->signUp($fname,$lname,$dob,$gender,$username,$password,$user_email,$phone,$usertype,$user_status)){
    echo '{"result": 0, "message": "User not created"}';
    return;
  }
  echo '{"result": 1, "message": "Sign up was successful"}';

  return;
}

function returnUserFirstName(){
  if (  $_SESSION['fname']) {
    $loginName[] =array("person"=>$_SESSION['fname']);
    echo '{"result": 1, "uname": ';   
    echo json_encode($loginName);

    echo "}";
    return; 
  }
  else{
    echo '{"result": 0, "message": "User not logged in"}';
    return;
  }
}

function pictureLimit(){
  if (isset($_SESSION['limit'])) {
    $limit[] =array("pic_limit"=>$_SESSION['limit']);
    echo '{"result": 1, "limit": ';   
    echo json_encode($limit);

    echo "}";
    return; 
  }
  else{
   echo '{"result": 0, "message": "Under limit"}';
   return;
 }
}


function saveFreePlan(){
 unset( $_SESSION["free"]);
 if(!isset( $_SESSION["free"])){
   $_SESSION["free"]="Free";

   echo '{"result": 1, "message": "free package"}';
   return;
 }
 else{
  $_SESSION["free"]="Free";
  echo '{"result": 0, "message": "Failed"}';
  return;
}
}

function saveFeaturedPlan(){

  if(!isset( $_SESSION["free"])){
   $_SESSION["free"]="Featured";
   echo '{"result": 1, "message": "Featured package"}';
   return;
 }
 else{
  $_SESSION["free"]="Featured";
  echo '{"result": 0, "message": "Failed"}';
  return;
}
}
function deleteImage(){
 $id=$_GET['id'];

 if(isset( $_SESSION["pics"])){

   $_SESSION["new_pics"]=array();

   for ($i=$id; $i <count( $_SESSION["pics"])-1; $i++) { 
     $_SESSION["pics"][$i]=$_SESSION["pics"][$i+1];
   }

   for ($k=0; $k <count( $_SESSION["pics"]); $k++) { 
     array_push($_SESSION["new_pics"],$_SESSION["pics"][$k]);
   }

   $_SESSION["pics"]=array();

   for ($j=0; $j <count($_SESSION["new_pics"])-1; $j++) { 
     array_push($_SESSION["pics"],$_SESSION["new_pics"][$j]);
   }
   if(isset($_SESSION['limit'])){
    unset($_SESSION['limit']);
  }
  echo '{"result": 1, "message": "picture deleted successfully"}';
  return;
}
else{
  echo '{"result": 0, "message": "Image not deleted"}';
  return;
}
}

function logout(){

  if(!$_SESSION['username']){
    echo '{"result": 0, "message": "The user is not loged in"}';
    return;
  }
  session_destroy();
  unset($_SESSION['userId']);
  destroySession();
  echo '{"result": 1, "message": "The user Loged out successfully"}';
  return;
}


function sendVerificationCode(){
  include "../classes/user.php";

  $myuser = new users();
  $phone;
  $email;
  if(isset($_GET['email'])){
    $email=$_GET['email'];
    if(!$myuser->sendPasswordResetCodePhoneEmail($email)){
      echo '{"result": 0, "message": "Email was not sent successfully"}';
      return;
    }
    echo '{"result": 1, "message": "Email was sent successfully"}';

    return;
  }
  if(isset($_GET['phone'])){
    $phone=$_GET['phone'];
    if(!$myuser->sendPasswordResetCodePhone($phone)){
      echo '{"result": 0, "message": "Message was not sent successfully"}';
      return;
    }
    echo '{"result": 1, "message": "Message was sent successfully"}';

    return;
  }
}

function resetPassword(){
  include "../classes/user.php";

  $myuser = new users();
  $password = $_GET['password'];
  $code = $_GET['code'];

  if(!$myuser->changeUserPassword($password, $code)){
    echo '{"result": 0, "message": "User password was not changed"}';
    return;
  }
  if(!$myuser->deleteResetCode($code)){
   echo '{"result": 0, "message": "Code not deleted"}';
 }
 echo '{"result": 1, "message": "password change was successful"}';

 return;

}


function subscribeAlert(){
  include "../classes/alerts.php";

  $myAlert = new Alerts();

  $county = $_GET['county'];
  $sub_county = $_GET['sub_county'];
  $buyrent = $_GET['buy_rent'];
  $property_category = $_GET['Property_category'];
  $price_from = $_GET['p_from'];
  $price_to = $_REQUEST['p_to'];
  $bedroom =$_REQUEST['p_bed'] ;
  $bathroom = $_REQUEST['p_bath'];
  $property_type = $_GET['property_type'] ;
  $acre ;
  $status="enabled";
  $userID=$_SESSION['userId'];
  if(strcmp($_GET['acres'],"undefined")!=0){
    if (isset($_GET['acres'])) {
      $acre = $_GET['acres'];
      $bedroom="";
      $bathroom="" ;
      $property_type = "";
    }
  }
  else{
    $acre="";
    $bedroom = $_GET['p_bed'];
    $bathroom = $_GET['p_bath'];
    $property_type = $_GET['property_type'];

  }
  if (isset($_GET['email'])) {
   $email = $_GET['email'];
   if(!$myAlert->setAnAlertEmail($email,$property_type,$property_category,
     $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$acre,$status,$userID)){
    echo '{"result": 0, "message": "Email alert was not created"}';
  return;
}
echo '{"result": 1, "message": "Email alert created successfully"}';

return;
}
if (isset($_GET['phone'])) {
 $phone = $_GET['phone'];
 if(!$myAlert->setAnAlertPhone($phone,$property_type,$property_category,
   $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$acre,$status,$userID)){
   echo '{"result": 0, "message": "Message alert was not created"}';
 return;
}
echo '{"result": 1, "message": "Message alert created successfully"}';

return;
}
}

function searchAlerts(){
  include "../classes/alerts.php";

  $myAlert = new Alerts();
  $userID=$_SESSION['userId'];
  $myAlert->alertSearch($userID);
  $row =$myAlert->fetch();
  if(!$row){
    echo '{"result": 0, "message": "You have no subscribed email or message alerts"}';
    return;
  }

  echo '{"result": 1, "alert": [';
  while($row){
    echo json_encode($row);
    $row = $myAlert->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to add a property to the database
*/
function addProperty(){
  include "../classes/post.php";

  $post = new Post();

  if (isset($_SESSION['p_cat'])) {

    $county= $_SESSION["county"];
    $sub_county= $_SESSION["sub_county"];
    $property_category=$_SESSION['p_cat'];
    $buyrent= $_SESSION["buy_rent"];
    $userId= $_SESSION['userId'];
    $free_featured= $_SESSION["free"];

    
    if(strcmp($property_category,"House")==0){
      $price=$_SESSION["price"];
      $description=$_SESSION["description"];
    }
    else{
      $price=$_SESSION["lprice"];
      $description=$_SESSION["ldescription"];
    }

    $longitude =4.2130450;
    $latitude=0.01254365;

    if($post->addPopertyBasics($county,$sub_county,$free_featured,$buyrent,$userId,$property_category,$longitude, $latitude,$price,$description )){
      // echo '{"result": 1, "message": "Prorpety added successfully"}';
    }
    $p_id= $post->getLastProrpertyId();
    // echo "p id: "+$p_id;

 //    $p_id="6";
    if(strcmp($_SESSION["p_cat"],"House")==0){

      $bathroom= $_SESSION["bathroom"];
      $bedroom= $_SESSION["bedroom"];
      $floors= $_SESSION["floors"];
      $parking= $_SESSION["parking"];
      $hr=$_SESSION["hr"];
      $cctv=$_SESSION["cctv"];
      $alarm=$_SESSION["alarm"];
      $electric_fence=$_SESSION["electric_fence"];
      $wall=$_SESSION["wall"];
      $internet=$_SESSION["internet"];
      $pool= $_SESSION["pool"];
      $garden=$_SESSION["garden"];
      $gym=$_SESSION["gym"];
      $disability= $_SESSION["disability"];
      $water = $_SESSION["water_storage"];
      $furnished=$_SESSION["furnished"];
      $p_type=$_SESSION["p_type"];

      if($post->addPopertyFeatures($p_type, $bathroom,$bedroom,$floors,$parking,$hr,$cctv,$alarm,$electric_fence,$wall,$internet,$pool,$garden,$gym,$disability,$water,$furnished,$p_id)){
        // echo '{"result": 1, "message": "Prorpety features added successfully"}';
      }
    }

    if(strcmp($_SESSION["p_cat"],"Land")==0){
      $acres=$_SESSION["acre_size"];
      if($post->addLandFeatures($acres,$p_id)){
       // echo '{"result": 1, "message": "Land features added successfully"}';
      }
    }

    if(!empty( $_SESSION["pics"])){

      for ($i=0; $i <count( $_SESSION["pics"]); $i++) { 
        if(!$_SESSION["pics"][$i]==""){
          $post->addPropertyPictures($_SESSION["pics"][$i],$p_id);
        }
      } 
    }
    destroySession();
    echo '{"result": 1, "message": "Property added successfully"}';
    return;

  }
}


function saveSession(){


  if (isset($_GET['hr'])) {
    $_SESSION["hr"]=$_GET['hr'];
  }
  if (isset($_GET['cctv'])) {
    $_SESSION["cctv"]=$_GET['cctv'];
  }
  if (isset($_GET['alarm'])) {
    $_SESSION["alarm"]=$_GET['alarm'];
  }
  if (isset($_GET['electric_fence'])) {
    $_SESSION["electric_fence"]=$_GET['electric_fence'];
  }
  if (isset($_GET['wall'])) {
    $_SESSION["wall"]=$_GET['wall'];
  }
  if (isset($_GET['internet'])) {
    $_SESSION["internet"]=$_GET['internet'];
  }
  if (isset($_GET['pool'])) {
    $_SESSION["pool"]=$_GET['pool'];
  }
  if (isset($_GET['garden'])) {
    $_SESSION["garden"]=$_GET['garden'];
  }
  if (isset($_GET['water_storage'])) {
    $_SESSION["water_storage"]=$_GET['water_storage'];
  }
  if (isset($_GET['gym'])) {
    $_SESSION["gym"]=$_GET['gym'];
  }
  if (isset($_GET['disability'])) {
    $_SESSION["disability"]=$_GET['disability'];
  }
  if (isset($_GET['furnished'])) {
    $_SESSION["furnished"]=$_GET['furnished'];
  }
  if (isset($_GET['price'])) {
    $_SESSION["price"]=$_GET['price'];
  }
  if (isset($_GET['description'])) {
    $_SESSION["description"]=$_GET['description'];
  }
  if (isset($_GET['county'])) {
    $_SESSION["county"]=$_GET['county'];
  }
  if (isset($_GET['sub_county'])) {
    $_SESSION["sub_county"]=$_GET['sub_county'];
  }
  if (isset($_GET['bathroom'])) {
    $_SESSION["bathroom"]=$_GET['bathroom'];
  }
  if (isset($_GET['bedroom'])) {
    $_SESSION["bedroom"]=$_GET['bedroom'];
  }
  if (isset($_GET['floors'])) {
    $_SESSION["floors"]=$_GET['floors'];
  }
  if (isset($_GET['parking'])) {
    $_SESSION["parking"]=$_GET['parking'];
  }
  if (isset($_GET['acres'])) {
    $_SESSION["acre_size"]=$_GET['acres'];
  }
  if (isset($_GET['ldescription'])) {
    $_SESSION["ldescription"]=$_GET['ldescription'];
  }
  if (isset($_GET['lprice'])) {
    $_SESSION["lprice"]=$_GET['lprice'];}
    if (isset($_GET['p_type'])) {
      $_SESSION["p_type"]=$_GET['p_type'];
    }
    if (isset($_GET['buy_rent'])) {
      $_SESSION["buy_rent"]=$_GET['buy_rent'];
    }
    if (isset($_GET['p_cat'])) {
      $_SESSION["p_cat"]=$_GET['p_cat'];
    }

    echo '{"result": 1, "message": "session saved"}';
    return;
  }

  function getPageoneSession(){

    $mydata=array();
    if(isset( $_SESSION["county"])){

      $mydata[]=array('county'=>$_SESSION["county"],'sub_county'=>$_SESSION["sub_county"],'price'=>$_SESSION["price"],'description'=>$_SESSION["description"], 'bathroom'=>$_SESSION["bathroom"],'bedroom'=>$_SESSION["bedroom"],'floors'=>$_SESSION["floors"],'parking'=>$_SESSION["parking"], 'acre_size'=>$_SESSION["acre_size"],'ldescription'=>$_SESSION["ldescription"],'lprice'=>$_SESSION["lprice"],'p_type'=>$_SESSION["p_type"],'p_cat'=>$_SESSION["p_cat"],'buy_rent'=>$_SESSION["buy_rent"],'hr'=>$_SESSION["hr"],'cctv'=>$_SESSION["cctv"],'alarm'=>$_SESSION["alarm"],'electric_fence'=>$_SESSION["electric_fence"],'wall'=>$_SESSION["wall"],'internet'=>$_SESSION["internet"],'pool'=>$_SESSION["pool"],'water_storage'=>$_SESSION["water_storage"]
        ,'garden'=>$_SESSION["garden"],'disability'=>$_SESSION["disability"],'furnished'=>$_SESSION["furnished"],'gym'=>$_SESSION["gym"]);

      echo '{"result": 1, "p1":';
      echo json_encode($mydata);

      echo "}";
      return;
    }
    else{
      echo '{"result": 0, "message": "No set sessions"}';
      return;
    }
  }

  function getUploadPageSession(){
// unset($_SESSION["pics"]);
// unset($_SESSION["new_pics"]);
    $mydata=array();
    if(!empty( $_SESSION["pics"])){

      for ($i=0; $i <count( $_SESSION["pics"]); $i++) { 
        if(!$_SESSION["pics"][$i]==""){
          $mydata[]=array('pic'.$i=>$_SESSION["pics"][$i]);
        }
      }

      echo '{"result": 1, "picture":';
      echo json_encode($mydata);

      echo "}";
      return;
    }
    else{
      echo '{"result": 0, "message": "No set sessions"}';
      return;
    }
  }

  function destroySession(){
    unset($_SESSION['price']);
    unset($_SESSION['description']);
    unset($_SESSION['county']);
    unset($_SESSION['sub_county']);
    unset($_SESSION["bathroom"]);
    unset($_SESSION['bedroom']);
    unset($_SESSION['floors']);
    unset($_SESSION['parking']);
    unset($_SESSION['acre_size']);
    unset($_SESSION["ldescription"]);
    unset($_SESSION['p_type']);
    unset($_SESSION["lprice"]);

    unset($_SESSION['cctv']);
    unset($_SESSION['hr']);
    unset($_SESSION['county']);
    unset($_SESSION['wall']);
    unset($_SESSION["electric_fence"]);
    unset($_SESSION['alarm']);
    unset($_SESSION['internet']);
    unset($_SESSION['pool']);
    unset($_SESSION['garden']);
    unset($_SESSION["water_storage"]);
    unset($_SESSION['disability']);
    unset($_SESSION["furnished"]);
    unset($_SESSION['p_cat']);
    unset($_SESSION['buy_rent']);
    unset($_SESSION["pics"]);
    unset($_SESSION["new_pics"]);
    unset($_SESSION["limit"]);

  // echo '{"result": 1, "message": "session destroyed"}';

  // return;
  }

/**
*Method to fetch posts that have been made by a user
*/
function getMyProperty(){
  include "../classes/post.php";

  $post = new Post();

  $userId=$_SESSION['userId'];
  $row = $post->getMyProperty($userId);
  if(!$row){
    echo '{"result": 0, "message": "You have not made any posts"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to fetch posts that have been made by a user
*/
function homePageProperty(){
  include "../classes/post.php";

  $post = new Post();

  $row = $post->fetchHomePageProperty();
  if(!$row){
    echo '{"result": 0, "message": "You have not made any posts"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to fetch all the houses
*/
function getHouseProperty(){
  include "../classes/post.php";

  $post = new Post();

  $pg= $_GET['pg'];
  $row = $post->fetchHouses($pg);
  if(!$row){
    echo '{"result": 0, "message": "No Houses"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}


/**
*Method to fetch the lands
*/
function getLandProperty(){
  include "../classes/post.php";

  $post = new Post();

  $pg= $_GET['pg'];
  $row = $post->fetchLands($pg);
  if(!$row){
    echo '{"result": 0, "message": "No lands"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to fetch all properties
*/
function getAllSearchProperty(){
  include "../classes/post.php";

  $post = new Post();
  $pg= $_GET['pg'];
  $row = $post->fetchAllSearchProperty($pg);
  if(!$row){
    echo '{"result": 0, "message": "You have not made any posts"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to fetch all the details of logged in user
*/
function getUserDetails(){
  include "../classes/user.php";

  $myuser = new users();
  $id=$_SESSION['userId'];
  $row = $myuser->getUserDetail($id);
  if(!$row){
    echo '{"result": 0, "message": "user does not exist"}';
    return;
  }

  echo '{"result": 1, "user": [';
  while($row){
    echo json_encode($row);
    $row = $myuser->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to fetch the count of properties by a user
*/
function getPostCount(){
  include "../classes/post.php";

  $post = new Post();
  $id=$_SESSION['userId'];
  $row = $post->propertyCountPerUser($id);
  if(!$row){
    echo '{"result": 0, "message": "You have not made any posts"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to fetch the count of alerts set by a user
*/
function getAlertCount(){
 include "../classes/alerts.php";

 $myAlert = new Alerts();
 $id=$_SESSION['userId'];
 $row = $myAlert->alertCountPerUser($id);
 if(!$row){
  echo '{"result": 0, "message": "You have not made any alerts"}';
  return;
}

echo '{"result": 1, "alert": [';
while($row){
  echo json_encode($row);
  $row = $myAlert->fetch();
  if($row){
    echo ',';
  }
}
echo "]}";
return;
}
/**
*Method to reset user password from the profile
*/
function resetProfileUserPassword(){
  include "../classes/user.php";

  $myuser = new users();
  $password = $_GET['password'];
  $current_password= $_GET['c_password'];
  $id=$_SESSION['userId'];
  // echo "string ".  $id;
  if(!$myuser->changeProfilePassword($password, $current_password,$id)){
    echo '{"result": 0, "message": "User password was not changed"}';
    return;
  }
  echo '{"result": 1, "message": "password change was successful"}';
  return;

}

/**
*Method to delete a post from the database
*/
function deleteProperty(){
  include "../classes/post.php";

  $post = new Post();
  $postId = $_GET['id'];

  if(!$post->deletePost($postId)){
    echo '{"result": 0, "message": "Post was not deleted "}';
    return;
  }
  if(!$post->deletePictures($postId)){
   echo '{"result": 0, "message": "Pictures were not deleted "}';
 }
 if(!$post->deletePropertyFeatures($postId)){
   echo '{"result": 0, "message": "Features were not deleted "}';
 }
 if(!$post->deleteLand($postId)){
   echo '{"result": 0, "message": "Land was not deleted "}';
 }

 echo '{"result": 1, "message": "Post was deleted successful"}';

 return;
}


function loadPropertyDetails(){
  include "../classes/post.php";

  $post = new Post();
  $Id=$_GET['id'];
  $row = $post->getOneProperty($Id);
  if(!$row){
    echo '{"result": 0, "message": "Invalid id"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}


function loadPropertyPictures(){
  include "../classes/post.php";

  $post = new Post();
  $Id=$_GET['id'];
  $row = $post->getOnePropertyPictures($Id);
  if(!$row){
    echo '{"result": 0, "message": "Invalid id"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}


function getSellerDetails(){
  include "../classes/user.php";

  $myuser = new users();
  $id=$_GET['id'];
  $row = $myuser->getSellerDetail($id);
  if(!$row){
    echo '{"result": 0, "message": "user does not exist"}';
    return;
  }

  echo '{"result": 1, "user": [';
  while($row){
    echo json_encode($row);
    $row = $myuser->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

function getRelatedProperties(){
  include "../classes/post.php";

  $post = new Post();
  $Id=$_GET['id'];

  $county="" ;
  $sub_county="" ;
  $p_cat="";
  $buyrent= "";
  $price_from="";
  $price_to="";
  $price="";

  $result = $post->getOneProperty($Id);
  $row=$post->fetch();
  if(!$row){
    echo '{"result": 0, "message": "Invalid id"}';
    return;
  }
  if($row){
    $county=$row['xx_county'] ;
    $sub_county=$row['xx_sub_county'];
    $p_cat=$row['xx_property_category'];
    $buyrent= $row['xx_rent_sale'];
    $price=$row['xx_price'];

  }
  if($price<50000 && $price>5000){
   $price_from=$price-5000;
   $price_to=$price +100000;
 }
 if($price<500000 && $price>100000){
   $price_from=$price-50000;
   $price_to=$price +500000;
 }
 if($price>1000000){
   $price_from=$price-500000;
   $price_to=$price +500000;
 }
 else{
   $price_from=0;
   $price_to=$price +50000;
 }

 $row = $post->relatedProperty($county,$buyrent,$p_cat,$price_from,$price_to);
 if(!$row){
  echo '{"result": 0, "message": "No related property"}';
  return;
}

echo '{"result": 1, "property": [';
while($row){
  echo json_encode($row);
  $row = $post->fetch();
  if($row){
    echo ',';
  }
}
echo "]}";
return;
}


function getResultCount(){
  include "../classes/post.php";

  $post = new Post();
  
  $row = $post->resultCount();
  if(!$row){
    echo '{"result": 0, "message": "No property"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

function getResultCountHouse(){
  include "../classes/post.php";

  $post = new Post();
  
  $row = $post->resultCountHouse();
  if(!$row){
    echo '{"result": 0, "message": "No property"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

function getResultCountLand(){
  include "../classes/post.php";

  $post = new Post();
  
  $row = $post->resultCountLand();
  if(!$row){
    echo '{"result": 0, "message": "No property"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}


function searchProperty(){
  include "../classes/post.php";

  $post = new Post();

  $county= $_GET["county"];
  $sub_county= $_GET["sub_county"];
  $property_category=$_GET['p_cat'];
  $buyrent= $_GET["buy_rent"];
  $p_type=$_GET["p_type"];
  $price_from=$_GET["price_from"];
  $price_to=$_GET["price_to"];
  $pg=$_GET['pg'];

  if ($price_from=="") {
    $price_from=0;
  }
  if ($price_to=="") {
    $price_to=5000000;
  }

  $row = $post->allSearch($county,$sub_county,$property_category,$buyrent,$price_from,$price_to,$pg);

  if(!$row){
    echo '{"result": 0, "message": "No property with the search parameters"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}


function getSearchCount(){
  include "../classes/post.php";

  $post = new Post();

  $county= $_GET["county"];
  $sub_county= $_GET["sub_county"];
  $property_category=$_GET['p_cat'];
  $buyrent= $_GET["buy_rent"];
  $p_type=$_GET["p_type"];
  $price_from=$_GET["price_from"];
  $price_to=$_GET["price_to"];
  

  if ($price_from=="") {
    $price_from=0;
  }
  if ($price_to=="") {
    $price_to=5000000;
  }
  
  $row = $post->searchCount($county,$sub_county,$property_category,$buyrent,$price_from,$price_to);
  if(!$row){
    echo '{"result": 0, "message": "No property"}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

function reportPost(){
  include "../classes/post.php";

  $post = new Post();
  $postId = $_GET['id'];

  if(!$post->reportPost($postId)){
    echo '{"result": 0, "message": "Post was not reported "}';
    return;
  }
  else{
    echo '{"result": 0, "message": "Post was reported "}';
    return;
  }
}


/**
*Method to search all properties on the refined search
*/
function searchPropertyRefined(){
  include "../classes/post.php";

  $post = new Post();

  $county= $_GET["county"];
  $sub_county= $_GET["sub_county"];
  $property_category=$_GET['p_cat'];
  $buyrent= $_GET["buy_rent"];
  $p_type=$_GET["p_type"];
  $price_from=$_GET["price_from"];
  $price_to=$_GET["price_to"];

  if ($price_from=="") {
    $price_from=0;
  }
  if ($price_to=="") {
    $price_to=5000000;
  }
  if ($county!=="" && $sub_county !=="" ||$sub_county ==""  && $buyrent !=="") {

    if(strcmp($property_category,"House")==0){
      // echo "only house";

      if ($county=="All" && $buyrent!=="undefined" ) {
        // echo "all counties with rent: ".$county;

        $row = $post->refinedHouseSearch($buyrent,$price_from,$price_to);
        if(!$row){
          echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return; 
      }
      else if ($county!=="All" && $buyrent!=="undefined" ) {
        // echo "county with rent: ".$county;

        $row = $post->refinedCountySearchHouse($county,$buyrent,$price_from,$price_to);
        if(!$row){
          echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return; 
      }

      else if ($county!=="All" && $sub_county!=="" && $buyrent!=="undefined" ) {
        // echo "county, subcounty with rent: ".$county;

        $row = $post->refinedSubCountySearchHouse($county,$sub_county, $buyrent,$price_from,$price_to);
        if(!$row){
          echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return; 
      }
      else{
        // echo "all county";
        $row = $post->refinedHouseSearch($buyrent,$price_from,$price_to);

        if(!$row){
          echo '{"result": 0, "message": "No house with the search parameters"}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return;
      }
    }

    
    
    if(strcmp($property_category,"Land")==0){
      // echo "only land";

      if ($county=="All" && $buyrent!=="undefined" ) {
        // echo "all counties with rent: ".$county;

        $row = $post->refinedLandSearch($buyrent,$price_from,$price_to);
        if(!$row){
          echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return; 
      }
      else if ($county!=="All" && $buyrent!=="undefined" ) {
        // echo "county with rent: ".$county;

        $row = $post->refinedCountySearchLand($county,$buyrent,$price_from,$price_to);
        if(!$row){
          echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return; 
      }

      else if ($county!=="All" && $sub_county!=="" && $buyrent!=="undefined" ) {
        // echo "county, subcounty with rent: ".$county;

        $row = $post->refinedSubCountySearchLand($county,$sub_county, $buyrent,$price_from,$price_to);
        if(!$row){
          echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return; 
      }
      else{
        $row = $post->refinedLandSearch($county,$sub_county,$buyrent,$p_type,$price_from,$price_to);
        if(!$row){
          echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return;
      }
    }

    if(strcmp($property_category,"All")==0){
      // echo "all category";
      if ($county!=="" && $sub_county =="All" && $buyrent =="" || $buyrent=="undefined" ) {
        // echo "county: ".$county;

        $row = $post->refinedCountySearch($county,$price_from,$price_to);
        if(!$row){
          echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
          return;
        }

        echo '{"result": 1, "property": [';
        while($row){
          echo json_encode($row);
          $row = $post->fetch();
          if($row){
            echo ',';
          }
        }
        echo "]}";
        return; 
      }
      else if ($county=="All" && $sub_county =="" && $buyrent !=="") {
       // echo "rent: ".$buyrent;
       $row = $post->refinedSaleRentSearch($buyrent,$price_from,$price_to);
       if(!$row){
        echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
        return;
      }

      echo '{"result": 1, "property": [';
      while($row){
        echo json_encode($row);
        $row = $post->fetch();
        if($row){
          echo ',';
        }
      }
      echo "]}";
      return;

    } 
    else if ($county!=="" && $sub_county =="All" && $buyrent !=="") {

  // echo "rent: ".$buyrent." county: ".$county." to ".$price_to." From: ".$price_from;
     $row = $post->refinedCountyRentSearch($county,$buyrent,$price_from,$price_to);
     if(!$row){
      echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
      return;
    }

    echo '{"result": 1, "property": [';
    while($row){
      echo json_encode($row);
      $row = $post->fetch();
      if($row){
        echo ',';
      }
    }
    echo "]}";
    return;
    
  }
  else if ($county!=="" && $sub_county !=="" && $buyrent !==""&& $p_type=='All') {

  // echo "rent: ".$buyrent." county: ".$county." to ".$price_to." From: ".$price_from;
   $row = $post->refinedPropertySearch($county,$sub_county,$buyrent,$price_from,$price_to);
   if(!$row){
    echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;

}
else{

  $row = $post->refinedTypePropertySearch($county,$sub_county,$buyrent,$p_type,$price_from,$price_to);
  if(!$row){
    echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}
}
} // closing county subcounty and rent options

else if ($county!=="" && $sub_county =="All" && $buyrent =="") {
  // echo "county: ".$county;

  $row = $post->refinedCountySearch($county,$price_from,$price_to);
  if(!$row){
    echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return; 
}
else if ($county!=="" && $sub_county =="" && $buyrent !=="") {
 // echo "rent: ".$buyrent;

 if ($county=="All" && $sub_county=="All" && $buyrent =="undefined") {

  //echo "undefined buy rent with all county";
  $row = $post->refinedAllCountySearch($price_from,$price_to);
  if(!$row){
    echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return; 
}
else{
 $row = $post->refinedSaleRentSearch($buyrent,$price_from,$price_to);
 if(!$row){
  echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
  return;
}

echo '{"result": 1, "property": [';
while($row){
  echo json_encode($row);
  $row = $post->fetch();
  if($row){
    echo ',';
  }
}
echo "]}";
return;
}
} 
else if ($county!=="" && $sub_county =="All" && $buyrent !=="") {

 // echo "rent: ".$buyrent." county: ".$county;

 if ($county=="All" && $buyrent !=="undefined" ) {
  echo "only county but use rent";
  $row = $post->refinedSaleRentSearch($buyrent,$price_from,$price_to);
  if(!$row){
    echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

if ($county=="All" && $buyrent =="undefined") {

  // echo "undefined buy rent with all county";
  $row = $post->refinedAllCountySearch($price_from,$price_to);
  if(!$row){
    echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
    return;
  }

  echo '{"result": 1, "property": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return; 
}
$row = $post->refinedCountyRentSearch($county,$buyrent,$price_from,$price_to);
if(!$row){
  echo '{"result": 0, "message": "Sorry, no such property in the record. "}';
  return;
}

echo '{"result": 1, "property": [';
while($row){
  echo json_encode($row);
  $row = $post->fetch();
  if($row){
    echo ',';
  }
}
echo "]}";
return;  
}

}






























/**
*Function to return all the posts in the database
*/
function getAllProperty(){
  include "../classes/post.php";

  $post = new Post();
  $row = $post->viewPosts();
  if(!$row){
    echo '{"result": 0, "message": "You have no posts in the database"}';
    return;
  }

  echo '{"result": 1, "post": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}




/**
*Function to return the upcoming posts in the database
*/
function getUpcomingPosts(){
  include "post.php";

  $post = new Post();
  $row = $post->viewUpcomingEvents();
  if(!$row){
    echo '{"result": 0, "message": "You have no upcoming events in the database"}';
    return;
  }

  echo '{"result": 1, "post": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}
/**
*Method to edit a post to the database
*/
function editProperty(){
 include "../classes/post.php";

 $post = new Post();

 $name = $_GET['name'];
 $description = $_GET['description'];
 $date = $_GET['date'];
 $poster = $_GET['poster'];
 $id = $_GET['id'];

 if(!$post->editPost($name,$description,$date,$poster,$id)){
  echo '{"result": 0, "message": "Post was not edited"}';
  return;
}
echo '{"result": 1, "message": "Post was edited successfully"}';

return;
}

function getEditProperty(){
  include "../classes/post.php";

  $post = new Post();
  $postId = $_GET['id'];
  $row = $post->viewOnePost($postId);
  if(!$row){
    echo '{"result": 0, "message": "You have no posts in the database"}';
    return;
  }

  echo '{"result": 1, "post": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}





function getAppUsers(){
  include "../classes/user.php";

  $user = new user();

  $row = $user->getUsers();
  if(!$row){
    echo '{"result": 0, "message": "You have no active users"}';
    return;
  }

  echo '{"result": 1, "user": [';
  while($row){
    echo json_encode($row);
    $row = $user->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to add a post to the database
*/
function addComment(){
 include "comment.php";

 $comm = new Comment();

 $postId = $_GET['id'];
 $comment = $_GET['description'];
 $user= $_SESSION['username'];

 if(!$comm->addMyComment($postId,$comment,$user)){
  echo '{"result": 0, "message": "Comment was not added"}';
  return;
}
echo '{"result": 1, "message": "Comment was added successfully"}';

return;
}


/**
*Function to return all the posts in the database
*/
function getAllComments(){
  include "comment.php";

  $comment = new Comment();
  $postId = $_GET['id'];
  $row = $comment->viewComments($postId);
  if(!$row){
    echo '{"result": 0, "message": "You have no comments in this post"}';
    return;
  }

  echo '{"result": 1, "comment": [';
  while($row){
    echo json_encode($row);
    $row = $comment->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to add likes to the database
*/
function addLikes(){
 include "post.php";

 $post = new Post();

 $like = $_GET['likes'];
 $postId = $_GET['id'];

 if(!$post->editLikes($like,$postId)){
  echo '{"result": 0, "message": "You did not like"}';
  return;
}
echo '{"result": 1, "message": "You liked this post"}';

return;
}

function editUserType(){
 include "../classes/user.php";

 $user = new user();

 $type = $_GET['user'];
 $id = $_GET['id'];

 if(!$user->editUserType($type,$id)){
  echo '{"result": 0, "message": "User type was not edited"}';
  return;
}
echo '{"result": 1, "message": "User type was edited successfully"}';

return;
}

function sendMessage(){
 $phone = $_GET['phone'];
 include "smsGateway.php";
 $smsGateway = new SmsGateway('wbenmurimi@gmail.com', 'murimi2015');

 $deviceID = 14246;
 $number = '+'.$phone;
 $message = 'Download Mushene app from www.benanconstruction.com and get ontime updates of campus events';

 $result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

}


//file upload

function upload_file(){

  if (!empty($_FILES['postername'])) {

    $myFile = $_FILES['postername'];
    $name = preg_replace("/[^A-Z0-9._-]/i","_",$myFile["name"]);
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    if ($myFile['error'] !== UPLOAD_ERR_OK) {

      echo '{"results":0,"message":"Had an error uploading file."}';
      exit;
    }

    if ($extension == "JPG" || $extension == "PNG" ) {

    } else{
      echo '{"results":0,"message":"Only jpeg,png format files are allowed"}';
      exit;
    }
    $i=0;
    $parts=pathinfo($name);

    while (file_exists(UPLOAD_DIR.$name)) {

      $i++;
      $name = $parts["filename"] . "-" . $i ."." . $parts["extension"];
    }

    $success = move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);

    if (!$success) {
      echo '{"results":0,"message":"Could not successfully move the file to target directory"}';
      exit;
    }
    else{
      include "post.php";

      $post = new Post();
      $name = $_REQUEST['ename'];
      $description = $_REQUEST['description'];
      $d= $_REQUEST['event_date'];
      $date=date("Y-m-d",strtotime($d));;
                // $image=$_REQUEST['postername'];
      $user= $_SESSION['username'];
      if(!$post->addMyPost($name,$description,$date,$filename,$user)){
        echo '{"result": 0, "message": "post was not added"}';
        return;
      }
      echo '{"result": 1, "message": "post was added successfully"}';

      return;
    }


  }
  else{
    echo '{"results":"Empty file called"}';
  }
}


function getuserSession(){
  if(!$_SESSION["username"]){
    echo '{"result": 0, "message": "No session stored"}';
    return;  
  }
  echo '{"result": 1, "message": "'.$_SESSION["username"].'"}';

  return;

}

  // Sanitize E-mail Address
// $email =filter_var($email, FILTER_SANITIZE_EMAIL);
// // Validate E-mail Address
// $email= filter_var($email, FILTER_VALIDATE_EMAIL);
// if (!$email){
// echo "Invalid Sender's Email";
// }
        // $to = $email;
        // $subject = "Verification code";
        // $txt = "The code to change your password is 2000.";
        // $headers = "From: wbenmurimi@gmail.com";

//mail($to,$subject,$txt,$headers);

            // $admin_email = "wbenmurimi@gmail.com";
            // $email = $_REQUEST['email'];
 // $subject = $_REQUEST['subject'];
  //$comment = $_REQUEST['comment'];

            // mail($admin_email, $subject, $txt, $headers);


ob_end_flush();

?>
