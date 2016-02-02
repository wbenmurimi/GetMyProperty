<?php
/**
*@author Benson Wachira
*@version 1.0
*/
include "../model/base.php";

class Property extends base{
  
   /**
     * @method boolean setAnAlert(addMyProperty($county,$subcounty,$plan,$Property_type,$description,$bedroom,$bathroom,
     *$phone, $email, $price, $land_size,$gym, $water_storage,$swimming_pool,$garden,
     *$internet_access,$disability_access, $24_security,$cctv, $alarm, $electric_fence,
     *$watch_dog, $wall,$floors,$parking,$user)adds a new property to the database
     * @param $county county that the property is located
     * @param $subcounty sub-county that the property is located
     * @param $plan the plan choosen when adding property - free/ featured
     * @param $property_type the type of property that the person is adding
     * @param description property description
     * @param $bedroom number of bedrooms
     * @param $bathroom number of bathrooms
     * @param $phone phone number to receive the alerts
     * @param $email email to receive the alerts
     * @param $price the price for the property
     * @param $land_size the size of the property (land)
     * @param $gym property ammenities
     * @param $water_storage property ammenities
     * @param $swimming_pool swimming pool in the property
     * @param $garden garden in the property
     * @param $internet-access access to internet in the property
     * @param $disability_access a path for the disabled to access the property
     * @param $24_security 24 hrs security in the property
     * @param $cctv cctv cameras in the property
     * @param $alarm alarm security in the property
     * @param $electric_fence electric fence in the property
     * @param $whatchdog watchgod available in the property
     * @param $wall the property is sorrounded by a wall
     * @param $floors number of floors in the property
     * @param $parking the size of parking space in the property
     * @param $user the username of the person that posted the property
     * @return boolean
     **/

   function addMyProperty($county,$subcounty,$plan,$Property_type,$description,$bedroom,$bathroom,
     $phone, $email, $price, $land_size,$gym, $water_storage,$swimming_pool,$garden,
     $internet_access,$disability_access, $24_security,$cctv, $alarm, $electric_fence,
     $watch_dog, $wall,$floors,$parking,$user)
   {
    $str_query = "INSERT INTO xx_property(xx_county, xx_sub_county, xx_plan,  xx_property_type,
     xx_description, xx_bedroom, xx_bathroom, xx_phone, xx_email,xx_price, xx_land_size, xx_gym
     , xx_water_storage,xx_swimming_pool, xx_garden,xx_internet_access,xx_disability_access,
     xx_24_security,xx_cctv,xx_alarm_system,  xx_electric_fence,xx_watch_dog, xx_wall,  xx_floors,
     xx_parking_space, xx_posted_by) 
    VALUES('$county','$subcounty','$plan','$Property_type','$description','$bedroom','$bathroom',
     '$phone', '$email', '$price', '$land_size','$gym', '$water_storage','$swimming_pool','$garden',
     '$internet_access','$disability_access', '$24_security','$cctv', '$alarm', '$electric_fence',
     '$watch_dog', '$wall','$floors','$parking','$user')";
    return $this->query($str_query);
    }


    function viewProperty()
    {
      $str_query = "SELECT * FROM xx_property order by post_time DESC LIMIT 25";
      return $this->query($str_query);
    }
    
    /**
     * @method boolean setAnAlert(addMyProperty($county,$subcounty,$plan,$Property_type,$description,$bedroom,$bathroom,
     *$phone, $email, $price, $land_size,$gym, $water_storage,$swimming_pool,$garden,
     *$internet_access,$disability_access, $24_security,$cctv, $alarm, $electric_fence,
     *$watch_dog, $wall,$floors,$parking,$user)adds a new property to the database
     * @param $county county that the property is located
     * @param $subcounty sub-county that the property is located
     * @param $plan the plan choosen when adding property - free/ featured
     * @param $property_type the type of property that the person is adding
     * @param description property description
     * @param $bedroom number of bedrooms
     * @param $bathroom number of bathrooms
     * @param $phone phone number to receive the alerts
     * @param $email email to receive the alerts
     * @param $price the price for the property
     * @param $land_size the size of the property (land)
     * @param $gym property ammenities
     * @param $water_storage property ammenities
     * @param $swimming_pool swimming pool in the property
     * @param $garden garden in the property
     * @param $internet-access access to internet in the property
     * @param $disability_access a path for the disabled to access the property
     * @param $24_security 24 hrs security in the property
     * @param $cctv cctv cameras in the property
     * @param $alarm alarm security in the property
     * @param $electric_fence electric fence in the property
     * @param $whatchdog watchgod available in the property
     * @param $wall the property is sorrounded by a wall
     * @param $floors number of floors in the property
     * @param $parking the size of parking space in the property
     * @param $user the username of the person that posted the property
     * @param $postId the property id in the database
     * @return boolean
     **/

    function editPost($county,$subcounty,$plan,$Property_type,$description,$bedroom,$bathroom,
     $phone, $email, $price, $land_size,$gym, $water_storage,$swimming_pool,$garden,
     $internet_access,$disability_access, $24_security,$cctv, $alarm, $electric_fence,
     $watch_dog, $wall,$floors,$parking,$user,$postId)
    {
     $str_query = "UPDATE xx_property SET xx_county='$county',xx_sub_county='$subcounty',
     xx_plan='$plan',xx_property_type='$Property_type',xx_description='$description',
     xx_bedroom'=$bedroom',xx_bathroom='$bathroom', xx_phone='$phone', xx_email='$email',
     xx_price= '$price', xx_land_size='$land_size',xx_gym='$gym', xx_water_storage='$water_storage',
     xx_swimming_pool='$swimming_pool', xx_garden='$garden', xx_internet_access= '$internet_access',
     xx_disability_access='$disability_access', xx_24_security='$24_security',xx_cctv='$cctv', 
     xx_alarm_system='$alarm', xx_electric_fence='$electric_fence',xx_watch_dog='$watch_dog',
     xx_wall= '$wall',xx_floors='$floors', xx_parking_space='$parking',xx_posted_by='$user'
     WHERE  xx_property_id='$postId'";
     return $this->query($str_query);
    }

    /**
     * @method boolean deletePost($id) deletes a property with a given id in the database
     * @param $id property id in the database
     * @return boolean
     **/

    function deletePost($id)
    {
      $str_query="DELETE FROM xx_property WHERE   xx_property_id='$id'";
      return $this->query($str_query);
    }

    /**
     * @method boolean searchPost($searchItem) searches for a property with a given key word in the database
     * @param $searchItem the search parameter for the property in the database
     * @return boolean
     **/

    function searchPost($searchItem)
    {

      $str_query="SELECT * FROM xx_property WHERE event_name LIKE '%$searchItem%' OR description LIKE '%$searchItem%'
      OR event_time LIKE '%$searchItem%' OR poster LIKE '%$searchItem%";
      return $this->query($str_query);
    }

    /**
     * @method boolean getMyProperty($userId)gets property that was added by a particular user in the database
     * @param $userId the username of the person that added the property
     * @return boolean
     **/

    function getMyProperty($userId)
    {
      $str_query = "SELECT * FROM xx_property where posted_by='$userId' order by post_time DESC LIMIT 10";
      return $this->query($str_query);
    }

    /**
     * @method boolean viewOneproperty($postId) gets one property with a given id from the database
     * @param $postId property id in the database
     * @return boolean
     **/

    function viewOneproperty($postId)
    {
      $str_query = "SELECT * FROM xx_property where xx_property_id='$postId'";
      return $this->query($str_query);
    }
}

?>
