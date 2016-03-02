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
  case 9:
  editProperty();
  break;
  case 9:
  deleteProperty();
  break;
  case 9:
  getMyProperty();
  break;
  case 10:
  addComment();
  break;
  case 11:
  getAllComments();
  break;
  case 12:
  addLikes();
  break;
  case 13:
  getUpcomingPosts();
  break;
  case 14:
  getEditProperty();
  break;
  case 15:
  getAppUsers();
  break;
  case 16:
  editUserType();
  break;
  case 17:
  sendMessage();
  break;
  case 18:
  upload_file();
  break;
  case 20:
  saveSession();
  break;
  case 21:
  destroySession();
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
  $username = $_GET['username'];
  $password = $_GET['password'];
  $phone = $_GET['phone'];
  $user_email = $_GET['email'];
  $usertype="regular";
  $user_status="enable";

  if(!$myuser->signUp($username,$password,$user_email,$phone,$usertype,$user_status)){
    echo '{"result": 0, "message": "User not created"}';
    return;
  }
  echo '{"result": 1, "message": "Sign up was successful"}';

  return;
}

function logout(){

  if(!$_SESSION['username']){
    echo '{"result": 0, "message": "The user is not loged in"}';
    return;
  }
  session_destroy();
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
  $price_to = $_GET['p_to'];
  $bedroom ;
  $bathroom ;
  $property_type ;
  $acre ;
  $status="enable";
  if (isset($_GET['acres'])) {
    $acre = $_GET['acres'];
    $bedroom="";
    $bathroom="" ;
    $property_type = "";
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
     $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$acre,$status)){
    echo '{"result": 0, "message": "Email alert was not created"}';
  return;
}
echo '{"result": 1, "message": "Email alert created successfully"}';

return;
}
if (isset($_GET['phone'])) {
 $phone = $_GET['phone'];
 if(!$myAlert->setAnAlertPhone($phone,$property_type,$property_category,
   $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$acre,$status)){
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

  if (isset($_GET['email'])) {
   $email = $_GET['email'];

   $myAlert->emailAlertSearch($email);
   $row =$myAlert->fetch();
  if(!$row){
    echo '{"result": 0, "message": "You have no subscribed email alerts in the database"}';
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
if (isset($_GET['phone'])) {
 $phone = $_GET['phone'];
  $myAlert->phoneAlertSearch($phone);
  $row =$myAlert->fetch();
  if(!$row){
    echo '{"result": 0, "message": "You have no subscribed message alerts in the database"}';
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
}
/**
*Method to add a post to the database
*/
function addProperty(){
  include "../classes/post.php";

  $post = new Post();
  // if(isset($_GET['email'])){


  // }
  // $name = $_GET['name'];
  // $description = $_GET['description'];
  // $d= $_GET['date'];
  // $date=date("Y-m-d",strtotime($d));
 
    $pic=$_REQUEST['pic'];

    // if(!$post->addFood($fname,$fcateg,$fprice,$pic)){
    //   echo '{"result":0,"message":"Could not add the food"}';
    //   return;
    // }

    // echo '{"result":1,"message":"Succesfully added food"}';
  }
  // if(empty($_FILES['postername'])){
  //   echo 'not there';
  // }

//   $name = $_REQUEST['ename'];
//   $description = $_REQUEST['description'];
//   $d= $_REQUEST['event_date'];
//     $date=date("Y-m-d",strtotime($d));
//   // $poster = $_REQUEST['poster'];
//   $user= $_SESSION['username'];
// // postername
//   $tempname=$_FILES["postername"]["tmp_name"];
//   $filename=$_FILES["postername"]["name"];
//   $path="/image.$filename";
//   move_uploaded_file($tempname, $path);

 function saveSession(){
  

  if(!isset( $_SESSION["longitude"])){
  $_SESSION["count"]=0;
  if (isset($_GET['longitude'])) {
    $_SESSION["longitude"]=$_GET['longitude'];
  }
}

  if(!isset( $_SESSION["latitude"])){
  
  if (isset($_GET['latitude'])) {
    $_SESSION["latitude"]=$_GET['latitude'];
  }
}
  if(!isset( $_SESSION["county"])){

  if (isset($_GET['county'])) {
    $_SESSION["county"]=$_GET['county'];
  }
}
  if(!isset( $_SESSION["sub_county"])){
  
  if (isset($_GET['sub_county'])) {
    $_SESSION["sub_county"]=$_GET['sub_county'];
  }
}
 
  echo '{"result": 1, "message": "session created"}';

  return;
}
function destroySession(){
  unset($_SESSION['longitude']);
  unset($_SESSION['latitude']);
  unset($_SESSION['county']);
  unset($_SESSION['sub_county']);
 
  echo '{"result": 1, "message": "session created"}';

  return;
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
  echo '{"result": 1, "message": "Post was deleted successful"}';

  return;
}
/**
*Method to fetch posts that have been made by a user
*/
function getMyProperty(){
  include "../classes/post.php";

  $post = new Post();
    // $userId=$_GET['username'];
  $userId=$_SESSION['username'];
  $row = $post->getMyPosts($userId);
  if(!$row){
    echo '{"result": 0, "message": "You have not made any posts"}';
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
 include "user.php";

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
ob_end_flush();

?>
