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
     $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$acre,$status)
    {
        $date = date('Y-m-d');
        $endtime=date('Y-m-d', strtotime('+1 month', strtotime($date)));
      $str_query = "INSERT INTO xx_property_alerts( xx_email,xx_property_type,
        xx_property_category,xx_county,xx_sub_county, xx_buy_rent, xx_price_from, 
        xx_price_to , xx_bedroom,xx_bathroom, xx_acres, xx_alert_status, xx_end_time) 
    VALUES('$email','$property_type','$property_category','$county','$sub_county','$buyrent',
      '$price_from','$price_to','$bedroom','$bathroom','$acre','$status','$endtime')";
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
     $county, $sub_county, $buyrent, $price_from, $price_to,$bedroom,$bathroom,$acre,$status)
    {
    $date = date('Y-m-d');
        $endtime=date('Y-m-d', strtotime('+1 month', strtotime($date)));
      $str_query = "INSERT INTO xx_property_alerts(xx_phone,xx_property_type,
        xx_property_category,xx_county,xx_sub_county, xx_buy_rent, xx_price_from, 
        xx_price_to , xx_bedroom,xx_bathroom,xx_acres, xx_alert_status, xx_end_time) 
    VALUES('$phone','$property_type','$property_category','$county','$sub_county','$buyrent',
      '$price_from','$price_to','$bedroom','$bathroom','$acre','$status','$endtime')";
    return $this->query($str_query);
    }


/**
     * @method boolean mailAlertSearch($email)to view all the subscribed alerts on a given email
     * @param $email
     * @return boolean
     **/

    function emailAlertSearch($email)
    {
      $str_query = "SELECT xx_alert_id, xx_phone,xx_email,
        xx_property_category,xx_sub_county, xx_buy_rent, 
    xx_alert_status,Date_Format(xx_start_time,'%Y-%m-%d') As start_date, xx_end_time FROM xx_property_alerts FROM xx_property_alerts where xx_email='$email'";
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
     * @method boolean unsubscribeAlert($email_phone,$status) to unsubscribe from alerts
     * @param $phone phone number to receive the alerts
     * @return boolean
     **/

    function unsubscribeAlert($email_phone,$status)
    {
      $str_query="UPDATE xx_property_alerts SET xx_alert_status='$status' WHERE xx_email='$email_phone' or xx_phone='$email_phone'";
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
  }

?>
