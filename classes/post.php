<?php
/**
*@author Benson Wachira
*@version 1.0
*/
include "../model/base.php";

class Post extends base{

   /**
     * addPopertyBasics($county,$sub_county,$buyrent,$userId,$property_category,$longitude, $latitude,$price,$description )adds a new property to the database
     * @param $county county that the property is located
     * @param $subcounty sub-county that the property is located
     * @param $free_featured the plan choosen when adding property - free/ featured
     * @param description property description
     * @param $price the price for the property
     * @param $longitude longitude of the location of the property 
     * @param $latitude latitude of the location of the property
     * @param $userId the Id of the user adding the property
     * @param $buyrent if the property is for sale or rent
     * @param $property_category the type of property that the person is adding 
     * @return boolean
     **/

   function addPopertyBasics($county,$sub_county,$free_featured, $buyrent,$userId,$property_category,$longitude, $latitude,$price,$description )
   {
    $str_query = "INSERT INTO _property(xx_county, xx_sub_county, xx_plan, xx_rent_sale, xx_user_identity, xx_property_category,xx_longitude, xx_latitude,xx_price,
    xx_description) 
    VALUES('$county','$sub_county','$free_featured','$buyrent','$userId','$property_category','$longitude','$latitude', '$price', '$description')";
    return $this->query($str_query);
}
    /**
     * addPopertyFeatures($p_type, $bathroom,$bedroom,$floors,$parking,$hr,$cctv,$alarm,$electric_fence,$wall,$internet,$pool,$garden,$gym, $disability, $water, $furnished,$p_id) adds house property features to the database
     * @param $bedroom number of bedrooms
     * @param $bathroom number of bathrooms
     * @param $gym property ammenities
     * @param $water_storage property ammenities
     * @param $swimming_pool swimming pool in the property
     * @param $garden garden in the property
     * @param $internet-access access to internet in the property
     * @param $disability_access a path for the disabled to access the property
     * @param $hr 24 hrs security in the property
     * @param $cctv cctv cameras in the property
     * @param $alarm alarm security in the property
     * @param $electric_fence electric fence in the property
     * @param $wall the property is sorrounded by a wall
     * @param $floors number of floors in the property
     * @param $parking the size of parking space in the property
     * @return boolean
     **/

    function addPopertyFeatures($p_type, $bathroom,$bedroom,$floors,$parking,$hr,$cctv,$alarm,$electric_fence,$wall,$internet,$pool,$garden,$gym, $disability, $water, $furnished,$p_id){

     $str_query = "INSERT INTO _property_features (xx_property_type, xx_bathroom, xx_bedroom, xx_floors,xx_parking_space ,xx_24_security,xx_cctv,xx_alarm_system,xx_electric_fence,xx_wall,xx_internet_access,xx_swimming_pool, xx_garden,  xx_gym, xx_disability_access,xx_water_storage, xx_fully_furnished, xx_property_no ) 
     VALUES('$p_type','$bathroom','$bedroom','$floors','$parking','$hr','$cctv','$alarm', '$electric_fence', '$wall','$internet','$pool','$garden','$gym','$disability','$water', '$furnished', '$p_id')";
     return $this->query($str_query);
 }

    /**
     *addLandFeatures($acre,$p_id) adds land property features to the database
     * @param $acre the size of the land
     * @param $p_id user id of the person adding the property
     * @return boolean
     **/

    function addLandFeatures($acre,$p_id){

     $str_query = "INSERT INTO _land (xx_acres, xx_propertyID ) 
     VALUES('$acre', '$p_id')";
     return $this->query($str_query);
 }

    /**
     *addPropertyPictures($url,$p_id)adds  property pictures to the database
     * @param $url the url of the picture
     * @param $p_id user id of the person adding the property
     * @return boolean
     **/

    function addPropertyPictures($url,$p_id){

     $str_query = "INSERT INTO _pictures (xx_picture_url, xx_property_ID ) 
     VALUES('$url', '$p_id')";
     return $this->query($str_query);
    }

    /**
     * @method boolean getLastProrpertyId()gets the last property Id that has been added to the database
     * @return boolean
     **/

     function getLastProrpertyId(){
        return $this-> get_insert_id();
    }

    /**
     * @method boolean getMyProperty($userId)gets property that was added by a particular user in the database
     * @param $userId the id of the person that added the property
     * @return boolean
     **/

    function getMyProperty($userId)
    {
      $str_query = "SELECT _property.*,_property_features.*, _land.*, _pictures.* FROM _pictures, _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID AND _property.xx_user_identity='$userId' GROUP BY _property.xx_property_id LIMIT 25";
      
      return $this->query($str_query);
    }

   /**
    * @method boolean fetchHomePageProperty()gets property that was added by a particular user in the database
    * @return boolean
    **/

    function fetchHomePageProperty()
    {
      $str_query = "SELECT  _property.*,_property_features.*, _land.*, _pictures.* FROM _pictures, _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID WHERE _property.xx_plan ='Featured' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

     /**
    * @method boolean fetchHouses()gets all houses in the database
    * @return boolean
    **/

    function fetchHouses()
    {
      $str_query = "SELECT _property.*,_property_features.*, _pictures.* FROM _pictures, _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no WHERE _property.xx_property_category ='House' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

 /**
    * @method boolean fetchLands()gets all the lands in the database
    * @return boolean
    **/

    function fetchLands()
    {
      $str_query = "SELECT _property.*,_land.*, _pictures.* FROM _pictures, _property LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID WHERE _property.xx_property_category ='Land' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

    /**
    * @method boolean fetchLands()gets all the lands in the database
    * @return boolean
    **/

    function fetchAllSearchProperty()
    {
      $str_query = "SELECT _property.*,_land.*, _pictures.*,_property_features.* FROM _pictures, _property LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

    /**
    * @method boolean propertyCountPerUser($id)gets the count of property added by a user
    * @return boolean
    **/

    function propertyCountPerUser($id)
    {
      $str_query = "SELECT count(xx_property_id) as post_count FROM  _property WHERE xx_user_identity='$id' ";
      
      return $this->query($str_query);
    }


    function viewProperty() 
    {
      $str_query = "SELECT * FROM xx_property order by post_time DESC LIMIT 25";
      
      return $this->query($str_query);
    }




// SELECT _property.*,_property_features.*, _land.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID ORDER BY `_property`.`xx_property_id` AND _property.xx_user_identity=1 ASC





// SELECT _property.xx_property_id,xx_time_added, xx_county, xx_sub_county, xx_plan, xx_rent_sale, xx_user_identity, xx_property_category,xx_longitude, xx_latitude,xx_price,
//     xx_description,xx_property_type, xx_bathroom, xx_bedroom, xx_floors,xx_parking_space ,xx_24_security,xx_cctv,xx_alarm_system,xx_electric_fence,xx_wall,xx_internet_access,xx_swimming_pool, xx_garden,  xx_gym, xx_disability_access,xx_water_storage, xx_fully_furnished, xx_picture_url FROM _property,_property_features, _land,_pictures,_system_users where xx_user_identity='$userId' AND _property.xx_property_id = _property_features.xx_property_no AND _property.xx_property_id= _land.xx_propertyID AND _property.xx_property_id = _pictures.xx_property_ID order by xx_time_added DESC





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

    // function editPost($county,$subcounty,$plan,$Property_type,$description,$bedroom,$bathroom,
    //  $phone, $email, $price, $land_size,$gym, $water_storage,$swimming_pool,$garden,
    //  $internet_access,$disability_access, $24_security,$cctv, $alarm, $electric_fence,
    //  $watch_dog, $wall,$floors,$parking,$user,$postId)
    // {
    //  $str_query = "UPDATE xx_property SET xx_county='$county',xx_sub_county='$subcounty',
    //  xx_plan='$plan',xx_property_type='$Property_type',xx_description='$description',
    //  xx_bedroom'=$bedroom',xx_bathroom='$bathroom', xx_phone='$phone', xx_email='$email',
    //  xx_price= '$price', xx_land_size='$land_size',xx_gym='$gym', xx_water_storage='$water_storage',
    //  xx_swimming_pool='$swimming_pool', xx_garden='$garden', xx_internet_access= '$internet_access',
    //  xx_disability_access='$disability_access', xx_24_security='$24_security',xx_cctv='$cctv', 
    //  xx_alarm_system='$alarm', xx_electric_fence='$electric_fence',xx_watch_dog='$watch_dog',
    //  xx_wall= '$wall',xx_floors='$floors', xx_parking_space='$parking',xx_posted_by='$user'
    //  WHERE  xx_property_id='$postId'";
    //  return $this->query($str_query);
    // }

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
