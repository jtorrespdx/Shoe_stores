<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";
    require_once "src/Brand.php";

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {

        // protected function teardown()
        // {
        //     Store::deleteAll();
        //     Brand::deleteAll();
        // }

        function testGetStoreLocation()
        {
            //Arrange
            $store_location = "Lloyd Center";
            $test_store = new Store($store_location);

            //Act
            $result = $test_store->getStoreLocation();

            //Assert
            $this->assertEquals($store_location, $result);

        }

        function testSetStoreLocation()
        {
            //Arrange
            $store_location = "Lloyd Center";
            $test_store = new Store($store_location);

            //Act
            $test_store->setStoreLocation("Pioneer Place");
            $result = $test_store->getStoreLocation();

            //Assert
            $this->assertEquals("Pioneer Place", $result);
        }

        function testGetId()
        {
            //Arrange
            $store_location = "Lloyd Center";
            $id = 1;
            $test_store = new Store($store_location, $id);

            //Act
            $result = $test_store->getId();

            //Assert
            $this->assertEquals(1, $result);
        }
        //
        // function testSave()
        // {
        //
        // }
        //
        // function testUpdate()
        // {
        //
        // }
        //
        // function TestDeleteStore()
        // {
        //
        // }
        //
        // function testGetAll()
        // {
        //
        // }
        //
        // function testDeleteAll()
        // {
        //
        // }
        //
        // function testFind()
        // {
        //
        // }
        //
        // function testAddBrand()
        // {
        //
        // }
        //
        // function testGetBrands() /*testGetBrand ? */
        // {
        //
        // }
        //
        // function testDelete()
        // {
        //
        // }
    }
 ?>
