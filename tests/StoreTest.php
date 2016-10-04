<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            //Arrange
            $name = "Shoeporium";
            $id = 1;
            $test_store = new Store($name,$id);
            //Act
            $result = $test_store->getId();
            //Assert
            $this->assertEquals($id, $result);
        }

        function test_getName()
        {
            //Arrange
            $name = "Shoeporium";
            $test_store = new Store($name);
            //Act
            $result = $test_store->getName();
            //Assert
            $this->assertEquals($name, $result);

        }

        function test_setName()
        {
            //Arrange
            $name = "Shoeporium";
            $test_store = new Store($name);
            $new_name = "Shoes Inc";
            //Act
            $test_store->setName($new_name);
            $result = $test_store->getName();
            //Assert
            $this->assertEquals($new_name, $result);

        }
            function save()
            {
              $GLOBALS['DB']->exec("INSTERT INTO stores (name, id) VALUES ('{$this->getName()}');");
              $This->id = $GLOBALS['DB']->lastInsertId();
            }

            function getAll()
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

            function deleteAll()
            {
                $GLOBALS['DB']->exec("DELETE FROM stores;");
            }
    }
?>
