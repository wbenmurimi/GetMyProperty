<?php
/**
*@author Benson Wachira
*@version 1.0
*/
include "../model/base.php";

class Alerts extends base{

    /**
     * @method boolean setAnAlert($phone, $email,$property_type,$property_category,
     * $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$endtime) adds a new alert to the database
     * @param $phone phone number to receive the alerts
     * @param $email email to receive the alerts
     * @param $property_type the type of property that the person is looking for
     * @param $property_category the category of the property (land/house)
     * @param $county county that the property is located
     * @param $sub_county sub-county that the property is located
     * @param $buyrent the property is for rent or buying
     * @param $price_from lowest price for the property
     * @param $price_to highest price for the property
     * @param $bedroom number of bedrooms
     * @param $bathroom number of bathrooms
     * @param $endtime the date the alert will expire
     * @return boolean
     **/

    function setAnAlertEmail($email,$property_type,$property_category,
     $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$acre,$status,$userID)
    {
        $date = date('Y-m-d');
        $endtime=date('Y-m-d', strtotime('+1 month', strtotime($date)));
      $str_query = "INSERT INTO _alerts( xx_email_alert,xx_property_type,
        xx_property_category,xx_county,xx_sub_county, xx_buy_rent, xx_price_from, 
        xx_price_to , xx_bedroom,xx_bathroom, xx_acres, xx_alert_status, xx_end_time,xx_userId) 
    VALUES('$email','$property_type','$property_category','$county','$sub_county','$buyrent',
      '$price_from','$price_to','$bedroom','$bathroom','$acre','$status','$endtime', '$userID')";
    return $this->query($str_query);
    }

    /**
     * @method boolean setAnAlert($phone, $email,$property_type,$property_category,
     * $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$endtime) adds a new alert to the database
     * @param $phone phone number to receive the alerts
     * @param $email email to receive the alerts
     * @param $property_type the type of property that the person is looking for
     * @param $property_category the category of the property (land/house)
     * @param $county county that the property is located
     * @param $sub_county sub-county that the property is located
     * @param $buyrent the property is for rent or buying
     * @param $price_from lowest price for the property
     * @param $price_to highest price for the property
     * @param $bedroom number of bedrooms
     * @param $bathroom number of bathrooms
     * @param $endtime the date the alert will expire
     * @return boolean
     **/

    function setAnAlertPhone($phone,$property_type,$property_category,
     $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$acre,$status,$userID)
    {
    $date = date('Y-m-d');
        $endtime=date('Y-m-d', strtotime('+1 month', strtotime($date)));
      $str_query = "INSERT INTO _alerts(xx_message_alert,xx_property_type,
        xx_property_category,xx_county,xx_sub_county, xx_buy_rent, xx_price_from, 
        xx_price_to , xx_bedroom,xx_bathroom,xx_acres, xx_alert_status, xx_end_time, xx_userId) 
    VALUES('$phone','$property_type','$property_category','$county','$sub_county','$buyrent',
      '$price_from','$price_to','$bedroom','$bathroom','$acre','$status','$endtime', '$userID')";
    return $this->query($str_query);
    }

    /**
     * @method boolean alertSearch() to view all the subscribed alerts on a given user
     * @return boolean
     **/

    function alertSearch($userID)
    {
      $str_query = "SELECT xx_alert_id, xx_message_alert,xx_email_alert,
        xx_property_category,xx_sub_county, xx_buy_rent, 
    xx_alert_status,Date_Format(xx_start_time,'%Y-%m-%d') As start_date, xx_end_time 
    FROM _alerts 
    where xx_userId='$userID'";
      return $this->query($str_query);
    }



    /**
     * @method boolean searchSubscribedAlerts($county,$category,$price,$buyrent) to view all the subscribed alerts on a given user
     * @return boolean
     **/

    function searchSubscribedAlerts($county,$category,$price,$buyrent)
    {
      $str_query = "SELECT xx_alert_id, xx_message_alert,xx_email_alert,
        xx_price_to,xx_county, xx_price_from, xx_userId,
    xx_alert_status
     FROM _alerts
     WHERE xx_county like '%$county%' 
     AND xx_property_category='$category'
     AND xx_buy_rent='$buyrent'
     AND xx_price_from <='$price' 
     AND xx_price_to >= '$price' 
     AND xx_alert_status='enabled' ";

      return $this->query($str_query);
    }


    /**
     * @method boolean phoneAlertSearch($phone)to view all the subscribed alerts on a given phone
     * @param $phone
     * @return boolean
     **/

    function phoneAlertSearch($phone)
    {
      $str_query = "SELECT xx_alert_id, xx_phone,xx_email,
        xx_property_category,xx_sub_county, xx_buy_rent, 
    xx_alert_status,Date_Format(xx_start_time,'%Y-%m-%d') As start_date, xx_end_time FROM xx_property_alerts where xx_phone='$phone'";
      return $this->query($str_query);
    }

    /**
     * @method boolean viewAlerts() to view all the subscribed alerts
     * @return boolean
     **/

    function viewAlerts()
    {
      $str_query = "SELECT * FROM xx_property_alerts'";
      return $this->query($str_query);
    }

    /**
     * @method boolean enableAlert($id) to unsubscribe from alerts
     * @param $phone phone number to receive the alerts
     * @return boolean
     **/

    function enableAlert($id)
    {
      $str_query="UPDATE _alerts 
      SET xx_alert_status='enabled'
       WHERE xx_alert_id='$id'";
       
      return $this->query($str_query);
    }

    /**
     * @method boolean disableAlert($id) to unsubscribe from alerts
     * @param $phone phone number to receive the alerts
     * @return boolean
     **/

    function disableAlert($id)
    {
      $str_query="UPDATE _alerts 
      SET xx_alert_status='disabled'
       WHERE xx_alert_id='$id'";
      return $this->query($str_query);
    }

     /**
     * @method boolean deleteAlert($alertId)to delete an alert with a given id
     * @param $alertid the id of the alert to be deleted
     * @return boolean
     **/

     function deleteAlert($alertId)
     {
      $str_query = "DELETE FROM xx_property_alerts where xx_alert_id='$alertId'";
      return $this->query($str_query);
    }

    /**
    * @method boolean alertCountPerUser($id)gets the count of property added by a user
    * @param $id user id
    * @return boolean
    **/

    function alertCountPerUser($id)
    {
      $str_query = "SELECT count(xx_alert_id) as alert_count FROM  _alerts WHERE xx_userId='$id' ";
      
      return $this->query($str_query);
    }
  }

?>
