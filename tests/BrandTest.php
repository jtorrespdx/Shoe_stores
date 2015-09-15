<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Brand.php';
    require_once 'src/Store.php';

    $server = 'mysql:host=localhost:3306;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            // Store::deleteAll();
        }

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
            $brand_name = "Nike";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);

            //Act
            $test_brand->save();

            //Assert
            $result = Brand::getAll();
            $this->assertequals($test_brand, $result[0]);
        }

        function testGetAll()
        {
            //Arrange
            $brand_name = "Nike";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $brand_name2 = "Reebok";
            $id2 = 2;
            $test_brand2 = new Brand($brand_name2, $id2);
            $test_brand2->save();

            //Act
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function testFind()
        {
            //Arrange
            $brand_name = "Nike";
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $brand_name2 = "Reebok";
            $test_brand2 = new Brand($brand_name2, $id2);
            $test_brand2->save();

            //Act
            $result = Brand::find($test_brand2->getId());

            //assert
            $this->assertEquals($test_brand2, $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $brand_name = "Nike";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);

            $brand_name2 = "Reebok";
            $id2 = 2;
            $test_brand2 = new Brand($brand_name2, $id2);

            //Act
            Brand::deleteAll();

            //Assert
            $result = Brand::getALl();
            $this->assertEquals([], $result);
        }

        function testDelete()
        {
            //Arrange
            $brand_name = "Nike";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $brand_name2 = "Reebok";
            $id2 = 2;
            $test_brand2 = new Brand($brand_name2, $id2);
            $test_brand2->save();

            //Act
            $test_brand->delete();

            //Assert
            $this->assertEquals([$test_brand2], Brand::getAll());
        }

        function testUpdate()
        {
            //Arrange
            $brand_name = "Nike";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $new_brand_name = "Fila";

            //Act
            $test_brand->update($new_brand_name);

            //Assert
            $this->assertEquals('Fila', $test_brand->getBrandName());

        }



        function testGetStores()
        {
            //Arrange
            $brand_name = "Nike";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $store_location = "Lloyd Center";
            $id2 = 2;
            $test_store = new Store($store_location, $id2);
            $test_store->save();

            $store_location2 = "Pioneer Place";
            $id3 = 3;
            $test_store2 = new Store($store_location2, $id3);
            $test_store2->save();

            //Act
            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);
            $result = $test_brand->getStores();

            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function testAddStore()
        {
            //Assert
            $brand_name = "Nike";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $store_location = "Lloyd Center";
            $test_store = new Store($store_location);
            $test_store->save();

            //Act
            $test_brand->addStore($test_store);
            $result = $test_brand->getStores();

            //Assert
            $this->assertEquals([$test_store], $result);
        }

    }
 ?>
