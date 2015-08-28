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
            //
            // function save




    }
 ?>
