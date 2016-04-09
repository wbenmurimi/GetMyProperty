<?php
/**
*@author Benson Wachira
*@version 1.0
*/
include "../model/base.php";

class users extends base{

    
    /**
     * @method boolean Login($username, $user_password) username and password to enable user to log in
     * @param $username
     * @param $user_password
     * @return bool
     */
    function Login($username, $user_password)
    {
        $str_query = "SELECT xx_username, xx_user_type, xx_user_id ,xx_fname FROM _system_users WHERE xx_username = '$username' AND xx_user_password = md5('$user_password') AND xx_user_status='enabled'";
        return $this->query($str_query);
    }
    /**
     * @method boolean signUp($fname,$lname,$dob,$gender,$username,$password,$user_email,$phone,$usertype,
     *$user_status) sign up information of user to be stored in the database
     * @param $fname user first name
     * @param $lname user last name
     * @param $dob user date of birth
     * @param $gender user gender
     * @param $username name user will sign in with
     * @param $password password of user
     * @param $user_email email of user
     * @param $usertype type of the user that is created
     * @param $user_status status of the user account
     * @param $phone phone number of user
     * @return bool
     */
    function signUp($fname,$lname,$dob,$gender,$username,$password,$user_email,$phone,$usertype,$user_status)
    {
        $str_query = "INSERT INTO _system_users SET xx_fname='$fname',xx_lname='$lname',xx_dob='$dob', xx_gender='$gender', xx_username='$username', xx_user_password=md5('$password'),xx_user_status='$user_status', xx_user_email='$user_email',xx_user_phone='$phone',xx_user_type='$usertype'";
        return $this->query($str_query);
    }
    /**
     * @method boolean getUsers() fetches all the users in the database
        * @return bool
     */
    function getUsers()
    {
        $str_query = "SELECT * FROM _system_users order by xx_user_type";
        return $this->query($str_query);
    }

    /**
     * @method boolean getSellerrDetail($id) fetches all the details of a user
        * @return bool
     */
    function getSellerDetail($id)
    {
        $str_query = "SELECT _system_users.*, xx_property_id, xx_user_identity FROM _system_users, _property WHERE xx_property_id='$id' AND _property.xx_user_identity=xx_user_id ";
        return $this->query($str_query);
    }

    /**
     * @method boolean getUserDetails() fetches all the details of a user in the database
        * @return bool
     */
    function getUserDetail($id)
    {
        $str_query = "SELECT * FROM _system_users where xx_user_id='$id' ";
        return $this->query($str_query);
    }
    /**
     * @method boolean editUserType($user_status,$type,$id) changes the details of the user in the database
     * @param $id the user id in the database
     * @param $usertype type of the user that is created
     * @param $user_status status of the user account
     * @return bool
     */
    function editUserType($user_status,$type,$id)
    {
     $str_query = "UPDATE _system_users SET xx_user_type='$type', xx_user_status='$user_status'
     WHERE xx_user_id='$id'";
     return $this->query($str_query);
 }

    /**
     * @method boolean getOneUserPhone($phone) fetches a user in the database with a given phone
        * @return bool
     */
    function getOneUserPhone($phone)
    {
        $str_query = "SELECT * FROM _system_users where xx_user_phone='$phone'";
        return $this->query($str_query);
    }

    /**
     * @method boolean getOneUser($email) fetches a user in the database with a given email
        * @return bool
     */
    function getOneUserEmail($email)
    {
        $str_query = "SELECT * FROM _system_users where xx_user_email='$email'";
        return $this->query($str_query);
    } 

     /**
     * @method boolean sendPasswordResetCodePhone($phone) changes the details of the user in the database with a given phone
     * @param $phone the user phone in the database
     */
     function sendPasswordResetCodePhone($phone)
     {
        $myuser = new users();
        $myuser->getOneUserPhone($phone);
        $row=$myuser->fetch();    

        if($row){
            $random_code= rand(1000,9999);
        //send the code here

            include "../model/smsGateway.php";
            $smsGateway = new SmsGateway('wbenmurimi@gmail.com', 'murimi2015');

            $deviceID = 14246;
            $number = '+'.$phone;
            $message = 'Your password reset code is; '.$random_code;

            $result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

            $str_query = "UPDATE _system_users SET xx_password_reset_code='$random_code'
            where xx_user_phone='$phone'";
            return $this->query($str_query);
        }
    }
    /**
     * @method boolean sendPasswordResetCodeEmail($email) changes the details of the user in the database with a given email
     * @param $email the user email in the database
     */
    function sendPasswordResetCodePhoneEmail($email)
    {
       $myuser = new users();
       $myuser->getOneUserEmail($email);
       $row=$myuser-> fetch();

       if($row){
        $random_code= rand(1000,9999);
        //send the code here
        $str_query = "UPDATE _system_users SET xx_password_reset_code='$random_code'
        where xx_user_email='$email'";
        return $this->query($str_query);
    }
}

    /**
     * @method boolean deleteResetCode($code) deetes generated code in the database
        * @return bool
     */
    function deleteResetCode($code)
    {
        $str_query = "UPDATE _system_users SET xx_password_reset_code=''
        where xx_password_reset_code='$code'";
        return $this->query($str_query);
    }
     /**
     * @method boolean changeUserPassword($password,$code) changes the password of the user
     * @param $password the new password for the user
     * @param $code the new password for the user
     * @return bool
     */
     function changeUserPassword($password, $code)
     {
         $str_query = "UPDATE _system_users SET xx_user_password=md5('$password')
         WHERE xx_password_reset_code='$code'";
         
         return $this->query($str_query);
     }

      /**
     * @method boolean changeProfilePassword($password, $current_password,$id) changes the password of the user
     * @param $password the new password for the user
     * @param $current_password current password for the user
     * @param $id the id for the logged in user
     * @return bool
     */
     function changeProfilePassword($password, $current_password,$id)
     {
         $str_query = "UPDATE _system_users SET xx_user_password=md5('$password')
         WHERE xx_user_password=md5('$current_password') AND xx_user_id='$id'";
         
         return $this->query($str_query);
     }

 }
 ?>
