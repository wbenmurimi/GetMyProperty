<?php
/**
*@author Benson Wachira
*@version 1.0
*/
include "../model/base.php";

class Post extends base{

// Dashboard query

//   SELECT _property.* ,_property_features.*,_land.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE _property.xx_user_identity=1 GROUP BY _property.xx_property_id ORDER BY _property.xx_property_id

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
      $str_query = "SELECT _property.* ,_property_features.*,_land.*,_pictures.* 
      FROM _property 
      LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no
      LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID
      LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID
      WHERE _property.xx_user_identity='$userId' 
      GROUP BY _property.xx_property_id
      ORDER BY _property.xx_property_id DESC
      LIMIT 25";
      
      return $this->query($str_query);
    }

   /**
    * @method boolean fetchHomePageProperty()gets property that was added by a particular user in the database
    * @return boolean
    **/

   function fetchHomePageProperty()
   {
    $str_query = "SELECT _property.* ,_property_features.*,_land.*,_pictures.*
    FROM _property 
    LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no 
    LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID
    LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID 
    WHERE _property.xx_plan ='Featured' 
    GROUP BY _property.xx_property_id 
    ORDER BY xx_plan ASC 
    LIMIT 8";

    return $this->query($str_query);
  }

    /**
    * @method boolean fetchHouses()gets all houses in the database
    * @return boolean
    **/

    function fetchHouses($pg)
    {

      $pg=(int)$pg;
      $numItems=5;
      $start=($pg-1) * $numItems;
      $end= $numItems;

      $str_query = "SELECT _property.*,_property_features.*, _pictures.* 
      FROM _property 
      LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no 
      LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID
      WHERE _property.xx_property_category ='House' 
      GROUP BY _property.xx_property_id 
      ORDER BY xx_plan ASC 
      LIMIT $start,$end ";
      
      return $this->query($str_query);
    }

 /**
    * @method boolean fetchLands()gets all the lands in the database
    * @return boolean
    **/

 function fetchLands($pg)
 {

  $pg=(int)$pg;
  $numItems=5;
  $start=($pg-1) * $numItems;
  $end= $numItems;

  $str_query = "SELECT _property.*,_land.*, _pictures.* 
  FROM _property 
  LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID
  LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID
  WHERE _property.xx_property_category ='Land'
  GROUP BY _property.xx_property_id 
  ORDER BY xx_plan ASC 
  LIMIT $start,$end";

  return $this->query($str_query);
}

    /**
    * @method boolean fetchLands()gets all the lands in the database
    * @return boolean
    **/

    function fetchAllSearchProperty($pg)
    {
      $pg=(int)$pg;
      $numItems=5;
      $start=($pg-1) * $numItems;
      $end= $numItems;
      $str_query = "SELECT _property.* ,_property_features.*,_land.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID GROUP BY _property.xx_property_id  ORDER BY xx_plan ASC LIMIT $start,$end";
      
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

      /**
     * @method boolean deletePost($id) deletes a property with a given property id in the database
     * @param $id property id in the database
     * @return boolean
     **/

      function deletePost($id)
      {
        $str_query="DELETE FROM _property WHERE   xx_property_id='$id'";
        return $this->query($str_query);
      }

     /**
     * @method boolean deletePictures($id) deletes property pictures with a given property id in the database
     * @param $id property id in the database
     * @return boolean
     **/

     function deletePictures($id)
     {
      $str_query="DELETE FROM _pictures WHERE   xx_property_ID='$id'";
      return $this->query($str_query);
    }

    /**
     * @method boolean deleteLand($id) deletes property land with a given property id in the database
     * @param $id property id in the database
     * @return boolean
     **/

    function deleteLand($id)
    {
      $str_query="DELETE FROM _land WHERE   xx_propertyID='$id'";
      return $this->query($str_query);
    }

    /**
     * @method boolean deletePropertyFeatures($id) deletes property features with a given property id in the database
     * @param $id property id in the database
     * @return boolean
     **/

    function deletePropertyFeatures($id)
    {
      $str_query="DELETE FROM _property_features WHERE   xx_property_no='$id'";
      return $this->query($str_query);
    }

  /**
     * @method boolean getOneProperty($Id)gets property with a given id in database
     * @param $userId the id of the person that added the property
     * @return boolean
     **/

  function getOneProperty($Id)
  {
    $str_query = "SELECT _property.* ,_property_features.*,_land.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID WHERE _property.xx_property_id='$Id'";

    return $this->query($str_query);
  }
   /**
     * @method boolean getOnePropertyPictures($Id)gets property pictures of a property with a given id in database
     * @param $userId the id of the person that added the property
     * @return boolean
     **/

   function getOnePropertyPictures($Id)
   {
    $str_query = "SELECT _pictures.* FROM _pictures WHERE _pictures.xx_property_ID='$Id'";

    return $this->query($str_query);
  }

    /**
     * @method boolean resultCount()gets number of properties in database
     * @return boolean
     **/
    function resultCount()
    {        
     $str_sql = "SELECT count(*) as numProperty 
     FROM _property";

     return $this->query($str_sql);
   }

    /**
     * @method boolean resultCountHouse()gets number of houses in database
     * @return boolean
     **/
    function resultCountHouse()
    {        
     $str_sql = "SELECT count(xx_property_id) as numProperty
     FROM _property
     WHERE _property.xx_property_category ='House'";

     return $this->query($str_sql);
   }

     /**
     * @method boolean resultCountLand()gets number of Land in database
     * @return boolean
     **/
     function resultCountLand()
     {        
       $str_sql = "SELECT count(xx_property_id) as numProperty 
       FROM _property
       WHERE _property.xx_property_category ='Land'";

       return $this->query($str_sql);
     }

       /**
     * @method boolean deletePost($id) deletes a property with a given property id in the database
     * @param $id property id in the database
     * @return boolean
     **/

      function reportPost($id)
      {
        $str_query="UPDATE  _property 
        SET xx_status='Disabled'
        WHERE   xx_property_id='$id'";
        return $this->query($str_query);
      }

  /**
    * @method boolean relatedProperty($county,$sub_county,$buyrent,$p_cat,$price_from,$price_to) searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $sub_county sub county where the property is located
    * @param $buyrent property for rent or sale
    * @param $p_type property type
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

  function relatedProperty($county,$buyrent,$p_cat,$price_from,$price_to)
  {
    $str_query = "SELECT _property.* ,_property_features.*,_land.*,_pictures.* 
    FROM _property 
    LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no
     LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID
      LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID 
      WHERE  xx_county like '%$county%' 
       AND xx_rent_sale= '$buyrent' 
       AND xx_property_category ='$p_cat' 
       AND xx_price between '$price_from' AND '$price_to' 
       GROUP BY _property.xx_property_id
        ORDER BY xx_plan ASC 
        LIMIT 4";

    return $this->query($str_query);
  }
    /**
    * @method boolean refinedLandSearch($buyrent,$price_from,$price_to) searchyes all houses in the database with the given parameters
    * @param $county county where the property is located
    * @param $sub_county sub county where the property is located
    * @param $buyrent property for rent or sale
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

    function refinedLandSearch($buyrent,$price_from,$price_to)
    {
      $str_query = "SELECT _property.* ,_land.*,_pictures.* FROM _property LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE _property.xx_property_category ='Land' AND xx_rent_sale= '$buyrent' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

    /**
    * @method boolean refinedPropertySearch($county,$sub_county,$buyrent,$p_type,$price_from,$price_to) searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $sub_county sub county where the property is located
    * @param $buyrent property for rent or sale
    * @param $p_type property type
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

    function refinedPropertySearch($county,$sub_county,$buyrent,$price_from,$price_to)
    {
      $str_query = "SELECT _property.* ,_property_features.*,_land.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE  xx_county='$county' AND xx_sub_county='$sub_county' AND xx_rent_sale= '$buyrent' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

    /**
    * @method boolean refinedTypePropertySearch($county,$sub_county,$buyrent,$p_type,$price_from,$price_to) searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $sub_county sub county where the property is located
    * @param $buyrent property for rent or sale
    * @param $p_type property type
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

    function refinedTypePropertySearch($county,$sub_county,$buyrent,$p_type,$price_from,$price_to)
    {
      $str_query = "SELECT _property.* ,_property_features.*,_land.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE  xx_county='$county' AND xx_sub_county='$sub_county' AND xx_rent_sale= '$buyrent' AND _property_features.xx_property_type='$p_type' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

     /**
    * @method boolean refinedCountySearch($county,$price_from,$price_to)searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

     function refinedCountySearch($county,$price_from,$price_to)
     {
      $str_query = "SELECT _property.*,_property_features.*, _pictures.*, _land.* FROM _pictures, _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE  xx_county='$county'AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    } 


     /**
    * @method boolean refinedCountySearchLand($county,$buyrent,$price_from,$price_to)searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

     function refinedCountySearchLand($county,$buyrent,$price_from,$price_to)
     {
      $str_query = "SELECT _property.* ,_land.*,_pictures.* FROM _property LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE  xx_county='$county'AND xx_property_category ='Land' AND xx_rent_sale= '$buyrent' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

    /**
    * @method boolean refinedSubCountySearchLand($county,$sub_county, $buyrent,$price_from,$price_to)searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

    function refinedSubCountySearchLand($county,$sub_county, $buyrent,$price_from,$price_to)
    {
      $str_query = "SELECT _property.* ,_land.*,_pictures.* FROM _property LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE  xx_county='$county' AND xx_sub_county='$sub_county' AND xx_property_category ='Land' AND xx_rent_sale= '$buyrent' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }




     /**
    * @method boolean refinedCountySearchLand($county,$buyrent,$price_from,$price_to)searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

     function refinedCountySearchHouse($county,$buyrent,$price_from,$price_to)
     {
      $str_query = "SELECT _property.* ,_property_features.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE  xx_county='$county'AND xx_property_category ='House' AND xx_rent_sale= '$buyrent' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

    /**
    * @method boolean refinedSubCountySearchLand($county,$sub_county, $buyrent,$price_from,$price_to)searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

    function refinedSubCountySearchHouse($county,$sub_county, $buyrent,$price_from,$price_to)
    {
      $str_query = "SELECT _property.* ,_property_features.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE  xx_county='$county' AND xx_sub_county='$sub_county' AND xx_property_category ='House' AND xx_rent_sale= '$buyrent' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }

    /**
    * @method boolean refinedLandSearch($buyrent,$price_from,$price_to) searchyes all houses in the database with the given parameters
    * @param $county county where the property is located
    * @param $sub_county sub county where the property is located
    * @param $buyrent property for rent or sale
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

    function refinedHouseSearch($buyrent,$price_from,$price_to)
    {
      $str_query = "SELECT _property.* ,_property_features.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE _property.xx_property_category ='House' AND xx_rent_sale= '$buyrent' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }


     /**
    * @method boolean refinedSaleRentSearch($buyrent,$price_from,$price_to) searchyes all properties in the database with the given parameters
    * @param $buyrent property for rent or sale
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

     function refinedSaleRentSearch($buyrent,$price_from,$price_to)
     {
      $str_query = " SELECT _property.* ,_property_features.*,_land.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE xx_rent_sale= '$buyrent' AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    } 

     /**
    * @method boolean refinedCountyRentSearch($county,$buyrent,$price_from,$price_to) searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $buyrent property for rent or sale
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

     function refinedCountyRentSearch($county,$buyrent,$price_from,$price_to)
     {
      $str_query = "SELECT _property.* ,_property_features.*,_land.*,_pictures.* FROM _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE   xx_rent_sale= '$buyrent' AND xx_county='$county'AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      return $this->query($str_query);
    } 

     /**
    * @method boolean refinedAllCountySearch($price_from,$price_to)searchyes all properties in the database with the given parameters
    * @param $county county where the property is located
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

     function refinedAllCountySearch($price_from,$price_to)
     {
      $str_query = "SELECT _property.*,_property_features.*, _pictures.*, _land.* FROM _pictures, _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE  xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    } 

    /**
    * @method boolean refinedCountyAllSubCountySearch($county,$buyrent,$p_type,$price_from,$price_to) searchyes all houses in the database with the given parameters
    * @param $county county where the property is located
    * @param $sub_county sub county where the property is located
    * @param $buyrent property for rent or sale
    * @param $p_type property type
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @return boolean
    **/

    function refinedCountyAllSubCountySearch($county,$buyrent,$p_type,$price_from,$price_to)
    {
      $str_query = "SELECT _property.*,_property_features.*, _pictures.* FROM _pictures, _property LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID WHERE _property.xx_property_category ='House' AND xx_county LIKE'%$county' AND xx_rent_sale= '$buyrent'  AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id ORDER BY xx_plan ASC LIMIT 25";
      
      return $this->query($str_query);
    }


     /**
    * @method boolean allSearch($county,$sub_county,$property_category,$buyrent,$price_from,$price_to,$pg) searches all property with the given parameter
    * @param $county county where the property is located
    * @param $sub_county sub county where the property is located
    * @param $buyrent property for rent or sale
    * @param $property_category property category
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @param $pg page number
    * @return boolean
    **/

     function allSearch($county,$sub_county,$property_category,$buyrent,$price_from,$price_to,$pg)
     {

      $pg=(int)$pg;
      $numItems=5;
      $start=($pg-1) * $numItems;
      $end= $numItems;

      $str_query = "SELECT _property.* ,_property_features.*,_land.*,_pictures.* 
      FROM _property 
      LEFT JOIN _property_features on _property.xx_property_id = _property_features.xx_property_no
      LEFT JOIN _land on _property.xx_property_id = _land.xx_propertyID
      LEFT JOIN _pictures on _property.xx_property_id = _pictures.xx_property_ID 

      WHERE 1=1 ";

      if($county!=="" && $county!=="All")
      {
       $str_query =$str_query." AND xx_county like '%$county%' ";
     }

     if($sub_county!=="" && $sub_county!=="All")
     {
       $str_query =$str_query." AND xx_sub_county like '%$sub_county%'";
     }

     if($property_category!=="" && $property_category!=="All")
     {
       $str_query =$str_query." AND xx_property_category like '%$property_category%'";
     }

     if($buyrent!=="" && $buyrent!=="undefined")
     {
       $str_query =$str_query." AND xx_rent_sale = '$buyrent'";
     }


     $str_query =$str_query ." AND xx_price between '$price_from' AND '$price_to' GROUP BY _property.xx_property_id  ORDER BY xx_plan ASC LIMIT $start,$end";

      //echo $str_query;

     return $this->query($str_query);
   }


/**
    * @method boolean searchCount($county,$sub_county,$property_category,$buyrent,$price_from,$price_to,$pg) gets the count of property with the given parameter
    * @param $county county where the property is located
    * @param $sub_county sub county where the property is located
    * @param $buyrent property for rent or sale
    * @param $property_category property category
    * @param $price_from minimum price
    * @param $price_to maximum price
    * @param $pg page number
    * @return boolean
    **/

function searchCount($county,$sub_county,$property_category,$buyrent,$price_from,$price_to)
{


  $str_query = "SELECT count(_property.xx_property_id) as numProperty 

  FROM _property   

  WHERE 1=1 ";

  if($county!=="" && $county!=="All")
  {
   $str_query =$str_query." AND xx_county like '%$county%' ";
 }

 if($sub_county!=="" && $sub_county!=="All")
 {
   $str_query =$str_query." AND xx_sub_county like '%$sub_county%'";
 }

 if($property_category!=="" && $property_category!=="All")
 {
   $str_query =$str_query." AND xx_property_category like '%$property_category%'";
 }

 if($buyrent!=="" && $buyrent!=="undefined")
 {
   $str_query =$str_query." AND xx_rent_sale = '$buyrent'";
 }


 $str_query =$str_query ." AND xx_price between '$price_from' AND '$price_to'";


 return $this->query($str_query);
}


















function viewProperty() 
{
  $str_query = "SELECT * FROM xx_property order by post_time DESC LIMIT 25";

  return $this->query($str_query);
}




}

?>
