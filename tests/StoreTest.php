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

        protected function teardown()
        {
            Store::deleteAll();
            // Brand::deleteAll();
        }

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

        function testGetAll()
        {
            //Arrange
            $store_location = "Lloyd Center";
            $id = 1;
            $test_store = new Store($store_location, $id);
            $test_store->save();

            $store_location2 = "Pioneer Place";
            $id2 = 2;
            $test_store2 = new Store($store_location2, $id2);
            $test_store2->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $store_location = "Lloyd Center";
            $id = 1;
            $test_store = new Store($store_location, $id);

            $store_location2 = "Pioneer Place";
            $id2 = 2;
            $test_store2 = new Store($store_location2, $id2);

            //Act
            Store::deleteAll();

            //Assert
            $result = Store::getALl();
            $this->assertEquals([], $result);
        }

        function testSave()
        {
            //Arrange
            $store_location = "Lloyd Center";
            $id = 1;
            $test_store = new Store($store_location, $id);

            //Act
            $test_store->save();

            //Assert
            $result = Store::getAll();
            $this->assertequals($test_store, $result[0]);

        }

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
        // function testDelete()
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

    }
 ?>
