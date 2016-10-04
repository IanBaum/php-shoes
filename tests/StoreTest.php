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
    }
?>
