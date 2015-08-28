<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Brand.php';
    require_once 'src/Store.php';

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class BrandTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Brand::deleteAll();
        //     Store::deleteAll();
        // }

        function testGetBrandName()
        {
            //Arrange
            $brand_name = "Nike";
            $test_brand = new Brand($brand_name);

            //Act
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals($brand_name, $result);
        }

        function testSetBrandName()
        {
            //Arrange
            $brand_name = "Nike";
            $test_brand = new Brand($brand_name);

            //Act
            $test_brand->setBrandName("Reebok");
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals("Reebok", $result);
        }

        function testGetId()
        {
            //Arrange
            $brand_name = "Nike";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);

            //Act
            $result = $test_brand->getId();

            //Assert
            $this->assertEquals(1, $result);
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

        // function testGetAll()
        // {
        //     //Arrange
        //     $store_location = "Lloyd Center";
        //     $id = 1;
        //     $test_store = new Store($store_location, $id);
        //     $test_store->save();
        //
        //     $store_location2 = "Pioneer Place";
        //     $id2 = 2;
        //     $test_store2 = new Store($store_location2, $id2);
        //     $test_store2->save();
        //
        //     //Act
        //     $result = Store::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_store, $test_store2], $result);
        // }
        //
        // function testGetStore()
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
        //     $test_brand2 = new Brand(brand_name2);
        //     $test_brand2->save();
        //
        //     //Act
        //     $test_store->addBrand($test_brand);
        //     $test_store->addBrand($test_brand2);
        //
        //     $result = $test_store->getBrand();
        //
        //     //Assert
        //     $this->assertEquals([$test_brand, $test_brand2], $result);
        // }
    }
 ?>
