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

        }
    }
?>
