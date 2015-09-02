<?php
    class Store
    {
            private $store_location;
            private $id;

            function  __construct($store_location, $id=null)
            {
                $this->store_location = $store_location;
                $this->id = $id;
            }

            function getStoreLocation()
            {
                return $this->store_location;
            }

            function setStoreLocation($new_store_location)
            {
                $this->store_location = (string) $new_store_location;
            }


            function getId()
            {
                return $this->id;
            }

            function save()
            {
                $GLOBALS['DB']->exec("INSERT INTO stores (location) VALUES ('{$this->getStoreLocation()}');");
                $this->id = $GLOBALS['DB']->lastInsertId();
            }

            function update($new_store_location)
            {
                $GLOBALS['DB']->exec("UPDATE stores SET location = '{$new_store_location}' WHERE id = {$this->getId()};");
                $this->setStoreLocation($new_store_location);
            }

            function deleteStore()
            {
                $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
            }

            // function addBrand($new_brand)
            // {
            //     $GLOBALS['DB']->exec("INSERT INTO brands_stores (brand_id, store_id) VALUES ({$this->getId()}, {$new_brand->getId()});");
            // }
            //
            // function getBrands()
            // {
            //     $returned_brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores
            //     JOIN brands_stores ON (stores.id = brands_stores.store_id)
            //     JOIN brands ON (brands.id = brands_stores.brands_id)
            //     WHERE stores.id = {$this->getId()};");
            //
            //     $brands = array();
            //
            //     foreach ($returned_brands as $brand){
            //         $brand_name = $brand['name'];
            //         $id = $brand['id'];
            //         $new_brand = new Brand($brand_name, $id);
            //         array_push($brands, $new_brand);
            //     }
            //     return $brands;
            // }

            static function find($search_id)
            {
                $found_store = null;
                $all_stores = Store::getAll();
                foreach($all_stores as $store) {
                    if ($store->getId() == $search_id) {
                        $found_store = $store;
                    }
                }
                return $found_store;
            }

            static function getAll()
            {
                $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
                $stores = array();
                foreach($returned_stores as $store) {
                    $store_location = $store['location'];
                    $id = $store['id'];
                    $new_store = new Store($store_location, $id);
                    array_push($stores, $new_store);
                }
                return $stores;
            }

            static function deleteAll()
            {
                $GLOBALS['DB']->exec("DELETE FROM stores;");
                $GLOBALS['DB']->exec("DELETE FROM brands_stores;");
            }
    }
 ?>
