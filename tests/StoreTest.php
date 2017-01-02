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

        protected function teardown()
        {
            Store::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $name = "Shoeporium";
            $test_store = new Store($name);
            $test_store->save();
            //Act
            $result = Store::getAll();
            //Assert
            $this->assertEquals($test_store, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Shoeporium";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "ShoePlace";
            $test_store2 = new Store($name2);
            $test_store2->save();
            //Act
            $result = Store::getAll();
            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Shoeporium";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "ShoePlace";
            $test_store2 = new Store($name2);
            $test_store2->save();
            //Act
            Store::deleteAll();
            $result = Store::getAll();
            //Assert
            $this->assertEquals([], $result);
        }

        function test_update()
        {
          //Arrange
          $name = "Shoeporium";
          $test_store = new Store($name);
          $test_store->save();
          $new_name = "Shoeify";

          //Act
          $test_store->update($new_name);
          $result = $test_store->getName();

          //Assert
          $this->assertEquals($new_name, $result);

        }

        function test_delete()
        {
          //Arrange
          $name = "Shoeporium";
          $test_store = new Store($name);
          $test_store->save();

          $name2 = "ShoePlace";
          $test_store2 = new Store($name2);
          $test_store2->save();

          //Act
          $test_store->delete();
          $result = Store::getAll();

          //Assert
          $this->assertEquals([$test_store2], $result);
        }

        function test_addBrand()
        {
            //ARRANGE
            $brandName = "Nike";
            $id = null;
            $test_brand = new Brand($id, $brandName);
            $test_brand->save();
            $storeName = "Shoeporium";
            $test_store = new Store($id, $storeName);
            $test_store->save();
            // Act
            $test_store->addBrand($test_brand);
            // Assert
            $this->assertEquals([$test_brand], $test_store->getBrands());
        }
        function test_getBrands()
        {
            //ARRANGE
            $id = null;
            $storeName = "Shoeporium";
            $test_store = new Store($id, $storeName);
            $test_store->save();
            $brandName = "Nike";
            $test_brand = new Brand($id, $brandName);
            $test_brand->save();
            $test_store->addBrand($test_brand);
            $brandName2 = "Reebok";
            $test_brand2 = new Brand($id, $brandName2);
            $test_brand2->save();
            $test_store->addBrand($test_brand2);
            // Act
            $result = $test_store->getBrands();
            // Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }
    }
?>
