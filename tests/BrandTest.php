<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown()
        {
          Brand::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $name = "Barefoot";
            $id = 1;
            $test_brand = new Brand($name,$id);
            //Act
            $result = $test_brand->getId();
            //Assert
            $this->assertEquals($id, $result);
        }

        function test_getName()
        {
          //Arrange
          $name = "Barefoot";
          $test_brand = new Brand($name);
          //Act
          $result = $test_brand->getName();
          //Assert
          $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Barefoot";
            $test_brand = new Brand($name);
            $new_name = "BrownBoots";
            //Act
            $test_brand->setName($new_name);
            $result = $test_brand->getName();
            //Assert
            $this->assertEquals($new_name, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Barefoot";
            $test_brand = new Brand($name);
            $test_brand->save();
            //Act
            $result = Brand::getAll();
            //Assert
            $this->assertEquals($test_brand, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Barefoot";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "BrownBoots";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();
            //Act
            $result = Brand::getAll();
            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Barefoot";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "BrownBoots";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();
            //Act
            Brand::deleteAll();
            $result = Brand::getAll();
            //Assert
            $this->assertEquals([],$result);
        }

        function test_delete()
        {
            //Arrange
            $name = "Barefoot";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "BrownBoots";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();
            //Act
            $test_brand->delete();
            $result = Brand::getAll();
            //Assert
            $this->assertEquals([$test_brand2], $result);
        }
    }
?>
