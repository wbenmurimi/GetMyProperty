<?php
/**
*@author Benson Wachira
*@version 1.0.0
*Test class for backend php classes
*/
include "../classes/post.php";
include "../classes/user.php";
include "../classes/alerts.php";
class testClass extends PHPUnit_Framework_TestCase
{
    /**
     * @method  testViewUsers() tests method for 
     * @param no parameter
     * @return bool
     **/
    public function testViewUsers()
    {

        $us = new users();

        $this->assertEquals(-1, $us->getUsers());
    }
































    // /**
    //  * @method  testDeleteInventory() tests method for deleteInventory($id) fuction in Inventory class
    //  * @param no parameter
    //  * @return bool
    //  **/
    // public function testDeleteInventory()
    // {

    //     $invent = new Inventory();
    //     $id="44";
    //     $this->assertEquals(1, $invent->deleteInventory($id));
    // }
    // /**
    //  * @method  testSearchInventory() tests method for searchInventory($searchItem) fuction in Inventory class
    //  * @param no parameter
    //  * @return bool
    //  **/
    // public function testSearchInventory()
    // {

    //     $invent = new Inventory();
    //     $searchItem="5";
    //     $this->assertEmpty(false, $invent->searchInventory($searchItem));
    // }
    // /**
    //  * @method  testAddInventory() tests method for addInventory($number, $barcode, 
    //  * $name, $manufacturer, $price, $dateBought, $repairDate, $conditions, $location,
    //  * $department, $userId, $quantity) fuction in Inventory class
    //  * @param no parameter
    //  * @return bool
    //  **/
    // public function testAddInventory()
    // {

    //     $invent = new Inventory();
    //     $number="60"; 
    //     $barcode="465736235"; 
    //     $name="name"; 
    //     $manufacturer="manufacturer"; 
    //     $price="25"; 
    //     $dateBought="12/11/1015"; 

    //     $repairDate="6/12/2015"; 
    //     $conditions="good"; 
    //     $location="lab 222"; 
    //     $department="cs"; 
    //     $userId="34314"; 
    //     $quantity="200"; 

    //     $this->assertEquals(true, $invent->addInventory($number, 
    //         $barcode, $name, $manufacturer, $price, $dateBought,$repairDate,$conditions, $location, $department, $userId,$quantity));
    // }

    //  /**
    //  * @method  testEditInventory() tests method for editInventory($number, $barcode, 
    //  * $name, $manufacturer, $price, $dateBought, $repairDate, $conditions, $location,
    //  * $department, $userId, $quantity) fuction in Inventory class
    //  * @param no parameter
    //  * @return bool
    //  **/
    // public function testEditInventory()
    // {

    //     $invent = new Inventory();
    //     $number="50"; 
    //     $barcode="465736235"; 
    //     $name="name"; 
    //     $manufacturer="manufacturer"; 
    //     $price="25"; 
    //     $dateBought="12/11/1015"; 

    //     $repairDate="6/12/2015"; 
    //     $conditions="awesome"; 
    //     $location="lab 222"; 
    //     $department="cs"; 
    //     $userId="34314"; 
    //     $quantity="5000"; 

    //     $this->assertEquals(true, $invent->editInventory($number, 
    //         $barcode, $name, $manufacturer, $price, $dateBought,$repairDate,$conditions, $location, $department, $userId,$quantity));
    // }
    // /**
    //  * @method  testGetInventory() tests method for getInventory($id) fuction in Inventory class
    //  * @param no parameter
    //  * @return bool
    //  **/
    // public function testGetInventory()
    // {

    //     $invent = new Inventory();
    //     $id="50";
    //     $this->assertEquals(-1, $invent->getInventory($id));
    // }

}