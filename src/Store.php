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
            }
    }
 ?>
