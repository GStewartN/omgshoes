<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Brand.php';
    require_once 'src/Store.php';

    $server = 'mysql:host=localhost:8889;dbname=omgshoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {

        // protected function tearDown()
        // {
        //     Store::deleteAll();
        // }

        function testGetBrandName()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);

            //Act
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals($brand_name, $result);
        }

        function testSetBrandName()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);

            $new_brand_name = "Adidas";

            //Act
            $test_brand->setBrandName($new_brand_name);
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals($new_brand_name, $result);
        }

        function testGetPrice()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);

            //Act
            $result = $test_brand->getPrice();

            //Assert
            $this->assertEquals($price, $result);
        }

        function testSetPrice()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);

            $new_price = "$30.00";

            //Act
            $test_brand->setPrice($new_price);
            $result = $test_brand->getPrice();

            //Assert
            $this->assertEquals($new_price, $result);
        }

        function testGetId()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            //Act
            $result = $test_brand->getId();

            //Assert
            $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
            //Arrange
            $brand_name = "Nike";
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);

            //Act
            $executed = $test_brand->save();

            //Assert
            $this->assertTrue($executed, "This brand not saved.");
        }
    }
?>
