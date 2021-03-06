<?php
    class Store{
        private $name;
        private $id;

        function __construct($name,$id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
          $this->name = (string) $new_name;
        }

        function save()
        {
          $GLOBALS['DB']->exec("INSERT INTO stores (name) VALUES ('{$this->getName()}');");
          $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
       {
           $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
           $stores = array();
           foreach($returned_stores as $store) {
               $name = $store['name'];
               $id = $store['id'];
               $new_store = new Store($name, $id);
               array_push($stores, $new_store);
           }
           return $stores;
       }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores;");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
        }

        static function find($search_id)
       {
           $found_store = null;
           $stores = Store::getAll();
           foreach ($stores as $store) {
               $store_id = $store->getId();
               if ($store_id == $search_id) {
                   $found_store = $store;
               }
           }
           return $found_store;
       }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stores SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function addBrand($new_brand)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (stores_id, brands_id) VALUES ({$this->getId()},{$new_brand->getId()});");
        }

        function getBrands()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores
            JOIN brands_stores ON (brands_stores.stores_id = stores.id)
            JOIN brands ON (brands.id = brands_stores.brands_id)
            WHERE stores.id = {$this->getId()};");
            $brands = array();

            foreach ($returned_brands as $brand)
            {

                $id = $brand['id'];
                $name = $brand['name'];
                $new_brand = new Brand($name, $id);
                var_dump($new_brand);
                array_push($brands, $new_brand);
            }

            return $brands;
        }


        function deleteBrand($brand_id)
        {
            $GLOBALS['DB']->exec("DELETE FROM brands_stores WHERE store_id = {$this->getId()} AND brand_id = $brand_id;");
        }

    }
?>
