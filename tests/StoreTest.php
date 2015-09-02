<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";
    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:3306;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {

        protected function teardown()
        {
            Store::deleteAll();
            Brand::deleteAll();
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

        function testUpdate()
        {
            //Arrange
            $store_location = "Lloyd Center";
            $test_store = new Store($store_location);
            $test_store->save();

            $new_store_location = "Hawthorn";

            //Act
            $test_store->update($new_store_location);

            //Assert
            $this->assertEquals("Hawthorn", $test_store->getStoreLocation());

        }

        function testDeleteStore()
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
            $test_store->deleteStore();

            //Assert
            $this->assertEquals([$test_store2], Store::getAll());
        }

        function testFind()
        {
            //Arrange
            $store_location = "Lloyd Center";
            $test_store = new Store($store_location, $id);
            $test_store->save();

            $store_location2 = "Pioneer Place";
            $test_store2 = new Store($store_location2, $id2);
            $test_store2->save();

            //Act
            $result = Store::find($test_store2->getId());

            //assert
            $this->assertEquals($test_store2, $result);

        }
        //
        // function testAddBrand()
        // {
        //     //Arrange
        //     $store_location = "Lloyd Center";
        //     $test_store = new Store($store_location);
        //     $test_store->save();
        //
        //     $brand_name = "Nike";
        //     $test_brand = new Brand($id, $brand_name);
        //     $test_brand->save();
        //
        //     //Act
        //     $test_store->addBrand($test_brand);
        //
        //     //Assert
        //     $this->assertEquals($test_store->getBrands(), [$test_brand]);
        // }
        //
        // function testGetBrands()
        // {
        //     //Arrange
        //     $store_location = "Lloyd Center";
        //     $test_store = new Store($store_location);
        //     $test_store->save();
        //
        //     $brand_name = "Nike";
        //     $test_brand = new Brand($brand_name);
        //     $test_brand->save();
        //
        //     $brand_name2 = "Reebok";
        //     $test_brand2 = new Brand($brand_name2);
        //     $test_brand2->save();
        //
        //     //Act
        //     $test_store->addBrand($test_brand);
        //     $test_store->addBrand($test_brand2);
        //
        //     //Assert
        //     $this->assertEquals($test_store->getBrands(), [$test_brand, $test_brand2]);
        // }

    }
 ?>
