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
        $str_query = "SELECT xx_username, xx_user_type FROM xx_system_users WHERE xx_username = '$username' AND xx_user_password = md5('$user_password') AND xx_user_status='enable'";
        return $this->query($str_query);
    }
    /**
     * @method boolean signUp($username,$password,$user_email,$phone,$usertype,$user_status) sign up information of user to be stored in the database
     * @param $username name user will sign in with
     * @param $password password of user
     * @param $user_email email of user
     * @param $usertype type of the user that is created
     * @param $user_status status of the user account
     * @param $phone phone number of user
     * @return bool
     */
    function signUp($username,$password,$user_email,$phone,$usertype,$user_status)
    {
        $str_query = "INSERT INTO xx_system_users SET xx_username='$username', xx_user_password=md5('$password'),xx_user_status='$user_status', xx_user_email='$user_email',xx_user_phone='$phone',xx_user_type='$usertype'";
        return $this->query($str_query);
    }
    /**
     * @method boolean getUsers() fetches all the users in the database
        * @return bool
     */
    function getUsers()
    {
        $str_query = "SELECT * FROM xx_system_users order by user_type";
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
     $str_query = "UPDATE xx_system_users SET xx_user_type='$type', xx_user_status='$user_status'
     WHERE xx_user_id='$id'";
     return $this->query($str_query);
 }

    /**
     * @method boolean getOneUser() fetches a user in the database with a given email or phone
        * @return bool
     */
    function getOneUser($phone_or_email)
    {
        $str_query = "SELECT * FROM xx_system_users where xx_user_phone='$phone_or_email' or xx_user_email='$phone_or_email'";
        return $this->query($str_query);
    }

     /**
     * @method boolean sendPasswordResetCode($phone_or_email) changes the details of the user in the database
     * @param $phone_or_email the user email or phone in the database
     */
     function sendPasswordResetCode($phone_or_email)
     {
       getOneUser($phone_or_email);
       $row=fetch();

       if($row){
        $random_code= rand(1000,9999);
        //send the code here
        $str_query = "UPDATE xx_system_users SET xx_password_reset_code='$random_code'
        where xx_user_phone='$phone_or_email' or xx_user_email='$phone_or_email'";
        return $this->query($str_query);
    }
}
     /**
     * @method boolean changeUserPassword($password,$code) changes the password of the user
     * @param $id the user id in the database
     * @param $password the new password for the user
     * @param $code the new password for the user
     * @return bool
     */
     function changeUserPassword($password, $code)
     {
         $str_query = "UPDATE xx_system_users SET xx_user_password='$password'
         WHERE xx_password_reset_code='$code'";
         return $this->query($str_query);
     }
     
 }
 ?>
