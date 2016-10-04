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
          $GLOBALS['DB']->exec("INSTERT INTO stores (name, id) VALUES ('{$this->getName()}');");
          $This->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
            $stores = array();
            foreach($returned_stores as $store)
            {
                $name = $store['name'];
                $id = $store['id'];
                $new_store = new Store($name,$id);
                array_push($stores, $new_store);
            }
            return $stores
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores;");
        }


    }
?>
