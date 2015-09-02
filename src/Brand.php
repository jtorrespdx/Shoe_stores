<?php
    class Brand
    {
        private $brand_name;
        private $id;

        function __construct($brand_name, $id=null)
        {
            $this->brand_name = $brand_name;
            $this->id = $id;
        }

        function getBrandName()
        {
            return $this->brand_name;
        }

        function setBrandName($new_brand_name)
        {
            $this->brand_name = (string) $new_brand_name;
        }


        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO brands (brand_name) VALUES ('{$this->getBrandName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        // function getStore()
        // {
        //     $returned_stores = $GLOBALS['DB']->query("SELECT stores.* FROM brands
        //     JOIN brands_stores ON (brands.id = brands_stores.brand_id)
        //     JOIN stores ON (brands_stores.store_id = stores.id)
        //     WHERE brands.id = {$this->getId()};");
        //
        //     $stores = array();
        //     foreach ($returned_stores as $store) {
        //         $store_location = $store['location'];
        //         $id = $store['id'];
        //         $new_store = new Store($store_location, $id);
        //         array_push($stores, $new_store);
        //     }
        //     return $stores;
        // }
        //
        // function addStore($new_store)
        // {
        //     $GLOBALS['DB']->exec("INSERT INTO brands_stores (brand_id, store_id) VALUES ({$this->getId()}, {$new_store->getId()});");
        // }


        static function find($search_id)
        {
            $found_brand = null;
            $all_brands = Brand::getAll();
            foreach($all_brands as $brand) {
                if ($brand->getId() == $search_id) {
                    $found_brand = $brand;
                }
            }
            return $found_brand;
        }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands = array();
            foreach($returned_brands as $brand) {
                $brand_name = $brand['brand_name'];
                $id = $brand['id'];
                $new_brand = new Brand($brand_name, $id);
                array_push($brands, $new_brand);
            }
            return $brands;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands;");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores;");
        }













    }
 ?>
