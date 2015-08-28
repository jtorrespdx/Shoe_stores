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

    class ShoeTest extends PHPUnit_Framework_TestCase {

        protected function teardown() {
            Store::deleteAll();
            Brand::deleteAll();
        }

        function testGetLocation()
        {

        }

        function testSetLocation()
        {

        }

        function testGetId()
        {

        }

        function testSave()
        {

        }

        function testUpdate()
        {

        }

        function TestDeleteStore()
        {

        }

        function testGetAll()
        {

        }

        function testDeleteAll()
        {

        }

        function testFind()
        {

        }

        function testAddBrand()
        {

        }

        function testGetBrands() /*testGetBrand ? */
        {

        }

        function testDelete()
        {

        }
    }
 ?>
